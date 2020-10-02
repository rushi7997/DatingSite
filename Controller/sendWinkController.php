<?php


session_start();

$toUser = $_POST['to_user'];
$fromUser = $_POST['from_user'];

require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";
try {
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);

    $userDataModel->sendWink($toUser,$fromUser);

}catch (PDOException $exception){
    echo $exception->getMessage();
}