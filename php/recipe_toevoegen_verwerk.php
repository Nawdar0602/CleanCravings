<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Added</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="refresh" content="5;url=recipes.php">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
    <?php
    try {
        // Check if Title is set and not empty
        if (!isset($_POST['Title']) || empty($_POST['Title'])) {
            throw new Exception("Title is required and cannot be empty.");
        }

        $query = "INSERT INTO Recipes (Title, Description, Recipe, Instructions, Photo, Category, PrepTime, CookTime, Servings) VALUES (:Title, :Description, :Recipe, :Instructions, :Photo, :Category, :PrepTime, :CookTime, :Servings)";

        $stmt = $conn->prepare($query);

        $stmt->execute([
            ':Title' => $_POST['Title'],
            ':Description' => $_POST['Description'] ?? null,
            ':Recipe' => $_POST['Recipe'] ?? null,
            ':Instructions' => $_POST['Instructions'] ?? null,
            ':Photo' => $_POST['Photo'] ?? null,
            ':Category' => $_POST['Category'] ?? null,
            ':PrepTime' => $_POST['PrepTime'] ?? null,
            ':CookTime' => $_POST['CookTime'] ?? null,
            ':Servings' => $_POST['Servings'] ?? null
        ]);

        if ($stmt->rowCount()) {
            echo '<p class="text-green-600 font-bold text-xl mb-4">Recipe added successfully.</p>';
        } else {
            echo '<p class="text-red-600 font-bold text-xl mb-4">Error has occurred. No rows were affected.</p>';
        }

    } catch (Exception $e) {
        echo '<p class="text-red-600 font-bold text-xl mb-4">Error with adding recipe: ' . $e->getMessage() . '</p>';
    }
    ?>
    <p class="text-gray-600 mb-4">You will be redirected to the recipes page in 5 seconds.</p>
    <a href="recipes.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block transition duration-300 ease-in-out">Go to Recipes Now</a>
</div>
</body>
</html>
