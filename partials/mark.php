<!--
  
   *Did a GET and isset and 4 security code to secure the input 
   *first is isset
   *second is !== null meaning basicly nothing
   *third checking if its empty
   *the last is checking if its a number. 
   *the $id is task done
   *update the database and set the column completed to 1 WHERE the id itself                            *its a LIMIT of 1 so it wont effect more than just that one. 
   *User gets located to the index.php. 
   *Elseif you do the 4 security again but with undone, change it to 0 instead of 1.
   *if none of this happens the else will be that the user get redirected

   -->
   

   <?php 
    require_once 'database.php';

    if(isset($_GET['task_done']))  {
        $id = $_GET['task_done'];
        $query = $pdo->query("UPDATE todo_PHP SET completed = 1 WHERE id=".$id);
        header("Location: ../index.php");
    } elseif (isset($_GET['task_undone']))  {
        $id = $_GET['task_undone'];
        $query = $pdo->query("UPDATE todo_PHP SET completed = 0 WHERE id=".$id);
        header("Location: ../index.php");
    } else {
        // The user tried accessing the page without using the right interface. Gets redirected.
        header("Location: ../index.php");
    }
?>
    
    

