<?php
session_start();
include_once 'pdo.php';

$req1 = $pdo->query('SELECT membres.tel, services.titre_service, services.photo_service, services.prix_service FROM membres INNER JOIN services ON membres.id = services.id_artisan');
$services = $req1->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services de plomberies de benin - plombiers du benin</title>
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
            <h1>Les plombiers du Benin offre tout type de service</h1>
            <p>
                Consultez nos services, regardez les prix de nos prestations et appelez directement le prestataire de service
            </p>
            <div class="liens" style="display: none;">
              <a href="" class="lien">S'inscrire à l'association</a>
              <a href="" class="lien">contactez un artisan</a>
            </div>
        </div>
        <div class="president-part">
            <img src="images/WhatsApp Image 2023-05-09 at 09.24.57.jpeg" alt="">
            <img src="images/WhatsApp Image 2023-05-08 at 22.21.18.jpeg" alt="">
            <img src="images/WhatsApp Image 2023-05-09 at 09.25.22 (1).jpeg" alt="">
        </div>
    </div>

    <div class="services-prev">
      <div class="services">
          <?php foreach($services as $service):?>
            <div class="service">
              <h3 class="service-title"><?= $service['titre_service'] ?></h3>
              <img src="images/<?= !empty($service['photo_service']) ? 'services/'.$service['photo_service'] : 'eau3.png' ?>" alt="">
              <span class="service-title"><?= $service['prix_service'] ?> f cfa</span> / <a href="tel:+229<?= $service['tel'] ?>">Appelez</a>
          </div>
          <?php endforeach ?>
      </div>
    </div>
    

    <?php include_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>