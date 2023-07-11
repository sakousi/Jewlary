<?php require_once 'header.php' ;
$query = $bdd -> query("SELECT * FROM collection ORDER BY date LIMIT 1");
$newCollection = $query->fetchAll();
?>


<div class="boutique">
    <div class="boutique__textbox">
        <h1 class="boutique__textbox_h1">Boutique</h1>
        <p class="boutique__textbox_p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis corrupti consequuntur non, quas cumque, porro numquam cum, delectus doloribus dolorum quae distinctio facere fugiat illo obcaecati tenetur error atque reiciendis!</p>
    </div>
</div>

<section class="container newcollection">
    <h2 class="newcollection__title"><?php ?></h2>
    <div class="newcollection__cards">
    <?php foreach($newCollection as $row): ?>
        <article class="newcollection__cards_card">
            <img class="newcollection__cards_card_image" src="assets/img/collier1.jpg" alt="collier1">
            <h3 class="newcollection__cards_card_title">Collier 1</h3>
            <p class="newcollection__cards_card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis corrupti consequuntur non, quas cumque, porro numquam cum, delectus doloribus dolorum quae distinctio facere fugiat illo obcaecati tenetur error atque reiciendis!</p>
            <button class="newcollection__cards_card_btn" type="button">Acheter</button>
        </article>
    <?php endforeach; ?>
    </div>
</section>

<?php require_once 'footer.php' ?>