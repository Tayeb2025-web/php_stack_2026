
<?php

      include 'db_pdo.php';
      
      $id = $_GET['id'];

      $query = "delete from `player_info` where `id` = :id";
      $statement = $conn->prepare($query);
      $statement->bindParam(':id' , $id);
      $statement->execute();
      
      header('location:home_pdo.php');
      
      ?>




      
/**  As mentioned alot we have three things in pdo:

1. prepare (the query)
2. bindParam(the parameters we mentioned in query)
3. execute()
  
      # you also can skip bindParam and do it in execute too with array:
        $statement->execute([':id'=>$id , ...]);
        
        */

  /** What the hell is this bindParam: 😐
     we can pass parameter ways and all are the same doing

 one(?)  $query ="UPDATE tbname SET name = ? , team = ? where id =?";
        |_ for type we put 's' for string & 'i' for integer Ex) $statement->bindParam('ssi' , $name , $team , $id);
        |_ not considering type just put number Ex) $statement->bindParam(1 , $name);
                                                    $statement->bindParam(2 , $team);
                                                    $statement->bindParam(3 , $id);
          or screw the bindParam do through the execute() with an array inside:
             $statement->execute([]);
          


 two(:paramter) $query ="UPDATE tbname SET name = :name , team =:team where id =:id";
                EX) $statement->bindParam(':name' , $name);
                    $statement->bindParam(':team' , $team);
                    $statement->bindParam(':id' , $id);
            or screwing the bindParam:
             $statement->execute(['name'=>$name, 'team'=>$team, 'id'=>$id]);
              

        */