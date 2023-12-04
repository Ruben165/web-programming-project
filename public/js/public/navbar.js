const button = document.getElementById('navbar-authenticated-section-menu-button');
const menu = document.getElementById('navbar-authenticated-section-dropdown-menu');

button.addEventListener('click', () => {
    menu.style.visibility = menu.style.visibility === 'visible' ? 'hidden' : 'visible';
});
