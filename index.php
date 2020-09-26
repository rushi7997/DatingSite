<?php

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
        <button class="navbar_item"> Profiles</button>
    </div>
    <div class="body-writing">
        <p> You never know where a Swipe might take you.™ </p>
        <button id="openSignupButton" class="join_button"> Sign Up</button>
    </div>
</nav>

<div  id="login-modal">
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

<div  id="signup-modal">
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
<div id="overlay"></div>
</body>
<script src="javascript/script.js"></script>
</html>

