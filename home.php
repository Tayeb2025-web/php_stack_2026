

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link rel="stylesheet" href="tailwind/src/output.css">
</head>

<body class="min-h-screen bg-slate-950 text-white p-4">

    <div>
        <a href="./login/sign_in.php">Sign_in</a>
        <a href="./login/login.php">Login</a>
    </div>

   <div class="max-w-[900px] mx-auto mt-10 rounded-2xl border border-white/10 bg-slate-900 shadow-2xl shadow-black/40 overflow-hidden">
        <div class="flex items-center justify-between p-6 border-b border-white/10">
            <div>
                <h1 class="text-2xl font-bold">Players List</h1>
            </div>

            <a href="./crud/add_player.php" 
               class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-xl font-medium transition">
               + Add Player
            </a>
        </div>

        <div class="overflow-x-auto">

            <ul class="grid grid-cols-6 gap-4 px-6 py-4 bg-slate-800 text-slate-300 font-semibold text-sm">
                <li>Image</li>
                <li>Name</li>
                <li>Team</li>
                <li>Country</li>
                <li>Edit</li>
                <li>Delete</li>
            </ul>

            <?php 
                include 'db.php';
                $query = "select * from `player_info`";
                $result = mysqli_query($conn , $query);
              
                while( $row = mysqli_fetch_assoc($result)) {  
            ?>

            <ul class="grid grid-cols-6 gap-4 items-center px-6 py-4 border-b border-white/10 hover:bg-slate-800/70 transition">
                <li class="text-slate-300">
                    <?php echo $row['image']; ?>
                </li>

                <li class="font-medium">
                    <?php echo $row['name']; ?>
                </li>

                <li class="text-slate-300">
                    <?php echo $row['team']; ?>
                </li>

                <li class="text-slate-300">
                    <?php echo $row['country']; ?>
                </li>

                <li>
                    <a href="./crud/edit_player.php?id=<?php echo $row['id']; ?>" 
                       class="inline-block  bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-sm font-medium transition">
                       Edit
                    </a>
                </li>

                <li>
                    <a href="./crud/remove_player.php?id=<?php echo $row['id']; ?>" 
                       class="inline-block bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm font-medium transition">
                       Delete
                    </a>
                </li>
            </ul>

            <?php } ?>

        </div>

   </div>

</body>
</html>