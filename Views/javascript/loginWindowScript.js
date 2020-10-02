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
    current.classList.remove('active');
    current.classList.add('gone');
    next.classList.add('active')
}