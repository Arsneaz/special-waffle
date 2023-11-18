<?php 
include(__DIR__ . '/../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaMahasiswa = $_POST['name'];
    $nimMahasiswa = $_POST['studentId'];
    $jurusan = $_POST['department'];

    $statement = $conn->prepare("SELECT COUNT(*) FROM students WHERE nim = :nimMahasiswa");
    $statement->bindParam(':nimMahasiswa', $nimMahasiswa);
    $statement->execute();
    $count = $statement->fetchColumn();

    if ($count > 0) {
        echo "<script>alert('Student ID already exists. Please choose a different ID.');</script>";
        header("Location: ../../index.php");
        exit;
    } else {
        $insertStatement = $conn->prepare("INSERT INTO students (nim, nama_mahasiswa, jurusan) VALUES (:nimMahasiswa, :namaMahasiswa, :jurusan)");
        $insertStatement->bindParam(":nimMahasiswa", $nimMahasiswa);
        $insertStatement->bindParam(":namaMahasiswa", $namaMahasiswa);
        $insertStatement->bindParam(":jurusan", $jurusan);

        $insertStatement->execute();

        echo "<script>alert('Success Inserting User Data.');</script>";
        
        header("Location: ../../index.php");
        exit;
    }
}
?>
