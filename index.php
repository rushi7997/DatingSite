<?php
$users = array(
    [
        "id" => 1,
        "firstName" => "First",
        "lastName" => "Last",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./users/img_1_1.jpg"
    ],
    [
        "id" => 1,
        "firstName" => "First",
        "lastName" => "Last",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./users/img_1_1.jpg"
    ],
    [
        "id" => 1,
        "firstName" => "First",
        "lastName" => "Last",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./users/img_1_1.jpg"
    ],
    [
        "id" => 1,
        "firstName" => "First",
        "lastName" => "Last",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./users/img_1_1.jpg"
    ],
    [
        "id" => 1,
        "firstName" => "First",
        "lastName" => "Last",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./users/img_1_1.jpg"
    ]
);
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
    <link rel="stylesheet" href="css/styleMain.css">

</head>
<body>
<nav>
    <div class="logo">
        <img src="img/tinder-icon@2x.png" alt="logo">
        <p>minder</p>
    </div>
    <div class="navbar">
        <button id="openLoginModal" class="navbar_item"> Login</button>
        <button id="openProfileModal" class="navbar_item"> Profiles</button>
    </div>
    <div class="body-writing">
        <p> You never know where a Swipe might take you.™ </p>
        <button id="openSignupButton" class="join_button"> Sign Up</button>
    </div>
</nav>

<div id="login-modal">
    <div class="modal-header">
        <div class="modal-title">Login</div>
        <div data-close-button id="login-modal-close-button">&times;</div>
    </div>
    <form action="#" method="post">
        <div class="modal-body">
            <div class="form-input">
                <label for="email">User Id : </label>
                <input type="email" name="email" required>
            </div>
            <div class="form-input">
                <label for="password"> Password : </label>
                <input type="password" required>
            </div>
            <button class="login-modal-button" type="submit" value="Login">Login</button>
        </div>
    </form>
</div>

<div id="signup-modal">
    <div class="modal-header">
        <div class="modal-title">Sign up</div>
        <div data-close-button id="signup-modal-close-button">&times;</div>
    </div>
    <form action="#" method="post">
        <div class="modal-body">
            <div class="form-input">
                <label for="email">User Id : </label>
                <input type="email" name="email" required>
            </div>
            <div class="form-input">
                <label for="password"> Password : </label>
                <input type="password" required>
            </div>
            <div class="form-input">
                <label for="firstName"> First-Name : </label>
                <input type="text" required maxlength="30">
            </div>
            <div class="form-input">
                <label for="lastName"> Last-Name : </label>
                <input type="text" required maxlength="30">
            </div>
            <button class="login-modal-button" type="submit" value="Login">Login</button>
        </div>
    </form>
</div>
<?php //for($i = 0; $i < ) ?>
<div id="profile_modal" class="profile_modal">
    <div class="modal-header">
        <div class="modal-title"> Profiles </div>
        <div data-close-button id="profile-close-button">&times;</div>
    </div>
    <div class="modal-body">
        <div class="profile_img">
            <img src="./users/img_1_1.jpg" alt="user_image">
            <div class="heart profile-btn"></div>
            <div id="profile-window-close-btn" class="profile-btn">&times;</div>
        </div>
        <div class="firstName-lastname-age"><?= ucfirst($users[0]["firstName"])." ". ucfirst($users[0]["lastName"]). " , ".$users[0]["age"]. "." ?></div>
        <div class="about-me"> <?= $users[0]['about'] ?> </div>
    </div>
</div>
<div id="overlay"></div>
</body>
<script src="./javascript/script.js"></script>
</html>