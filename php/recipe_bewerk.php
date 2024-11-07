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
    <title>CleanCravings ®</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../media/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body style="background-color: #D6E0A3;" class="font-sans">

<!-- Navbar Section -->
<nav class="flex flex-col md:flex-row justify-between py-6 px-8 mb-12 md:mb-16 relative">
    <img src="../media/logo.png" alt="CleanCravings Logo" class="md:hidden w-28 ml-4">
    <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black ml-4 hidden md:inline">CleanCravings</a>
    
    <!-- Menu Items Section -->
    <div class="hidden md:flex items-center space-x-14 mr-14">
        <a href="../index.html" class="text-2xl text-black hover:text-gray-700">Home</a>
        <a href="recipes.php" class="text-2xl text-black hover:text-gray-700">Recipes</a>
        <a href="#" class="text-2xl text-black hover:text-gray-700">About</a>
        <a href="../pages/contact.html" class="text-2xl text-black hover:text-gray-700">Contact</a>
    </div>
</nav>

<!-- Main Content -->
<div class="container mx-auto px-8 md:px-40 py-16">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold text-black mb-8">Edit Recipe</h1>
        
        <form method="post" action="bewerk_verwerk.php">
            <input type="hidden" name="ID" value="<?php echo $recipe['ID']; ?>">
            
            <div class="space-y-6">
                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-utensils mr-2"></i>Title
                    </label>
                    <input type="text" name="Title" value="<?php echo htmlspecialchars($recipe['Title']); ?>" 
                           class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                </div>

                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-tags mr-2"></i>Category
                    </label>
                    <select name="Category" class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                        <option value="">Select a category</option>
                        <option value="Breakfast" <?php echo ($recipe['Category'] == 'Breakfast') ? 'selected' : ''; ?>>Breakfast</option>
                        <option value="Lunch" <?php echo ($recipe['Category'] == 'Lunch') ? 'selected' : ''; ?>>Lunch</option>
                        <option value="Dinner" <?php echo ($recipe['Category'] == 'Dinner') ? 'selected' : ''; ?>>Dinner</option>
                        <option value="Dessert" <?php echo ($recipe['Category'] == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                        <option value="Snack" <?php echo ($recipe['Category'] == 'Snack') ? 'selected' : ''; ?>>Snack</option>
                    </select>
                </div>

                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-align-left mr-2"></i>Description
                    </label>
                    <textarea name="Description" rows="3" 
                              class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required><?php echo htmlspecialchars($recipe['Description']); ?></textarea>
                </div>

                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-camera mr-2"></i>Photo URL
                    </label>
                    <input type="url" name="Photo" value="<?php echo htmlspecialchars($recipe['Photo']); ?>" 
                           class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                </div>

                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-list mr-2"></i>Ingredients
                    </label>
                    <textarea name="Recipe" rows="4" 
                              class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required><?php echo htmlspecialchars($recipe['Recipe']); ?></textarea>
                </div>

                <div>
                    <label class="text-xl text-black mb-2 block">
                        <i class="fas fa-tasks mr-2"></i>Instructions
                    </label>
                    <textarea name="Instructions" rows="4" 
                              class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required><?php echo htmlspecialchars($recipe['Instructions']); ?></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="text-xl text-black mb-2 block">
                            <i class="fas fa-clock mr-2"></i>Prep Time (min)
                        </label>
                        <input type="number" name="PrepTime" value="<?php echo htmlspecialchars($recipe['PrepTime']); ?>" 
                               class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                    </div>

                    <div>
                        <label class="text-xl text-black mb-2 block">
                            <i class="fas fa-fire mr-2"></i>Cook Time (min)
                        </label>
                        <input type="number" name="CookTime" value="<?php echo htmlspecialchars($recipe['CookTime']); ?>" 
                               class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                    </div>

                    <div>
                        <label class="text-xl text-black mb-2 block">
                            <i class="fas fa-users mr-2"></i>Servings
                        </label>
                        <input type="number" name="Servings" value="<?php echo htmlspecialchars($recipe['Servings']); ?>" 
                               class="w-full p-3 border-2 border-gray-100 rounded-lg focus:outline-none focus:border-gray-200" required>
                    </div>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="recipes.php" class="bg-white text-black font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-100">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Recipes
                    </a>
                    <button type="submit" class="bg-black text-white font-semibold py-2 px-6 rounded-lg shadow hover:bg-gray-800">
                        <i class="fas fa-save mr-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[#D6E0A3] py-14">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="flex flex-col items-center mb-6 md:mb-0">
            <a href="../index.html" class="text-3xl md:text-4xl font-bold text-black">CleanCravings</a>
            <p class="text-lg text-black">Global flavors, healthier choices.</p>
        </div>
        <div class="mb-6 md:mb-0">
            <p class="text-lg text-black">
                <a href="mailto:cleancravings@joranvdlinde.nl" class="text-black hover:text-gray-700">cleancravings@joranvdlinde.nl</a>
            </p>
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

<?php
} catch (Exception $e) {
    echo "<p class='text-red-500 font-bold'>Error: " . $e->getMessage() . "</p>";
}
?>
