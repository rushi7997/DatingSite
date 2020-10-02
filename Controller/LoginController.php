<?php
header("Access-Control-Allow-Origin: *");
//session_start();

$message = '';

if((!isset($_POST['id']) || empty($_POST['id']))
    || ((!isset($_POST['password']) || empty($_POST['password'])))){
    $message = 'Please fill in all require information';
}

if(!empty($message)){
    header("Location: ../Views/index.php?message=$message");
}

require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";

try {
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);

    if(!$userDataModel->exist($_POST['id'])){
        $message = "user does not exist";
        if(!empty($message)){
            header("Location: ../Views/index.php?message=$message");
        }
    }
    $user = $userDataModel->getUser($_POST['id']);
    if($user->getPassword() === $_POST['password']){
        session_id($user->getFirstName()."-".$user->getLastName()."-".$user->getAge());
        session_start();
        $_SESSION['user'] = $user;

        header("Location: ../Views/LoginView.php");
    }else{
        $message = "Password Does not match";
        if(!empty($message)){
            header("Location: ../Views/index.php?message=$message");
        }
    }

//    var_dump($userDataModel->getUser($_POST['id']));
//    var_dump($userDataModel->exist($_POST['id']));


}catch (PDOException $exception){
    echo $exception->getMessage();
}