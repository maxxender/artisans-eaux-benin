<?php
session_start();
if(!empty($_POST['tel']) && !empty($_POST['passe'])){
    include_once 'pdo.php';
    $req = $pdo->prepare('SELECT id FROM membres WHERE tel = ? AND passe = ?');
    $req->execute(array(
        htmlentities($_POST['tel']),
        htmlentities($_POST['passe'])
    ));
    $membre =  $req->fetch();
    if($membre){
        $_SESSION['membre_id'] = $membre['id'];
        header('location:./account.php');
    }else{
        $_SESSION['response_form'] = "Numéro de télephone ou mot de passe incorrect";
        header('location:./connexion.php');
    }
}else{
    $_SESSION['response_form'] = "Les champs du formulaire sont vides. Veuillez les remplir et réessayez";
    header('location:./connexion.php');
}