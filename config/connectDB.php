<?php
    $conn = new mysqli("localhost", "root","12345","products-db");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>