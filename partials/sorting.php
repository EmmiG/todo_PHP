<?php
    /*
    If the user has set the sorting themselves, the $sorting variable will be either asc/desc, depending on their
    decision. Else it will be DESC by default.
    */
	require_once 'database.php';
    if(isset($_GET['sorting'])) {
        $sorting = $_GET['sorting'];
    }
    else {
        $sorting = "DESC";
    }
	$require = $pdo->prepare("SELECT * FROM todo_php WHERE title = :title ORDER BY id $sorting"); 
	$require->execute(array(
				":title"     => $_GET["title"]
				));
	$sorted_tasks = $require->fetchAll(PDO::FETCH_ASSOC);
?>