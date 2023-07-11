<?php
require_once('header.php');
global $bdd;

if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image']) && isset($_POST['collection'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $collection = $_POST['collection'];

    $query = $bdd -> prepare("INSERT INTO product (name, description, image, price, collection_id) VALUES (:name, :description, :image, :price, :collection)");
    $query -> execute(array(
        "name" => $name,
        "description" => $description,
        "price" => $price,
        "image" => $image,
        "collection" => $collection
    ));

    $imagePath = "../assets/img/";

    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $imagePath . date_format('U') .$image)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }

    header('Location: index.php');
}


?>