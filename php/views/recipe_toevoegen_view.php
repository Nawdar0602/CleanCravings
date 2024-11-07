<?php
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe - CleanCravings ®</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="background-color: #D6E0A3;" class="font-sans">

<!-- Navbar Section -->
<nav class="flex flex-col md:flex-row justify-between py-6 px-8 mb-12 md:mb-16 relative">
    <img src="../media/logo.png" alt="CleanCravings Logo" class="md:hidden w-28 ml-4">
    <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black ml-4 hidden md:inline">CleanCravings</a>
    
    <div class="hidden md:flex items-center space-x-14 mr-14">
        <a href="../index.html" class="text-2xl text-black hover:text-gray-700">Home</a>
        <a href="recipes.php" class="text-2xl text-black hover:text-gray-700">Recipes</a>
        <a href="#" class="text-2xl text-black hover:text-gray-700">About</a>
        <a href="../pages/contact.html" class="text-2xl text-black hover:text-gray-700">Contact</a>
    </div>

    <!-- Hamburger Menu for Mobile -->
    <div class="md:hidden absolute top-14 right-10">
        <button onclick="toggleMenu()" class="text-gray-700 hover:text-black focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 72 72">
                <path d="M56 48c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 48 54.798 48 56 48zM56 32c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 32 54.798 32 56 32zM56 16c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 16 54.798 16 56 16z"></path>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden">
    <div class="flex flex-col items-start space-y-4 py-4 pl-16">
        <a href="../index.html" class="text-black hover:text-black text-xl">Home</a>
        <a href="recipes.php" class="text-black hover:text-black text-xl">Recipes</a>
        <a href="#" class="text-black hover:text-black text-xl">About</a>
        <a href="../pages/contact.html" class="text-black hover:text-black text-xl">Contact</a>
    </div>
</div>

<!-- Main Form Section -->
<div class="container mx-auto px-8 md:px-40 py-8">
    <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
        <h1 class="text-4xl font-bold text-black mb-8">Share Your Recipe</h1>
        
        <form action="recipe_toevoegen_verwerk.php" method="POST" enctype="multipart/form-data" id="recipeForm">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-xl text-black mb-2" for="Title">Recipe Title</label>
                    <input class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" type="text" id="Title" name="Title" required>
                </div>
                
                <div>
                    <label class="block text-xl text-black mb-2" for="Category">Category</label>
                    <select class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" id="Category" name="Category" required>
                        <option value="">Select category</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Snack">Snack</option>
                    </select>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-xl text-black mb-2" for="Description">Description</label>
                <textarea class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" id="Description" name="Description" rows="3" required></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-xl text-black mb-2" for="Photo">Photo URL</label>
                <input class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" type="url" id="Photo" name="Photo" required placeholder="Enter image URL">
            </div>

            <div class="mb-6">
                <label class="block text-xl text-black mb-2" for="Recipe">Ingredients</label>
                <textarea class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" id="Recipe" name="Recipe" rows="4" required></textarea>
            </div>

            <div class="mb-6">
                <label class="block text-xl text-black mb-2" for="Instructions">Instructions</label>
                <textarea class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" id="Instructions" name="Instructions" rows="4" required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div>
                    <label class="block text-xl text-black mb-2" for="PrepTime">Prep Time (min)</label>
                    <input class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" type="number" id="PrepTime" name="PrepTime" required>
                </div>

                <div>
                    <label class="block text-xl text-black mb-2" for="CookTime">Cook Time (min)</label>
                    <input class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" type="number" id="CookTime" name="CookTime" required>
                </div>

                <div>
                    <label class="block text-xl text-black mb-2" for="Servings">Servings</label>
                    <input class="w-full p-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-gray-400" type="number" id="Servings" name="Servings" required>
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <a href="recipes.php" class="bg-black text-white font-semibold py-3 px-6 rounded-lg hover:bg-gray-800">Back to Recipes</a>
                <button type="submit" class="bg-black text-white font-semibold py-3 px-6 rounded-lg hover:bg-gray-800">Share Recipe</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#D6E0A3] py-14">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="flex flex-col items-center mb-6 md:mb-0">
            <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black">CleanCravings</a>
            <p class="text-lg text-black">Global flavors, healthier choices.</p>
        </div>
        
        <div class="mb-6 md:mb-0">
            <p class="text-lg text-black">
                <a href="mailto:cleancravings@joranvdlinde.nl" class="text-black hover:text-gray-700">cleancravings@joranvdlinde.nl</a>
            </p>
        </div>
        
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-8">
            <a href="#" class="text-black hover:text-gray-700">Privacy Policy</a>
            <a href="#" class="text-black hover:text-gray-700">Terms of Service</a>
            <a href="#" class="text-black hover:text-gray-700">Contact Us</a>
        </div>
    </div>
</footer>

<script>
    function toggleMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }

    document.getElementById('recipeForm').addEventListener('submit', function(event) {
        var title = document.getElementById('Title').value;
        var category = document.getElementById('Category').value;
        var description = document.getElementById('Description').value;
        var photo = document.getElementById('Photo').value;
        var ingredients = document.getElementById('Recipe').value;
        var instructions = document.getElementById('Instructions').value;
        var prep_time = document.getElementById('PrepTime').value;
        var cook_time = document.getElementById('CookTime').value;
        var servings = document.getElementById('Servings').value;

        if (!title || !category || !description || !photo || !ingredients || !instructions || !prep_time || !cook_time || !servings) {
            event.preventDefault();
            alert('Please fill out all fields');
        }
    });
</script>

</body>
</html>
