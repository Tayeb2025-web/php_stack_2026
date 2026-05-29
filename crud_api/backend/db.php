

<?php 

  $username = 'root';
  $password = '';
  $dbname = 'players';

  $conn = new PDO('mysql:host=localhost; dbname='.$dbname , $username , $password);
?>