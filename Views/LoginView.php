<?php
include_once "../Model/User.php";
session_start();
$user = $_SESSION['user'];
$otherUsers = $_SESSION['otherUsers'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minder</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/tinder-icon-bar.svg">
    <link rel="stylesheet" href="./css/styleLogin.css">
</head>
<body>
<div class="body">
    <div class="profile">
        <div class="profile_pic">
            <img src="<?= $user->getProfilePicUrl() ?>" alt="profile_pic"/>
        </div>
        <div class="Names">
            <?= ucfirst($user->getFirstName()) . " " . ucfirst($user->getLastName()) . " ," . $user->getAge() ?>
        </div>
        <div class="gender">
            <?php echo $user->isGender() ? "Male" : "Female" ?>
        </div>
        <div class="profile_about"> <?= $user->getAbout() ?> </div>
    </div>
    <div class="other-users">
        <img src="../UserImages/First-Last-23.jpg" alt="profile_pic">
        <div class="btns-other-profiles">
            <div class="heart"></div>
            <div id="other-profile-close-btn" class="profile-btn <?= ($i == 4) ? "five" : '' ?>">&times;</div>
        </div>
        <div class="firstName-lastname-age"> First Last , 23</div>
        <div class="about-me">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem
            culpa nesciunt nihil aut nostrum explicabo reprehenderit optio.
        </div>
    </div>
</body>
</html>
