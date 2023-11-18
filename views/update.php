<?php
    include('../config/connection.php');

    // Fetch the current user's data for pre-filling the form
    $nimToUpdate = $_GET['nim']; // Assuming you pass the student ID in the URL
    $query = "SELECT * FROM students WHERE nim = :nimToUpdate";
    $selectStatement = $conn->prepare($query);
    $selectStatement->bindParam(":nimToUpdate", $nimToUpdate);
    $selectStatement->execute();
    $userData = $selectStatement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../public/css/create.css">
</head>
<body>

    <form action="../config/helper/updateUser.php" method="post">
        <h2>Update Data Mahasiswa Baru</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $userData['nama_mahasiswa']; ?>" required>
        
        <label for="department">Jurusan Mahasiswa:</label>
        <select id="department" name="department" required>
            <option value="" disabled selected>Select Department</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Industri">Teknik Industri</option>
            <option value="Sains Data">Sains Data</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
        </select>

        <input type="hidden" name="studentId" value="<?php echo $nimToUpdate; ?>">

        <button type="submit">Update Profile</button>
    </form>

</body>
</html>
