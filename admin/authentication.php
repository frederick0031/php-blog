<?php
session_start();
include_once("config/dbcon.php");
if (!isset($_SESSION["auth"]))
{
    $_SESSION['error'] = 'Login to Access Admin Dashboard';
    header('../login.php');
    exit(0);
}
else
{
    if($_SESSION['auth_role'] != "1")
    {
        $_SESSION["error"] = "You Are not Authorized as ADMIN";
        header("Location: ../login.php");
        exit(0);
    }
}
?>