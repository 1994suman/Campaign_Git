<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 
?>
<?php
   // include_once("config.php");
   require_once "Connaction.php";

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    
      $n=$_SESSION["username"];
      $q=$_REQUEST['Campain'];
      $t=$_REQUEST['type'];
	  
      
      $sql = "INSERT INTO campaign(usersname, campaign_type, campaign)VALUES('$n','$t','$q')";
      $result = mysqli_query($link,$sql);

     

      
      //if type is not text the after inserting run a loop and and for the question insert the options in the option table
		}

if($result) {

    $_SESSION['myMessage'] = 'Campain Added Successfully';
    header("Location: Add_Campain.php");
}
else {
    echo 'not suuss';
    $_SESSION['myMessage'] = 'Campain Added not Successfully';
    header("Location: Add_Campain.php");
}
    



   
?>