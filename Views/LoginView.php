<?php
include_once "../Model/User.php";
session_start();
$user = $_SESSION['user'];
$otherUsers = $_SESSION['otherUsers'];
$otherUsersArray = array();
$j = 1;
foreach ($otherUsers as $item) {
    $otherUsersArray[$j . ""] = array();
    $otherUsersArray[$j . '']['id'] = $item->getId();
    $otherUsersArray[$j . '']['firstName'] = $item->getFirstName();
    $otherUsersArray[$j . '']['lastName'] = $item->getLastName();
    $otherUsersArray[$j . '']['about'] = $item->getAbout();
    $otherUsersArray[$j . '']['profilePicUrl'] = $item->getProfilePicUrl();
    $otherUsersArray[$j . '']['isPremium'] = $item->isPremium();
    $otherUsersArray[$j . '']['age'] = $item->getAge();
    $otherUsersArray[$j . '']['gender'] = $item->IsGender();
    $otherUsersArray[$j . '']['password'] = $item->getPassword();
    $j++;
}
require_once "../Model/MYSQLConnection.php";
require_once "../Model/UserDataModel.php";
$connection = new MYSQLConnection();
$userDataModel = new UserDataModel($connection);

$allWinks = $_SESSION['allWinks'];
$allMatches = $_SESSION['allMatches']
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
    <div class="messagePanel">
        <div class="notification">
            <?php
            if(count($allWinks) > 0){
            for ($j = 0; $j < count($allWinks); $j++) { ?>
                <div class="single-notification">
                    <b><?= $allWinks[$j] ?></b> Has Winked At You !
                </div>
            <?php }}else{ ?>
                <div class="single-notification">
                    sorry You have no Winks!
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php for ($i = 0; $i < count($otherUsers); $i++) { ?>
    <div class="other-users" id="<?= $i ?>">
        <img src="<?= $otherUsers[$i + 1]->getProfilePicUrl() ?>" alt="profile_pic">
        <div class="btns-other-profiles">
            <div class="heart" id="<?= $otherUsers[$i + 1]->getId() ?>"></div>
            <div id="other-profile-close-btn" class="profile-btn">&times;</div>
        </div>
        <div class="firstName-lastname-age"> <?= ucfirst($otherUsers[$i + 1]->getFirstName()) . " " . ucfirst($otherUsers[$i + 1]->getLastName()) . " , " . $otherUsers[$i + 1]->getAge() . "." ?> </div>
        <div class="about-me"> <?= $otherUsers[$i + 1]->getAbout() ?> </div>
    </div>
<?php } ?>
</body>

<script>
    let otherProfiles = <?php echo json_encode($otherUsersArray, JSON_PRETTY_PRINT); ?>;
    let winkButtons = document.querySelectorAll('.heart');
    winkButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            let toUser = btn.id;
            let fromUser = "<?=$user->getId()?>";
            sendWink(toUser, fromUser);
        });
    });


</script>
<script src="javascript/loginWindowScript.js"></script>
</html>
