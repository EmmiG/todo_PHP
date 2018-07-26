<?php

// Connect to database : Name : todo / host : localhost / username : root / password : 
//dbname means that I add the name of my database here which is todo 
$pdo = new PDO('mysql:dbname=todo;host=localhost', 'root', 'root');



// Set it to object mode and UTF-8 to accept european accents
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->exec("set names utf8"); 

