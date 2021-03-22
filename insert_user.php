<?php 
require_once __DIR__.'./user_credential.php';
    
    $user = new User();
    $response = array();
     

    try{
        $user->setUsername($_POST["user_name"]);
        $user->setUserPassword($_POST["user_password"]);
        $user->setUserEmail($_POST["user_email"]);
        $result = $user->insertCredential();

        if($result > 0){
            $response["success"] = 1;
            $response["message"] = "One record successfully saved!";
        }else{
            $response["success"] = 0;
            $response["message"] = "Could not save!";
        }

    }catch(Exception $ex){

    }
    echo json_encode($response);
?>