<?php
session_start();
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_POST['ville_residence'])){
    include_once 'pdo.php';
    $req = $pdo->prepare('INSERT INTO contact_formation(nom,prenom,tel,ville_residence) VALUES(?, ?, ?, ?)');
    $req->execute(array(
        htmlentities($_POST['nom']),
        htmlentities($_POST['prenom']),
        htmlentities($_POST['tel']),
        htmlentities($_POST['ville_residence'])
    ));
    $_SESSION['form_response'] = "Merci ! Nous avons recu votre demande d'inscription à nos formation. Nous vous contacterons bientot";
    header('location:./');
}else{
    header('location:./#contact-formation');
    $_SESSION['form_response'] = "Vous devez fournir tous les informations demandées";
}