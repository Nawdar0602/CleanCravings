// Toggle mobile menu visibility
function toggleMenu() {
    const menu = document.getElementById("mobile-menu");

    if (menu.classList.contains("hidden")) {
        menu.classList.remove("hidden"); // Show the menu
        let menuHeight = menu.scrollHeight; // Get the full height of the menu

        menu.style.maxHeight = "0px"; // Start from 0
        setTimeout(() => {
            menu.style.maxHeight = menuHeight + "px"; // Set the full height dynamically
        }, 10); // Small delay to allow CSS to register the change
    } else {
        menu.style.maxHeight = "0px"; // Collapse the menu
        menu.addEventListener('transitionend', function () {
            menu.classList.add("hidden"); // Hide the menu after transition
            menu.style.maxHeight = null; // Reset max-height for future use
        }, { once: true });
    }
}
