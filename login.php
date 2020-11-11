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
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password == $hashed_password){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            header("location: Add_Campain.php");
                        } else{
							$password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
					$username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
			mysqli_stmt_close($stmt);
        }
    }    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Login_Singup/Css.css">
</head>
<body>

<section class="left-section">
        <div id ="left-cover" class="cover cover-hide">
            <img src="image/Cover.jpg" ALT="">
            <h1>WELCOME !</h1>
            <h3> Already have an account ?</h3>
            <button type="button" class="switch-btn" onclick="location.reload()">Login</button>
        </div>
        <div id="left-form" class="form fade-in-element">
            <h1>Login</h1>
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
                <input type="text" name="username" class="input-box" placeholder="User Name"value="<?php echo $username; ?>">
                <input type="password" name="password" class="input-box" placeholder="Password">
                <span class="help-block"><?php echo $password_err; ?></span>
                <input type="submit" name="login-btn" class="btn" value="Login">
            </form>
        </div>
    </section>
    <section class="right-section">
        <div id="right-cover" class="cover fade-in-element">
            <img src="image/Cover.jpg" ALT="">
            <h1>Welcome !</h1>
            <h3> Don't have an account ?</h3>
            <a type="button" class="switch-btn" onclick="switchSignup()" href="Singnup.php" >Signup</a>
        </div>
    </section>
        <script src="js/main.js"></script>
        
</body>
</html