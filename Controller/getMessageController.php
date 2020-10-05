<?php
require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";
session_start();
$user = $_SESSION['user'];

if(isset($_GET['to_user'])){
    $messagingUser = $_GET['to_user'];
}

try {
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);
    $fromUser = $user->getId();
    $_SESSION['to_user'] = $messagingUser;
    $_SESSION['from_user'] = $fromUser;

    $_SESSION['messages'] = $userDataModel->getAllMessages($user->getId(),$messagingUser);

//    var_dump($userDataModel->getAllMessages($user->getId(),$messagingUser));
    header("Location: ../Views/messageView.php");

}catch (PDOException $exception) {
    $message = " Database Error !";
} finally {
    if (!empty($message)) {
        header("Location: ../Views/index.php?message=$message");
    }
}