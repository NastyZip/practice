<?php
// update-movie.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieID = $_POST['movieID'];
    $movieName = $_POST['movieName'];
    $duration = $_POST['duration'];
    $year = $_POST['year'];
    $theme = $_POST['theme'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movies_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update query
    $sql = "UPDATE movies SET movieName=?, duration=?, year=?, theme=? WHERE movieID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisi", $movieName, $duration, $year, $theme, $movieID);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error updating movie: " . $conn->error;
    }

    $stmt->close(); // Close the statement
    $conn->close(); // Close the connection
}
?>
