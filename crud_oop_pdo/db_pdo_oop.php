
<?php
 
 class Database {

  private $dbname = 'players';
  private $password = '';
  private $username = 'root';

  public $conn;

  public function connect () {
  
  $this->conn = new PDO("mysql:host=localhost;dbname={$this->dbname}" , $this->username , $this->password);

    return $this->conn;
  }
 
 }
   
?>