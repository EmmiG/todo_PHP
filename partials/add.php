<?php

require 'database.php';


if(isset($_POST["submit"]) && isset($_POST["task"])){
  $name = trim($_POST["task"]);  //$name = $db->real_escape_string(trim($_POST["task"]));  tas till för att skydda databasen från inkräktare 

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


//print_r($pdo);

// TEST att koppla ihop, $row med id i databasen
$pdo = "SELECT * FROM todo_php WHERE id='$id'";  //id='".$id."'";  // '$id'"; fick inget error i console när jag tog bort id= men är fortfarande 500 error.
$result = mysqli_query($addedQuery, $pdo);
// CHECK THE QUERY WAS SUCCESSFUL
if ($result) {
  while($row = mysqli_fetch_array($result)) {
        $name  =   $row["task"];
        $title  =   $row[":title"];
      
        //$lastname   =   $row["lastname"];
        //$email      =   $row["email"];
        //$password   =   $row["password"];
       
     //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
}
else {
  echo "Query failed with error: " . mysqli_error($addedQuery) . "<br>";
}




?>