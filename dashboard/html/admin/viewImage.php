<?php

include("db_connect.php");
session_start();
$id = $_GET['id'];

// Get images from the database
$sql = "SELECT * FROM room where room_id=$id";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
$res = explode(",", $info[0]['image']);

// $email = $_SESSION['userEmail'];
// $sql2 = "SELECT * FROM host where email='$email'";
// $result2 = mysqli_query($conn, $sql2);
// $info2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// $host_id = "";
// $host_id = $info2[0]['id'];

$sql2 = "SELECT house from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$house = $data2['house'];

$sql2 = "SELECT address from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$address = $data2['address'];


$sql2 = "SELECT single_bed from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$single_bed = $data2['single_bed'];

$sql2 = "SELECT double_bed from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$double_bed = $data2['double_bed'];

$sql2 = "SELECT city from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$city = $data2['city'];


$sql2 = "SELECT air_condition from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$air_condition = $data2['air_condition'];

$sql2 = "SELECT wifi from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$wifi = $data2['wifi'];


$sql2 = "SELECT toilet from room where room_id=$id";
$result2 = mysqli_query($conn, $sql2);
$info2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
$data2 = mysqli_fetch_assoc($result2);
$toilet = $data2['toilet'];





// echo $id;

// echo "$res[0] $res[1]";


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../ICONS/adminsign-upicon.png">
    <link rel="stylesheet" href="../../CSS Files/Admin Panel Designs/AdminDashboardDesign.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    <link rel="stylesheet" href="profile.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">

    <title>Profile</title>





</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" style="text-align: center;" href="#"> <img src="logon.png"
                width="50px" height="35px" alt=""></i>&nbspRent-a-space</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#" style="color: white;">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <?php
                        include("./partials/nav.php");
                        ?>



                    </ul>
                    <hr>

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../../ICONS/admin0.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <!-- <strong>Itadori Yuji</strong> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License -
                                        https://atomicons.com/license/ (Icons: CC BY 4.0) Copyright 2021 Atomicons
                                        --&gt;<circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.74,14H21a1,1,0,0,0,1-1V11a1,1,0,0,0-1-1H19.74l0-.14a8.17,8.17,0,0,0-.82-1.92l.89-.89a1,1,0,0,0,0-1.41L18.36,4.22a1,1,0,0,0-1.41,0l-.89.89A8,8,0,0,0,14,4.25V3a1,1,0,0,0-1-1H11a1,1,0,0,0-1,1V4.25a8,8,0,0,0-2.06.86l-.89-.89a1,1,0,0,0-1.41,0L4.22,5.64a1,1,0,0,0,0,1.41l.89.89a8.17,8.17,0,0,0-.82,1.92l0,.14H3a1,1,0,0,0-1,1v2a1,1,0,0,0,1,1H4.26l0,.14a8.17,8.17,0,0,0,.82,1.92L4.22,17a1,1,0,0,0,0,1.41l1.42,1.42a1,1,0,0,0,1.41,0l.89-.89a8,8,0,0,0,2.06.86V21a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1V19.75a8,8,0,0,0,2.06-.86l.89.89a1,1,0,0,0,1.41,0l1.42-1.42a1,1,0,0,0,0-1.41l-.89-.89a8.17,8.17,0,0,0,.82-1.92Z">
                                        </path>
                                    </svg>&nbsp;&nbsp;Settings</a></li>
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License -
                                        https://atomicons.com/license/ (Icons: CC BY 4.0) Copyright 2021 Atomicons
                                        --&gt;<circle cx="12" cy="6" r="4"></circle>
                                        <path
                                            d="M17.67,22a2,2,0,0,0,1.92-2.56A7.8,7.8,0,0,0,12,14a7.8,7.8,0,0,0-7.59,5.44A2,2,0,0,0,6.34,22Z">
                                        </path>
                                    </svg>&nbsp;&nbsp;Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" width="23" height="25" fill="none" stroke="#ffffff"
                                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">&lt;!--!
                                        Atomicons Free 1.00 by @atisalab License -
                                        https://atomicons.com/license/ (Icons: CC BY 4.0) Copyright 2021 Atomicons
                                        --&gt;<path
                                            d="M14,7V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V20a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V17">
                                        </path>
                                        <line x1="10" y1="12" x2="22" y2="12"></line>
                                        <polyline points="18 8 22 12 18 16"></polyline>
                                    </svg>&nbsp;&nbsp;Sign out</a></li>
                        </ul>
                    </div>




                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"> <i class='bx bxs-home'></i>&nbsp;Room Details</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">



                    </div>
                </div>

                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">


                    <?php $i ?>
                    <?php for ($i = 0; $i < sizeof($res); $i++) { ?>
                    <?php $imageURL = 'uploads/' . $res[$i]; ?>



                    <img src="<?php echo $imageURL ?>" class="mh-50 w-50 p-3" alt="">

                    <?php } ?>

                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Criteria</th>
                                <th scope="col">Information</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Single Bed</th>
                                <td><?php echo $single_bed ?></td>

                            </tr>
                            <tr>
                                <th scope="row">Double Bed</th>
                                <td><?php echo $double_bed ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Wifi</th>
                                <td> <?php echo $wifi ?></td>

                            </tr>
                            <tr>
                                <th scope="row">Toilet</th>
                                <td> <?php echo $toilet ?></td>

                            </tr>
                            <tr>
                                <th scope="row">House Name</th>
                                <td><?php echo $house ?></td>

                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td><?php echo $city ?></td>

                            </tr>

                            <tr>
                                <th scope="row">Address</th>
                                <td><?php echo $address ?></td>

                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <a href="./roomList.php"><button class="button" style="    background-color: #008CBA; 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;">Go Back</button></a>
                                </td>

                            </tr>


                        </tbody>
                    </table>

                </div>


        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>