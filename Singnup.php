<?php
// Include config file
require_once "Connaction.php";
$username = $password = $confirm_password = $useremail = "";
$username_err = $password_err = $confirm_password_err = $useremail_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["email"])))
    {
        $useremail_err="Please enter a password.";
    }
    else {
        $useremail =trim($_POST["email"]);
        $param_useremail =trim($_POST["email"]);
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
     if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$useremail')";
        $stmt = mysqli_query($link, $sql);
            
                header("location: login.php");
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Login_Singup/Css.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<section class="left-section">
        <div id ="left-cover" class="cover fade-in-element">
            <img src="image/Cover.jpg" ALT="">
            <h1>WELCOME !</h1>
            <h3> Already have an account ?</h3>
<a type="button" class="switch-btn" href="login.php" >Login</a>
        </div>
        <section class="right-section">
        <div id="right-form" class="form fade-in-element">
        <h2>Sign Up</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">    
                <input type="text" name="username" class="input-box" placeholder="User Name" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            
                <input type="text" name="email" class="input-box" placeholder="Email" value="<?php echo $useremail; ?>">
                <span class="help-block"><?php echo $useremail_err; ?></span>
            
                <input type="password" name="password" class="input-box" placeholder="Password" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            
            
                <input type="password" name="confirm_password" class="input-box" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        
                <input type="submit" class="btn btn-primary" value="SignUp">
        </form>
</div>
        </section>
</body>
</html>