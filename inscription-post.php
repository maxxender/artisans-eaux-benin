<?php
session_start();
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tel']) && !empty($_FILES['photo_identite']) && !empty($_POST['passe'])){
    
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['photo_identite']['name'], '.');
    if(in_array($extension,$extensions)){
        $taille_maxi = 3000000;
        $taille = $_FILES['photo_identite']['size'];
        if($taille < $taille_maxi)
        {
            $from = $_FILES['photo_identite']['tmp_name'];
            $fichier = $_POST['nom'].'_'. $_POST['prenom']. $_POST['tel'] . $extension;
            $f = move_uploaded_file($_FILES['photo_identite']['tmp_name'],'./images/artisans/'.$fichier);
        }
    }

    if(!$f){
        $photo_identite = '';
    }
    
    include_once 'pdo.php';

    $requete_verification = $pdo->prepare('SELECT id FROM membres WHERE tel = ?');
    $requete_verification->execute(array(
        str_replace(' ', '', htmlentities($_POST['tel']))
    ));
    $deja_enregistree = $requete_verification->fetch();
    if($deja_enregistree){
        $_SESSION['response_form'] = "Vous etes déja inscrits sur le site";
        header('location:./inscription.php');
        die();
    }

    $req = $pdo->prepare('INSERT INTO membres(nom,prenom,tel,photo_identite,passe,ville) VALUES(:nom,:prenom,:tel,:photo_identite,:passe,:ville)');
    $req->execute(array(
        'nom'=>htmlentities($_POST['nom']),
        'prenom'=>htmlentities($_POST['prenom']),
        'tel'=> str_replace(' ', '', htmlentities($_POST['tel'])),
        'passe'=> str_replace(' ', '', htmlentities($_POST['tel'])),
        'photo_identite'=>$photo_identite,
        'ville'=>htmlentities($_POST['ville'])
    ));
   
    $_SESSION['membre_id'] = $pdo->lastInsertId();
    header('location:./account.php');
}else{
    $_SESSION['response_form'] = "Vous devez entrez toutes les informations demandez ";
    header('location:./inscription.php');
}