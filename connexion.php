<?php
session_start();
if(!empty($_POST['tel']) && !empty($_POST['passe']))
{
    
    include_once 'pdo.php';
    $req = $pdo->prepare('SELECT id FROM membres WHERE tel = ? AND passe  = ?');
    $req->execute(array(
        htmlentities($_POST['tel']),
        htmlentities(sha1(sha1(sha1($_POST['passe']))))
    ));

    $res = $req->fetch();
    if(empty($res)){
        $response_form = 'tel ou mot de passe incorrect 0';
    }else{
        $membre_id = $res['id'];
        $_SESSION['membre_id'] = $membre_id;
        header('location:/account.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion - artisans eaux benin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="connexion.css">
    <link rel="shortcut icon" href="./images/artisans.png" type="image/x-icon">
  </head>
  <body>
    <?php include_once 'header.php' ?>
    <div class="connexion-form">
        <form action="connexion-post.php" method="post">
            <div class="response-form" style="color: red;margin:15px 0"><?= empty($_SESSION['response_form']) ? ' ' : $_SESSION['response_form'] ?></div>
            <label for="">Numéro de telephone</label>
            <input type="text" name="tel">
            <label for="">Mot de passe</label>
            <input type="password" name="passe">
            <button type="submit">connexion</button>
        </form>
    </div>
    <?php include_once 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/dist/js/jquery-3.3.1.js"></script>
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="ville.js"></script>
 
  </body>
</html>