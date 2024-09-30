<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
        echo "Connection failed";
    }

?>