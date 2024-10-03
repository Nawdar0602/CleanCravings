<?php
// Display errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Function to load environment variables from .env file
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("Environment file not found: $filePath");
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Split line into key and value
        list($key, $value) = explode('=', $line, 2);
        putenv(trim("$key=$value")); // Set environment variable
        $_ENV[trim($key)] = trim($value); // Also set it in $_ENV
    }
}

// Load environment variables from the .env file
loadEnv(__DIR__ . '/.env'); // Adjust path if necessary

// Retrieve database connection variables
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE']; // Ensure this matches your .env file

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Create PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode
     // Optional: Indicate successful connection
} catch (PDOException $e) {
    // Handle connection failure
    echo "Connection failed: " . $e->getMessage();
}
