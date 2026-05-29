

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1. CRUD → MySqli</title>
    <link rel="stylesheet" href="../crud_mysqli.css">
    <style>
            
            body{
                margin: 0;
                padding: 0;
            }
header{    
    background: white;
    color: black;
    padding: 15px 30px;
    display: flex;
    justify-content: center;
    border-radius: 0 0 10px 20px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    position: sticky;
    top: 0;
    font-size: xx-large;
    
}
    </style>

</head>
<body>

<header>
    <p>1. CRUD → MySqli [no PDO no OOP no RestApi]</p>
</header>

<div class="container">
    <div class="top-bar">
        <div>
            <h1>Players List</h1>
        </div>

        <a href="add_raw.php" class="add-btn">+ Add Player</a>
    </div>

    <div class="table-wrapper">

        <ul class="table-header">
            <li>Image</li>
            <li>Name</li>
            <li>Team</li>
            <li>Country</li>
            <li>Edit</li>
            <li>Delete</li>
        </ul>
 
        <?php 
            include 'db_raw.php';
            $query = "select * from `player_info`";
            $result = mysqli_query($conn , $query);
          
            while( $row = mysqli_fetch_assoc($result)) {  
        ?>

        <ul class="table-row">

            <li class="name">
                <?php echo $row['name']; ?>
            </li>

            <li class="muted">
                <?php echo $row['team']; ?>
            </li>

            <li class="muted">
                <?php echo $row['country']; ?>
            </li>

            <li>
                <a href="edit_raw.php?id=<?php echo $row['id']; ?>" class="edit-btn">
                   Edit
                </a>
            </li>

            <li>
                <a href="delete_raw.php?id=<?php echo $row['id']; ?>" class="delete-btn">
                   Delete
                </a>
            </li>
        </ul>

        <?php } ?>

    </div>
</div>

</body>
</html>