<?php

// Error if inputfield is empty, variable $errors

$errors = "";

// Handling errors

if(isset($_POST['submit'])) {
$task = $_POST['task'];
if(empty($task)){

$errors = "Sorry you must fill in the task";
    
header("Location: ../index.php");
}
    else {
    if(!empty($_POST))
    {
    require_once 'database.php';
    $data = $pdo->prepare("INSERT INTO todo_php SET title = ?");
    $data->execute([$_POST['task']]);
    header("Location: ../index.php");
} 
else {
    header("Location: ../index.php");
}       
   
}
    
}


//    echo "Your task have sucessfully been added"; 

?>


 <!--If a $_POST exists : 
    First connect to the database using require_once.
    Use a prepared statement with ? to secure user input into database.
    execute the query replacing the ? by $_POST['task'].
    The insert is done : redirect user to index.php.

    Else :
    Means that someone is trying to access this file without authorization : Kick him out and redirect auto to index.php
    
    -->
