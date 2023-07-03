<?php
session_start();
include_once 'pdo.php';

$req1 = $pdo->query('SELECT membres.tel, produits_artisans.description_produit, produits_artisans.photo_produit FROM membres INNER JOIN produits_artisans ON membres.id = produits_artisans.id_artisan');
$produits = $req1->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produits et matériels pour plombier du Benin - plombiers du benin</title>
    <link rel="shortcut icon" href="images/artisans.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <?php include_once "header.php" ?>

    <div class="president">
        <div class="president-part">
            <h1>Découvrez les produits mis en vente par les artisans en eaux du Bénin</h1>
            <p>
                Un produit vous interesse ? Contactez directement le vendeur ou laissez lui un méssage
            </p>
            <div class="liens" style="display: none;">
              <a href="" class="lien">S'inscrire à l'association</a>
              <a href="" class="lien">contactez un artisan</a>
            </div>
        </div>
        <div class="president-part">
            <img src="images/produits-artisans/kit detection fuite piscine.jpg" alt="">
            <img src="images/produits-artisans/colmateur de fuite 2.jpg" alt="">
            <img src="images/produits-artisans/rechercheur de fuite avec seringue.jpg" alt="">
        </div>
    </div>

    <div class="services-prev">
      <div class="services">
          <?php foreach($produits as $produit):?>
            <div class="service">
              <h3 class="service-title"><?= $produit['description_produit'] ?></h3>
              <img src="images/produits-artisans/<?= !empty($produit['photo_produit']) ? $produit['photo_produit'] : 'eau3.png' ?>" alt="">
               <a href="tel:+229<?= $produit['tel'] ?>">Appelez le vendeur</a>
          </div>
          <?php endforeach ?>
      </div>
    </div>
    

    <?php include_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>