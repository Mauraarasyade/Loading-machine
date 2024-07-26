function updateSelectColor(selectElement) {
    // Reset all classes
    selectElement.classList.remove('select-gmc', 'select-gec', 'select-gdc');

    // Add the appropriate class based on the selected option
    const selectedOption = selectElement.options[selectElement.selectedIndex];
    if (selectedOption && selectedOption.classList.contains('gmc-option')) {
        selectElement.classList.add('select-gmc');
    } else if (selectedOption && selectedOption.classList.contains('gec-option')) {
        selectElement.classList.add('select-gec');
    } else if (selectedOption && selectedOption.classList.contains('gdc-option')) {
        selectElement.classList.add('select-gdc');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const machineFilter = document.getElementById('machineFilter');
    if (machineFilter) {
        updateSelectColor(machineFilter);
    }
});




// Toggle class active untuk hamburger menu
const navbarNav = document.querySelector('.navbar-nav');
// Ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = (h) => {
    navbarNav.classList.toggle('active');
    h.preventDefault();
};
        // Toggle kelas active untuk filter form
const filterForm = document.querySelector('.filter-form');
const filterBox = document.querySelector('#filter-box');
// Ketika filter form di klik
document.querySelector('#filter-button').onclick = (e) => {
    filterForm.classList.toggle('active');
    filterBox.focus();
    e.preventDefault();
};

// Klik di luar elemen
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