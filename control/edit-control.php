<?php
session_start();
  if (!isset($_SESSION['id'])){
    header("Location: login.html");
  }

  $id=$_SESSION['id'];
  $judul=$_POST["judul"];
  $isi=$_POST["isi"];
  $id_pertanyaan=$_POST ["id_pertanyaan"];
  require_once ("koneksi.php");

  $query = "UPDATE pertayaan SET judul='$judul',isi='$isi' WHERE id like $id_pertanyaan";
	$hasil_mysql = mysqli_query($conn,$query) or die (mysqli_error($conn));
    //$result= mysqli_num_rows($hasil_mysql);
    header("location: ../views/dasboard.php");

?>