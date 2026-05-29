

<?php
 
   include 'db_oop.php';
   include 'player_class_mysqli.php';

   $database = new Database();
   $conn = $database->connect();
   $player = new Player($conn);
   
   $id = $_GET['id'];
   
   $oneplayer = $player->readOne($id);

   if(isset($_POST['edit'])){
    $a = $_POST['name'];
    $b = $_POST['team'];
    $c = $_POST['country'];
    $player->update($id , $a , $b , $c );

    header('location: home_oop.php');
   }



   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_pdo</title>
    <link rel="stylesheet" href="../crud_other3.css">
</head>
<body>

    <form class="form" action="edit_oop.php?id=<?php echo $_GET['id']; ?>" method="post">
        <h1 style="text-align: center; margin:10px">UPDATE</h1>
        <input class="input-group" type="text" name="name" value="<?php echo $oneplayer['name']; ?>">
        <input class="input-group" type="text" name="team" value="<?php echo $oneplayer['team']; ?>">
        <input class="input-group" type="text" name="country" value="<?php echo $oneplayer['country']; ?>">
        <div style="text-align: center;">
            <button name="edit" type="submit" class="edit-btn" href="">Update</button>
            <a class="cancel-btn"  href="home_oop.php">Cancel</a> 
        </div>
    </form>
    
</body>
</html> 