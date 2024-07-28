<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "i-internship_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function redirect($url)
{
    echo "<script>window.location.href='$url'</script>";
    die();
}
