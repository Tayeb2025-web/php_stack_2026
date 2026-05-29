
<?php
   
      include 'db_raw.php';

      $delete_id = $_GET['id'] ;
      
      $query = "delete from `player_info` where `id` = '$delete_id'" ;
      $result = mysqli_query($conn , $query) ;

      header('location:home_raw.php?');

?>