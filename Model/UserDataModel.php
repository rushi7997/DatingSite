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

    public function matchedUsers(string $userId){
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
            $match['profilePicUrl'] = $user->getProfilePicUrl();
            $matches[$i] = $match;
            $i++;
        }

        return $matches;
    }

}

//