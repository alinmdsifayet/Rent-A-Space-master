<?php

session_start();
if (isset($_SESSION['aID'])) {
    header("location:./admindashboard.php");
}

require("../../Inc/function.php");

$msg = '';

if (filter_has_var(INPUT_POST, 'submit')) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {

        $query = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($connect, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($password === $user_data['password'] || password_verify($password, $user_data['password'])) {
                    $_SESSION['aID'] = $user_data['id'];
                    header("location: ./admindashboard.php");
                    die;
                } else {
                    $msg = 'Invalid information or wrong Password !';
                }
            } else {
                $msg = 'Please Enter a Valid Username !';
            }
        } else {
            $msg = 'Please Enter a Valid Username !';
        }
    } else {
        $msg = 'Please fill in all the fields !';
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/adminLogin.css">
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Admin Login</title>
</head>

<body>

    <div>
        <?php if ($msg != '') : ?>
        <div style="  padding: 20px; background-color: #f44336; color: white;">
            <center><?php echo $msg ?></center>
        </div>
        <?php endif; ?>
    </div>

    <div class="container" style="<?php echo $css ?>">
        <form action="" method="POST">
            <h2>Admin Login</h2>
            <input type="text" id="username" style="margin-top: 15px" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <!-- <div class="btn"> -->
            <button class="btn" type="submit" name="submit">Login</button>
            <!-- </div> -->
        </form>
        <!-- </div> -->
    </div>
</body>

</html>