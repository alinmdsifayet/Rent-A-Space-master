<?php
require("../../Inc/function.php");
session_start();
if (!isset($_SESSION['aID'])) {
    header("location:./adminlogin.php");
}

$a_id = $_SESSION['aID'];

$query = "SELECT username FROM admin WHERE id = $a_id";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $list = mysqli_fetch_assoc($result);
    $name = $list['username'];
}


//payment info
// $sql = "SELECT COUNT(id) AS count, SUM(payment) AS payment FROM orderlist WHERE status = 'Completed' ";
// $result = mysqli_query($connect, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $data = mysqli_fetch_assoc($result);
//     $completed_services = $data['count'];
//     $revenue = $data['payment'];
//     $revenue = $revenue * (15 / 100);
// }

// $sql = "SELECT COUNT(id) AS count, SUM(payment) AS payment FROM orderlist WHERE status = 'In Progress' ";
// $result = mysqli_query($connect, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $data = mysqli_fetch_assoc($result);
//     $ongoing_services = $data['count'];
// }

// $sql = "SELECT COUNT(id) AS count, SUM(payment) AS payment FROM orderlist WHERE status = 'Not started' ";
// $result = mysqli_query($connect, $sql);

// if ($result && mysqli_num_rows($result) > 0) {
//     $data = mysqli_fetch_assoc($result);
//     $pending_services = $data['count'];
// }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/DashboardDesign.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxs-building-house'></i>
            <span class="logo_name">HANDYMAN</span>
        </div>
        <ul class="nav-links">
        <li>
                <a href="admindashboard.php" class="active">
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
                <span class="dashboard">Admin Dashboard</span>
            </div>
            <!-- <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div> -->
            <div class="profile-details">
                <img src="../../ICONS/adminboss.png" alt="adminaccount">
                <span class="admin_name"><?php //echo $name ?></span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Completed Services</div>
                        <div class="number"><?php //echo $completed_services ?></div>

                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Ongoing services</div>
                        <div class="number"><?php //echo $ongoing_services ?></div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Pending Services</div>
                        <div class="number"><?php //echo $pending_services ?></div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Revenue</div>
                        <div class="number">৳ <?php //echo $revenue ?></div>
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>

            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Services</div>

                    <!--changed part-->
                    <div class="sales-details" style="margin-top: 23px;">
                        <table>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Worker Name</th>
                                <th>Worker Type</th>
                                <th>Working Date</th>
                                <th>Working Shift</th>
                                <th>Worker Payment</th>
                            </tr>
                            <?php

                            // $query = "SELECT * FROM orderlist WHERE status= 'Completed' ORDER BY date DESC LIMIT 15";
                            // $result = mysqli_query($connect, $query);

                            // if ($result && mysqli_num_rows($result) > 0) {
                            //     while ($data = mysqli_fetch_assoc($result)) {
                            //         $id = $data['id'];
                            //         $e_name = $data['e_name'];
                            //         $e_id = $data['e_id'];
                            //         $u_name = $data['u_name'];
                            //         $u_address = $data['u_address'];
                            //         $date = $data['date'];
                            //         $shift = $data['shift'];
                            //         $type = $data['e_type'];
                            //         $payment = $data['payment'];
                            //         $status = $data['status'];
                            //         $rating = $data['rating'];

                            //         echo "
                            //             <tr>
                            //                 <td>$id</td>
                            //                 <td>$u_name</td>
                            //                 <td>$e_name</td>
                            //                 <td>$type</td>
                            //                 <td>$date</td>
                            //                 <td>$shift</td>
                            //                 <td>$payment</td>
                            //             </tr>
                            //             ";
                            //     }
                            // }

                            ?>
                        </table>
                    </div>
                    <div class="button" style="margin-top: 12px;">
                        <a href="orderlist.php">See All</a>
                    </div>
                </div>
                <div class="top-sales box">
                    <div class="title">Top Rated Workers</div>
                    <table style="margin-top: 23px;">
                        <tr>
                            <th>Worker Name</th>
                            <th>Highest Rating</th>
                        </tr>
                        <?php

                        // $query = "SELECT id, name, rating FROM employee ORDER BY rating DESC LIMIT 10";
                        // $result = mysqli_query($connect, $query);

                        // if ($result && mysqli_num_rows($result) > 0) {
                        //     while ($data = mysqli_fetch_assoc($result)) {
                        //         $id = $data['id'];
                        //         $name = $data['name'];
                        //         $rating = $data['rating'];

                        //         echo "
                        //             <tr>
                        //                 <td>$name</td>
                        //                 <td>$rating</td>
                        //             </tr>
                        //             ";
                        //     }
                        // }

                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!--changed part-->
    </section>
</body>

</html>