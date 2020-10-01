<?php

session_start();

$message = '';

if((!isset($_POST['id']) || empty($_POST['id']))
    || ((!isset($_POST['firstName']) || empty($_POST['firstName'])))
    || ((!isset($_POST['lastName']) || empty($_POST['lastName'])))
    || ((!isset($_POST['about']) || empty($_POST['about'])))
    || ((!isset($_POST['profilePicUrl']) || empty($_POST['profilePicUrl'])))
    || ((!isset($_POST['isPremium']) || empty($_POST['isPremium'])))
    || ((!isset($_POST['age']) || empty($_POST['age'])))
    || ((!isset($_POST['gender']) || empty($_POST['gender'])))){
    $message = 'Please fill in all require information';
}

if(!empty($message)){
    header();
}


require_once "./Model/entity/User.php";
require_once "./Model/DataModel/MYSQLConnection.php";
require_once "./Model/DataModel/UserDataModel.php";

try{
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);
    $user = new User($_POST['id'],$_POST['firstName'],$_POST['lastName'],$_POST['about'],$_POST['profilePicUrl'],$_POST['isPremium'],intval($_POST['age']), $_POST['gender'])
}catch (PDOException $exception){

}

