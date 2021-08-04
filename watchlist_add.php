<?php


$user=$_POST['user'];
$moviename=$_POST['moviename'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_site";

// Create connection
$conn = new mysqli("sql206.epizy.com","epiz_28848820","4XQG4htOPUE9j","epiz_28848820_movie_site");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO watchlists (user, movie_name)
VALUES ('".$user."','". $moviename."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>