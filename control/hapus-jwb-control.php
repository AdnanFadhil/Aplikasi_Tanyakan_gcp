<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
}

$id = $_GET["id"];
$p = $_GET["p"];
//var_dump(p);
//var_dump($id_pertanyaan);
require_once("koneksi.php");

// Create a PDO database connection
try {
    $query = "DELETE FROM jawaban WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id);
    $statement->execute();
    header("location: ../views/detail.php?id=$p");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>





