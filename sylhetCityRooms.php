<?php

include("./db_connect.php");
session_start();

$sql = "SELECT * FROM room where city = 'Sylhet'";
// $result = mysqli_query($conn, $sql);
// $info = mysqli_fetch_all($result, MYSQLI_ASSOC);
// $res = explode(",", $info[0]['image']);
$run = mysqli_query($conn,$sql);
$data = mysqli_num_rows($run) > 0;


$query = "SELECT city as city_name  FROM room where city = 'Sylhet'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $list = mysqli_fetch_assoc($result);
    $city_name = $list['city_name'];
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('./userPartials/userHeaderSection.php') ?>


<body>
    <header class="header" id="navigation-menu">
        <nav>
            <a href="index.html"><img src="logon.png"></a>
            <div class="nav-links">
                <ul>
                    <?php
                  if (isset($_SESSION["userEmail"])) {
                    echo"<li><a href='index.php'>HOME</a></li>";
                    echo"<li><a href=''>ABOUT</a></li>";
                    echo"<li><a href='logOut.php'>Log Out</a></li>";
                    echo"<li><a href='userRegister.php'>REGISTER</a></li>";
                    echo"<li><a href=''>CONTACT US</a>";
                  }
                  else{
                    echo"<li><a href='index.php'>HOME</a></li>";
                    echo"<li><a href=''>ABOUT</a></li>";
                    echo"<li><a href='userLogIn.php'>LOG IN</a></li>";
                    echo"<li><a href='userRegister.php'>REGISTER</a></li>";
                    echo"<li><a href=''>CONTACT US</a>";
                  }
                  ?>

                    <ul>
                        <li><a href="#">Phone: +880 1622789888</a></li>
                        <li><a>Email: info@rentaspace.bd</a></li>
                        <li><a>Fax: 934 2009</a></li>
                    </ul>

                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <?php include('./userPartials/userCommonCarousal.php') ?>

    <script>
    function img(anything) {
        document.querySelector('.slide').src = anything;
    }

    function change(change) {
        const line = document.querySelector('.image');
        line.style.background = change;
    }
    </script>
    <?php include('./userPartials/userCommonSection.php') ?>
    <section class="room top" id="room">
        <div class="container">
            <div class="heading_top flex1">
                <div class="heading">
                    <h5>AVAILABLE ROOMS AROUND <?php echo $city_name ?> CITY</h5>
                    <h2>Book from our highest rated rooms</h2>
                </div>
                <!-- <div class="button">
                    <button onclick="location.href = 'toprated.html';" class="btn1">VIEW ALL</button>
                </div> -->
            </div>

            <div class="content grid">
                <?php

if($data){

    while ($row = mysqli_fetch_assoc($run)) {
       
        ?>




                <div class="box" style="color:black">
                    <div class="img">
                        <img src="./dashboard/html/admin/uploads/<?php echo $row['image'] ?>" alt="">
                    </div>
                    <div class="text">
                        <h3><?php echo $row['house'] ?></h3>
                        <p style="font-weight: 300;"> <span>Address: </span><span><?php echo $row['address'] ?></span>
                        </p>
                        <p> <span>Tk.</span>5,000<span>/per night</span> </p>
                    </div>
                    <!-- <div class="button">

                        <button class="viewroom">VIEW ROOM</button>
                    </div> -->
                    <!-- Button trigger modal -->

                    <button type="button" style="background-color: #f44336;" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        View Details
                    </button>
                    <?php
                            echo " <a href='roomBookingForm.php?id=$row[room_id]'> <button class='btn btn-outline-primary' style='margin-left:37%' type='submit' name='room_id' value=' room_id'>book</button></a> ";
                            ?>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Room Description&nbsp;
                                        : <?php echo $row['house'] ?> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p style="font-weight: 300;"> <span>Single Bed
                                            :</span><span><?php echo $row['single_bed'] ?></span> </p>
                                    <p style="font-weight: 300;"> <span>Double
                                            Bed:</span><span><?php echo $row['double_bed'] ?></span> </p>
                                    <p style="font-weight: 300;"> <span>Air Condition
                                            :</span><span><?php echo $row['air_condition'] ?></span>
                                    </p>

                                    <p> <span>Wifi Facility :</span><span><?php echo $row['wifi'] ?></span> </p>
                                    <p> <span>Washroom :</span><span><?php echo $row['toilet'] ?></span> </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary"
                                        style="background-color: #f44336;">Book now</button> -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



                <?php
        }
    }
    else{

        include("./notFound.php"); 



        
    }

    ?>
            </div>
        </div>
    </section>

    <script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionIHeading');

    for (i = 0; i < accHD.length; i++) {
        accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
        var itemClass = this.parentNode.className;
        for (var i = 0; i < accItem.length; i++) {
            accItem[i].className = 'accordionItem close';
        }
        if (itemClass == 'accordionItem close') {
            this.parentNode.className = 'accordionItem open';
        }
    }
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    })
    </script>



    <?php include('./userPartials/userFooterSection.php') ?>
</body>

</html>