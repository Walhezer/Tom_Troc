document.addEventListener('DOMContentLoaded', () => {

    const burger = document.querySelector('.burger-menu');
    const header = document.querySelector('header');

    if (burger) {
        burger.addEventListener('click', () => {
            header.classList.toggle('menu-open');
        });
    }
});