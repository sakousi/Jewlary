<?php require_once('header.php') ?>
<?php 
function getProduct($id){
    global $bdd;

    $query = $bdd->prepare('SELECT * FROM products WHERE id = ?');
    $query->execute(array($id));
    return $query->fetch();
}
?>

<div class="product">
    <?php 
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $product = getProduct($_GET['id']);
        if($product){
            ?>
            <h1><?= $product['name'] ?></h1>
            <p><?= $product['description'] ?></p>
            <p><?= $product['price'] ?>€</p>
            <img src="assets/img/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <?php
        }else{
            echo 'Ce produit n\'existe pas';
        }
    }else{
        echo 'Aucun produit sélectionné';
    }
    ?>
</div>


<?php require_once('footer.php') ?>