<?php

require_once "../entity/User.php";
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
            'gender' => $user->isGender()
        ];
        $sql = "INSERT INTO UserImages (id, firstName, lastName, about, profilePicUrl, isPremium, age, gender) VALUES (:id, :firstName, :lastName, :about, :profilePicUrl, :isPremium, :age, :gender)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($data);
    }
}