<?php 
session_start();

$n=$_POST['episode_num'];

for($i=1;$i<=$n;$i++){

    
$show_name=$_SESSION['show'];
$season=$_POST['season'];
$ep_num=$i;
$location=$_POST['location'.$i];
$episode_name=$_POST[$i];


if(strpos($location, "youtube")){
    $location=str_replace("watch?v=","embed/",$location);
}

$conn = new mysqli("sql213.epizy.com","epiz_31406413","9iAIYNjUk0ZIG","epiz_31406413_movie_site");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO episodes (show_name, season, episode_no, location, episode_name)
VALUES
 ('".$show_name."', '".$season."', '".$ep_num."','".$location."', '".$episode_name."')";

if ($conn->query($sql) === TRUE) {
   
    header("Location: manage.php");
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}






}





?>