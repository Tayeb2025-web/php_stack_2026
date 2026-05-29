

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2. CRUD → PDO</title>
    <link rel="stylesheet" href="../crud_other3.css">
</head>

<body>

     <header>
          <p>2. CRUD → PDO [still no oop & no restApi] </p>
     </header>

  <div class="container">

       <a id="add" href="add_pdo.php">+ADD</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Team</th>
            <th>Country</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>

        <?php
             include 'db_pdo.php';

             $query = "select * from `player_info`";
             $statement = $conn->prepare($query);
             $statement->execute();

             $player_data = $statement->fetchAll(PDO::FETCH_ASSOC);

             foreach($player_data as $row) {

        ?>

        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['team'];  ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><a class="edit-btn" href="./edit_pdo.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a class="remove-btn" href="./delete_pdo.php?id=<?php echo $row['id']; ?>">Remove</a></td>
        </tr>
  <?php } ?>
      
    </table>

  </div>



</body>
</html>