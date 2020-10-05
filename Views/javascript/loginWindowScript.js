otherProfileButton = document.querySelectorAll("#other-profile-close-btn");

document.getElementById('0').classList.add('active');

let currentProfile = null;
let nextProfile = null;
let previousProfile = null;
for (let i = 0; i < otherProfileButton.length; i++) {
    otherProfileButton[i].addEventListener('click', () => {
        if (i === 0) {
            previousProfile = document.getElementById((otherProfileButton.length - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById((i + 1).toString());
        } else if (i === (otherProfileButton.length - 1)) {
            previousProfile = document.getElementById((i - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById('0');
        } else {
            previousProfile = document.getElementById((i - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById((i + 1).toString());
        }
        openProfile(previousProfile, currentProfile, nextProfile);
    });
}

const openProfile = (previous, current, next) => {
    if((previous === null) || (current === null) || (next === null)) return;
    previous.classList.remove('gone');
    previous.classList.remove('select');
    current.classList.remove('active');
    current.classList.add('gone');
    next.classList.add('active')
}

for (let i = 0; i < winkButtons.length; i++) {
    winkButtons[i].addEventListener('click', () => {
        if (i === 0) {
            previousProfile = document.getElementById((otherProfileButton.length - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById((i + 1).toString());
        } else if (i === (otherProfileButton.length - 1)) {
            previousProfile = document.getElementById((i - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById('0');
        } else {
            previousProfile = document.getElementById((i - 1).toString());
            currentProfile = document.getElementById(i.toString());
            nextProfile = document.getElementById((i + 1).toString());
        }
        selectProfile(previousProfile, currentProfile, nextProfile);
    });
}

const selectProfile = (previous, current, next) => {
    if((previous === null) || (current === null) || (next === null)) return;
    previous.classList.remove('gone');
    previous.classList.remove('select');
    current.classList.remove('active');
    current.classList.add('select');
    next.classList.add('active');
}

let xhttp = new XMLHttpRequest();
let sendWink = (toUser, fromUser) => {
    xhttp.open("POST", "../Controller/sendWinkController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("to_user="+toUser+"&from_user="+fromUser);
}