<?php require_once('header.php') ?>

<!-- New collection form -->

<div class="new-collection">
    <h1>Nouvelle collection</h1>
    <form action="new-collection.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nom de la collection">
        <input type="submit" value="Ajouter">
    </form>
</div>


<!-- New product form -->

<div class="new-product">
    <h1>Nouveau produit</h1>
    <form action="new-product.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nom du produit">
        <textarea name="description" placeholder="Description du produit"></textarea>
        <input type="number" name="price" placeholder="Prix du produit">
        <input type="file" name="image" placeholder="Image du produit">
        <select name="collection">
            <?php 
            $query = $bdd->prepare('SELECT * FROM collection');
            $query->execute();
            $collections = $query->fetchAll();
            foreach($collections as $collection){
                ?>
                <option value="<?= $collection['id'] ?>"><?= $collection['name'] ?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" value="Ajouter">
    </form>
</div>