<?php
// Include config file
require_once "Connaction.php";
 

        
        $id =  trim($_GET["id"]);
        echo  $id;
        $sql = "SELECT * FROM campaign WHERE id = '$id' ";
        
        $stmt = mysqli_query($link, $sql);
        
        
            $row = mysqli_fetch_array($stmt);

            
            $name = $row["usersname"];
            $Campaign_type = $row["campaign_type"];
            $Campaign = $row["campaign"];
            $sql = "INSERT INTO accept_campaign (campain_type, campain, username) VALUES ('$Campaign_type','$Campaign',' $name')";
           
            $stmt = mysqli_query($link, $sql);
            $sql = " DELETE FROM campain WHERE id = '$id' ";
        
        $stmt = mysqli_query($link, $sql);
       
        header("location: admin_View.php");
    

?>