<?php 

//Start a session on both add.php and index.php so that for instance variables will exist on both pages and be able to communicate. Since the variables will be stored inside the SESSION superglobal

session_start();

?>
  
  <?php 

  // First connect to DB to be able to retrieve informations
  // Then get all tasks from todo_php table
  // Finally store the data as objects in $data to use it in the body
// Order the database ids in DESC order so that the latest task will be at the top of the website
  require_once 'partials/database.php';

  $query = $pdo->query("SELECT * FROM todo_php ORDER BY id DESC");
  $query->execute();
  $data = $query->fetchAll();


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
  <title>todo PHP and MYSQL</title>
</head>
<body>

<div id="heading">
  <h1>todo PHP MYSQL</h1>
</div>


<form method="POST" action="partials/add.php" method="post">

<!-- Since you now have your variable with its content inside the session superglobal, you need to be able to read it. 
Now you're saying "whenever a variable called errors exists in the session superglobal, do what follows."
 -->
 <?php if(isset($_SESSION['errors'])) { ?> 
 
 <!-- You now have a variable that exists and has something in it. Which means, whenever the variable will be there, the display message will be there for the user to see. You said "if the variable isset, echo it here" and since you've set it on the add.php page : It is. -->
 
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

<div id="flex">
  <div>
    <p>ID</p>
    <p>Task</p>
    <p>Action</p>
  </div>
  <?php
    // Use of foreach ($data is an array of objects) and object written syntax to retrieve id and title :
    // For each items found (result found), display its id and its title using the short term for echo in php
    foreach ($data as $task) {?>
      <div class="database_container">
        <p id="task_id"><?=$task->id?></p>
        <p id="task_title"><?=$task->title?>
        </p>
        
        <p class="delete_task">
        <!-- Here I connected to the $_GET['delete_task'] and that it will be the id it takes away when you press the X button. When you have taken away the id it will delete all --> 
        <a href="index.php?delete_task=<?=$task->id?>">X</a>
        </p>
        
      </div>
  <?php } ?>
  
  
</div>

</body>
</html>
	