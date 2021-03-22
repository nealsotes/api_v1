<?php
require_once __DIR__.'./user_credential.php';

$user = new User();



try{
    $user->setUserId($_POST['user_id']);

    //user value
    $user->setUsername($_POST['user_name']);    
    $user->setUserPassword($_POST['user_password']);
    $user->setUserEmail($_POST['user_email']);

    if($user->updateCredential()){
        echo json_encode("User data updated");
    }else{
        echo json_encode("Data could not be updated");
    }
}catch(Exception $ex){
    echo 'Message: '. $ex->getMessage();
}

?>