<?php  
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 
?>
<?php
// Start the session
session_start();
?>
<?php
// Include config file


        require_once "Connaction.php";

        $id = $_SESSION["id"];
        $t =$_REQUEST["Campaign"];
        
        // Prepare a select statement
        $sql = "UPDATE campaign SET campaign ='$t' WHERE id = '$id'";
        
        $stmt = mysqli_query($link, $sql);
        
        if($stmt) {
             echo $id;
            $_SESSION['myMessage'] = 'Campain Update Successfully';
            header("Location: User _View_campain.php");
        }
        else {
            echo 'not suuss';
            echo $id;
            $_SESSION['myMessage'] = 'Campain Update not Successfully';
           header("Location: User _View_campain.php");
        }

      

?>