import './styles/style.scss';

window.addEventListener('scroll', () => {
    const header = document.querySelector('.header--sidekick');
    if (window.scrollY > 0) {
        header.classList.add('is-scrolled');
    } else {
        header.classList.remove('is-scrolled');
    }
});
