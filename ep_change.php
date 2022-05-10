<?php 

session_start();
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.php');
    exit();
}

else if(($_SESSION['userty'])!=='admin'){

    ?>
    <h1>You cannot access this page. Redirecting to homepage...</h1>
    <?php

header( "location: index.php" );

}
include ("connection.php");


$num=$_SESSION['help'];

for($j=1;$j<=$num;$j++){

$no=$_POST['no'.$j];
$ename=$_POST['epn'.$j];
$loc=$_POST['lo'.$j];


if(strpos($loc, "youtube")){
    $loc=str_replace("watch?v=","embed/",$loc);
}



if($_SESSION['no'.$j]!=$no){

$sql="update episodes set episode_no='".$no."' where ID='".$_SESSION['ID_of_'.$j]."'";


if ($conn->query($sql) === TRUE) {
    echo "GREAT";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}


if($_SESSION['epn'.$j]!=$ename){

    $sql="update episodes set episode_name='".$ename."' where ID='".$_SESSION['ID_of_'.$j]."'";
  

    if ($conn->query($sql) === TRUE) {
        echo "GREAT";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

if($_SESSION['lo'.$j]!=$loc){

    $sql="update episodes set location='".$loc."' where ID='".$_SESSION['ID_of_'.$j]."'";
   

    if ($conn->query($sql) === TRUE) {
       echo "GREAT";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }}

else {

    echo "All great";
}

    

}

header("Location: manage.php");
exit();

$conn->close();


?>