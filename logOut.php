<?php

session_start();
// if(isset($_SESSION['userID'])){
//     unset($_SESSION['userID']);
// }
// session_unset();
// session_destroy();
if(isset($_SESSION['userEmail'])){
    unset($_SESSION['userEmail']);
}
header("location:index.php");
die;

?>