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
      <div>
        <p><?=$task->id?></p>
        <p><?=$task->title?></p>
        <a id="delete" href="#">X</a>
      </div>
  <?php } ?>
</div>

</body>
</html>
	