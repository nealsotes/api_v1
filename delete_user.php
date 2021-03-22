<?php
require_once __DIR__.'./user_credential.php';


$user = new User();
//$data = json_decode(file_get_contents("php://input"));


try{
    $result = $user->getCredential();
    $itemCount = mysqli_num_rows($result);


    $user->setUserId($_GET["user_id"]);

    if($itemCount > 0){
        if($user->deleteCredential()){
            echo json_encode("User deleted.");
        }else{
            echo json_encode("Data could not be deleted");
        }
    }else{
        echo json_encode("No data to delete");
    }
}catch(Exception $ex){
    echo 'Message: '. $ex->getMessage();
}


?>