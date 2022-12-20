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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/ComplaintListDesign.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint List</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-building-house'></i>
            <span class="logo_name">Shunbo</span>
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
                <a href="addAdmin.php" >
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
                <a href="ComplaintList.php" class="active">
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
                <span class="dashboard">Complaint Lists</span>
            </div>

            <div class="profile-details">
                <img src="../../ICONS/adminboss.png" alt="adminaccount">
                <span class="admin_name"><?php echo $name ?></span>
            </div>
        </nav>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <!-- <div class="title">Complaint List</div> -->
                    <div class="sales-details">
                        <div class="sales-details" style="margin-top: 23px;">
                            <div class="Description">
                                <!--new code-->


                                <?php

                                $query = "SELECT * FROM complaints";
                                $result = mysqli_query($connect, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $id = $data['aid'];
                                        $problem = $data['msg'];
                                        $did = $data['did'];
                                        $uid = $data['uid'];
                                        $query = "SELECT name FROM USERS WHERE id = $uid";
                                        $result = mysqli_query($connect, $query);
                                        $udata = mysqli_fetch_assoc($result);
                                        $uname = $udata['name'];

                                        echo "
                                        <div class='card'>
                                        <div class='bio-of-founder'>
    
                                            <form>
                                                <h1 style='display: inline-block;'>Appointment ID: $id
                
                                                </h1>   
                                                <hr style='width: 100%;'>

                                                <label for='name'>
                                                    <h3 style='margin-top: 20px;'>Patient Name</h3>
                                                </label>
             
                                                <input type='text' id='name' value='$uname' disabled>
                                                <h3>Reason for complaining</h3>
                                                <input type='text' id='name' value='$problem' disabled>
                                            </form>
                                        </div>
                                        </div>
                                        ";
                                    }
                                }

                                ?>


                                <!-- <div class="card" style="margin-top: 9px;">
                                    <div class="bio-of-founder">
                                        <form action="">
                                            <h1>Order ID
                                                <img src="complaint.png" style="float: right;">
                                            </h1>
                                            <hr>
        
                                            <label for="name">
                                                <h3 style="margin-top: 20px;">Worker ID </h3>
                                            </label>
                                            <input type="text" id="name" name="name" required>
                                            <label for="name">
                                                <h3 style="margin-top: 20px;">Customer Name</h3>
                                            </label>
                                            <input type="text" id="name" name="name" required>
                                            <h3>Reason for complaining</h3>
                                            <select id="working-aarea" name="working-area">
                                                <option value="1">Bad behaviour of Worker</option>
                                                <option value="2">Bad Service</option>
                                                <option value="3">Worker did not arrive on time</option>
                                            </select>
                                            <label for="address">
                                                <h3 style="margin-top: 12px;">Description</h3>
                                            </label>
                                            <textarea id="address" name="address" style="height:60px"></textarea>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
    </section>
</body>

</html>