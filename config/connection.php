<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'students';

/*
    Connection to the database students and catch if there was an error connecting
    - Ceb
*/
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}

?>