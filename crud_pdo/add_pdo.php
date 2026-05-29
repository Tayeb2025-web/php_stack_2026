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

   if(isset($_POST['add'])){

     $name = $_POST['name'];
     $team = $_POST['team'];
     $country = $_POST['country'];

     $query = "INSERT INTO `player_info` (`name`, `team` , `country`) Values (? , ? , ?)";
     $statement = $conn->prepare($query);

    $statement->bindParam(1 , $name);
    $statement->bindParam(2 , $team);
    $statement->bindParam(3 , $country);

     $statement->execute();

     header('location:home_pdo.php');


   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <link rel="stylesheet" href="../crud_other3.css">
</head>
<body>


    <form class="form" action="add_pdo.php" method="post">
        <h1 style="text-align: center; margin:10px">ADD</h1>
        <input class="input-group" type="text" name="name" >
        <input class="input-group" type="text" name="team" >
        <input class="input-group" type="text" name="country" >
        <div style="text-align: center;">
            <button name="add" type="submit" class="edit-btn" href="">Add</button>
            <a class="cancel-btn"  href="home_pdo.php">Cancel</a> 
        </div>
    </form>
    


</body>
</html>