

<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "db.php";

$method = $_SERVER['REQUEST_METHOD'];

        if ($method == "GET") {
            $query = "SELECT * FROM player_info" ;
            $statement = $conn-> prepare($query);
            $statement->execute();

            $players = [];

           $players = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($players);

        }


        if ($method == "POST") {
            $data = json_decode(file_get_contents("php://input"), true);

            $name = $data['name'];
            $team = $data['team'];
            $country = $data['country'];

            $query = "INSERT INTO player_info (name, team, country) VALUES (? , ? , ?)";
            $statement = $conn->prepare($query);
            $statement ->execute([$name , $team , $country]);

            echo json_encode([
                "success" => true,
                "message" => "Player added"
            ]);
        }


        if ($method == "PUT") {
            $data = json_decode(file_get_contents("php://input"), true);

            $id = $data['id'];
            $name = $data['name'];
            $team = $data['team'];
            $country = $data['country'];

             $query = "UPDATE player_info SET name=?, team=?, country=? WHERE id=?";
             $statement = $conn->prepare($query);
             $statement ->execute([$name , $team , $country , $id]);

            echo json_encode([
                "success" => true,
                "message" => "Player updated"
            ]);
        }


        if ($method == "DELETE") {
            $data = json_decode(file_get_contents("php://input"), true);

            $id = $data['id'];

            $query = "DELETE FROM player_info WHERE id=?";
            $statement = $conn->prepare($query);
            $statement ->execute([$id]);

            echo json_encode([
                "success" => true,
                "message" => "Player deleted"
            ]);
        }

?>