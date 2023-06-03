<?php
include("koneksi.php");

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


$query = "SELECT * FROM user WHERE email = :email AND username = :username";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email, 'username' => $username]);

$result = $stmt->rowCount();

if ($result >= 1) {
    header("Location: ../views/login.html");
} else {
    $query = "INSERT INTO user (id, username, email, password) VALUES (NULL, :username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

    header("Location: ../views/login.html");
}
?>