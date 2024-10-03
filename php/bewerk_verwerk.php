<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST['ID'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $Recipe = $_POST['Recipe'];
    $Instructions = $_POST['Instructions'];
    $PrepTime = $_POST['PrepTime'];
    $CookTime = $_POST['CookTime'];
    $Servings = $_POST['Servings'];
    $Category = $_POST['Category'];

    // Handle file upload
    if(isset($_FILES['Photo']) && $_FILES['Photo']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["Photo"]["name"]);
        if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_file)) {
            $Photo = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } elseif (!empty($_POST['Photo'])) {
        // If a URL is provided, use it
        $Photo = $_POST['Photo'];
    } else {
        // If no new file is uploaded and no URL is provided, keep the existing photo
        $Photo = $_POST['existing_photo'];
    }

    try {
        $query = "UPDATE Recipes 
                  SET Title = :Title, 
                      Description = :Description, 
                      Recipe = :Recipe, 
                      Instructions = :Instructions, 
                      PrepTime = :PrepTime, 
                      CookTime = :CookTime, 
                      Servings = :Servings,
                      Photo = :Photo,
                      Category = :Category
                  WHERE ID = :ID";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ID', $ID);
        $stmt->bindParam(':Title', $Title);
        $stmt->bindParam(':Description', $Description);
        $stmt->bindParam(':Recipe', $Recipe);
        $stmt->bindParam(':Instructions', $Instructions);
        $stmt->bindParam(':PrepTime', $PrepTime);
        $stmt->bindParam(':CookTime', $CookTime);
        $stmt->bindParam(':Servings', $Servings);
        $stmt->bindParam(':Photo', $Photo);
        $stmt->bindParam(':Category', $Category);

        $stmt->execute();

        header("Location: recipes.php");
        exit();
    } catch (PDOException $e) {
        echo "<p class='text-red-500 font-bold'>Error: " . $e->getMessage() . "</p>";
        exit;
    }
} else {
    header("Location: recipes.php");
    exit();
}
    