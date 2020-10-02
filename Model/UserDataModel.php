<?php

header("Access-Control-Allow-Origin: *");
class UserDataModel
{
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insert(User $user){
        $data = [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'about' => $user->getAbout(),
            'profilePicUrl' => $user->getProfilePicUrl(),
            'isPremium' => $user->isPremium(),
            'age' => $user->getAge(),
            'gender' => $user->isGender(),
            'password'=> $user->getPassword()
        ];
        $sql = "INSERT INTO users (id, firstName, lastName, about, profilePicUrl, isPremium, age, gender, password) VALUES (:id, :firstName, :lastName, :about, :profilePicUrl, :isPremium, :age, :gender, :password)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
    }

    public function exist(string $id) : bool{
        $sql = "SELECT * FROM users where id=?";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 1){
            return true;
        }
        return false;
    }

    public function getUser(string $id) {
//        if($this->exist($id))
//            return false;

        $sql = "SELECT * FROM users where id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();

        return new User($data[0]['id'],$data[0]['firstName'],$data[0]['lastName'],$data[0]['about'],$data[0]['profilePicUrl'],$data[0]['isPremium'],$data[0]['age'],$data[0]['gender'],$data[0]['password']);

    }

}