<?php
require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";
session_start();
$user = $_SESSION['user'];
//var_dump($user);
try{
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);

    $otherUsers = $userDataModel->getOthers($user);

    $_SESSION['otherUsers'] = $otherUsers;

    header('Location: ../Views/LoginView.php');

}catch (PDOException $exception) {
    $message = " Database Error !";
} finally {
    if (!empty($message)) {
        header("Location: ../Views/index.php?message=$message");
    }
}