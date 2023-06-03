<?php

session_start();
  if (!isset($_SESSION['id'])){
    header("Location: login.html");
  }

  $id=$_SESSION['id'];
  $isi=$_POST ["isi"];
  $id_pertanyaan=$_POST ["id_pertanyaan"];
  //var_dump($isi);
  //var_dump($id_pertanyaan);
  require_once ("koneksi.php");

  $query = "INSERT INTO jawaban (id,id_user,id_tanya,isi) VALUES (NULL,'$id','$id_pertanyaan','$isi')";
	$hasil_mysql = mysqli_query($conn,$query) or die (mysqli_error($conn));
    //$result= mysqli_num_rows($hasil_mysql);
    header("location: ../views/detail.php?id=$id_pertanyaan");

?>

