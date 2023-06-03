<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
}

$id = $_SESSION['id'];
$judul = $_GET["judul"];
$isi = $_GET["isi"];
$id_kategori = $_GET["id_kategori"];
require_once("koneksi.php");

$query = "INSERT INTO pertayaan (id,id_user,judul,isi,id_kategori) VALUES (NULL,:id,:judul,:isi,:id_kategori)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':judul', $judul);
$stmt->bindParam(':isi', $isi);
$stmt->bindParam(':id_kategori', $id_kategori);
$stmt->execute();

header("location: ../views/dasboard.php");
?>
