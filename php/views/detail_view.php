<!DOCTYPE html>
<html lang="nl" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recept Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full"> 
<div class="min-h-screen"> 
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6"> 
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Recept Details</h1>
        </div>
    </header>
    <main class="py-10"> 
        <div class="container mx-auto px-4"> 
            <?php if ($aantalRijen > 0): ?>
                <?php foreach ($resultaten as $row): ?>
                    <div class="bg-white overflow-hidden shadow rounded-lg mb-6"> 
                        <div class="px-4 py-5 sm:p-6">
                            <h2 class="text-2xl font-semibold text-gray-900"><?php echo isset($row['Titel']) ? htmlspecialchars($row['Titel']) : 'Geen Titel'; ?></h2>
                            <p class="mt-2 text-sm text-gray-600"><strong>Beschrijving:</strong> <?php echo isset($row['Beschrijving']) ? htmlspecialchars($row['Beschrijving']) : 'Geen beschrijving'; ?></p>
                            <p class="mt-3 text-sm text-gray-600"><strong>Recept:</strong> <?php echo isset($row['Recipe']) ? nl2br(htmlspecialchars($row['Recipe'])) : 'Geen recept'; ?></p>
                            <p class="mt-2 text-sm text-gray-600"><strong>Naam:</strong> <?php echo isset($row['Naam']) ? htmlspecialchars($row['Naam']) : 'Geen naam'; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-red-600">Geen recept gevonden met ID: <?php echo htmlspecialchars($ID); ?></p>
            <?php endif; ?>
            <a href="recipes.php" class="mt-6 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Terug naar overzicht</a>
        </div>
    </main>
</div>
</body>
</html>
