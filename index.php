<?php
  session_start();
  include_once "ville-benin.php";
  include_once 'pdo.php';

  $req1 = $pdo->query('SELECT membres.tel, services.titre_service, services.photo_service, services.prix_service FROM membres INNER JOIN services ON membres.id = services.id_artisan');
  $services = $req1->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./images/artisans.png" type="image/x-icon">
    <title>Plombiers du benin - artisans en eaux du Benin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="slider.css">
  </head>
  <body>
   <?php include_once 'header.php' ?>

    <div class="president">
        <div class="president-part president-part-first">
            <h1>Plateforme digitale des plombiers du Benin</h1>
            <p>
              Contactez nos plombiers pour tout vos services d'assainissement, d'adduction d'eau.               
            </p>
            <div class="liens">
              <a href="./inscription.php" class="lien">S'inscrire sur le site</a>
              <a href="./artisans.php" class="lien">contactez un plombier</a>
            </div>
        </div>
        <div class="president-part">
          <img src="./images/WhatsApp Image 2023-05-08 at 22.21.18.jpeg" alt="">
          <img src="./images/WhatsApp Image 2023-05-09 at 09.25.15.jpeg" alt="">
          <img src="./images/WhatsApp Image 2023-05-09 at 09.24.56.jpeg" alt="">
        </div>
    </div>
    
    <div class="services-prev">
      <h3 class="services-prev-title">
        Avez vous besoin d'un service de plomberie ? <br/>
        Consultez la liste des services offert par nos plombiers et contactez les directement<br/>
      </h3>
      <div class="besoin-plombiers">
        <h3>Besoin d'un plombier pour un service rapide ou une prestation à long terme ?</h3>
      <form action="" method="post">
            <legend>Trouvez un plombier tout de suite près de chez vous</legend>
            <select name="" id="">
              <option value="">Selectionnnez la ville pour la prestation</option>
              <?php foreach($villes as $ville) :?>
                <option value=""><?= $ville ?></option>
              <?php endforeach ?>
            </select>
          </form>
      </div>
      <div class="services">
          <?php foreach($services as $service):?>
            <div class="service">
              <h3 class="service-title"><?= $service['titre_service'] ?></h3>
              <span class="service-title"><?= $service['prix_service'] ?> f cfa</span> / <a href="tel:+229<?= $service['tel'] ?>">Appelez</a>
          </div>
          <?php endforeach ?>
      </div>
    </div>

    <h3 class="titre-formation" id="formations">Les artisans des métires de l'eau du Benin donnent des formations certifiantes</h3>
    <div class="formation-prev">
      <div class="formation-part formation-part-left">
        <h3>Des formations avec 70% de pratique et 30% de théorie</h3>
        <p>
          Les artisans des métires de l'eau du benin vous offrent des formations avec diplome reconnu par l'état<br/>
          <span>Vous voulez vous formez en plomberie ? Inscrivez vous tout de suite</span>
        </p>
        <ul>
          <li>Des formateurs expériementés</li>
          <li>Une formation 70% pratique </li>
          <li>Formation avec diplome reconnu par l'état</li>
        </ul>
        <div class="slider">
            <div class="slides">
              <div class="slide"><img src="images/services.jpg" alt=""></div>
              <div class="slide"><img src="images/WhatsApp Image 2023-05-09 at 09.25.18.jpeg" alt=""></div>
              <div class="slide"><img src="images/WhatsApp Image 2023-05-08 at 22.21.36.jpeg" alt=""></div>
              <div class="slide"><img src="images/services.jpg" alt=""></div>
            </div>
        </div>
      </div>
      <div class="formation-part formation-part-right">
        <form action="contact-formation-post.php" method="post" id="#contact-formation">
          <div class="form-response"><?php if(!empty($_SESSION['form_response'])){echo $_SESSION['form_response'];} ?></div>
          <label for="">Nom</label>
          <input type="text" name="nom">
          <label for="">Prénom</label>
          <input type="text" name="prenom" id="prenom">
          <label for="">Ville de résidence</label>
          <select name="ville_residence" id="ville_residence">
            <?php foreach($villes as $ville):?>
              <option value="<?= $ville ?>"><?= $ville ?></option>
            <?php endforeach ?>
          </select>
          <label for="">Numéro de telephone</label>
          <input type="tel" name="tel" id="tel">
          <button type="submit">Envoyez ma demande d'inscription</button>
        </form>
      </div>
    </div>

    <div class="partenaires-prev">
      <h3 class="title-partenaire">Vendez vos équipements sanitaires sur notre plateforme</h3>
      <div class="partenaires-prev-container">
        <div class="partenaires-prev-important">
            <div class="partenaires-prev-important-part">
              <h4 class="">
                Vous vendez des équipements sanitaires, des équipements pour plombier, du matériel d'assainissement ?
              </h4>
              <p>
                En rejoingant la liste des partenaires commerciales des artisans des métiers de l'eau du Benin, vous mettez vos produits
                sanitaires en avant et entrez en contact avec les centaines d'artisans des métiers de l'eau aux Benin.
              </p>
            </div>     
            <div class="partenaires-prev-important-part">
              <img src="./images/WhatsApp Image 2023-05-08 at 22.21.18.jpeg" alt="">
              <img src="./images/WhatsApp Image 2023-05-09 at 09.24.56.jpeg" alt="">
              <img src="./images/WhatsApp Image 2023-05-08 at 22.21.31.jpeg" alt="">
            </div>
          </div>
          <form action="contact-partenaire.php" method="post" id="form-contact-partenaire">
            <legend>Faites une demande pour intégrez notre réseaux de partenaires commerciales</legend>
            <label for="">Nom</label>
            <input type="text" name="nom" placeholder="">
            <label for="">Prénom</label>
            <input type="text" name="prenom" placeholder="">
            <label for="">Votre numero de telephone</label>
            <input type="text" name="tel" placeholder="">
            <label for="">Nom de la société</label>
            <input type="text" name="nom_societe" placeholder="">
            <button type="submit">Envoyez ma demande</button>
            <?php if(!empty($_SESSION['form_contact_partenaire_response'])) :?>
              <div class="form-response"><?= $_SESSION['form_contact_partenaire_response'] ?></div>
            <?php endif; ?>
        </form>
      </div>  
    </div>

  <?php include_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>