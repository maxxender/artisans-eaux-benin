<?php
session_start();
if(empty($_SESSION['membre_id'])){
  header('location:./index.html');
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

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="account.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h1><img src="Nouveau dossier/images/artisans.png" class="logo" alt=""></h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Nos plombiers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nos services
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Adduction d'eau</a></li>
                <li><a class="dropdown-item" href="#">Assainissement</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Formation en plomberie</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">Connexion</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cherchez un plombier pour un service" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">faire une recherche</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="account">

      <div class="account-part profile">
        <img src="images/<?= $membre_actif['photo_identite'] ?>" alt="" class="profile__identite">
        <div class="profile__name"><?= $membre_actif['nom'] .' ' .$membre_actif['prenom'] ?></div>
        <div class="profile__tel"><?= $membre_actif['tel'] ?></div>
        <div class="profile__description">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor omnis, provident sapiente nobis pariatur,
           obcaecati eius laudantium maiores 
          perspiciatis error illo, itaque assumenda animi voluptatum quod! Ex cum dicta labore.
        </div>
      </div>

      <div class="account-part">
        <div>Vous avez 03 nouveaux messages</div>
        <?php foreach($membres as $membre):?>
          <div><a href="getM-messages-by-id?id=<?= $membre['id'] ?>"><?= $membre['nom'] .' ' .$membre['prenom'] ?> (03)</a> </div>
          <?php endforeach ?>
      </div>

      <div class="account-part">
        <legend>Ajouter des photos à ma page</legend>
        <form action="" method="post">
          <input type="file" name="photos" id="" multiple>
          <button type="submit">ajouter les photos</button>
        </form>
      </div>

      <div class="account-part">
        <form action="send-message.php?id_env=<?= $_SESSION['membre_id'] ?>" method="post">
          <legend>envoyez un message a un membre</legend>
          <textarea name="contenu" id=""></textarea>
          <select name="recepteur[]" id="" multiple="multiple">
            <option value="">Tous les membres</option>
            <?php foreach($membres as $membre): ?>
              <option value="<?= $membre['id'] ?>"><?= $membre['nom'] .' '.$membre['prenom'] ?></option>
            <?php endforeach ?>
          </select>
          <button type="submit">envoyer le message</button>
        </form>
        <form action="">
          <legend>envoyez message a tous les membres</legend>
        </form>
      </div>
    </div>

    <footer>
      <a href="deconnexion.php">deconnexion</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>