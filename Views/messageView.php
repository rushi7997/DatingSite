<?php
require_once "../Model/User.php";
session_start();
$toUser = $_SESSION['to_user']; // other user
$fromUser = $_SESSION['from_user']; // current User
$user = $_SESSION['user'];
//echo $toUser . "<br>";
//echo $fromUser;

require_once "../Model/User.php";
$messages = $_SESSION['messages'];
$messages_In = array();
$messages_out = array();
$i = 0;
foreach ($messages as $item) {
    if ($item['to_user'] === $user->getId()) {
        $message = array();
        $message['message'] = $item['message'];
        $message['time'] = $item['sent_time'];
        $message['seen'] = $item['seen'];
        $messages_In[$i] = $message;
        $i++;
    } else {
        $message = array();
        $message['message'] = $item['message'];
        $message['time'] = $item['sent_time'];
        $message['seen'] = $item['seen'];
        $messages_out[$i] = $message;
        $i++;
    }
}
$length = count($messages);
//var_dump($messages_In);

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
    <link rel="stylesheet" href="./css/styleMessage.css">
</head>
<body>
<div class="messages-panel">
    <?php
    for ($j = 0; $j < $length; $j++) {
        if (isset($messages_In[$j])) {
            ?>
            <div class="messages-in"> <?= $messages_In[$j]['message'] ?> <sub><?= $messages_In[$j]['seen'] ? 'seen' : 'not seen' ?></sub></div>
        <?php } else { ?>
            <div class="messages-out"> <?= $messages_out[$j]['message'] ?> <sub><?= $messages_out[$j]['seen'] ? 'seen' : 'not seen' ?></sub></div>
            <?php
        }
    } ?>

</div>
<form>
    <label> Message : </label>
    <input type="text" name="message" id="message">
    <input type="button" id="send-message-btn" value="send">
</form>
</body>
<script>
    let toUser = "<?= $toUser ?>";
    let fromUser = "<?= $fromUser ?>";
    const sendButton = document.getElementById('send-message-btn');
    console.log("haha");
    sendButton.addEventListener('click', () => {
        let message = document.getElementById('message').value;
        sendMessage(toUser, fromUser, message);
        document.getElementById('message').value = '';
    });
    let xhttp = new XMLHttpRequest();
    let sendMessage = (toUser, fromUser, message) => {
        xhttp.open("POST", "../Controller/sendMessageController.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("to_user=" + toUser + "&from_user=" + fromUser + "&message=" + message);
    }
</script>
<script src="./javascript/messageScript.js"></script>
</html>
