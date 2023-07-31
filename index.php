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
    <link rel="stylesheet" href="filtre.css">
  </head>
  <body>
   <?php include_once 'header.php' ?>

    <div class="president">
        <div class="president-part president-part-first">
            <span>Bienvenue sur</span>
            <h1>La plateforme digitale des artisans et hydraulicens en eaux du Benin</h1>
            <p>
              Que souhaitez vous faire ?               
            </p>
            <div class="liens">
              <a href="./inscription.php" class="lien">S'inscrire comme plombier ou hydraulicien</a>
              <a href="./#services" class="lien">Demandez un service de plomberie ou d'hydraulicien</a>
              <a href="./#formations" class="lien">Suivre une formation en plomberie</a>
              <a href="" class="lien">Vendre un produit pour plombier ou hydraulicien</a>
            </div>
        </div>
        <div class="president-part">
          <img src="./images/piscine.jpeg" alt="">
          <img src="./images/WhatsApp Image 2023-05-09 at 09.25.15.jpeg" alt="">
          <img src="./images/WhatsApp Image 2023-05-09 at 09.24.56.jpeg" alt="">
        </div>
    </div>
    
    <div class="services-prev" id="services">
      <h3 class="services-title">Choisissez le service dont vous avez besoin</h3>
        <div class="services">
          <a class="service" href="">
            <img src="./images/citerne enterré.jpeg" alt="" class="image">
            <h5 class="service-title">Réalisation de citerne entérré</h5>
          </a>
          <a class="service" href="">
            <img src="./images/systeme filtration (2).jpeg" alt="" class="image">
            <h5 class="service-title">Installation de système de filtration d'eau</h5>
          </a>
          <A class="service" href="">
            <img src="./images/forage avec pompe.jpeg" alt="" class="image">
            <h5 class="service-title">Réalisation de forage</h5>
          </a>
          <a class="service" href="">
            <img src="./images/beignoir salle de bain.jpeg" alt="" class="image">
            <h5 class="service-title">Pose et installation de beignoir</h5>
          </a>
          <a class="service" href="">
            <img src="./images/lavabo, douche toilette.jpeg" alt="" class="image">
            <h5 class="service-title">Installation de toilettes, lavabos et douches
          </h5>
          </a>
          <a class="service" href="">
            <img src="./images/WhatsApp Image 2023-05-09 at 09.24.57 (2).jpeg" alt="" class="image">
            <h5 class="service-title">Installation et réparation de système de chauffage</h5>
          </a>
          <a class="service" href="">
            <img src="./images/piscine.jpeg" alt="" class="image">
            <h5 class="service-title">Réalisation de piscine</h5>
          </a>
          <a class="service" href="">
            <img src="./images/irrigation.jpeg" alt="" class="image">
            <h5 class="service-title">Réalisation de système d'irrigation</h5>
          </a>
        </div>
      </div>

    <div class="formation-prev">
    <h3 class="titre-formation" id="formations">Les artisans des métires de l'eau du Benin donnent des formations certifiantes</h3>
    <div class="formation-prev-container">
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
              <div class="slide"><img src="images/piscine.jpeg" alt=""></div>
              <div class="slide"><img src="images/citerne enterré.jpeg" alt=""></div>
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
              <img src="./images/beignoir salle de bain.jpeg" alt="">
              <img src="./images/systeme filtration (2).jpeg" alt="">
              <img src="./images/citerne enterré.jpeg" alt="">
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