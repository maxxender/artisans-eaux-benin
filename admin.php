<?php
include_once 'pdo.php';

$req = $pdo->query('SELECT id,nom,prenom,ville,tel,photo_identite FROM membres');
$artisans = $req->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plombiers du benin - admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
  </head>
  <body>
  <?php include_once 'header.php' ?>

  <div class="admin-container">
    <div class="membres">
      <?php foreach($artisans as $artisan):?>
        <div class="membre">
          <img class="membre-part" src="images/artisans/<?= !empty($artisan['photo_identite']) ?> ?>" alt="photo identite">
          <div class="membre-part"><?= $artisan['nom'] ?></div>
          <div class="membre-part"><?= $artisan['prenom'] ?></div>
          <div class="membre-part"><?= $artisan['tel'] ?></div>
          <div class="membre-part"><a href="">bloquer le compte</a></div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>