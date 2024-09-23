<?php
if (!defined('INCLUDED')) {
    die('Direct access not permitted');
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Item Toevoegen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen"> 
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Nieuw Agenda Item Toevoegen</h1>
    <form action="agenda_toevoegen_verwerk.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Onderwerp">
                Onderwerp
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Onderwerp" name="Onderwerp" type="text" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Inhoud">
                Inhoud
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Inhoud" name="Inhoud" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Begindatum">
                Begindatum
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Begindatum" name="Begindatum" type="date" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Einddatum">
                Einddatum
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Einddatum" name="Einddatum" type="date" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Prioriteit">
                Prioriteit
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Prioriteit" name="Prioriteit" required>
                <option value="Laag">Laag</option>
                <option value="Gemiddeld">Gemiddeld</option>
                <option value="Hoog">Hoog</option>
            </select>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Status">
                Status
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Status" name="Status" required>
                <option value="Niet begonnen">Niet begonnen</option>
                <option value="Bezig">Bezig</option>
                <option value="Afgerond">Afgerond</option>
            </select>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Toevoegen
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="agenda.php"> 
                Terug naar overzicht
            </a>
        </div>
    </form>
</div>
</body>
</html>
