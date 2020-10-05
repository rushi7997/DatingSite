<?php

header("Access-Control-Allow-Origin: *");

class UserDataModel
{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insert(User $user)
    {
        $data = [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'about' => $user->getAbout(),
            'profilePicUrl' => $user->getProfilePicUrl(),
            'isPremium' => $user->isPremium(),
            'age' => $user->getAge(),
            'gender' => $user->isGender(),
            'password' => $user->getPassword()
        ];
        $sql = "INSERT INTO users (id, firstName, lastName, about, profilePicUrl, isPremium, age, gender, password) VALUES (:id, :firstName, :lastName, :about, :profilePicUrl, :isPremium, :age, :gender, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
    }

    public function exist(string $id): bool
    {
        $sql = "SELECT * FROM users where id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 1) {
            return true;
        }
        return false;
    }

    public function getUser(string $id)
    {
//        if($this->exist($id))
//            return false;

        $sql = "SELECT * FROM users where id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();

        return new User($data[0]['id'], $data[0]['firstName'], $data[0]['lastName'], $data[0]['about'], $data[0]['profilePicUrl'], $data[0]['isPremium'], $data[0]['age'], $data[0]['gender'], $data[0]['password']);

    }

    public function getOthers(User $user)
    {
        $gender = $user->isGender();
        $sql = "SELECT * FROM users where gender = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([!$gender]);
        $data = $stmt->fetchAll();

        $users = array();

        $i = 1;
        foreach ($data as $profile) {
            $users["" . $i] = new User($profile['id'], $profile['firstName'], $profile['lastName'], $profile['about'], $profile['profilePicUrl'], $profile['isPremium'], $profile['age'], $profile['gender'], $profile['password']);
            $i++;
        }

        return $users;
    }

    public function sendWink(string $toUser, string $fromUser)
    {
        $sql = "INSERT INTO wink (to_user, from_user, seen) values ( ?, ?, FALSE);";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$toUser, $fromUser]);
    }

    public function allUserWinks(string $userId)
    {
        $sql = "SELECT COUNT(from_user),from_user FROM `wink` WHERE to_user = ? GROUP BY(from_user)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$userId]);
        $data = $stmt->fetchAll();
        $winks = array();
        $i = 0;
        foreach ($data as $item) {
            $user = $this->getUser($item['from_user']);
            $userName = $user->getFirstName() . " " . $user->getLastName();
            $winks[$i] = $userName;
            $i++;
        }

        $sql = "UPDATE `wink` SET `seen`= TRUE WHERE to_user = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$userId]);

        return $winks;
    }

    public function matchedUsers(string $userId)
    {
        $sql = "SELECT COUNT(a.to_user), a.to_user , a.from_user FROM wink as a JOIN wink as b WHERE a.to_user = b.from_user AND a.from_user = b.to_user AND a.to_user = ? GROUP BY a.from_user";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$userId]);

        $data = $stmt->fetchAll();
        $matches = array();
        $i = 0;
        foreach ($data as $item) {
            $match = array();
            $user = $this->getUser($item['from_user']);
            $userName = $user->getFirstName() . " " . $user->getLastName();
            $match['userName'] = $userName;
            $match['id'] = $item['from_user'];
            $match['profilePicUrl'] = $user->getProfilePicUrl();
            $matches[$i] = $match;
            $i++;
        }

        return $matches;
    }

    public function getAllMessages(string $to_user, string $from_user)
    {
        $sql = "UPDATE `messages` SET `seen`= TRUE WHERE to_user = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$to_user]);


        $sql = "SELECT * FROM messages where to_user = ? AND from_user = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$to_user, $from_user]);

        $data = $stmt->fetchAll();
        $messages = array();
        $i = 0;

        foreach ($data as $item) {
            $message = array();
            $message['to_user'] = $item['to_user'];
            $message['from_user'] = $item['from_user'];
            $message['message'] = $item['message'];
            $message['sent_time'] = $item['sent_time'];
            $message['seen'] = $item['seen'];
            $messages[$i] = $message;
            $i++;
        }
        $sql = "SELECT * FROM messages where to_user = ? AND from_user = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$from_user, $to_user]);

        $data = $stmt->fetchAll();
        foreach ($data as $item) {
            $message = array();
            $message['to_user'] = $item['to_user'];
            $message['from_user'] = $item['from_user'];
            $message['message'] = $item['message'];
            $message['sent_time'] = $item['sent_time'];
            $message['seen'] = $item['seen'];
            $messages[$i] = $message;
            $i++;
        }

        return $messages;
    }

    public function sendMessage(string $to_user, string $from_user, string $message)
    {
        $data = [
            'to_user' => $to_user,
            'from_user' => $from_user,
            'message' => $message
        ];

        $sql = "INSERT INTO messages (to_user,from_user,message,seen) values (:to_user, :from_user, :message, FALSE);";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
    }

    public function getTopFive()
    {
        $sql = "SELECT count(w.to_user), w.to_user as 'user', u.firstName as 'firstName', u.lastName as 'lastName', u.about as 'about', u.age as 'age', u.profilePicUrl as 'profilePicUrl' FROM wink as W JOIN users u on u.id = W.to_user GROUP BY w.to_user ORDER BY COUNT(w.to_user) DESC ;";
        $data = $this->connection->query($sql)->fetchAll();
//        $data = $stmt->fetchAll();

//        var_dump($data);
        $users = array();
        $i = 0;
        foreach ($data as $item){
            $user = array();
            $user['firstName'] = $item['firstName'];
            $user['lastName'] = $item['lastName'];
            $user['age'] = $item['age'];
            $user['about'] = $item['about'];
            $user['profilePicUrl'] = $item['profilePicUrl'];
            $users[$i] = $user;
            $i++;
            if($i === 5){
                break;
            }
        }
        return $users;
    }
}

//