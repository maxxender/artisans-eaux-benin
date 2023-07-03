<?php
session_start();
include_once 'pdo.php';
if(!empty($_FILES['photo_produit'])){
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['photo_produit']['name'], '.');
    if(in_array($extension,$extensions)){
        $taille_maxi = 3000000;
        $taille = $_FILES['photo_produit']['size'];
        if($taille < $taille_maxi)
        {
            $from = $_FILES['photo_produit']['tmp_name'];
            $nom_photo_produit = $_SESSION['membre_id'].$_FILES['photo_produit']['name'] . $extension;
            $photo_produit = move_uploaded_file($_FILES['photo_produit']['tmp_name'],'./images/produits-artisans/'.$nom_photo_produit);
        }
    }

}
$req = $pdo->prepare('INSERT INTO produits_artisans (id_artisan, description_produit, photo_produit) VALUES (?, ?, ?) ');
$req->execute(array(
    $_SESSION['membre_id'],
    htmlentities($_POST['description_produit']),
    $nom_photo_produit
));
header('location:./account.php');