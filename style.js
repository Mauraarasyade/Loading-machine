const navbarNav = document.querySelector('.navbar-nav');

document.querySelector('#hamburger-menu').onclick = (h) => {
    navbarNav.classList.toggle('active');
    h.preventDefault();
};

const filterForm = document.querySelector('.filter-form');
const filterBox = document.querySelector('#filter-box');

document.querySelector('#filter-button').onclick = (e) => {
    filterForm.classList.toggle('active');
    filterBox.focus();
    e.preventDefault();
};

const hamburger = document.querySelector('#hamburger-menu');
const filterbox = document.querySelector('#filter-button');

document.addEventListener('click', function(e) {
    if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)){
        navbarNav.classList.remove('active');
    }
    if(!filterbox.contains(e.target) && !filterForm.contains(e.target)){
        filterForm.classList.remove('active');
    }
});