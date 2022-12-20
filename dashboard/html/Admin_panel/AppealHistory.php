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

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS SCRIPTS/admin_panel/AppealHistoryDesign.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminbro3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appeal History</title>
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
                <a href="AdminProfile.php">
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
                    <span class="links_name">Order list</span>
                </a>
            </li>
            <li>
                <a href="customerlist.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Customer List</span>
                </a>
            </li>
            <li>
                <a href="workerlist.php">
                    <i class='bx bxs-user'></i>
                    <!-- <i class='bx bx-coin-stack'></i> -->
                    <span class="links_name">Worker List</span>
                </a>
            </li>
            <li>
                <a href="ComplaintList.php">
                    <i class='bx bxs-file-import'></i>
                    <span class="links_name">Complaint List</span>
                </a>
            </li>

            <li>
                <a href="ServiceList.php">
                    <!-- <i class='bx bxs-user-voice'></i> -->
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Service List</span>
                </a>
            </li>

            <li>
                <a href="modifyServices.php">
                    <!-- <i class='bx bxs-user-voice'></i> -->
                    <i class='bx bx-wrench'></i>
                    <span class="links_name">Service Modification</span>
                </a>
            </li>
            <!--Banned list link-->
            <li>
                <a href="BannedList.php">
                    <i class='bx bxs-error'></i>
                    <span class="links_name">Banned List</span>
                </a>
            </li>
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
            <li>
                <a href="AdminMessageHistory.php">
                    <i class='bx bx-history'></i>
                    <span class="links_name">Complaint History</span>
                </a>
            </li>
            <!--Message History link-->

            <!--Appeal history link-->
            <li>
                <a href="AppealHistory.php" class="active">
                    <i class='bx bx-user-voice'></i>
                    <span class="links_name">Appeal History</span>
                </a>
            </li>
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
                <span class="dashboard">Appeal History</span>
            </div>
            <!-- <div class="search-box">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search'></i>
                </div> -->
            <div class="profile-details">
                <span class="admin_name"><?php echo $name ?> </span>
            </div>
        </nav>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <!-- <div class="title">Profile</div> -->
                    <div class="sales-details" style="margin-top: 23px;">


                        <?php

                        $query = "SELECT * FROM appeal";
                        $result = mysqli_query($connect, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_assoc($result)) {
                                $id = $data['id'];
                                $e_id = $data['e_id'];
                                $msg = $data['msg'];
                                $date = $data['date'];
                                echo "
                                <div class='card'>
                                    <!--start of message portion in card -->
                                    <div class='bio-of-founder'>
                                        <h3>
                                            <p>Appeal ID:$id</p>
                                            <p style='float: right;'>$date</p>
                                        </h3>
                                        <hr>
                                    </div>
                                    <!--start of message portion in card -->
                                    <h2 style='margin-top: 20px;'>Employee ID: $e_id </h2>
                                    <p style='margin-top: 20px;justify-content: space-between;'>$msg</p>
                                    <!--end of message portion in card -->
                                </div>
                                ";
                            }
                        }

                        ?>



                    </div>
                </div>
    </section>
</body>

</html>