// FAQ Accordion Script
document.addEventListener("DOMContentLoaded", () => {
  const items = document.querySelectorAll(".faq-item");

  items.forEach((item) => {
    const question = item.querySelector(".faq-question");

    question.addEventListener("click", () => {
      // Close other open items
      items.forEach((i) => {
        if (i !== item) {
          i.classList.remove("active");
        }
      });

      // Toggle selected one
      item.classList.toggle("active");
    });
  });
});
