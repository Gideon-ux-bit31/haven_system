<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == "Admin") {

if (isset($_POST['fname']) &&
    isset($_POST['lname']) &&
    isset($_POST['username']) && 
    isset($_POST['pass']) && 
    isset($_POST['subject']) &&  
    isset($_POST['grade'])) {



    include '../../DB_Connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    print_r($_POST['grade']);







    } else {
        $em = "An error Occurred";
        header("Location: ../teacher-add.php?error=$em");
        exit;
    }

     } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}    
?>