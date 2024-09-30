<?php

require "connection.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["update"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];

        $update_query = "UPDATE user SET username = '$username', email = '$email' WHERE id = '$id'";
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('User updated successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "Error updating user: " . mysqli_error($conn);
        }
    } else {
        echo "No user ID provided!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form action="" method="POST">
    <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>