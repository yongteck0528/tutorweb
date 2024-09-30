<?php
    require 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $delete_query = "DELETE FROM user WHERE id = $id";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "<script>alert('User deleted successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        echo "No user ID provided!";
    }

?>
