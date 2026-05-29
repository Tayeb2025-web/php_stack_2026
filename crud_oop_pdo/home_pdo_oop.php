
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4. CRUD → OOP + PDO</title>
    <link rel="stylesheet" href="../other3.css">
</head>

<body>

     <header>
          <p> 4. CRUD → OOP + PDO [still no restApi]</p>
     </header>

  <div class="container">

       <a id="add" href="add_pdo_oop.php">+ADD</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Team</th>
            <th>Country</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
      
        <?php
        include 'db_pdo_oop.php';
        include 'player_class_pdo.php';

        $database = new Database();
        $conn = $database->connect();

        $player = new Player($conn);
        $read = $player->read();

        foreach($read as $row) {

        ?>

        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['team']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><a class="edit-btn" href="./edit_pdo_oop.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a class="remove-btn" href="delete_pdo_oop.php?id=<?php echo $row['id']; ?>">Remove</a></td>
        </tr>
       <?php } ?>
    </table>

  </div>


</body>
</html>