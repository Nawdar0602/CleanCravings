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

async function fetchRecipes() {
    const input = document.getElementById('search-input');
    const suggestions = document.getElementById('suggestions');
    const query = input.value.trim();

    if (query.length === 0) {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');
        return;
    }

    const response = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${query}`);
    const data = await response.json();

    if (data.meals) {
        suggestions.innerHTML = data.meals.map(meal => `
            <div class="flex items-center p-2 hover:bg-gray-100 cursor-pointer" onclick="selectRecipe('${meal.strMeal}')">
                <img src="${meal.strMealThumb}" alt="${meal.strMeal}" class="w-12 h-12 rounded mr-2">
                <span>${meal.strMeal}</span>
            </div>
        `).join('');
        suggestions.classList.remove('hidden');
    } else {
        suggestions.innerHTML = '<div class="p-2">No results found</div>';
        suggestions.classList.remove('hidden');
    }

    // Close suggestions when clicking outside
    document.addEventListener('click', (event) => {
        if (!suggestions.contains(event.target) && event.target !== input) {
            suggestions.classList.add('hidden');
        }
    });
}

function selectRecipe(meal) {
    const input = document.getElementById('search-input');
    input.value = meal;
    document.getElementById('suggestions').classList.add('hidden');
}