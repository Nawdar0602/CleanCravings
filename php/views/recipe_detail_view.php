<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($recipe['Title'] ?? 'Recipe') ?> - Clean Cravings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .shadow-text { text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
    </style>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <?php if (!empty($recipe['Photo'])): ?>
            <div class="relative h-96 overflow-hidden">
                <img src="<?= htmlspecialchars($recipe['Photo']) ?>" alt="<?= htmlspecialchars($recipe['Title']) ?>" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <h1 class="absolute bottom-6 left-6 text-4xl font-bold text-white shadow-text"><?= htmlspecialchars($recipe['Title']) ?></h1>
            </div>
        <?php else: ?>
            <h1 class="text-4xl font-bold p-6 text-green-600"><?= htmlspecialchars($recipe['Title']) ?></h1>
        <?php endif; ?>

        <div class="p-8">
            <p class="text-gray-600 mb-6 text-lg"><?= htmlspecialchars($recipe['Description'] ?? '') ?></p>

            <div class="flex justify-between items-center mb-6 text-sm text-gray-500">
                <p><i class="fas fa-clock mr-2"></i>Prep: <?= htmlspecialchars($recipe['PrepTime'] ?? 'N/A') ?> minutes</p>
                <p><i class="fas fa-fire mr-2"></i>Cook: <?= htmlspecialchars($recipe['CookTime'] ?? 'N/A') ?> minutes</p>
                <p><i class="fas fa-utensils mr-2"></i>Servings: <?= htmlspecialchars($recipe['Servings'] ?? 'N/A') ?></p>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-green-600">Ingredients</h2>
                <ul class="list-disc list-inside space-y-2">
                    <?php foreach (explode("\n", $recipe['Recipe'] ?? '') as $ingredient): ?>
                        <li><?= htmlspecialchars(trim($ingredient)) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-green-600">Instructions</h2>
                <ol class="list-decimal list-inside space-y-4">
                    <?php foreach (explode("\n", $recipe['Instructions'] ?? '') as $instruction): ?>
                        <li><?= htmlspecialchars(trim($instruction)) ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>

    <div class="mt-8 flex justify-between items-center">
        <a href="recipes.php" class="inline-block px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Back to Recipes
        </a>
        <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-blue-500"><i class="fab fa-facebook-square text-2xl"></i></a>
            <a href="#" class="text-gray-600 hover:text-blue-400"><i class="fab fa-twitter-square text-2xl"></i></a>
            <a href="#" class="text-gray-600 hover:text-red-500"><i class="fab fa-pinterest-square text-2xl"></i></a>
        </div>
    </div>
</div>
</body>
</html>
