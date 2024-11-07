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
        // Skip comments and empty lines
        if (empty($line) || strpos(trim($line), '#') === 0) {
            continue;
        }

        // Only process lines that contain '='
        if (strpos($line, '=') !== false) {
            // Split line into key and value
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                
                // Only set env if both key and value are non-empty
                if (!empty($key) && $value !== null) {
                    putenv("$key=$value");
                    $_ENV[$key] = $value;
                }
            }
        }
    }
}

// Load environment variables from the .env file
loadEnv(__DIR__ . '/.env');

// Retrieve database connection variables
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

// PDO options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Create PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection failure
    echo "Connection failed: " . $e->getMessage();
}
