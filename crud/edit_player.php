

<?php

include __DIR__ . '/../db.php';

$id = $_GET['id'];

if(isset($_POST['edit'])) {

    $name = $_POST['name'];
    $team = $_POST['team'];
    $country = $_POST['country'];
    $image = $_POST['image'];

    $query = "UPDATE `player_info` SET `name` ='$name', `team`='$team' , `country`='$country' , `image`='$image' where `id` = '$id'  ";
    $result = mysqli_query($conn , $query);

    header('location:../home.php');

}

$readquery = "SELECT * from  `player_info` where `id` ='$id' ";
$readresult = mysqli_query($conn , $readquery);
$row = mysqli_fetch_assoc($readresult);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../tailwind/src/output.css">
  <title>Edit player</title>

  <style>
    body {
      background-color: rgb(200, 222, 100);
      color: white;
    }

    .h1{
      text-align: center;
      font-size: x-large;
    }
    .container {
      max-width: 600px;
      margin-right: auto;
      margin-left: auto;
      padding: 3px;
      margin-top: 40px;
      border-radius: 6px;
      padding: 10px;
    }
    
    .form {
      display: flex;
      flex-direction: column;
      background-color: orange;
      width: 400px;
      height: 400px;
      border: 1px solid white;
      justify-content: center;
      margin: auto;
      gap: 20px;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 10px 10px 10px 10px rgb(200, 222, 100) ;
    }

    .inputdiv{
      display: flex;
      gap: 5px;
    }
    .input{
      border: 1px solid gray;
      padding: 6px;
      width: 100%;
      border-radius: 6px;
    }
    .btn{
      padding: 7px 20px;
      border-radius: 5px;
      color:white;

    }
    .cancel{
      background-color: gray;
    }
    .add{
      background-color: blue;
    }
    .buttons{
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    label{
          display: inline-block;
          width: 90px;
    }

  </style>


</head>

<body class="min-h-screen">


  <div class="container">

  <form class="form" action="edit_player.php?id=<?php echo $id; ?>" method="post">
  <h1 class="h1">Add Player</h1>
      <div class="inputdiv">
        <label>Name</label>
        <input class="input" type="text" placeholder="name..." value="<?php echo $row['name']; ?>"  name="name">
      </div>
      <div class="inputdiv">
        <label>Team</label>
        <input class="input" type="text" placeholder="team" value="<?php echo $row['team'];?>" name="team">
      </div>

      <div class="inputdiv">
        <label>Country</label>
        <input class="input" type="text" placeholder="country" value="<?php echo $row['country']; ?>" name="country">
      </div>

      <div class="inputdiv">
        <label>Image</label>
        <input class="input" type="text" placeholder="image" name="image" value="<?php echo $row['image'];?>">
      </div>
      <div class="buttons">
        <button class="btn add" name="edit" type="submit">Update</button>
        <a class="btn cancel" href="../home.php">Cancel</a>
      </div>
    </form>

  </div>

</body>

</html>