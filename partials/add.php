<?php

/* 
Start a session on both add.php and index.php so that for isntance variables will exist on both pages and be able to communicate. Since the variables will be stored inside the SESSION superglobal 
*/

session_start();

?>

    <?php

// Error if inputfield is empty, variable $errors

$errors = "";

// Task sucessfully added

$taskAdded = "";


/* 
    If a $_POST exists : 
    * First connect to the database using require_once.
    * Use a prepared statement with ? to secure user input into database.
    * execute the query replacing the ? by $_POST['task'].
    * The insert is done : redirect user to index.php. 
*/

// Handling errors

if(isset($_POST['submit'])) {
$task = $_POST['task'];
if(empty($task)){
    
    
/* 
index.php needs to store the errors, you simply tell the computer "Since a session is started, I need to store a variable called errors in it to be able to access it in another page. Now, your errors variable will be accessible whenever you start your session on a page. 
*/
    
$_SESSION['errors'] = "Sorry you must fill in the task";
    
header("Location: ../index.php");
}
    else {
    if(!empty($_POST))
    {
    require_once 'database.php';
    $data = $pdo->prepare("INSERT INTO todo_php SET title = ?");
    $data->execute([$_POST['task']]);
    header("Location: ../index.php");
        
// Sucessful add task message   
  $_SESSION['taskAdded'] = "Your task have sucessfully been added";       
        
} 
        
/* 
Else : Means that someone is trying to access this file without authorization : Kick her/him out and redirect auto to index.php 
*/
        
else {
    header("Location: ../index.php");
}       
   
}
    
}

?>
