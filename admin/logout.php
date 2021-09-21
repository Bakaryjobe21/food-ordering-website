<?php
//include constant.php for SITEURL
include('../config/constants.php');


//1. Destroy the session 
session_destroy();//unsets $_SESSION['user]

//2.and redirect to Login Page
header('location:'.SITEURL.'admin/login.php');

?>