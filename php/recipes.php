<?php
require 'config.php';

try {
    $query = "SELECT * FROM Recipes";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $resultaten = $stmt->fetchALL();

    $aantalRijen = count($resultaten);

    include "views/recipes_view.php";

} catch (PDOException $e) {
    echo "<p>Error</p>";
    echo "<p>Query:" . $query . "</p>";
    echo "<p>Error Message: " . $e->getMessage() . "</p>";
    exit;
}

