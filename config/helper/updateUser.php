<?php
// Include your database connection file
include(__DIR__.'/../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nimToUpdate = $_POST['studentId'];
    $newName = $_POST['name'];
    $newDepartment = $_POST['department'];

    // Prepare and execute the UPDATE query
    $updateStatement = $conn->prepare("UPDATE students SET nama_mahasiswa = :newName, jurusan = :newDepartment WHERE nim = :nimToUpdate");
    $updateStatement->bindParam(":newName", $newName, PDO::PARAM_STR);
    $updateStatement->bindParam(":newDepartment", $newDepartment, PDO::PARAM_STR);
    $updateStatement->bindParam(":nimToUpdate", $nimToUpdate, PDO::PARAM_INT);
    $updateStatement->execute();

    // Redirect back to the profile page or any other page after updating
    header("Location: ../../index.php");
    exit;
}
?>
