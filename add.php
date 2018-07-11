<?php 

require_once 'init.php';

if(isset($_POST['task'])) {
    $name = trim($_POST['task']);
    
    if(!empty($name)) {
        $addedQuery = $database->prepare("
        INSERT INTO items (id, title, completed, createdBy)
        VALUES (:name, :user, 0 )
        ");
        
        $addedQuery->excute([
            'name' => $name,
            'user' => $_SESSION['user_id']
        ]);
        
    }
}

header('location: index.php');
?>