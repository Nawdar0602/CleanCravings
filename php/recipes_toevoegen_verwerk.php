<?php
require 'config.php';
try {
    $query = "INSERT INTO crud_agenda (Onderwerp, Inhoud, Begindatum , Einddatum, Prioriteit, Status)";
    $query .= "VALUES (:Onderwerp, :Inhoud, :Begindatum , :Einddatum, :Prioriteit, :Status)";

    $stmt = $conn->prepare($query);

    $stmt->execute([
        'Onderwerp' => $_POST['Onderwerp'],
        'Inhoud' => $_POST['Inhoud'],
        'Begindatum' => $_POST['Begindatum'],
        'Einddatum' => $_POST['Einddatum'],
        'Prioriteit' => $_POST['Prioriteit'],
        'Status' => $_POST['Status'],
    ]);

    if ($stmt->rowCount()) {
        echo "Agenda item succesvol toegevoegd.<br/>";
    } else {
        echo "Fout bij het toevoegen van het agenda item.<br/>";
    }

} catch (PDOException $e) {
    echo "Fout bij toevoegen<br/>";
    echo "Foutmelding" . $e->getMessage() . "<br/>";
}

echo "<a href='recipes.php'>Terug naar overzicht</a>";