<?php 
require_once '../config/bdd_utils.php';
$bdd = connectDBS();
session_start();

if(!isset($_SESSION['user'])){
    // do nothing if on login page
    if(basename($_SERVER['PHP_SELF']) != 'login.php'){
        header('Location: login.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <style>
        
    </style>
    <title>Admin</title>
</head>
<body>
        
</body>
