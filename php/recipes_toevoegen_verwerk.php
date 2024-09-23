<?php
require 'config.php';
try {
    $query = "INSERT INTO Recipes (Titel, Beschrijving, Recipe, Foto, Naam)";
    $query .= "VALUES (:Titel, :Beschrijving, :Recipe, :Foto, :Naam)";

    $stmt = $conn->prepare($query);

    // Handle file upload
    $foto = '';
    if(isset($_FILES['Foto']) && $_FILES['Foto']['error'] == 0){
        $foto = file_get_contents($_FILES['Foto']['tmp_name']);
    }

    $stmt->execute([
        'Titel' => $_POST['Titel'],
        'Beschrijving' => $_POST['Beschrijving'],
        'Recipe' => $_POST['Recipe'],
        'Foto' => $foto,
        'Naam' => $_POST['Naam'],
    ]);

    if ($stmt->rowCount()) {
        echo "Recept succesvol toegevoegd.<br/>";
    } else {
        echo "Fout bij het toevoegen van het recept.<br/>";
    }
} catch (PDOException $e) {
    echo "Fout bij toevoegen<br/>";
    echo "Foutmelding" . $e->getMessage() . "<br/>";
}

echo "<a href='recipes.php'>Terug naar overzicht</a>";
