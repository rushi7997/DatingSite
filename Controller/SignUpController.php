<?php

session_start();

$message = '';

if((!isset($_POST['id']) || empty($_POST['id']))
    || ((!isset($_POST['firstName']) || empty($_POST['firstName'])))
    || ((!isset($_POST['lastName']) || empty($_POST['lastName'])))
    || ((!isset($_POST['about']) || empty($_POST['about'])))
    || ((!isset($_POST['age']) || empty($_POST['age'])))
    || ((!isset($_POST['gender']) || empty($_POST['gender'])))
    ||((!isset($_POST['password']) || empty($_POST['password'])))){
    $message = 'Please fill in all require information';
}
if(!empty($message)){
    header("Location: ../Views/index.php?message=$message");
}


require_once "../Model/User.php";
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";

try{
    $connection = new MYSQLConnection();
    $userDataModel = new UserDataModel($connection);
    $gender = ($_POST['gender'] == 'male');
    $picture = $_FILES['profilePic'];
    if(isset($_FILES['profilePic'])){
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($picture['tmp_name']);
        $error = !in_array($detectedType, $allowedTypes);
        if (!$error){
            move_uploaded_file($picture['tmp_name'], '../UserImages/' .$_POST['firstName'].'-'.$_POST['lastName'].'-'.$_POST['age'].".".pathinfo($picture["name"])['extension']);
        }
    }

    $profilePicUrl = '../UserImages/' .$_POST['firstName'].'-'.$_POST['lastName'].'-'.$_POST['age'].pathinfo($_FILES["profilePic"]["name"])['extension'];
    $user = new User($_POST['id'],$_POST['firstName'],$_POST['lastName'],$_POST['about'],$profilePicUrl,false,intval($_POST['age']), $gender, $_POST['password']);

    $userDataModel->insert($user);
    $message = " User Created Successfully ";
}catch (PDOException $exception) {
    $message = " Database Error !";
} finally {
    if(!empty($message)){
        header("Location: ../Views/index.php?message=$message");
    }
}

