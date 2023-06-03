<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
}

$id = $_GET["id"];
//var_dump($isi);
//var_dump($id_pertanyaan);
require_once("koneksi.php");

// Create a PDO database connection
try {
    $query = "DELETE FROM pertayaan WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header("location: ../views/dasboard.php");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>