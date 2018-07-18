<?php

require 'database.php';

if(isset($_POST["submit"]) && isset($_POST["task"])){
  $name = trim($_POST["task"]);

  if(!empty($name)) {
      /* Here I take the name on my table in phpMyAdmin into my database"todo" I have the column "todo_php" */
      $addedQuery = $pdo->prepare(
        "INSERT INTO todo_php (title)
        VALUES (:title)"
      );

      $addedQuery->execute(array(
        ":title" => $_POST["task"],
       ));
  }
}

header('Location: ../index.php');

$addedQuery2 = $pdo->prepare(
    "SELECT * FROM todo_php"
); 


?>