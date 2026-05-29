

<!--  As mentioned alot we have three things in pdo:

        1. prepare (the query)
        2. bindParam(the parameters we mentioned in query)
        3. execute()

    # you also can skip bindParam and do it in execute too with array:
    $statement->execute([':id'=>$id , ...]);
         OR
        $statement->execute([$name , $team , $country , $id]);


-->

<?php 

  include 'db_pdo.php';
 
    $id =  $_GET['id'];

  $query = "select * from `player_info` where `id`=:id";
  $statement = $conn->prepare($query);
  $statement->execute([':id'=>$id]);
  $oneplayer = $statement->fetch(PDO::FETCH_ASSOC);

  if(isset($_POST['submit'])){
    
     $name = $_POST['name'];
     $team = $_POST['team'];
     $country = $_POST['country'];

     $query = "UPDATE `player_info` SET `name`=? , `team`= ? , `country`= ? where `id`= ? ";
     $statement = $conn->prepare($query);
    
     $statement->execute([$name , $team , $country , $id]);

     header('location:home_pdo.php');
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

    <form class="form" action="edit_pdo.php?id=<?php echo $_GET['id']; ?>" method="post">
        <h1 style="text-align: center; margin:10px">UPDATE</h1>
        <input class="input-group" type="text" name="name" value="<?php echo $oneplayer['name']; ?>">
        <input class="input-group" type="text" name="team" value="<?php echo $oneplayer['team']; ?>">
        <input class="input-group" type="text" name="country" value="<?php echo $oneplayer['country']; ?>">
        <div style="text-align: center;">
            <button name="submit" type="submit" class="edit-btn" href="">Update</button>
            <a class="cancel-btn"  href="home_pdo.php">Cancel</a> 
        </div>
    </form>
    
</body>
</html>