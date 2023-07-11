<?php require_once 'header.php' ;
$query1 = $bdd -> query("SELECT * FROM collection ORDER BY date DESC");
$collections = $query1->fetchAll();
$query2 = $bdd -> query("SELECT * FROM collection ORDER BY date DESC");
$newCollection = $query2->fetch();
function queryProducts($collectionId){
    global $bdd;
    $query3 = $bdd -> query("SELECT product.id, product.name, product.description, product.image, product.price FROM product LEFT JOIN collection ON product.collection_ID = collection.ID WHERE product.collection_ID = $collectionId ");
    return $query3->fetchAll();
};
?>


<div class="boutique">
    <div class="boutique__textbox">
        <h1 class="boutique__textbox_h1">Boutique</h1>
        <p class="boutique__textbox_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis corrupti consequuntur non, quas cumque, porro numquam cum, delectus doloribus dolorum quae distinctio facere fugiat illo obcaecati tenetur error atque reiciendis!</p>
    </div>
</div>

<?php foreach($collections as $collection) :?>
<section class="container newcollection">
    <h2 class="newcollection__title"><?=$collection["name"] ?></h2>
    <div class="newcollection__cards">
    <?php $products = queryProducts($collection["id"]);?>
        <?php foreach($products as $row): ?>
        
        <article class="newcollection__cards_card">
            <img class="newcollection__cards_card_image" src="assets/img/collier1.jpg" alt="collier1">
            <h3 class="newcollection__cards_card_title"><?=$row["name"] ?></h3>
            <p class="newcollection__cards_card_text"><?=$row["description"] ?></p>
            <p class="newcollection__cards_card_price"><?=$row["price"] ?> €</p>
            <a class="newcollection__cards_card_btn btn" href=<?="produit.php?id=".$row["id"]?>>Acheter<a>
        </article>x
    <?php endforeach; ?>
    </div>
</section>
<?php endforeach; ?>

<?php require_once 'footer.php' ?>