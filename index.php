<?php

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit();
    }

    require "connection.php";

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed". mysqli_error($conn));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION["username"]?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Anda yakin untuk menghapus user?\");'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="logout.php">Log Out</a>
</body>
</html>