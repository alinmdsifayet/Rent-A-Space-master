<?php
session_start();
if (isset($_SESSION['uID'])) {
    unset($_SESSION['uID']);
}

header("location: ../HTML SCRIPTS/User_panel/index.php");
die;