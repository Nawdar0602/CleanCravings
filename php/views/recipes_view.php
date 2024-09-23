<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-100 to-blue-100 min-h-screen font-sans">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Recepten</h1>
        <a href="recipes_toevoegen.php" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
            Nieuw Recept
        </a>
    </div>

    <?php if ($aantalRijen > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($resultaten as $rij): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition duration-300 hover:shadow-xl transform hover:-translate-y-1 <?php echo $rij['ID'] % 2 == 0 ? 'bg-gray-50' : ''; ?>">
                    <div class="p-6">
                        <a href="recipes_detail.php?ID=<?= $rij['ID'] ?>" class="text-gray-800 no-underline hover:underline">
                            <h2 class="text-xl font-semibold mb-2"><?= htmlspecialchars($rij['Titel']) ?></h2>
                        </a>
                        <p class="text-gray-600 mb-4 text-sm line-clamp-3"><?= htmlspecialchars($rij['Beschrijving']) ?></p>
                        <p class="text-xs text-gray-500">
                            <span class="font-medium">Naam:</span> <?= htmlspecialchars($rij['Naam']) ?>
                        </p>
                    </div>
                    <div class="bg-indigo-50 px-6 py-3 flex justify-between items-center rounded-b-lg">
                        <a href="recipes_detail.php?ID=<?= $rij['ID'] ?>" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">Details</a>
                        <div>
                            <a href="recipes_bewerken.php?ID=<?= $rij['ID'] ?>" class="text-blue-600 hover:text-blue-800 font-medium text-sm mr-3">Bewerken</a>
                            <a href="recipes_verwijderen.php?ID=<?= $rij['ID'] ?>" class="text-red-600 hover:text-red-800 font-medium text-sm">Verwijderen</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <p class="text-xl text-gray-600">Geen recepten gevonden</p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
