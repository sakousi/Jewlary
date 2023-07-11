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

<style>/* Réinitialisation des styles par défaut */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Appliquer une police de caractères */
body {
  font-family: 'Roboto', sans-serif;
}

/* Style pour les sections */
.section {
  margin-bottom: 30px;
  padding: 20px;
  background-color: #f5f5f5;
  color: #333;
  border-radius: 4px;
}

/* Style pour les cartes */
.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  grid-gap: 20px;
}

.card {
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

.card img {
  width: 100%;
  max-height: 200px;
  object-fit: cover;
  border-radius: 4px;
  margin-bottom: 10px;
  transition: opacity 0.3s ease;
}

.card:hover img {
  opacity: 0.8;
}

.card h3 {
  margin-bottom: 10px;
  font-size: 18px;
}

.card p {
  margin-bottom: 10px;
  color: #666;
}

.card .price {
  font-weight: bold;
  margin-bottom: 10px;
}

.card .btn {
  display: inline-block;
  padding: 8px 16px;
  background-color: #333;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.card .btn:hover {
  background-color: #222;
}

/* Style spécifique pour la section boutique */
.boutique {
  text-align: center;
}

.boutique__textbox {
  max-width: 600px;
  margin: 0 auto;
}

.boutique__textbox h1 {
  margin-bottom: 10px;
  font-size: 24px;
}

.boutique__textbox p {
  margin-bottom: 20px;
  color: #666;
}
</style>

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
            <img class="newcollection__cards_card_image" src="assets/img/<?=$row["image"] ?>">
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