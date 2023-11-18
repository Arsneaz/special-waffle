<?php 
include(__DIR__ . '/../connection.php');

// Include your database connection file
if (isset($_GET['nim'])) {
    // Get the student ID to be deleted
    $nimToDelete = $_GET['nim'];

    // Prepare and execute the DELETE query
    $deleteStatement = $conn->prepare("DELETE FROM students WHERE nim = :nimToDelete");
    $deleteStatement->bindParam(":nimToDelete", $nimToDelete, PDO::PARAM_INT);
    $deleteStatement->execute();

    // Redirect back to index.php after deletion
    header("Location: ../../index.php");
    exit;
} else {
    echo "Invalid request.";
}
?>

?>