<?php
require_once(BASE_PATH . '/models/Alumni.php');

// Set headers
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Initialize the Alumni model with database connection
        $alumniModel = new Alumni();
        
        // Get all alumni data
        $alumniData = $alumniModel->getAll();

        // Return success response
        echo json_encode([
            "status" => "success",
            "data" => $alumniData
        ]);
    } catch (Exception $e) {
        // Return error response
        http_response_code(500);
        echo json_encode([
            "status" => "error",
            "message" => "An error occurred: " . $e->getMessage()
        ]);
    }
}
?>