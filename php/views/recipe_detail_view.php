<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($recipe['Title'] ?? 'Recipe') ?> - CleanCravings ®</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="background-color: #D6E0A3;" class="font-sans">

<!-- Navbar Section -->
<nav class="flex flex-col md:flex-row justify-between py-6 px-8 mb-12 md:mb-16 relative">
    <!-- Logo Section for mobile -->
    <img src="../media/logo.png" alt="CleanCravings Logo" class="md:hidden w-28 ml-4">

    <!-- Logo Section for larger screens -->
    <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black ml-4 hidden md:inline">CleanCravings</a>

    <!-- Menu Items Section -->
    <div class="hidden md:flex items-center space-x-14 mr-14">
        <a href="../index.html" class="text-2xl text-black hover:text-gray-700">Home</a>
        <a href="recipes.php" class="text-2xl text-black hover:text-gray-700">Recipes</a>
        <a href="#" class="text-2xl text-black hover:text-gray-700">About</a>
        <a href="../pages/contact.html" class="text-2xl text-black hover:text-gray-700">Contact</a>
    </div>

    <!-- Hamburger Menu for Mobile -->
    <div class="md:hidden absolute top-14 right-10">
        <button onclick="toggleMenu()" class="text-gray-700 hover:text-black focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 72 72">
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

<!-- Recipe Content -->
<div class="container mx-auto px-8 md:px-40 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <?php if (!empty($recipe['Photo'])): ?>
            <div class="relative h-96 overflow-hidden">
                <img src="<?= htmlspecialchars($recipe['Photo']) ?>" alt="<?= htmlspecialchars($recipe['Title']) ?>" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <h1 class="absolute bottom-6 left-6 text-4xl font-bold text-white"><?= htmlspecialchars($recipe['Title']) ?></h1>
            </div>
        <?php endif; ?>

        <div class="p-8">
            <p class="text-gray-600 mb-6 text-lg"><?= htmlspecialchars($recipe['Description'] ?? '') ?></p>

            <div class="flex flex-wrap justify-between items-center mb-8 text-sm text-gray-500 bg-gray-50 p-4 rounded-lg">
                <p class="flex items-center mb-2 md:mb-0"><i class="fas fa-clock mr-2"></i>Prep: <?= htmlspecialchars($recipe['PrepTime'] ?? 'N/A') ?> minutes</p>
                <p class="flex items-center mb-2 md:mb-0"><i class="fas fa-fire mr-2"></i>Cook: <?= htmlspecialchars($recipe['CookTime'] ?? 'N/A') ?> minutes</p>
                <p class="flex items-center"><i class="fas fa-utensils mr-2"></i>Servings: <?= htmlspecialchars($recipe['Servings'] ?? 'N/A') ?></p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-black mb-4">Ingredients</h2>
                <ul class="space-y-2">
                    <?php foreach (explode("\n", $recipe['Recipe'] ?? '') as $ingredient): ?>
                        <?php if (trim($ingredient)): ?>
                            <li class="flex items-center">
                                <span class="w-2 h-2 bg-black rounded-full mr-3"></span>
                                <?= htmlspecialchars(trim($ingredient)) ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-bold text-black mb-4">Instructions</h2>
                <ol class="space-y-4">
                    <?php 
                    $steps = explode("\n", $recipe['Instructions'] ?? '');
                    foreach ($steps as $index => $instruction): ?>
                        <?php if (trim($instruction)): ?>
                            <li class="flex">
                                <span class="font-bold mr-4"><?= $index + 1 ?>.</span>
                                <span><?= htmlspecialchars(trim($instruction)) ?></span>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-between items-center">
        <a href="recipes.php" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">
            <i class="fas fa-arrow-left mr-2"></i>Back to Recipes
        </a>
        <div class="flex space-x-4">
            <button class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">
                <i class="fas fa-share-alt mr-2"></i>Share Recipe
            </button>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#D6E0A3] py-14">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center text-center md:text-left">
        <div class="flex flex-col items-center mb-6 md:mb-0">
            <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black">CleanCravings</a>
            <p class="text-lg text-black">Global flavors, healthier choices.</p>
        </div>
        <div class="mb-6 md:mb-0">
            <p class="text-lg text-black"><a href="mailto:cleancravings@joranvdlinde.nl" class="text-black hover:text-gray-700">cleancravings@joranvdlinde.nl</a></p>
        </div>
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-8">
            <a href="#" class="text-black hover:text-gray-700">Privacy Policy</a>
            <a href="#" class="text-black hover:text-gray-700">Terms of Service</a>
            <a href="#" class="text-black hover:text-gray-700">Contact Us</a>
        </div>
    </div>
</footer>

<script src="../js/index.js"></script>

</body>
</html>
