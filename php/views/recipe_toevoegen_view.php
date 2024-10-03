<?php
// Add CSRF token generation here
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Recipe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 font-sans min-h-screen flex items-center justify-center">
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Add New Recipe</h1>
        <form action="recipe_toevoegen_verwerk.php" method="POST" enctype="multipart/form-data" id="recipeForm">
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Title">
                        <i class="fas fa-utensils mr-2"></i>Title:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="Title" name="Title" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Category">
                        <i class="fas fa-tags mr-2"></i>Category:
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Category" name="Category" required>
                        <option value="">Select a category</option>
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Snack">Snack</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Description">
                    <i class="fas fa-align-left mr-2"></i>Description:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" name="Description" required rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Photo">
                    <i class="fas fa-camera mr-2"></i>Photo URL:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="url" id="Photo" name="Photo" required placeholder="Enter image URL">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Recipe">
                    <i class="fas fa-list mr-2"></i>Ingredients:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Recipe" name="Recipe" required rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Instructions">
                    <i class="fas fa-tasks mr-2"></i>Instructions:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Instructions" name="Instructions" required rows="4"></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="PrepTime">
                        <i class="fas fa-clock mr-2"></i>Prep Time (min):
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="PrepTime" name="PrepTime" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="CookTime">
                        <i class="fas fa-fire mr-2"></i>Cook Time (min):
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="CookTime" name="CookTime" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Servings">
                        <i class="fas fa-users mr-2"></i>Servings:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="Servings" name="Servings" required>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <a href="recipes.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" type="submit">
                    <i class="fas fa-plus-circle mr-2"></i>Add Recipe
                </button>
            </div>
        </form>
    </div>
</div>
<script>
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
