<?php
require 'config.php';

$ID = $_GET['ID'];

try {
    $query = "SELECT * FROM Recipes WHERE ID = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->execute();

    $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$recipe) {
        throw new Exception("Recipe not found");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full">
        <h1 class="text-3xl font-bold mb-4">Edit Recipe</h1>
        <form method="post" action="bewerk_verwerk.php">
            <input type="hidden" name="ID" value="<?php echo $recipe['ID']; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Title">
                    <i class="fas fa-utensils mr-2"></i>Title:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="Title" name="Title" value="<?php echo htmlspecialchars($recipe['Title']); ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Category">
                    <i class="fas fa-tags mr-2"></i>Category:
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Category" name="Category" required>
                    <option value="">Select a category</option>
                    <option value="Breakfast" <?php echo ($recipe['Category'] == 'Breakfast') ? 'selected' : ''; ?>>Breakfast</option>
                    <option value="Lunch" <?php echo ($recipe['Category'] == 'Lunch') ? 'selected' : ''; ?>>Lunch</option>
                    <option value="Dinner" <?php echo ($recipe['Category'] == 'Dinner') ? 'selected' : ''; ?>>Dinner</option>
                    <option value="Dessert" <?php echo ($recipe['Category'] == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                    <option value="Snack" <?php echo ($recipe['Category'] == 'Snack') ? 'selected' : ''; ?>>Snack</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Description">
                    <i class="fas fa-align-left mr-2"></i>Description:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Description" name="Description" required rows="3"><?php echo htmlspecialchars($recipe['Description']); ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Photo">
                    <i class="fas fa-camera mr-2"></i>Photo URL:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="url" id="Photo" name="Photo" value="<?php echo htmlspecialchars($recipe['Photo']); ?>" required placeholder="Enter image URL">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Recipe">
                    <i class="fas fa-list mr-2"></i>Ingredients:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Recipe" name="Recipe" required rows="4"><?php echo htmlspecialchars($recipe['Recipe']); ?></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="Instructions">
                    <i class="fas fa-tasks mr-2"></i>Instructions:
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="Instructions" name="Instructions" required rows="4"><?php echo htmlspecialchars($recipe['Instructions']); ?></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="PrepTime">
                        <i class="fas fa-clock mr-2"></i>Prep Time (min):
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="PrepTime" name="PrepTime" value="<?php echo htmlspecialchars($recipe['PrepTime']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="CookTime">
                        <i class="fas fa-fire mr-2"></i>Cook Time (min):
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="CookTime" name="CookTime" value="<?php echo htmlspecialchars($recipe['CookTime']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Servings">
                        <i class="fas fa-users mr-2"></i>Servings:
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" id="Servings" name="Servings" value="<?php echo htmlspecialchars($recipe['Servings']); ?>" required>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <a href="recipes.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" type="submit">
                    <i class="fas fa-save mr-2"></i>Item aanpassen
                </button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
} catch (Exception $e) {
    echo "<p class='text-red-500 font-bold'>Error: " . $e->getMessage() . "</p>";
}
?>
