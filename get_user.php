<?php 
require_once __DIR__.'./user_credential.php';
    
    $user = new User();
    $response = array();
     

    try{
     
        $result = $user->getCredential();
        $itemCount = mysqli_num_rows($result);
       

        if($itemCount > 0){
            $userArr = array();
            $userArr['user'] = array();
            $userArr['itemCount'] = $itemCount;
            
            while($row = mysqli_fetch_assoc($result)){
                extract($row);
                $e = array(
                    "id" => $user_id,
                    "username" => $user_name,
                    "password" => $user_password,
                    "email" => $user_email
                );
                array_push($userArr["user"],$e);
            }
            echo json_encode($userArr);
        }else{
            http_response_code(404);
            echo json_encode(
                array("message" => "No record found.")
            );
        }
        
    }catch(Exception $ex){
        echo "Message: ". $ex->getMessage();
    }
   // echo json_encode($response);
?>