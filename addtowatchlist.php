

<?php




 

// Create connection
$conn = new mysqli("sql213.epizy.com","epiz_31406413","9iAIYNjUk0ZIG","epiz_31406413_movie_site");
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