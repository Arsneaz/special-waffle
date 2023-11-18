<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="../public/css/create.css">
</head>
<body>
    <form action="../config/helper/createUser.php" method="post">
        <h2>Tambah Data Mahasiswa Baru</h2>
        <label for="name">Nama Mahasiswa:</label>
        <input type="text" id="name" name="name" required>

        <label for="studentId">NIM Mahasiswa:</label>
        <input type="text" id="studentId" name="studentId" required>

        <label for="department">Jurusan Mahasiswa:</label>
        <select id="department" name="department" required>
            <option value="" disabled selected>Select Department</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Industri">Teknik Industri</option>
            <option value="Sains Data">Sains Data</option>
            <option value="Teknik Sipil">Teknik Sipil</option>
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>