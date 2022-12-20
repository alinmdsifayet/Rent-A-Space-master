<?php
require("../../Inc/function.php");
session_start();
if (!isset($_SESSION['aID'])) {
    header("location:./adminlogin.php");
}
$a_id = $_SESSION['aID'];

$query = "SELECT username FROM admin  WHERE id = $a_id";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $list = mysqli_fetch_assoc($result);
    $name = $list['username'];
}

$a_id = $_SESSION['aID'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/AdminProfileDesign.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-building-house'></i>
            <span class="logo_name">HANDYMAN</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admindashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Admin Dashboard</span>
                </a>
            </li>
            <li>
                <a href="AdminProfile.php" >
                    <i class='bx bx-box'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <!--add new admin-->
            <li>
                <a href="addAdmin.php" class="active">
                    <i class='bx bx-user-plus'></i>
                    <span class="links_name">Add Admin</span>
                </a>
            </li>
            <!--add anew admin-->
            <li>
                <a href="orderlist.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Appointment list</span>
                </a>
            </li>
          
            <li>
                <a href="workerlist.php">
                    <i class='bx bxs-user'></i>
                    <!-- <i class='bx bx-coin-stack'></i> -->
                    <span class="links_name">Doctor List</span>
                </a>
            </li>
            <li>
                <a href="ComplaintList.php">
                    <i class='bx bxs-file-import'></i>
                    <span class="links_name">Complaint List</span>
                </a>
            </li>
         
            <!--Service Modification-->
          
            <!--Service modification-->

            <!--Banned list link-->
        
            <!--Banned list link-->

            <!--send message link-->
            <li>
                <a href="AdminMessageBox.php">
                    <i class='bx bxs-message-alt-edit'></i>
                    <span class="links_name">Message Box</span>
                </a>
            </li>
            <!--send message link-->
            <!--Message history link-->
           
            <!--Message History link-->
            <!--Appeal history link-->
          
            <!--Appeal History link-->

            <li class="log_out">
                <a href="../../Inc/admin_logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Admin Profile</span>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div> -->
            <div class="profile-details">
                <img src="../../ICONS/adminboss.png" alt="adminaccount">
                <span class="admin_name"><?php echo $name ?></span>
            </div>
        </nav>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <!-- <div class="title">Profile</div> -->
                    <div class="sales-details" style="margin-top: 23px;">

                        <!--Profile-->


                        <?php

                        $error = '';
                        $color = 'red';

                        if (isset($_POST['save'])) {

                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $password = $_POST['password'];
                            $con_pass = $_POST['con_password'];


                            if ($password === $con_pass) {
                                if (preg_match("/(^(\+88|0088)?(01){1}[356789]{1}(\d){8})$/", $phone)) {
                                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        $password = password_hash($password, PASSWORD_DEFAULT);

                                        $query = "INSERT INTO admin(name, username, password, email, phone)
                                                     VALUES('$name', '$username', '$password', '$email', '$phone')";
                                        mysqli_query($connect, $query);
                                        $error = "Successfully Added Admin";
                                        $color = 'limegreen';
                                    } else {
                                        $error = "Enter a Valid Email Address";
                                    }
                                } else {
                                    $error = "Enter A valid Phone Number";
                                }
                            } else {
                                $error = "Passwords do not Match!";
                            }
                        }


                        ?>
                        <center>
                            <div>
                                <?php if ($error != '') : ?>
                                <div style="margin-top:23px;  padding: 20px; background-color: <?php echo $color ?>;
                                 color: white;
                                        width:93.7%">
                                    <center><?php echo $error ?></center>
                                </div>
                                <?php endif; ?>
                            </div>
                        </center>

                        <center>
                            <div class="profileform">
                                <form method="POST">
                                    <label style="float: left;" for="name">Name</label>
                                    <input type="text" id="name" name="name" required>
                                    <label style="float: left;" for="name">Userame</label>
                                    <input type="text" id="name" name="username" required>
                                    <label style="float: left;" for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required>
                                    <label style="float: left;" for="phonenumber">Phone Number</label>
                                    <input type="text" id="phonenumber" name="phone" required>
                                    <label style="float: left;" for="name">Set Password</label>
                                    <input type="password" id="password" placeholder="Password" name="password"
                                        required>
                                    <input type="password" id="password" placeholder="Confirm Password"
                                        name="con_password" required>
                                    <Button name="save">Save</Button>
                                </form>
                            </div>
                        </center>

                        <!--Profile-->
                    </div>
                </div>
    </section>
</body>

</html>