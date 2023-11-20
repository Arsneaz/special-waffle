<?php 
$host = 'localhost';
$username = 'root';
$password = '';
/*
    Connection to the database students and catch if there was an error connecting
    - Ceb
*/
try {
    $conn = new PDO("mysql:host=$host;", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Database name to be created
    $dbname = 'students';

    // Create the database if doesn't exist
    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");

    // Switch to the newly created or existed database
    $conn->exec("USE $dbname");

    // Define the students table schema
    $tableQuary = "
        CREATE TABLE IF NOT EXISTS students (
            nim INT(11) NOT NULL PRIMARY KEY,
            nama_mahasiswa VARCHAR(255) NOT NULL,
            jurusan VARCHAR(255) NOT NULL
        )
    ";

    $conn->exec($tableQuary);


} catch(PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}

?>