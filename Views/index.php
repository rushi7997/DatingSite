<?php
header("Access-Control-Allow-Origin: *");

require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";
$connection = new MYSQLConnection();
$userDataModel = new UserDataModel($connection);

$users = $userDataModel->getTopFive();

$isMessage = false;
if (isset($_GET['message'])) {
    $isMessage = true;
}
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
        <div id="login-modal-close-button">&times;</div>
    </div>
    <form action="../Controller/LoginController.php" method="post">
        <div class="modal-body">
            <div class="form-input">
                <label for="email">User Id : </label>
                <input type="email" name="id" required>
            </div>
            <div class="form-input">
                <label for="password"> Password : </label>
                <input type="password" name="password" required>
            </div>
            <button class="login-modal-button" type="submit" value="Login">Login</button>
        </div>
    </form>
</div>

<div id="signup-modal">
    <div class="modal-header">
        <div class="modal-title">Sign up</div>
        <div id="signup-modal-close-button">&times;</div>
    </div>
    <form action="../Controller/SignUpController.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-input">
                <label for="email">User Id : </label>
                <input type="email" name="id" required>
            </div>
            <div class="form-input">
                <label for="password"> Password : </label>
                <input type="password" required name="password">
            </div>
            <div class="form-input">
                <label for="firstName"> First-Name : </label>
                <input type="text" required maxlength="30" name="firstName">
            </div>
            <div class="form-input">
                <label for="lastName"> Last-Name : </label>
                <input type="text" required maxlength="30" name="lastName">
            </div>
            <div class="form-input">
                <label for="age"> Age : </label>
                <input type="number" max="100" min="18" required name="age">
            </div>
            <div class="form-input">
                <label for="about"> About You : </label>
                <input type="text" required maxlength="300" name="about">
            </div>
            <div class="form-input">
                <label for="profilePic"> Profile Pic : </label>
                <input type="file" required name="profilePic">
            </div>
            <div class="form-input-gender">
                <label for="gender"> Gender : </label>
                <input type="radio" name="gender" value="male" style="padding: 0; margin: 10px;"> Male
                <input type="radio" name="gender" value="female" style="padding: 0; margin: 10px;"> Female
            </div>
            <button class="login-modal-button" type="submit" value="Login">Signup</button>
        </div>
    </form>
</div>
<?php for ($i = 0; $i < count($users); $i++) { ?>
    <div id="<?= $i+1 ?>" class="profile_modal">
        <div class="modal-header">
            <div class="modal-title"> Profiles</div>
            <div class="close-btn" id="profile-close-button">&times;</div>
        </div>
        <div class="modal-body">
            <img src="<?= $users[$i]['profilePicUrl'] ?>" alt="user_image">
            <div class="profile_img" id="<?= $users[$i]['id'] . "_id" ?>">
                <div class="heart profile-btn"></div>
                <div id="profile-window-close-btn" class="profile-btn <?= ($i == 4) ? "five" : '' ?>">&times;</div>
            </div>
            <div class="firstName-lastname-age"><?= ucfirst($users[$i]["firstName"]) . " " . ucfirst($users[$i]["lastName"]) . " , " . $users[$i]["age"] . "." ?></div>
            <div class="about-me"> <?= $users[$i]['about'] ?> </div>
        </div>
    </div>
<?php } ?>
<div id="overlay"></div>
</body>
<script>
    let isMessage = <?= $isMessage ?> + "";
    message = '';
    if (isMessage) {
        message = '<?php echo isset($_GET['message']) ? $_GET['message'] : "";?>';
        alert(message);
    }

    let profiles = <?php echo json_encode($users, JSON_PRETTY_PRINT); ?>;
    let currentProfile = 1;
    const profileXBtn = document.querySelectorAll('#profile-window-close-btn');
    const len = profiles.length;
    profileXBtn.forEach(btn => {
        if (btn.parentElement.parentElement.parentElement.id !== len.toString()) {
            btn.addEventListener('click', () => {
                const modal = document.getElementById(currentProfile.toString());
                nextProfile(modal);
            });
        }
    });


    const nextProfile = (modal) => {
        let currentModal = modal;
        if (currentModal === null)
            return;
        currentModal.classList.remove("active");
        currentModal.classList.add("gone");
        currentProfile += 1;
        let nextModal = document.getElementById(currentProfile);
        if (nextModal === null)
            return
        nextModal.classList.add("active");
    }

    const dataClosebtn = document.querySelectorAll('.close-btn');


    dataClosebtn.forEach(btn => {
        for (let i = 0; i <= 5; i++) {
            btn.addEventListener('click', () => {
                let modal = document.getElementById(i.toString());
                closeModal(modal);
                resetProfileModal(modal);
                currentProfile = 1;
            });
        }
    });
    const fiveBtn = document.getElementsByClassName('five');

    fiveBtn[0].addEventListener('click', () => {
        dataClosebtn[4].click();
        let modal = document.getElementById("signup-modal");
        console.log(modal);
        openLoginModal(modal);
    });

</script>
<script src="javascript/script.js"></script>
</html>