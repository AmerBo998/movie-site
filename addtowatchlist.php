

<?php




 

// Create connection
$conn = new mysqli("sql206.epizy.com","epiz_28848820","4XQG4htOPUE9j","epiz_28848820_movie_site");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO watchlists (user, movie_name)
VALUES ('".$user."','". $moviname."') ";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: /index.php');
	exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>