const openLoginModalButton = document.getElementById("openLoginModal");
const closeLoginModalButton = document.getElementById('login-modal-close-button');
const overlay = document.getElementById("overlay");
const openSignupModalButton = document.getElementById('openSignupButton');
const closeSignupModalButton = document.getElementById('signup-modal-close-button');
const openProfileModalButton = document.getElementById("openProfileModal");
const closeProfileModalButton = document.getElementById('profile-close-button');
const profileBtn = document.querySelectorAll('.profile-btn');


profileBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        closeingModal = document.getElementById('profile_modal');
        closeModal(closeingModal);
        openingModal = document.getElementById('signup-modal');
        openLoginModal(openingModal);
    });
});

openProfileModalButton.addEventListener('click', ()=> {
    const modal = document.getElementById('profile_modal');
    openLoginModal(modal);
});

closeProfileModalButton.addEventListener('click', ()=> {
    const modal = document.getElementById('profile_modal');
    closeModal(modal);
});


openSignupModalButton.addEventListener('click', () => {
    const modal = document.getElementById('signup-modal');
    openLoginModal(modal);
});

closeSignupModalButton.addEventListener('click', () => {
    const modal = document.getElementById('signup-modal');
    closeModal(modal);
})

openLoginModalButton.addEventListener('click', () => {
    const modal = document.getElementById('login-modal');
    openLoginModal(modal);
});

closeLoginModalButton.addEventListener('click', () => {
    const modal = document.getElementById('login-modal');
    console.log(modal);
    closeModal(modal);
});

overlay.addEventListener('click', ()=>{
    const modals = document.querySelectorAll('.active');
    modals.forEach(modal => {
        closeModal(modal);
    });
})

const openLoginModal = (modal) => {
    if (modal === null) return;
    modal.classList.add('active');
    overlay.classList.add('active');
}

const closeModal = (modal) => {
    if (modal === null) return;
    modal.classList.remove('active');
    overlay.classList.remove('active');
}