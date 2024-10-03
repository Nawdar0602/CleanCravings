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

    include "views/recipe_detail_view.php";

} catch (Exception $e) {
    echo "<p class='text-red-500 font-bold'>Error: " . $e->getMessage() . "</p>";
    exit;
}
