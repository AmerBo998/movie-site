
<?php 
session_start();
include ("functions.php");
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




?>

<!DOCTYPE html>
<html>
<head>
<title> Free Movies</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="script.js"></script>





<script>
function episodes(){

    var x = document.getElementById("episode_num").value;
   

   if(x != 0) {
    document.getElementById('fields').innerHTML = "";
    document.getElementById('warning').innerHTML="";
    document.getElementById('fields').innerHTML +=
    "<br><input type='text' id='season' name='season' style='margin-left:50px;'value='Season' onkeyup='warning_check();'><label id='season--warning'></label><br><br>";

   for(i=1;i<=x;i++){


    document.getElementById('fields').innerHTML +=
    "<input type='text' id='ep_num' name='ep_num' value='"+i+"' required><input class='eps' type='text' id='"+i+"' name='"+i+"' placeholder='Episode name' required><input type='text' id='location"+i+"'   name='location"+i+"' class='source' placeholder='Source' ><label class='ep_warning' id='ep_warning"+i+"'></label><br><br><br>";
   
   
   }

    document.getElementById('fields').innerHTML +="<button type='button' class='add_btn' onClick='checkEpisodes();'>Add episodes</button>";} else document.getElementById('warning').innerHTML="You must enter the number of episodes !";
   
   
}




function checkSeason(){


        let season=document.getElementById('season').value.trim();
    
if(season==="Season"){
   document.getElementById('season--warning').innerHTML="Which season dude ?";
    return false;
   }
    else{

      return true;
    }




}

function checkEpisodes(){

            var filled=0;
            var season=checkSeason();
           
            var num_of_eps=document.getElementById('episode_num').value;
      
            for(var i=1;i<=num_of_eps;i++){

            //var ep_num=document.getElementById('ep_num'+i).value;
            var ep_name=document.getElementById(i).value;
            var ep_source=document.getElementById('location'+i).value;
            
            if(ep_name==="" || ep_source===""){

                    document.getElementById("ep_warning"+i).innerHTML="All fields must be filled !";


            }
            
            else {
                
                                    document.getElementById("ep_warning"+i).innerHTML="";

                filled++;}
            
            
            }
                
            if(filled==num_of_eps && season==true){
                   
                document.getElementById('episodeForm').submit();
            }
            else alert("Sometihing is wrong! Right click -> Inspect -> Console")



}



function warning_check()
{

            let value=document.getElementById('season').value.trim();

                if(value != 'Season') 
                        document.getElementById('season--warning').innerHTML="";
                
                else  
                        document.getElementById('season--warning').innerHTML="Which season dude ?";


}


</script>




</head>
<body>

<button id="menu_btn" ></button>
<button id="search_small" ></button><br>
<div class="menu_wrapper">
<ul class="nav_bar" id="nav_bar">
<li><a href="index.php">Home</a></li>
<li><a href="genre.php">Genre</a></li>
<li><a href="release.php">Release year</a></li>
<?php  echo menu_check();?>

</ul>



<div class="search_ul" id="search_ul">
<form action="search.php" method="post" class="search_help">

 <div class="search_help1"><button type="submit" class="search_btn" id="search_btn"></button>
<input type="text" class="search" name="search_box" id="search_box" placeholder="  Search movies..." ></input></div>

</form>

</div>
</div>
<li id="here"></li>
<br>





<form id='episodeForm' action="add_episodes.php" method="post"><br>
<h3 style="font-size:28px;color:white;font-family:Helvetica;">Number of episodes:</h3><br><Br>
<input type="text" id="episode_num" name="episode_num">
<button type='button' onclick="episodes();" id="h">OK</button><label id='warning'></label>

<div id="fields"></div>

</form>





</body>
</html>