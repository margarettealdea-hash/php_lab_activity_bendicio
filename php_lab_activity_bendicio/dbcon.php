<?php
    $conn = new mysqli("localhost", "root", "", "php_db in phpmyadmin");
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }else{
        echo  "Database Connection Success!";
    }

    ?>  