<?php
header('Content-Type: application/json');

$movieID = $_GET['movieID'];
$movie = []; // Array to store movie details

// Dummy data for demonstration; replace with database query
if ($movieID == 1) {
    $movie = [
        'movieID' => 1,
        'movieName' => 'Example Movie 1',
        'duration' => '120 min',
        'year' => 2021,
        'theme' => 'Action'
    ];
} elseif ($movieID == 2) {
    $movie = [
        'movieID' => 2,
        'movieName' => 'Example Movie 2',
        'duration' => '90 min',
        'year' => 2020,
        'theme' => 'Drama'
    ];
}

// Return movie details as JSON
echo json_encode($movie);
?>
