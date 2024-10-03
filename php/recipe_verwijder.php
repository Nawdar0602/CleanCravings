<?php
require 'config.php';

$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Recipe</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <?php if ($id > 0): ?>
            <h1 class="text-2xl font-bold mb-4 text-center">Delete Recipe</h1>
            <p class="mb-4 text-center">Are you sure you want to delete the recipe with ID: <strong><?php echo $id; ?></strong>?</p>
            <div class="flex justify-center space-x-4">
                <a href="verwijder_verwerk.php?ID=<?php echo $id; ?>" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Yes, Delete
                </a>
                <a href="recipes.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Cancel
                </a>
            </div>
        <?php else: ?>
            <p class="text-center text-red-500">No recipe ID specified.</p>
            <div class="text-center mt-4">
                <a href="recipes.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    Back to Recipes
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
