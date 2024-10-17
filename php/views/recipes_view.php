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

<nav class="flex justify-between items-center py-6 px-8 mb-12">
    <a href="../index.html" class="text-4xl font-bold text-black">CleanCravings</a>
    <a href="recipe_toevoegen.php" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">Add Recipe</a>
</nav>

<div class="container mx-auto px-8 py-16">
    <h2 class="text-4xl md:text-5xl font-bold text-black mb-12 text-left">Our Recipes</h2>
    
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
                        <div class="flex justify-between">
                            <a href="recipe_detail.php?ID=<?= $rij['ID'] ?>" class="border border-gray-100 bg-black text-white font-semibold py-2 px-4 rounded-lg inline-block hover:bg-gray-800 shadow hover:shadow-md">View Recipe</a>
                            <a href="recipe_bewerk.php?ID=<?= $rij['ID'] ?>" class="border border-gray-100 bg-white text-black font-semibold py-2 px-4 rounded-lg inline-block hover:bg-gray-100 shadow hover:shadow-md">Edit</a>
                            <a href="recipe_verwijder.php?ID=<?= $rij['ID'] ?>" class="border border-gray-100 bg-white text-black font-semibold py-2 px-4 rounded-lg inline-block hover:bg-gray-100 shadow hover:shadow-md">Delete</a>
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

</body>
</html>
