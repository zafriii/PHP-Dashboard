<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php dashboard";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$current_email = $_SESSION['username']; 
$new_username = $_POST['username'];
$new_email = $_POST['email'];

$sql = "UPDATE user_data SET username='$new_username', email='$new_email' WHERE email='$current_email'";

if ($conn->query($sql) === TRUE) {
    
    $_SESSION['username'] = $new_email;
    header('Location: dashboard.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
