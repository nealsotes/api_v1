<?php 
    require_once __DIR__.'./DBconnection.php';
    

    class User {
        private $_table = DB_TABLE;
        private $_db;
        private $_conn;
        private $_stmt;
        
        public $user_id;
        public $user_name;
        public $user_password;
        public $user_email;
        
        public function __construct() {
            $this->_db = Database::getInstance();
            $this->_conn = $this->_db->getConnection();
        }
        function setUsername($user_name){   
            $this->user_name = $user_name;
        }
        function setUserPassword($user_password){
            $this->user_password = $user_password;
        }

        function setUserEmail($user_email){ 
            $this->user_email = $user_email;
        }
        function setUserId($user_id){
            $this->user_id = $user_id;
        }
     
       
        //INSERT    
        function insertCredential(){
            $this->_stmt = $this->_conn->prepare("INSERT INTO user_credential(user_name, user_password, user_email) VALUES(?, ?, ?)");
            $this->_stmt->bind_param("sss", $this->user_name, $this->user_password, $this->user_email);
            return $this->_stmt->execute();
            
        }
        //READ
        function getCredential(){
            $sqlQuery = "SELECT * FROM ". $this->_table."" ;
            $stmt = mysqli_query($this->_conn,$sqlQuery);
            return $stmt;
        }
        //DELETE
        function deleteCredential(){
            $sqlQuery = "DELETE FROM " . $this->_table . " WHERE user_id = ?";
           // $stmt = mysqli_query($this->_conn,$sqlQuery);
            $stmt = $this->_conn->prepare($sqlQuery);
           //Bind
            $stmt->bind_param("i", $this->user_id);
            return $stmt->execute();
      
        }
                
        //UPDATE
        function updateCredential(){
            $sqlQuery = "UPDATE ".$this->_table ." SET user_name = ?, user_password = ?, user_email = ? WHERE user_id = ?";
            $stmt = $this->_conn->prepare($sqlQuery);
        
            //bind data
            $stmt->bind_param("sssi",$this->user_name,$this->user_password,$this->user_email,$this->user_id);
            return $stmt->execute();
        }
    }

?>