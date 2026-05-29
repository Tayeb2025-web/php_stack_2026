

<?php

  include 'db_oop.php';
  include 'player_class_mysqli.php';

  $id = $_GET['id'];
  $database = new Database();
  $conn = $database->connect();

  $player = new Player($conn);

  $player->delete($id);

  header('location:home_oop.php');
?>