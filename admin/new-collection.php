<?php
require_once('header.php');
global $bdd;

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $date = date('Y-m-d H:i:s');

    $query = $bdd -> prepare("INSERT INTO collection (name, date) VALUES (:name, :date)");
    $query -> execute(array(
        "name" => $name,
        "date" => $date,
    ));

    header('Location: index.php');
}


?>