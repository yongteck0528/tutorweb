<?php

    require "connection.php";
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' or email = '$email'")) > 0){
            echo "<script> alert('Username or Email is reserved');</script>";
        }else{
            if($password == $repassword){
                $hash_pw = md5($password);
                $query = "INSERT INTO user VALUES('','$username','$hash_pw','$email')";
                mysqli_query($conn, $query);
                echo "<script> alert('Sign Up Successfull');</script>";
            }
            else{
                echo "<script> alert('Password not match');</script>";
            }
        }   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="signup.php" method="POST" autocomplete="off">
        <label>Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="repassword" id="repassword" required><br><br>
        
        <button type="submit" name="submit">Sign Up</button><br><br>

        <a href="index.php">Log in</a>
    </form>
    
</body>
</html>