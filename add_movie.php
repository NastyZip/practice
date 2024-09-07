<?php
// add_movie.php

// Retrieve POST data
$movieName = $_POST['movieName'];
$duration = $_POST['duration'];
$year = $_POST['year'];
$theme = $_POST['theme'];       

// Generate 6-digit random movie ID
$movieID = mt_rand(100000, 999999); // Generate random number between 100000 and 999999

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
    $stmt = $pdo->prepare('INSERT INTO movies (movieID, movieName, duration, year, theme) VALUES (:movieID, :movieName, :duration, :year, :theme)');
    
    // Bind parameters
    $stmt->bindParam(':movieID', $movieID);
    $stmt->bindParam(':movieName', $movieName);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':theme', $theme);
    
    // Execute statement
    $stmt->execute();

    // Fetch the inserted movie data to return it to the dashboard
    $stmt = $pdo->prepare('SELECT * FROM movies WHERE movieID = :movieID');
    $stmt->bindParam(':movieID', $movieID);
    $stmt->execute();
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the movie data as JSON
    header('Content-Type: application/json');
    echo json_encode($movie);
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
