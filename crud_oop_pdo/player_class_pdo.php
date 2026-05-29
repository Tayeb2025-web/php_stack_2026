

<?php

 class Player {

   private $conn;
   private $table = 'player_info';

   public function __construct($db) {
        $this->conn = $db;
    }
   
     public function read(){

     $query = "SELECT * FROM {$this->table}";
     $statement = $this->conn->prepare($query);
     $statement->execute();

     return $statement->fetchall(PDO::FETCH_ASSOC);
     }

     public function read_one($id){

     $query = "SELECT * FROM {$this->table} where id = :id";
     $statement = $this->conn->prepare($query);
     $statement->bindParam(':id' , $id);
     $statement->execute();

     return $statement->fetch(PDO::FETCH_ASSOC);
     }

     public function insert($name , $team , $country){

     $query = "INSERT INTO {$this->table} (name , team , country) values(:name ,:team ,:country) ";
     $statement = $this->conn->prepare($query);
     $statement->execute([':name'=>$name , ':team'=>$team , ':country'=>$country ]);
        return $statement;
     }

     public function update($id ,$name ,$team ,$country){
        $query = "UPDATE {$this->table} SET name =:name , team =:team , country =:country where id =:id";
        $statement = $this->conn->prepare($query);
        $statement->execute([':name'=>$name , ':team'=>$team , ':country'=>$country , ':id'=>$id ]);
        return $statement;

     }

     public function delete($id){
        $query = "DELETE FROM {$this->table} where `id`=:id";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':id' , $id);
        $statement->execute();

        return $statement;
     }
     
 }

?>