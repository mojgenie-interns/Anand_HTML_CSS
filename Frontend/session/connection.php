<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection page</title>
</head>
<body>
<?php 
session_start()
try {
    $dbhost = 'localhost';
    $dbname='library_management';
    $dbuser = 'root';
    $dbpass = 'Mojgenie@0111';
    $connect = new PDO(
"mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $username = $conn->real_escape_string($username);
    $stmt = $conn->query("SELECT password FROM library_managers WHERE username = '$username';");

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
?>
</body>
</Html>
