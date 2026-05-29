

<?php
        include 'db_pdo_oop.php';
        include 'player_class_pdo.php';

   $database = new Database();
   $conn = $database->connect();
   
   $player = new Player($conn);
   
   $id = $_GET['id'];

   $oneplayer = $player->read_one($id);
 
   if(isset($_POST['edit'])) {
    $name = $_POST['name'];
    $team = $_POST['team'];
    $country = $_POST['country'];

    $player->update($id, $name , $team , $country);

    header('location: home_pdo_oop.php');
    exit;
   }
   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../crud_other3.css">
</head>
<body>

    <form class="form" action="edit_pdo_oop.php?id=<?php echo $_GET['id']; ?>" method="post">
        <h1 style="text-align: center; margin:10px">UPDATE</h1>
        <input class="input-group" type="text" name="name" value="<?php echo $oneplayer['name']; ?>">
        <input class="input-group" type="text" name="team" value="<?php echo $oneplayer['team']; ?>">
        <input class="input-group" type="text" name="country" value="<?php echo $oneplayer['country']; ?>">
        <div style="text-align: center;">
            <button name="edit" type="submit" class="edit-btn" href="">Update</button>
            <a class="cancel-btn"  href="home_pdo_oop.php">Cancel</a> 
        </div>
    </form>
    
</body>
</html>