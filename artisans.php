<?php
include_once 'pdo.php';
$req = $pdo->query('SELECT id,nom,prenom,ville,photo_identite FROM membres');
$membres = $req->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Association des plombiers du Benin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="./images/artisans.png" type="image/x-icon">
  </head>
  <body>

    <?php include_once 'header.php' ?>
    <div class="artisans-prev">
      <h3>Découvrez ici la liste des artisans plombiers du benin. Contactez les pour tout service de plomberie</h3>
      <div class="artisans">
        <?php foreach($membres as $membre): ?>        
        <div class="artisan">
          <h5><?= $membre['nom'] ." " . $membre['prenom'] ?> </h5>
          <img src="images/artisans/<?= !empty($membre['photo_identite']) ? $membre['photo_identite'] : 'avatar-profil.png' ?>" alt="">
          <a href="artisan-page.php">contactez</a>
        </div>
        <?php endforeach ?>
      </div>
    </div>

    <footer>
      <div class="footer-part">
        <h6>Qui sommes nous ?</h6>
        <p>
        Notre société d'artisans plombiers à Paris (75) réalise tous vos travaux de réparation et 
        débouchage de canalisation de wc, toilette, bidet, évier, baignoire, douche. Nos plombiers professionnels
         s'occupent de détecter et réparer vos fuites. Nous prenons également en charge les vidanges de fosse septique,
          le curage et le dégorgement.
         Art Plombier Paris intervient rapidement à Paris et en Île de France.
        </p>
      </div>
      <div class="footer-part">
        <h6>Que voulez vous faire ?</h6>
        <ul>
          <li><a href="">contactez un artisan</a></li>
          
        </ul>
      </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>