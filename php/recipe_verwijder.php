<?php
require 'config.php';

$id = isset($_GET['ID']) ? intval($_GET['ID']) : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanCravings ®</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="background-color: #D6E0A3;" class="font-sans min-h-screen flex flex-col">

<!-- Navbar Section -->
<nav class="flex flex-col md:flex-row justify-between py-6 px-8 mb-12 md:mb-16 relative">
    <img src="../media/logo.png" alt="CleanCravings Logo" class="md:hidden w-28 ml-4">
    <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black ml-4 hidden md:inline">CleanCravings</a>
    
    <!-- Menu Items Section -->
    <div class="hidden md:flex items-center space-x-14 mr-14">
        <a href="../index.html" class="text-2xl text-black hover:text-gray-700">Home</a>
        <a href="recipes.php" class="text-2xl text-black hover:text-gray-700">Recipes</a>
        <a href="#" class="text-2xl text-black hover:text-gray-700">About</a>
        <a href="../pages/contact.html" class="text-2xl text-black hover:text-gray-700">Contact</a>
    </div>
</nav>

<!-- Main Content -->
<div class="container mx-auto px-8 md:px-40 py-16 flex-grow">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
        <?php if ($id > 0): ?>
            <h1 class="text-4xl font-bold text-black mb-8 text-center">Delete Recipe</h1>
            <p class="text-xl text-center mb-8">Are you sure you want to delete this recipe?</p>
            <div class="flex justify-center space-x-6">
                <a href="verwijder_verwerk.php?ID=<?php echo $id; ?>" class="bg-black text-white font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-800">
                    <i class="fas fa-trash-alt mr-2"></i>Yes, Delete Recipe
                </a>
                <a href="recipes.php" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        <?php else: ?>
            <p class="text-xl text-center text-red-500 mb-8">No recipe ID specified.</p>
            <div class="text-center">
                <a href="recipes.php" class="bg-black text-white font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Recipes
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#D6E0A3] py-14 mt-auto">
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

</body>
</html>
