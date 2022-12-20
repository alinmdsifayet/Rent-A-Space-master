<?php
session_start();
if (isset($_SESSION['eID'])) {
    unset($_SESSION['eID']);
}
if (isset($_SESSION['ebID'])) {
    unset($_SESSION['ebID']);
}

header("location: ../HTML SCRIPTS/User_panel/index.php");
die;