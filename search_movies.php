<?php
// Example of search_movies.php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array()));
}

$query = $_GET['query'];
$sql = "SELECT * FROM movies WHERE movieName LIKE '%$query%'";
$result = $conn->query($sql);

$movies = array();
while($row = $result->fetch_assoc()) {
    $movies[] = $row;
}

$conn->close();
echo json_encode($movies);
?>
