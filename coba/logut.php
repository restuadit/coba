<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("location:login.php");
}
include "konek.php";
session_start();
session_destroy();
header("location:login.php");
?>