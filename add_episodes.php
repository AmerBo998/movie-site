<?php 
session_start();

$n=$_POST['episode_num'];

for($i=1;$i<=$n;$i++){

    
$show_name=$_SESSION['show'];
$season=$_POST['season'];
$ep_num=$i;
$location=$_POST['location'.$i];
$episode_name=$_POST[$i];




$conn = new mysqli("sql206.epizy.com","epiz_28848820","4XQG4htOPUE9j","epiz_28848820_movie_site");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO episodes 
VALUES
 ('".$show_name."', '".$season."', '".$ep_num."','".$location."', '".$episode_name."')";

if ($conn->query($sql) === TRUE) {
   
    header("Location: manage.php");
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}






}





?>