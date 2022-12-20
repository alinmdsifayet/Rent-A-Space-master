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
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/orderListDesign.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>

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
                <a href="orderlist.php" class="active">
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
                <span class="dashboard">Appointment List</span>
            </div>

            <form method="POST">
                <div class="search-box">
                    <input type="text" name="input" placeholder="Search by Appointment ID..." required>
                    <button name="search"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <div class="profile-details">
                <img src="../../ICONS/adminboss.png" alt="adminaccount">
                <span class="admin_name"><?php echo $name ?></span>
            </div>
        </nav>


        <div class="home-content">

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Appointment Details</div>
                    <div class="sales-details">

                        <!--changed part-->
                        <div class="sales-details" style="margin-top: 23px;">

                            <table>
                                <tr>
                                    <th>Appointment ID</th>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Doctor ID</th>
                                    <th>Date</th>
                                    <th>Shift</th>
                                    <th>Rating</th>
                                </tr>
                                <?php

                                if (isset($_POST['search'])) {
                                    $o_id = $_POST['input'];

                                    $query = "SELECT * FROM appointments WHERE id = $o_id ";
                                    $result = mysqli_query($connect, $query);
                                } else {
                                    $query = "SELECT * FROM appointments";
                                    $result = mysqli_query($connect, $query);
                                }


                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $id = $data['id'];
                                        $e_name = $data['dname'];
                                        $e_id = $data['did'];
                                        $u_name = $data['uname'];
                                        $date = $data['date'];
                                        $shift = $data['time'];
                                        $rating = $data['rating'];

                                        if($shift == 1){
                                            $shift = '09 - 10 AM';
                                        }
                                        
                                        if($shift == 2){
                                            $shift = '10 - 11 AM';
                                        }
                                        
                                        if($shift == 3){
                                            $shift = '11 - 12 PM';
                                        }
                                        
                                        if($shift == 4){
                                            $shift = '03 - 04 PM';
                                        }
                                        
                                        if($shift == 5){
                                            $shift = '04 - 05 PM';
                                        }
                                        
                                        if($shift == 6){
                                            $shift = '05 - 06 PM';
                                        }
                                        
                                        if($shift == 7){
                                            $shift = '07 - 08 PM';
                                        }
                                        
                                        if($shift == 8){
                                            $shift = '08 - 09 PM';
                                        }


                                        echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$u_name</td>
                                            <td>$e_name</td>
                                            <td>$e_id</td>
                                            <td>$date</td>
                                            <td>$shift</td>
                                            <td>$rating</td>
                                        </tr>
                                        ";
                                    }
                                }

                                ?>
                            </table>
                        </div>
                        <!-- <div class="button" style="margin-top: 12px;">
                            <a href="#">See All</a>
                        </div> -->
                    </div>
                </div>
                <!--changed part-->

    </section>
</body>

</html>