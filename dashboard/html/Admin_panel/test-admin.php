<?php

include('../../Inc/function.php');

$manageTabClass = '';
$profileTabClass = '';
$addTabClass = '';
if (isset($_GET['profile'])) {
    $profileTabClass = 'active show';
} elseif (isset($_GET['manage'])) {
    $manageTabClass = 'active show';
} elseif (isset($_GET['add'])) {
    $addTabClass = 'active show';
}

if (isset($_POST['submit'])) {
    $target = '../../service_img/' . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];
    $name = $_POST['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $query = "UPDATE services SET image = '$target' WHERE name = '$name'";
    mysqli_query($connect, $query);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS SCRIPTS/bootsrapcosmo.css">
    <title>Admin-dashboard</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>


                    <?php
                    session_start();
                    if (isset($_SESSION['ID'])) {
                        echo '
                        <li class="nav-item">
                        <a class="nav-link" href="../Inc/logout.php">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>';
                    } else {
                        echo '  
                        <li class="nav-item">
                        <a class="nav-link" href="./User_panel/user login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./user_or_employee.php">Sign up</a>
                    </li>';
                    }

                    ?>

                    <!--      <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                 <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form> !-->
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php echo $profileTabClass; ?>" data-bs-toggle="tab" href="?profile">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $manageTabClass; ?>" data-bs-toggle="tab" href="?manage">Manage
                    Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo $addTabClass; ?>" data-bs-toggle="tab" href="?add">Add new Service</a>
            </li>

            <!--  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div> 
        </li> !-->
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade <?php echo $profileTabClass; ?>" id="profile">
                <p>My Session Id : <?php echo $_SESSION['ID']; ?></p>
            </div>
            <div class="tab-pane fade <?php echo $manageTabClass; ?>" id="manage">
                <p>world</p>
            </div>
            <div class="tab-pane fade <?php echo $addTabClass; ?>" id="add">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="image">
                    <input type="text" name="name" required>
                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>