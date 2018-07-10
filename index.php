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
    <h2>todo PHP MYSQL</h2>
</div>

<form metod="POST" action="index.php"><input type="text" name="task" class="task_input">
<button type="submit" class="task_button" name="submit">Add Task</button>
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