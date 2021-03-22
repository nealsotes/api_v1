<?php
require_once __DIR__.'./user_credential.php';

$user = new User();

$data = json_decode(file_get_contents("php://input"));
$user->user_id = $data->id;

//user value
$user->user_name = $data->username;
$user->user_password = $data->password;
$user->user_email = $data->email;

if($user->updateCredential()){
    echo json_encode("User data updated");
}else{
    echo json_encode("Data could not be updated");
}

?>