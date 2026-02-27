// Paragon Lite theme scripts.
(function () {
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.getElementById('primary-menu-wrapper');

  if (!toggle || !nav) {
    return;
  }

  toggle.addEventListener('click', function () {
    const expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', String(!expanded));
    nav.classList.toggle('is-open', !expanded);
  });
})();
