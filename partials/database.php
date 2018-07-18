<?php $pdo = new PDO
    (
        "mysql:host=localhost;dbname=todo;charset=utf8",
            "root",  // user
            "root"   //password
    );

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!-- dbname means that I add the name of my database here which is todo -->