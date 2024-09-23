<?php

require 'config.php';

$ID = $_GET['ID'];

try {

    $query = "SELECT * FROM crud_agenda WHERE ID = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->execute();


    $resultaten = $stmt->fetchAll();

    $aantalRijen = count($resultaten);

    include 'views/detail_view.php';

} catch (PDOException $e) {
    echo "<p>Fout</p>";
    echo "<p>Query: " . $e->getMessage() . "</p>";
    echo "<p>Foutmelding: " . $e->getTraceAsString() . "</p>";
    exit;
}

echo "ID van het agenda-item is:" . $ID . "<br>";