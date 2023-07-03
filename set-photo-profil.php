<?php
session_start();
if(!empty($_SESSION['membre_id']) & !empty($_FILES['new_photo_profil'])){
    include_once 'pdo.php';
    $req = $pdo->prepare('UPDATE membres SET photo_identite = ? WHERE id = ?');
    $req->execute((array(
        $_FILES['new_photo_profil']['name'],
        $_SESSION['membre_id']
    )));
    move_uploaded_file($_FILES['new_photo_profil']['tmp_name'], './images/artisans/'.$_FILES['new_photo_profil']['name']);
    //$_SESSION['form_response_update_profil_photo'] = "Votre photo de profil a été mis à jour";
    //header('location:./account.php');
    echo json_encode(['Votre photo de profil a été mis à jour']);
    header('Content-Type: application/json');
    http_response_code(200);
}else{
    echo json_encode(["Une erreur s'est produite. Veuillez réessayez"]);
    header('Content-Type: application/json');
    http_response_code(400);
}
