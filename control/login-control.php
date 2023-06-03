<?php
include("koneksi.php");

$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * FROM user WHERE email = :email AND password = :password";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email, 'password' => $password]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    session_start();
    $_SESSION["id"] = $result["id"];
    $_SESSION["username"] = $result["username"];
    header("Location: ../views/dashboard.php");
} else {
    header("Location: ../views/login.html");
}
?>