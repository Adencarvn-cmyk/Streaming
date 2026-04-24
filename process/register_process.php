<?php
include '../config/database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// simpan ke DB
mysqli_query($conn, "INSERT INTO users (username, email, password)
VALUES ('$username', '$email', '$password')");

// redirect ke login
header("Location: ../pages/login.php");