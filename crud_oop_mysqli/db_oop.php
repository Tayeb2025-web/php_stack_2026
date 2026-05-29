
<?php

class Database {

    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "players";

    public $conn;

    public function connect() {

        $this->conn = new mysqli($this->server,$this->username,$this->password,$this->dbname);

        return $this->conn;
    }
}