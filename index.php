<?php 

//Start a session on both add.php and index.php so that for instance variables will exist on both pages and be able to communicate. Since the variables will be stored inside the SESSION superglobal

session_start();

?>
  
  <?php 

  // First connect to DB to be able to retrieve informations
  // Then get all tasks from todo_php table
  // Finally store the data as objects in $data to use it in the body
  require_once 'partials/database.php';
  $require = $pdo->prepare("SELECT * FROM todo_php");
  $require->execute();
  $data = $require->fetchAll();
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
 
  <p id="task_error"><?php echo $_SESSION['errors']; ?>
    <?php unset($_SESSION['errors']); ?>
  
  </p>
  
<?php } ?>


 <!-- If the user will add the task sucessfully this code will happen  -->
 
  <?php if(isset($_SESSION['taskAdded'])) { ?> 
 
 
  <p id="task_added"><?php echo $_SESSION['taskAdded']; ?>
    <?php unset($_SESSION['taskAdded']); ?>
  
  </p>
  
<?php } ?>


 
  <input type="text" name="task" class="task_input">
  <input type="submit" class="task_button" name="submit" value="Add task">
</form>

<!-- testar med att få till det -->
	


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
        <p id="task_title"><?=$task->title?></p>
        <a id="delete" href="#">X</a>
      </div>
  <?php } ?>
  
  <!-- Message when user have added a task sucessfully -->
  
   <!--
		if($_POST ["name"] == "") {
		echo "<p>Your task have sucessfully been added</p>";
	?> -->
       
      
	
	
	
  <!--Else it will be a message saying that you have to type something into the input field -->
  
</div>

</body>
</html>
	