<?php 

/*
//connect to the database
$database = mysqli_connect('localhost', 'root', '', 'todo'); 

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    
    mysqli_query($database, "INSERT INTO todo_php (task) VALUES ('$task')");
    header('location: index.php');
    
}

*/

require_once 'partials/init.php';

$itemsQuery =$database->prepare("
SELECT id, title, completed, createdBy 
FROM items
WHERE user = :user
");

$itemsQuery->execute([

    'user' => $_SESSION['user_id']    
    
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

foreach($items as $item){
    echo $item['task'], '<br>';
}
    



?>





<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<!-- bootstrap css link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	 crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <title>todo PHP and MYSQL</title>
	
</head>

<body>

<div class="heading">
    <h1>todo PHP MYSQL</h1>
</div>




<form metod="POST" action="index.php"
metod="post">
<input type="text" name="task" class="task_input">
<button type="submit" class="task_button" name="submit">Add Task</button>
</form>


<div class="list"></div>
<?php if(!empty($items)): ?>
<ul class="items">
   <?php foreach($items as $item): ?>
    <li>
        <span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['task'];?></span>
        <?php if(!$item['done']): ?>
        <a href="#" class="done-button">Mark as done</a>
        <?php endif; ?>
    </li>
    <?php endforeach; ?> 
</ul>
<?php else: ?>
<p>You havent added any items yet</p>
<?php endif; ?>

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