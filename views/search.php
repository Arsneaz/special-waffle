<?php
// Include your database connection file
include('../config/connection.php');

if (isset($_GET['department'])) {
    $department = $_GET['department'];

    // Prepare and execute the SELECT query based on the selected department
    $query = "SELECT * FROM students WHERE jurusan = :department";
    $selectStatement = $conn->prepare($query);
    $selectStatement->bindParam(":department", $department);
    $selectStatement->execute();

    // Display search results
    echo "<h3>Search Results</h3>";

    if ($selectStatement->rowCount() > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </tr>";

        while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama_mahasiswa']}</td>
                    <td>{$row['jurusan']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found for the selected department.";
    }
}

echo "<br>"
?>
