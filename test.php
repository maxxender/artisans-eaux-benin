<?php
session_start();
if(empty($_SESSION['membre_id'])){
  header('location:./');
}
include_once 'pdo.php';
$req = $pdo->prepare('SELECT nom,prenom,tel,ville,photo_identite FROM membres WHERE id = ?');
$req->execute(array(
  $_SESSION['membre_id']
));
$membre_actif = $req->fetch();

$req = $pdo->prepare('SELECT id,nom,prenom,tel,ville,photo_identite FROM membres WHERE id !=  ?');
$req->execute(array(
  $_SESSION['membre_id']
));
$membres = $req->fetchAll();

if(!empty($_GET['id_recv'])){
  $req = $pdo->prepare('SELECT * FROM messages WHERE id_receveur = ?');
  $req->execute(array(
    htmlentities($_GET['id_recv'])
  ));
  $messages = $req->fetchAll();
}

if(!empty($_POST['titre_service']) && !empty($_POST['prix_service'])){
   
  $extensions = array('.png', '.gif', '.jpg', '.jpeg');
  $extension = strrchr($_FILES['photo_service']['name'], '.');
  if(in_array($extension,$extensions)){
      $taille_maxi = 3000000;
      $taille = $_FILES['photo_service']['size'];
      if($taille < $taille_maxi)
      {
          $from = $_FILES['photo_service']['tmp_name'];
          $photo_service = rand(50,550) . rand(400,8849) . rand(80,1000000) . $extension;
          $f = move_uploaded_file($_FILES['photo_service']['tmp_name'],'./images/services/'.$photo_service);
      }
  }

  if(!$f){
      $photo_service = '';
  }
  include_once 'pdo.php';
  $req = $pdo->prepare('INSERT INTO services(titre_service, prix_service, id_artisan,photo_service) VALUES(?,?,?,?)' );
  $req->execute(array(
    htmlentities($_POST['titre_service']),
    htmlentities($_POST['prix_service']),
    $_SESSION['membre_id'],
    $photo_service
  ));
  if($req){
    $response_form_add_service = 'Le nouveau service que vous proposer a été ajouté au site';
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Association des plombiers du Benin</title>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="account.css">
    <link rel="shortcut icon" href="./images/artisans.png" type="image/x-icon">
  </head>
  <body>
  <?php include_once 'header.php' ?>
    <div class="account">
      <div class="actions">
        <a href="" class="action">Ajouter un service</a>
        <a href="" class="action">Modifier ma photo de profil</a>
        <a href="" class="action">Ajouter une photo de mes réalisations</a>
        <a href="" class="action">Publier une information à tous les plombiers inscrits</a>
        <a href="" class="action">Ajouter un service</a>
      </div>
      <div class="account-part profile">
        <div>
          <form action="set-photo-profil.php" method="post" id="form_new_photo_profil">
            <a href="#link-set-new-photo" id="link-set-new-photo">Changez ma photo de profil</a>
            <div class="">
              <div class="form_response_update_profil_photo"></div>
            </div>
            <div class="form_update">
              <input type="file" name="new_photo_profil" id="new_photo_profil">
              <button type="submit" id="set-new-photo-button" >Appliquez la nouvelle photo</button>
            </div>
          </form>
        </div>
        <img src="images/artisans/<?= empty($membre_actif['photo_identite']) ? 'profil-avatar.png' : $membre_actif['photo_identite'] ?>" alt="" class="photo_profil" id="photo_profil">
        <div class="profile__name"><?= $membre_actif['nom'] .' ' .$membre_actif['prenom'] ?></div>
        <div class="profile__tel"><?= $membre_actif['tel'] ?></div>
        <div class="profile__description">
            Je suis technicien hydraulicien, je suis disponible pour vous réalisez tous vos ouvrages d'assainissement ou d'assainissement d'eau
        </div>
      </div>
      
      <div class="account-part">
        <div class="account-part-part">
          <h4>Créez des services et fixer leur prix</h4>
          <form action="account.php" method="post" enctype="multipart/form-data">
            <?php if(!empty($response_form_add_service)): ?>
              <div class="response-form"><?= $response_form_add_service ?></div>
              <?php endif ?>
            <label for="">Décrivez votre service ici</label>
            <textarea name="titre_service" id="" placeholder="exemple : Pose de robinet "></textarea>
            <label for="">Prix du service</label>
            <input type="text" name="prix_service" placeholder="ex : 500">
            <label for="">Photo du service</label>
            <input type="file" name="photo_service" id="">
            <button type="submit">Créez le service</button>
          </form>
        </div>
        <div class="account-part-part">
          <h6>Ajouter les photos de vos réalisations ici</h6>
          <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="photos" id="" multiple>
          <button type="submit">ajouter les photos</button>
        </form>
        </div>
      </div>


      <div class="account-part">
        <div class="account-part-part">
          <form action="ajouter-produit-artisan.php" method="post" enctype="multipart/form-data">
            <h4>Ajouter des produits de plomberie ici</h4>
            <textarea name="description_produit" placeholder="Décrivez l'article que vous mettez en ligne ici, son nom, son prix etc..." id="" cols="30" rows="4"></textarea>
            <input type="file" name="photo_produit" id="">
            <button type="submit">Ajouter ce produit sur le site</button>
          </form>
        </div>
        <h4>Les méssages des nouveaux clients</h4>
        <div>03 clients ont éssayez de vous contactez</div>
          <div><a href="">Alphonso davies</a></div>
          <div><a href="">Kendrick lamar</a></div>
          <div><a href="">Jorge rr martin</a></div>
          <div><a href="">Spike jones</a></div>
          <form action="send-message.php?id_env=<?= $_SESSION['membre_id'] ?>" method="post" style="display: none;">
          <legend>envoyez un message a un membre</legend>
          <textarea name="contenu" id=""></textarea>
          <button type="submit">envoyer le message</button>
        </form>
      </div>
    </div>
    <?php include_once "footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="account.js"></script>
  </body>
</html>