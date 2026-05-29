
<?php

   include 'db_pdo_oop.php';
   include 'player_class_pdo.php';

   $database = new Database();
   $conn = $database->connect();

   $player = new Player($conn);
 
   if(isset($_POST['add'])){
     
   $name = $_POST['name'];
   $team = $_POST['team'];
   $country = $_POST['country'];

   $player->insert($name , $team , $country);

   header('location:home_pdo_oop.php');
   exit;

   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <link rel="stylesheet" href="../other3.css">
</head>
<body>


    <form class="form" action="add_pdo_oop.php" method="post">
        <h1 style="text-align: center; margin:10px">ADD</h1>
        <input class="input-group" type="text" name="name" >
        <input class="input-group" type="text" name="team" >
        <input class="input-group" type="text" name="country" >
        <div style="text-align: center;">
            <button name="add" type="submit" class="edit-btn" href="">Add</button>
            <a class="cancel-btn"  href="home_pdo_oop.php">Cancel</a> 
        </div>
    </form>
    


</body>
</html>