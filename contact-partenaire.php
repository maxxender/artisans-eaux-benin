<?php
session_start();
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_POST['nom_societe'])){
    include_once 'pdo.php';
    $req = $pdo->prepare('INSERT INTO contact_partenaire(nom,prenom,tel,nom_societe) VALUES(?, ?, ?, ?)');
    $req->execute(array(
        htmlentities($_POST['nom']),
        htmlentities($_POST['prenom']),
        htmlentities($_POST['tel']),
        htmlentities($_POST['nom_societe'])
    ));
    $_SESSION['form_contact_partenaire_response'] = "Votre demande de partenariat à été enregistrez. Nous vous contacterons bientot";
    header('location:./#form-contact-partenaire');
}else{
    $_SESSION['form_contact_partenaire_response'] = "Vous devez entrez toutes les informations demandées.";
    header('location:./#form-contact-partenaire');
}