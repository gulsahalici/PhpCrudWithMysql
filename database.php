<?php
    $conn = mysqli_connect("localhost", "root", "", "envestdb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>