<?php
$users = array(
    [
        "id" => 1,
        "firstName" => "First_1",
        "lastName" => "Last_1",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./UserImages/img_1_1.jpg"
    ],
    [
        "id" => 2,
        "firstName" => "First_2",
        "lastName" => "Last_2",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./UserImages/img_1_1.jpg"
    ],
    [
        "id" => 3,
        "firstName" => "First_3",
        "lastName" => "Last_3",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./UserImages/img_1_1.jpg"
    ],
    [
        "id" => 4,
        "firstName" => "First_4",
        "lastName" => "Last_4",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./UserImages/img_1_1.jpg"
    ],
    [
        "id" => 5,
        "firstName" => "First_5",
        "lastName" => "Last_5",
        "age" => 25,
        "about" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate. Voluptatum ducimus voluptates voluptas?",
        "profile_pic" => "./UserImages/img_1_1.jpg"
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
        <div id="login-modal-close-button">&times;</div>
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
        <div id="signup-modal-close-button">&times;</div>
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
<?php for ($i = 0; $i < count($users); $i++) { ?>
    <div id="<?= $users[$i]['id'] ?>" class="profile_modal">
        <div class="modal-header">
            <div class="modal-title"> Profiles</div>
            <div class="close-btn" id="profile-close-button">&times;</div>
        </div>
        <div class="modal-body">
            <img src="../UserImages/img_1_1.jpg" alt="user_image">
            <div class="profile_img" id="<?= $users[$i]['id']."_id" ?>">
                <div class="heart profile-btn"></div>
                <div id="profile-window-close-btn" class="profile-btn <?= ($i == 4) ? "five" : ''  ?>">&times;</div>
            </div>
            <div class="firstName-lastname-age"><?= ucfirst($users[$i]["firstName"]) . " " . ucfirst($users[$i]["lastName"]) . " , " . $users[$i]["age"] . "." ?></div>
            <div class="about-me"> <?= $users[$i]['about'] ?> </div>
        </div>
    </div>
<?php } ?>
<div id="overlay"></div>
</body>
<script>
    let profiles = <?php echo json_encode($users, JSON_PRETTY_PRINT); ?>;
    let currentProfile = 1;
    const profileXBtn = document.querySelectorAll('#profile-window-close-btn');
    // console.log(document.getElementById("1_id").childNodes[3]);

    const len = profiles.length;
    profileXBtn.forEach(btn => {
        if(btn.parentElement.parentElement.parentElement.id !== len.toString()){
            btn.addEventListener('click', () => {
                const modal = document.getElementById(currentProfile.toString());
                nextProfile(modal);
            });
        }
    });


    const nextProfile = (modal) => {
        let currentModal = modal;
        if(currentModal === null)
            return ;
        currentModal.classList.remove("active");
        currentModal.classList.add("gone");
        currentProfile += 1;
        let nextModal = document.getElementById(currentProfile);
        if(nextModal===null)
            return
        nextModal.classList.add("active");
    }

    const dataClosebtn = document.querySelectorAll('.close-btn');


    dataClosebtn.forEach(btn => {
        for (let i = 0; i <= 5; i++){
            btn.addEventListener('click', () => {
                let modal = document.getElementById(i.toString());
                closeModal(modal);
                resetProfileModal(modal);
                currentProfile = 1;
            });
        }
    });
    const fiveBtn = document.getElementsByClassName('five');

    fiveBtn[0].addEventListener('click', ()=> {
        dataClosebtn[4].click();
        let modal = document.getElementById("signup-modal");
        console.log(modal);
        openLoginModal(modal);
    });

</script>
<script src="javascript/script.js"></script>
</html>