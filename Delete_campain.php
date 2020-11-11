<?php
require_once "Connaction.php";
 

        $id =  trim($_GET["id"]);
       // echo  $id;
        $sql = "DELETE FROM campaign WHERE id = '$id' ";
        $stmt = mysqli_query($link, $sql);
        
        header("location: User _View_campain.php");
    

?>