// Toggle hamburger menu
const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("nav-menu");

hamburger.addEventListener("click", () => {
	navMenu.classList.toggle("show-menu");
});

// Dropdown toggle
const dropdownBtn = document.querySelector(".dropdown-btn");
const dropdownContent = document.querySelector(".dropdown-content");

dropdownBtn.addEventListener("click", () => {
	dropdownContent.style.display =
	dropdownContent.style.display === "block" ? "none" : "block";
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
	if (!e.target.closest(".dropdown")) {
		dropdownContent.style.display = "none";
	}
});