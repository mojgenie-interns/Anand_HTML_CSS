<?php
session_start();
$servername = "localhost";
$username = "root"; 
$password = "root";
$dbname = "library_management"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $username = $conn->real_escape_string($username);
    $stmt = $conn->query("SELECT password FROM users WHERE user_name = '$username'");

    if ($stmt) {
        $row = $stmt->fetch_assoc();
        if ($row) {
            $db_password = $row['password'];
            if ($db_password === $password) {
                echo file_get_contents('Admin_page.html');
            } else {
                echo "username Or Password Incorrect";
            }
        }
    }

    $conn->close();
}