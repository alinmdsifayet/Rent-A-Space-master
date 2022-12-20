<?php
    // session_start();
    if(isset($_POST["submit"])){

        $userEmail = $_POST['email'];
        // $email = $_POST['email'];
        $password = $_POST['password'];

        require_once 'db_connect.php';
        require_once 'registerUtils.php';

        if(emptyInputLogIn($userEmail, $password) !== false){
            header("location:userLogIn.php?error=emptyinput");
            exit();
        }
        if(logIN_password_match($password,$userEmail)===false){
            header("location:userLogIn.php?error=wrongInput");
            exit();
        }
        // if(userIDExists($userid)===false){
        //     header("location:loginAsStudent.php?error=wrongUserID");
        //     exit();
        // }
        loginAdmin($userEmail, $password);
    }

?>
<html>

<head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="loginstyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">

</head>

<body>

    <nav>
        <a href="index.html"><img src="logon.png"></a>
        <div class="nav-links">
            <?php
                        include("./userPartials/userNavList.php");
                        ?>

        </div>
    </nav>

    <div class="sign-up-form">
        <h1>Log in


        </h1>
        <form action="userLogIn.php" method="post">
            <input name="email" type="email" class="input-box" placeholder="Your Email">
            <input name="password" type="password" class="input-box" placeholder="Your Password">
            <p><span><input type="checkbox"></span>Remember me</p>
            <!-- <button type="button" class="signup-btn">Sign in</button> -->
            <button type="submit" name="submit" class="signup-btn">Login</button>
            <hr>
            <p>OR</p>
            <p>Do not have an account? <a href="./userRegister.php">Sign Up Now</a></p>


        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == "wrongInput") {
                echo "<p>Invalid Password </p>";
            }
        
        if ($_GET['error'] == "wronglogin") {
            echo "<p>Invalid user email </p>";
        }
    }
        ?>
    </div>
</body>