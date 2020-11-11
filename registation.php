<?php     //start php tag
//include connect.php page for database connection
Include'Connaction.php';
//if submit is not blanked i.e. it is clicked.

$username = $_POST["user-name"];
$password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$sql="insert into users(username,Email,password) values('".$_POST['user-name']."', '".$_REQUEST['email']."', '".$_REQUEST['password']."', '".$_REQUEST['repassword']."')";
$res=mysql_query($sql);
If($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}



?>