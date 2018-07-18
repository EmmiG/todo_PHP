<?php require_once 'partials/database.php';

//connect to the database
/*$database = mysqli_connect('localhost', 'root', 'root', 'todo'); 

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    
    mysqli_query($database, "INSERT INTO todo_php (title) VALUES ('$task')");
    header('location: index.php');
    
}
*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<!-- bootstrap css link -->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	 crossorigin="anonymous">-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <title>todo PHP and MYSQL</title>
	
</head>

<body>

<div class="heading">
    <h1>todo PHP MYSQL</h1>
</div>




<form method="POST" action="partials/add.php"
method="post">
<input type="text" name="task" class="task_input">
<input type="submit" class="task_button" name="submit" value="Add task">
</form>


<table>
    <thread>
        <tr>
            <th>Number</th>
            <th id="task_table">Task</th>
             <th>Action</th>
            
        </tr>
    </thread>
    
    <tbody>
        <tr>
           <td>1</td>
           <td class="task">This is the first task placeholder</td>
           <td class="delete"><a href="#">X</a>
           </td>
            
        </tr>
    </tbody>
</table>
	<nav></nav>

	<header>
	
</header>


<main> 



</main>


<footer></footer>


</body>

</html>