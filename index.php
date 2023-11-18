<?php 
    include('config/connection.php');
    $query = "SELECT * FROM students";
    $result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/index.css">
</head>
<body>

    <!Label for perfoming grouping by department in search.php with AJAX-
    <label for="selectDepartment">Data Mahasiswa</label>
    <a class="create-data" href="views\create.php">Tambah Data</a>
    <select id="selectDepartment" onchange="searchByDepartment()">
        <option value="" disabled selected>Select Department</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Teknik Industri">Teknik Industri</option>
        <option value="Sains Data">Sains Data</option>
        <option value="Teknik Sipil">Teknik Sipil</option>
    </select>

    <!Display the list of the same value in this div->
    <div id="searchResults"></div>

  <?php
    if ($result->rowCount() > 0) {
        // Display table only if there is data
    ?>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php
        // Loop through the result set and display data in a table
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['nim']}</td>";
            echo "<td>{$row['nama_mahasiswa']}</td>";
            echo "<td>{$row['jurusan']}</td>";
            echo "<td><a href='views/update.php?nim=".$row['nim']."'>Update User | <a href='config/helper/deleteUser.php?nim=".$row['nim']."'>Delete User</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <?php
    } else {
        // Handle case where there is no data
        echo "<p>No data available.</p>";
    }
    ?>  

    <script src="public/js/index.js"></script>
</body>
</html>
