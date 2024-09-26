function toggleMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    console.log("Toggling menu visibility"); // Keep this for debugging

    // Toggle the 'show' class
    if (mobileMenu.classList.contains('show')) {
        mobileMenu.classList.remove('show');
        setTimeout(() => {
            mobileMenu.classList.add('hidden'); // Hide after transition
        }, 300); // Match this time with the CSS transition duration
    } else {
        mobileMenu.classList.remove('hidden'); // Show the menu first
        setTimeout(() => {
            mobileMenu.classList.add('show'); // Then add the show class
        }, 10); // Short delay to trigger CSS transition
    }
}

_____

// Fetch recipes based on user input
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
            <div class="flex items-center p-2 hover:bg-gray-100 cursor-pointer" onclick="showRecipe('${meal.idMeal}')">
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
        const suggestions = document.getElementById('suggestions');
        if (!suggestions.contains(event.target) && event.target !== input) {
            suggestions.classList.add('hidden');
        }

        // Close mobile menu if it's open and clicked outside
        const mobileMenu = document.getElementById('mobile-menu');
        if (!mobileMenu.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
        }
    });
}

// Show recipe modal function
async function showRecipe(mealId) {
    const modal = document.getElementById('recipe-modal');
    const recipeContent = document.getElementById('recipe-content');

    // Fetch detailed recipe information
    const response = await fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealId}`);
    const data = await response.json();
    const meal = data.meals[0];

    // Populate the modal with recipe details
    recipeContent.innerHTML = `
        <div class="flex flex-col items-center">
            <h2 class="text-3xl font-bold mb-4 text-center">${meal.strMeal}</h2>
            <div class="w-full mb-4">
                <img src="${meal.strMealThumb}" alt="${meal.strMeal}" class="w-full h-64 object-cover rounded-t-lg"> <!-- Hero image -->
            </div>
            <div class="flex justify-between w-full mb-4">
                <div class="w-1/2 pr-4">
                    <h3 class="text-2xl font-bold mt-4 mb-2">Ingredients</h3>
                    <ul class="list-disc list-inside">
                        ${getIngredientsList(meal)}
                    </ul>
                </div>
                <div class="w-1/2 pl-4 text-center">
                    <p class="text-lg"><strong>Category:</strong> ${meal.strCategory}</p>
                    <p class="text-lg"><strong>Cuisine:</strong> ${meal.strArea}</p>
                </div>
            </div>
            <h3 class="text-2xl font-bold mt-4 mb-2">Instructions</h3>
            <p class="mb-4 text-lg">${meal.strInstructions}</p>
            <h3 class="text-2xl font-bold mt-4 mb-2">Watch on YouTube</h3>
            <iframe width="100%" height="240" src="${meal.strYoutube.replace('watch?v=', 'embed/')}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    `;

    // Show the modal
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden'); // Prevent scrolling on the main page

    // Close modal when clicking outside of the modal content
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
}

// Get ingredients list for the recipe
function getIngredientsList(meal) {
    let ingredients = '';
    for (let i = 1; i <= 20; i++) {
        const ingredient = meal[`strIngredient${i}`];
        const measure = meal[`strMeasure${i}`];
        if (ingredient && ingredient.trim() !== '') {
            ingredients += `<li>${ingredient} - ${measure}</li>`;
        }
    }
    return ingredients;
}

// Close the recipe modal
function closeModal() {
    const modal = document.getElementById('recipe-modal');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden'); // Allow scrolling on the main page again
}
