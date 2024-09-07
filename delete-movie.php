<?php
// delete-movie.php

// Retrieve POST data
$movieID = $_POST['movieID'];

// Database connection details
$host = 'localhost';  // Your host, usually localhost
$dbname = 'movies_db';  // Your database name
$username = 'root';  // Your database username
$password = '';  // Your database password

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $stmt = $pdo->prepare('DELETE FROM movies WHERE movieID = :movieID');
    
    // Bind parameters
    $stmt->bindParam(':movieID', $movieID);
    
    // Execute statement
    $stmt->execute();

    // Check if any rows were affected
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Return success message
        $response = [
            'status' => 'success',
            'message' => 'Movie deleted successfully.'
        ];
    } else {
        // Return error message if no rows were deleted
        $response = [
            'status' => 'error',
            'message' => 'Failed to delete movie. Movie not found or could not be deleted.'
        ];
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    
} catch (PDOException $e) {
    // Return error message
    $response = [
        'status' => 'error',
        'message' => 'Error deleting movie: ' . $e->getMessage()
    ];

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
