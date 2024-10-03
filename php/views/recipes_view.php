<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Cravings - Healthy Recipes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-green-200 via-teal-200 to-blue-200 min-h-screen">
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-6xl font-extrabold text-green-800 animate-pulse">Clean Cravings</h1>
        <a href="recipe_toevoegen.php" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-110 hover:rotate-3 hover:shadow-xl">
            <i class="fas fa-plus mr-2"></i>Add Recipe
        </a>
    </div>
    <?php if ($aantalRijen > 0) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php foreach ($resultaten as $index => $rij) : ?>
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-2 border-green-300 transform transition duration-500 hover:scale-105 hover:rotate-1 recipe-card" style="animation-delay: <?= $index * 0.1 ?>s;">
                    <div class="relative h-72 overflow-hidden">
                        <img src="<?= htmlspecialchars($rij['Photo']) ?>" alt="<?= htmlspecialchars($rij['Title']) ?>" class="absolute inset-0 w-full h-full object-cover transform hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <h2 class="absolute bottom-4 left-4 text-3xl font-bold text-white shadow-text"><?= htmlspecialchars($rij['Title']) ?></h2>
                    </div>
                    <div class="p-8">
                        <p class="text-gray-600 mb-6"><?= htmlspecialchars($rij['Description']) ?></p>
                        <p class="text-sm text-teal-600 mb-6 font-medium">Category: <?= htmlspecialchars($rij['Category']) ?></p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-6">
                            <p><i class="fas fa-clock mr-2"></i><?= htmlspecialchars($rij['PrepTime']) ?> min</p>
                            <p><i class="fas fa-fire mr-2"></i><?= htmlspecialchars($rij['CookTime']) ?> min</p>
                            <p><i class="fas fa-utensils mr-2"></i><?= htmlspecialchars($rij['Servings']) ?> servings</p>
                        </div>
                        <div class="flex justify-between mt-6">
                            <a href="recipe_detail.php?ID=<?= $rij['ID'] ?>" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-110 hover:rotate-3 hover:shadow-xl">View Recipe</a>
                            <a href="recipe_bewerk.php?ID=<?= $rij['ID'] ?>" class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-110 hover:rotate-3 hover:shadow-xl">Edit</a>
                            <a href="recipe_verwijder.php?ID=<?= $rij['ID'] ?>" class="bg-red-400 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-full transition duration-300 transform hover:scale-110 hover:rotate-3 hover:shadow-xl">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-8 rounded-lg shadow-md animate-bounce" role="alert">
            <p class="font-bold text-xl">No recipes found. Time to add some nutritious delights!</p>
        </div>
    <?php endif; ?>
</div>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .recipe-card {
        animation: fadeIn 0.5s ease-out forwards;
    }
    .shadow-text {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
</style>
</body>
</html>
