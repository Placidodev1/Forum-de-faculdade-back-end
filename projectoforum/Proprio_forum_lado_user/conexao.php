<?php
$host ="localhost";
$user = "root";
$pass = "placido1";
$dbname="forum";
$port=3306;
    try{
    
        $conn = new PDO("mysql: host=$host; port=$port;dbname=".$dbname, $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo'Error: ' . $e->getMessage();
    }