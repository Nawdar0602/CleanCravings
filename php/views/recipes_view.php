<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanCravings - Recipes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="background-color: #D6E0A3;" class="font-sans">

<!-- Navbar Section -->
<nav class="flex flex-col md:flex-row justify-between py-6 px-8 mb-12 md:mb-16 relative">
    <!-- Logo Section for mobile -->
    <img src="../media/logo.png" alt="CleanCravings Logo" class="md:hidden w-28 ml-4">

    <!-- Logo Section for larger screens -->
    <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black ml-4 hidden md:inline">CleanCravings</a>

    <!-- Search Bar Section -->
    <div class="relative flex-1 max-w-xs ml-4 mt-2 md:mt-0 md:ml-0">
        <input type="text" id="search-input" placeholder="Search" class="pl-10 pr-4 py-2 bg-transparent rounded-full border-2 border-black placeholder-black focus:outline-none w-full" oninput="fetchRecipes()">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400" viewBox="0 0 50 50">
            <path d="M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z"></path>
        </svg>

        <!-- Suggestions List -->
        <div id="suggestions" class="absolute left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-10 max-h-48 overflow-y-auto hidden custom-scrollbar">
        </div>
    </div>

    <!-- Menu Items Section (Visible on medium and larger screens) -->
    <div class="hidden md:flex items-center space-x-14 mr-14">
        <a href="../index.html" class="text-2xl text-black hover:text-gray-700">Home</a>
        <a href="recipes.php" class="text-2xl text-black hover:text-gray-700">Recipes</a>
        <a href="../pages/about.html" class="text-2xl text-black hover:text-gray-700">About</a>
        <a href="../pages/contact.html" class="text-2xl text-black hover:text-gray-700">Contact</a>
    </div>

    <!-- Hamburger Icon for mobile -->
    <div class="md:hidden absolute top-14 right-10">
        <button onclick="toggleMenu()" class="text-gray-700 hover:text-black focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 72 72">
                <path d="M56 48c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 48 54.798 48 56 48zM56 32c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 32 54.798 32 56 32zM56 16c2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4-1.202 0-38.798 0-40 0-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4C17.202 16 54.798 16 56 16z"></path>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu (Hidden by default) -->
<div id="mobile-menu" class="hidden overflow-hidden transition-all duration-300 ease-in-out md:hidden">
    <div class="flex flex-col items-start space-y-4 py-4 pl-16">
        <a href="../index.html" class="text-black hover:text-black text-xl">Home</a>
        <a href="recipes.php" class="text-black hover:text-black text-xl">Recipes</a>
        <a href="../pages/about.html" class="text-black hover:text-black text-xl">About</a>
        <a href="../pages/contact.html" class="text-black hover:text-black text-xl">Contact</a>
    </div>
</div>

<!-- Hero Section -->
<section class="flex flex-col md:flex-row items-center justify-between px-8 md:px-40 py-16">
    <div class="max-w-lg flex flex-col items-start md:items-start space-y-4 md:space-y-6">
        <h1 class="text-5xl md:text-6xl font-bold text-black mb-2 md:mb-4">Global flavors, healthier choices.</h1>
        <p class="text-2xl md:text-3xl text-black mb-4">Cooking fresh has never been easier.</p>
        <div class="flex space-x-4">
            <a href="#recipes-grid" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">Discover more</a>
            <a href="#" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">Join community</a>
        </div>
    </div>
    <div class="mt-8 md:mt-0 flex-shrink-0 ml-4 md:ml-8">
        <img src="../media/poke.png" alt="Healthy food bowl" class="rounded-full w-72 md:w-80 lg:w-[450px] xl:w-[550px]">
    </div>
</section>

<!-- Recipes Grid Section -->
<div id="recipes-grid" class="container mx-auto px-8 py-16 bg-white">
    <div class="flex justify-between items-center mb-12">
        <h2 class="text-4xl md:text-5xl font-bold text-black">Our Recipes</h2>
        <a href="toevoegen.php" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">Add Recipe</a>
    </div>
    
    <?php if ($aantalRijen > 0) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($resultaten as $rij) : ?>
                <div class="bg-transparent border-2 border-gray-100 rounded-lg overflow-hidden mb-8">
                    <div class="h-64 overflow-hidden">
                        <img src="<?= htmlspecialchars($rij['Photo']) ?>" alt="<?= htmlspecialchars($rij['Title']) ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold text-black mb-2"><?= htmlspecialchars($rij['Title']) ?></h3>
                        <p class="text-gray-700 mb-4"><?= htmlspecialchars($rij['Description']) ?></p>
                        <p class="text-sm text-gray-600 mb-4">Category: <?= htmlspecialchars($rij['Category']) ?></p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <p>Prep: <?= htmlspecialchars($rij['PrepTime']) ?> min</p>
                            <p>Cook: <?= htmlspecialchars($rij['CookTime']) ?> min</p>
                            <p>Servings: <?= htmlspecialchars($rij['Servings']) ?></p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="recipe_detail.php?ID=<?= $rij['ID'] ?>" class="bg-white text-black font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-100">View Recipe</a>
                            
                            <div class="flex gap-2">
                                <a href="recipe_bewerk.php?ID=<?= $rij['ID'] ?>" class="bg-white text-black font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-100">Edit</a>
                                <a href="recipe_verwijder.php?ID=<?= $rij['ID'] ?>" class="bg-white text-black font-semibold py-2 px-4 rounded-lg shadow hover:bg-gray-100" onclick="return confirm('Are you sure you want to delete this recipe?')">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="bg-white border-2 border-gray-100 text-black p-8 rounded-lg shadow-md" role="alert">
            <p class="font-bold text-xl">No recipes found. Time to add some nutritious delights!</p>
        </div>
    <?php endif; ?>
</div>

<!-- Footer Section -->
<footer class="bg-[#D6E0A3] text-center py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <a href="../index.html" class="text-3xl font-bold text-black">CleanCravings</a>
                <p class="text-black mt-2">Global flavors, healthier choices.</p>
            </div>
            <div class="flex space-x-8">
                <a href="../index.html" class="text-black hover:text-gray-700">Home</a>
                <a href="recipes.php" class="text-black hover:text-gray-700">Recipes</a>
                <a href="../pages/about.html" class="text-black hover:text-gray-700">About</a>
                <a href="../pages/contact.html" class="text-black hover:text-gray-700">Contact</a>
            </div>
            <div class="mt-4 md:mt-0">
                <p class="text-black">&copy; 2024 CleanCravings. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="../js/index.js"></script>
</body>
</html>
