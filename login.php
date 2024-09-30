<?php
    session_start();
    require "connection.php";
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($row["password"] == md5($password)) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                header("Location: index.php");
            } else{
                echo "<script> alert('wrong password'); </script>";
            }
        }else{
            echo "<script> alert('user not found'); </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST" autocomplete="off">
        <label>Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        
        <button type="submit" name="submit">Login</button><br><br>

        <a href="signup.php">Sign Up</a>
    </form>
    
</body>
</html>