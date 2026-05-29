
<?php

class Player {

    private $conn;
    private $table = "player_info";

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ ALL
    public function read() {

        $query = "SELECT * FROM {$this->table}";

        $result = $this->conn->query($query);

        return $result;
    }

    // READ ONE // used in edit page to put a particular player data in inputs
    public function readOne($id) {

        $query = "SELECT * FROM {$this->table} WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // INSERT
    public function insert($name, $team, $country) {
 
        $query = "INSERT INTO {$this->table} (name, team, country)
                  VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("sss", $name, $team, $country);

        return $stmt->execute();
    }

    // UPDATE
    public function update($id, $name, $team, $country) {

        $query = "UPDATE {$this->table}
                  SET name = ?, team = ?, country = ?
                  WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("sssi", $name, $team, $country, $id);

        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {

        $query = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();



        /* Don't get it wrong its mysqli ok not pdo
        
        pdo    => bindParam() or bindValue()
        mysqli => bind_param()
        "s" => string  "i" => integer
         ? for mysqli  :id for pdo

         prepare() & execute() => are same for both(mysqli , pdo)🙂

         # or if you want to write it totally by old mysqli:👇

         public function delete($id) {
            $query = "DELETE FROM {$this->table} WHERE id = '$id'"; 
            return $this->conn->query($query);
            }
                      */
    }
}

?>