<?php
session_start();
require_once("../path/to/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asset/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="../asset/jquery-3.5.1.slim.js"></script>
   <script src="../asset/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <title>Buat Pertanyaan</title>
</head>
<style>
@media only screen and (max-width: 600px) {
    #flex{
        flex-direction : column;
    }
}
</style>
<body>
  <?php
  if (!isset($_SESSION['id'])){
    header("Location: login.html");
  }
  $id=$_SESSION['id'];
  $username=$_SESSION["username"];
  require_once("../control/session-time.php");
  ?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-info p-3 ">
        <a class="navbar-brand" href="dasboard.php"><h3>Tanyakan</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ">
            
          </ul>
          <div class="nav-item mx-3"><?= $username ?>
            <i class="far fa-user"></i>
          </div>
          <a href="../control/logout-control.php" class="btn btn-danger active" role="button" aria-pressed="true">Logout</a>
        </div>
    </nav>

    <div class="container d-flex " id="flex">
        
      <div class="card-body " style="width: 30rem;">
        <form action="../control/buat-control.php" action="post">
            <div class="card-footer d-flex justify-content-center pl-0">
                <h3 class="my-3">Buat Pertanyaan Kamu</h3>
            </div>
            <!-- <input type="hidden" name="id_user"> -->
            <div class="form-group">
              <label for="exampleInputEmail1">Judul</label>
              <input type="text" class="form-control" name="judul" id="exampleInputEmail1" placeholder="Masukkan Judul">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Isi</label>
              <input type="text" class="form-control" name="isi" id="exampleInputPassword1" placeholder="Masukkan Pertanyaan">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="id_kategori">
                  <option value="1">Kesehatan</option>
                  <option value="2">Olahraga</option>
                  <option value="3">Teknologi</option>
                  <option value="4">Hiburan</option>
                  <option value="5">Pendidikan</option>
                  <option value="6">Lainnya</option>
                </select>
              </div>
              <div class="card pl-0">
                <button type="submit" class="btn btn-primary">Tanyakan !</button>
              </div>
        </form>
      </div>
      

      <div class="row m-3" style="width: 28rem;">
      <b>Jenis-Jenis Postingan yang Dilarang (tapi tidak terbatas pada):</b>
      1.Postingan yang berisikan penghinaan, secara eksplisit maupun implisit, terhadap unsur suku, agama, ras, dan atau golongan.<br><br>
      2.Postingan yang berisikan caci maki atau sumpah serapah tak bermakna, termasuk postingan yang berisi flamming/provokasi terhadap individu/kelompok/unsur SARA/organisasi/komunitas (yg bisa menggugah emosi/amarah pembaca).<br><br>
      3.Demi keamanan dan privasi, dilarang juga untuk membuat postingan yang bertujuan untuk menyebarluaskan identitas personal, gunakan sensorship dengan baik.<br>

      </div>
    </div>
    
</body>
</html>
