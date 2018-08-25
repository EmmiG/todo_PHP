<?php 

//Start a session on both add.php and index.php so that for instance variables will exist on both pages and be able to communicate. Since the variables will be stored inside the SESSION superglobal

session_start();

?>
  
  <?php 

  /* First connect to DB to be able to retrieve informations
  * Then get all tasks from todo_php table
  *WHERE I select the column completed in my database, the $undone_data will have 0 and the $done_data will have 1. In the database it will do the change from 0 to 1 and the other way around depending if the user want to mark it as done or unmark it again to become an unfinished task again. 
  * Finally store the data as objects in $undone_data to use it in the body also make it with $done_data
* Order the database ids in DESC order so that the latest task will be at the top of the website
*/
  require_once 'partials/database.php';

  $query = $pdo->query("SELECT * FROM todo_php WHERE completed = 0 ORDER BY id DESC");
  $query->execute();
  $undone_data = $query->fetchAll();

  
  $query = $pdo->query("SELECT * FROM todo_php WHERE completed = 1 ORDER BY id DESC");
  $query->execute();
  $done_data = $query->fetchAll();


 // Delete task 
/* 
* Variable delete_task store in $id via GET method when click on X.
* Delete task with value stored in $id then redirect on the same page to reload and clean the task
* User will DELETE FROM the database which is named todo_php
* WHERE in the id column in the databse itself = the $id
* I took out a LIMIT so that just one will be deleted at once, don't want multiples task to be deleted if someone typed several task id in the URL. Only want ONE id to be deleted at once, meaning only the first (or last) variable will have an effect in the script 
* Location for the user to get back to is the index.php page
*/

if(isset($_GET['delete_task']))  {
    $id = $_GET['delete_task'];
    $query = $pdo->query("DELETE FROM todo_php WHERE id=".$id." LIMIT 1");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Todo PHP and MYSQL</title>
</head>
<body>

<div id="heading">
  <h1>Todo PHP MYSQL</h1>
</div>


<form method="POST" action="partials/add.php" method="post">

<!-- 
*Since you now have your variable with its content inside the session superglobal, you need to be able to read it. 
*Now you're saying "whenever a variable called errors exists in the session superglobal, do what follows."
 -->
 <?php if(isset($_SESSION['errors'])) { ?> 
 
 <!-- 
 *You now have a variable that exists and has something in it. Which means, whenever the variable will be there, the display message will be there for the user to see. 
 *You said "if the variable isset, echo it here" and since you've set it on the add.php page : It is. 
 
 -->
 
  <p id="task_error"><?= $_SESSION['errors']; ?>
    <?php unset($_SESSION['errors']); ?>
  
  </p>
  
<?php } ?>


 <!-- If the user will add the task sucessfully this PHP code will happen  -->
 
  <?php if(isset($_SESSION['taskAdded'])) { ?> 
 
 
  <p id="task_added"><?= $_SESSION['taskAdded']; ?>
    <?php unset($_SESSION['taskAdded']); ?>
  
  </p>
  
<?php } ?>


 
  <input type="text" name="task" class="task_input">
  <input type="submit" class="task_button" name="submit" value="Add task">
</form>

<div id="todo_list">
  <div>
    <p id="task_paragraph">Task</p>
    <p id="delete_or_mark_as_done">Action</p>
  </div>
  
 

 <!-- undone data -->
 
  <?php
    /* 
    *Use of foreach ($undone_data is an array of objects) and object written syntax to retrieve id and title :
    *For each items found (result found), display its id and its title using the short term for echo in php
    *using the $undone_data here and doing a foreach loop
    */
    
    foreach ($undone_data as $task) {?>
      <div class="undone_database_container">
        <p id="task_title"><?=$task->title?>
        </p>
         <div id="undone_button_container">
        
       
         <p class="task_done_todo">
        
        <a href="partials/mark.php?task_done=<?=$task->id?>" class="done_button">Mark as done</a>
        
       
        </p>
        
         <p class="delete_task">
        <!-- Here I connected to the $_GET['delete_task'] and that it will be the id it takes away when you press the X button. When you have taken away the id it will delete all --> 
        <a href="index.php?delete_task=<?=$task->id?>" class="delete_button">X</a>
        </p>
        </div> <!-- undone_button_container-->
        
      </div> <!-- undone_database_container-->
  <?php } ?>
  
  

  
  <div id="clear"></div>
  
  <!-- done data -->
  
  
  
  <?php
    /* 
    *making a loop again but for the done data.
    *Use of foreach ($done_data is an array of objects) and object written syntax to retrieve id and title :
    *For each items found (result found), display its id and its title using the short term for echo in php
    */
    foreach ($done_data as $task) {?>
      <div class="done_database_container">
        <p id="task_title"><?=$task->title?>
        </p>
        <div id="done_button_container">
        
         <p class="task_done_todo">
        
        <a href="partials/mark.php?task_undone=<?=$task->id?>" class="done_button">Mark as undone</a>
        
      
        </p>
        
        <p class="delete_task">
        <!-- Here I connected to the $_GET['delete_task'] and that it will be the id it takes away when you press the X button. When you have taken away the id it will delete all --> 
        <a href="index.php?delete_task=<?=$task->id?>" class="delete_button">X</a>
        </p>
        
        </div> <!-- done_button_container-->
        
      </div> <!-- done_database_container-->
  <?php } ?>
  
 </div> <!-- todo_list -->
 
 
     <footer>
       
    <p> Username: EmmiG </p>
    <a href="https://github.com/EmmiG/todo_PHP">Click here to come to my gitHub repository todo_PHP</a> 
</footer>
        
</body>
</html>
	