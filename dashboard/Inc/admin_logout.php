<?php
session_start();
if (isset($_SESSION['aID'])) {
    unset($_SESSION['aID']);
}

header("location: http://localhost/Spl-2/Front-End/HTML%20Files/Admin_panel/adminlogin.php");
die;