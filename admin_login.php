
<?php
session_start();
require_once "Connaction.php";
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["username"])){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        
       if(($password == "admin")&&( $username =="admin"))
       {
        header("location: admin_View.php");
       }
       else
       {
        $password_err = "Please enter your correct password and username.";
       }
    }        
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Admin/css.css">
</head>
<body>
<section class= "center-section">
        <div class="form fade-in-element">
            <h1>Admin Login</h1>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
                <input type="text" name="username" class="input-box" placeholder="User Name" value="">
                <input type="password" name="password" class="input-box" placeholder="Password">
                <span ><?php echo $password_err; ?></span>
                <input type="submit" name="login-btn" class="btn" value="Login">
            </form>
        </div>
    </section>
    
        <script src="js/main.js"></script>
        
</body>
</html>