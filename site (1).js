document.addEventListener('DOMContentLoaded', () => {
  const navLink = document.querySelector('.has-mega .nav-link');
  if (navLink) {
    navLink.addEventListener('click', (e) => {
      if (window.matchMedia('(max-width: 640px)').matches) {
        e.preventDefault();
        navLink.parentElement.classList.toggle('open');
      }
    });
  }
  document.querySelectorAll('.mega-menu .column h4').forEach(h => {
    h.addEventListener('click', () => {
      if (window.matchMedia('(max-width: 640px)').matches) {
        h.parentElement.classList.toggle('collapsed');
      }
    });
  });
});
