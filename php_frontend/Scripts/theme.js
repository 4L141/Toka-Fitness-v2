/* ================================
      GLOBAL DARK MODE MODULE
   ================================ */

const Theme = {
  init() {
    this.body = document.body;
    this.toggleBtn = document.getElementById("themeToggle");

    // Load saved theme
    const savedTheme = localStorage.getItem("darkTheme");

    if (savedTheme === "enabled") {
      this.enableDarkMode(false);
    }

    // Bind toggle click
    if (this.toggleBtn) {
      this.toggleBtn.addEventListener("click", () => {
        if (this.body.classList.contains("dark-mode")) {
          this.disableDarkMode(true);
        } else {
          this.enableDarkMode(true);
        }
      });
    }
  },

  enableDarkMode(save = true) {
    this.body.classList.add("dark-mode");
    if (this.toggleBtn) this.toggleBtn.textContent = "☀️";
    if (save) localStorage.setItem("darkTheme", "enabled");
  },

  disableDarkMode(save = true) {
    this.body.classList.remove("dark-mode");
    if (this.toggleBtn) this.toggleBtn.textContent = "🌙";
    if (save) localStorage.setItem("darkTheme", "disabled");
  }
};

// Initialize on load
document.addEventListener("DOMContentLoaded", () => Theme.init());
