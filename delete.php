<?php
// Include config file
require_once "Connaction.php";
 

        // Get URL parameter
        $id =  trim($_GET["id"]);
        echo  $id;
        // Prepare a select statement
        $sql = " DELETE FROM campaign WHERE id = '$id' ";
        
        $stmt = mysqli_query($link, $sql);
        
        
        header("location: admin_View.php");
    

?>