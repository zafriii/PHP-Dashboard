<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php dashboard";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);


$sql_check_email = "SELECT * FROM user_data WHERE email = '$email'";
$result_check_email = $conn->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    
    echo "<script>alert('Email already exists. Please use a different email.')</script>";
    echo "<script>window.location.replace('register.html');</script>";
    exit();
}


$sql_insert_user = "INSERT INTO user_data (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql_insert_user) === TRUE) {
   
    session_start();
    $_SESSION['username'] = $email;
   
    header('Location: dashboard.php');
    exit();
} else {
    echo "Error: " . $sql_insert_user . "<br>" . $conn->error;
}


$conn->close();
?>
