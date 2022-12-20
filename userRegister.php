<?php
    $username=$email=$password=$cpassword="";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $mobile_no = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    require_once 'db_connect.php';
    require_once 'registerUtils.php';

    if (emptyInputSignup($username, $email, $password, $cpassword) !== false) {
        header("location:userRegister.php?error=emptyinput");
        exit();
    }
    if (userEmailExists($email) !== false) {
        header("location:userRegister.php?error=duplicateEmailorMobile");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location:userRegister.php?error=invalidEmail");
        exit();
    }
    if (passwordMatch($password, $cpassword) !== false) {
        header("location:userRegister.php?error=passwordDontMatch");
        exit();
    }

    createUser($username, $email, $password);

}
// else{
//     header("location:register.php");
//     exit();
// }

?>

<html>

<head>
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="registerstyle.css">

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
                        include(".//userPartials/userNavList.php");
                        ?>
        </div>
    </nav>

    <div class="container">
        <div class="header">
            <h2>Create Account</h2>
        </div>
        <form action="userRegister.php" method="post" id="form" class="form">
            <div class="form-control">
                <label for="username">Username</label>
                <input name="username" type="text" placeholder="Enter your username" id="username" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Email</label>
                <input name="email" type="email" placeholder="Enter your email" id="email" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password</label>
                <input name="password" type="password" placeholder="Enter your password" id="password" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="username">Password check</label>
                <input name="cpassword" type="password" placeholder="Confirm password" id="password2" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <button type="submit" name="submit" class="btn">Register</button>

            <hr>
            <p>Want to be a host? <a href="hostregister.php">Sign Up as Host</a></p>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET['error'] == "emptyinput") {
                echo "<p>fill in all fields </p>";
            }
            if ($_GET['error'] == "invalidEmail") {
                echo "<p>Invalid Email </p>";
            }
            if ($_GET['error'] == "duplicateEmailorMobile") {
                echo "<p>Already Exists</p>";
            }
            if ($_GET['error'] == "passwordDontMatch") {
                echo "<p>Password don't match </p>";
            }
            if ($_GET['error'] == "invalidCode") {
                echo "<p>Wrong Code</p>";
            }
        }

        ?>
    </div>

    <!-- <script  src="./registration.js"></script> -->


</body>