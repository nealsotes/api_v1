<?php 
require_once __DIR__.'./DBconfig.php';

  class Database {
      private $_connection;
      private static $_instance;
      private $_host = DB_HOST; 
      private $_user = DB_USER;
      private $_pw = DB_PASS;
      private $_db = DB_NAME;
      

        public function __construct() {
          $this->_connection = new mysqli($this->_host, $this->_user, $this->_pw, $this->_db);
          

      }

      public function getConnection(){
          return $this->_connection;
      }
      //singleton function
      public static function getInstance(){
          if(!self::$_instance){
              self::$_instance = new self();
          }
          return self::$_instance;
      }
      private function __clone(){}
  }


?>