<?php 
require_once 'config/bdd_utils.php';
$bdd = connectDBS();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

    <title></title>
</head>
<body>
    <nav class="nav">
        <div class="nav__imgbox">
            <img class="nav__imgbox_img" src="assets/img/icon.png" alt="Logo">
        </div>
        <ul class="nav__ul">
            <li class="nav__ul_li"><a class="nav__ul_li_a" href="index.php">Home</a></li>
            <li class="nav__ul_li"><a class="nav__ul_li_a" href="boutique.php">Boutique</a></li>
            <li class="nav__ul_li"><a class="nav__ul_li_a" href="index.php">Qui suis-je</a></li>
        </ul>
    </nav>