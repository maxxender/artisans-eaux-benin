<?php session_start();
include_once 'ville-benin.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Plombiers du Benin - inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="inscription.css" />
    <link rel="shortcut icon" href="./images/artisans.png" type="image/x-icon">
  </head>
  <body>
    <?php include_once 'header.php' ?>

    <div class="container-inscription-page">
    <form class="form-inscription" method="post" action="inscription-post.php" enctype="multipart/form-data">
        <div class="form-response"><?= empty($_SESSION['response_form']) ? '' : $_SESSION['response_form']?></div>
            <h6>Inscrivez vous à l'association béninois des métiers de l'eau</h6>
        <div class="">
            <span class="response-form"><?= empty($response_form) ? '' : $response_form ?></span>
        </div>
        <div class="">
            <label for="text" class="col-lg-2 control-label">Nom : </label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="">
            <label for="text" class="col-lg-2 control-label">Prénom : </label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="">
            <label for="textarea" class="">Tél : </label>
            <input type="tel" class="" id="tel" name="tel">
        </div>
        <div class="">
            <label for="text" class="">Photo d'identité : </label>
            <input type="file" class="" id="text" name="photo_identite">
        </div>
        <div class="">
            <label for="select" class="col-lg-2 control-label">Ville de résidence: </label>
            <select id="ville" class="form-control" name="ville">
                <?php foreach($villes as $ville): ?>
                  <option value="<?= $ville ?>"><?= $ville ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="">
            <label for="text" class="col-lg-2 control-label">Mot de passe : </label>
            <input type="password" class="form-control" id="text" name="passe">
        </div>
        <div class="">
            <button class="">Validder mon inscription</button>
        </div>
    </form>

    </div>
    
    <?php include_once 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>