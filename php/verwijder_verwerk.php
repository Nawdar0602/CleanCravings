<?php
require 'config.php';

if (isset($_GET['ID'])) {
    $id = intval($_GET['ID']);

    try {
        $query = "DELETE FROM Recipes WHERE ID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        $message = $result ? "Recipe deleted successfully." : "Error deleting recipe.";
    } catch (PDOException $e) {
        $message = "Error deleting recipe: " . $e->getMessage();
    }
} else {
    $message = "No recipe ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Recipe</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-2xl font-bold mb-4 text-center"><?php echo $message; ?></h1>
        <div class="text-center">
            <a href="recipes.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                Back to Recipes
            </a>
        </div>
    </div>
</body>
</html>
