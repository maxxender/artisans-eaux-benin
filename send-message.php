<?php
session_start();
var_dump($_POST);
foreach($_POST['recepteur'] as $recepteur){
    echo $recepteur;
}

if(!empty($_GET['id_env'])){
    include_once 'pdo.php';
    foreach($_POST['recepteur'] as $recepteur){
        $req = $pdo->prepare('INSERT INTO messages(contenu,id_envoyeur, id_receveur) VALUES(:contenu,:id_envoyeur,:id_receveur)');
        $res = $req->execute(array(
            'contenu'=>htmlentities($_POST['contenu']),
            'id_receveur'=>$recepteur,
            'id_envoyeur'=>$_SESSION['membre_id']
        ));
    }
        header('location:./account.php');
}else{
    header('location:./account.php');
}