<?php

session_start();

$message = '';

if((!isset($_POST['id']) || empty($_POST['id']))
    || ((!isset($_POST['password']) || empty($_POST['password'])))){
    $message = 'Please fill in all require information';
}

if(!empty($message)){
    header("Location: ../Views/index.php");
}

require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";

try {
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);

    var_dump($userDataModel->getUser($_POST['id']));
    var_dump($userDataModel->exist($_POST['id']));


}catch (PDOException $exception){
    echo $exception->getMessage();
}