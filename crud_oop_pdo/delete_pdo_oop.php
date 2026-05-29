

<?php

   include 'db_pdo_oop.php';
   include 'player_class_pdo.php';

   $id = $_GET['id']; 
   $database = new Database();
   $conn = $database->connect();

   $player = new Player($conn);

   $player->delete($id);

   header('location:home_pdo_oop.php');
  
?>