<?php
$errors = [];
$ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
if(empty($_POST['service'])){
    $errors[] = "Vous n'avez choisi aucun service pour le moment";
}
if(empty($_POST['departement'])){
    $errors[] = "Vous devez définir le département dans lequel vous vous situé";
}
if(empty($_POST['ville'])){
    $errors[] = "Vous devez nous dire dans quel ville vous vous situé";
}
if(empty($_POST['contact'])){
    $errors[] = "Ajouté votre contact pour pouvoir etre joint par les hydrauliciens";
}
    if(empty($errors)){
        if($ajax){
            echo json_encode([
                'result'=>'success',
                'service'=> $_POST['service'],
                "errors"=> $errors,
                'message'=> "Les hydrauliciens du benin ont recu votre offre. Ils vous contacterons bientot"
            ]);
            header('Content-Type: application/json');
            http_response_code(200);
            die();
        }
      
    }else{
        if($ajax){
            echo json_encode($_POST);
            header('Content-Type: application/json');
            http_response_code(400);
            die();
        }
      
    }

