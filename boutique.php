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
<section class="container collection">
    <h2 class="collection__title"><?=$collection["name"] ?></h2>
    <div class="collection__cards">
    <?php $products = queryProducts($collection["id"]);?>
        <?php foreach($products as $row): ?>
        
        <article class="collection__cards_card">
            <img class="collection__cards_card_image" src="assets/img/<?=$row["image"] ?>">
            <div class="collection__cards_card_info">
              <h3 class="collection__cards_card_info_title"><?=$row["name"] ?></h3>
              <p class="collection__cards_card_info_text"><?=$row["description"] ?></p>
              <p class="collection__cards_card_info_price"><?=$row["price"] ?> €</p>
              <a class="collection__cards_card_info_btn btn" href=<?="produit.php?id=".$row["id"]?>>Acheter<a>
            </div>
        </article>
    <?php endforeach; ?>
    </div>
</section>
<?php endforeach; ?>

<?php require_once 'footer.php' ?>