<?php
/*
    If a $_POST exists : 
    First connect to the database using require_once.
    Use a prepared statement with ? to secure user input into database.
    execute the query replacing the ? by $_POST['task'].
    The insert is done : redirect user to index.php.

    Else :
    Means that someone is trying to access this file without authorization : Kick him out and redirect auto to index.php
*/
if(!empty($_POST)){
    require_once 'database.php';
    $data = $pdo->prepare("INSERT INTO todo_php SET title = ?");
    $data->execute([$_POST['task']]);
    header("Location: ../index.php");
} 
else {
    header("Location: ../index.php");
}