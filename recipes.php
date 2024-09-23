<?php
require 'config.php';

try {

    $query = "SELECT * FROM crud_agenda";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $resultaten = $stmt->fetchAll();

    $aantalRijen = count($resultaten);

    include 'views/agenda_view.php';

} catch (PDOException $e) {
    echo "<p>Fout</p>";
    echo "<p>Query: " . $e->getMessage() . "</p>";
    echo "<p>Foutmelding: " . $e->getTraceAsString() . "</p>";
    exit;
}