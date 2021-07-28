<?php
include('security.php');
require 'database/dbconfig.php';
session_start();
if(isset($_POST['logout_btn']))
{
    $user = $_SESSION['customer'];
    session_destroy();
    unset($_SESSION['customer']);
    header('location:index.php');
}

?>