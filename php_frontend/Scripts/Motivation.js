document.addEventListener("DOMContentLoaded", () => {
  const quotes = document.querySelectorAll('.motivation .quote');
  let current = 0;

  setInterval(() => {
    quotes[current].classList.remove('active');
    current = (current + 1) % quotes.length;
    quotes[current].classList.add('active');
  }, 4000);
});
