<?php
session_start();

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
    <title>Detail Pertanyaan</title>
</head>
<body>
<?php
  require_once("../control/koneksi.php");
  require_once("../control/session-time.php");
  if (!isset($_SESSION['id'])){
    header("Location: login.html");
  }
  $id=$_SESSION['id'];
  $username=$_SESSION["username"];
  $id_pertanyaan=$_GET["id"];
  //var_dump($id_pertanyaan);
  ?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-info p-3 fixed-top">
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

    <div class="container d-flex flex-column mt-5">
        <div class="card border-0 my-5">
            <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                    <?php 
                      $query="SELECT * FROM pertayaan WHERE id=$id_pertanyaan";
                      $stmt = $pdo->prepare($query);
                      $stmt->execute();
                      $data_pertanyaan= $stmt->fetch(PDO::FETCH_ASSOC);
                      $id_tanya=$data_pertanyaan["id"];
                    ?>

                        <h6 class="card-subtitle text-muted">
                              <?php 
                                      $id_s=$data_pertanyaan["id_user"];
                                      //var_dump($id_s);
                                      $query_user="SELECT username FROM user WHERE id = '$id_s'";
                                      $stmt = $pdo->prepare($query_user);
                                      $stmt->execute();
                                      $data_s=$stmt->fetch(PDO::FETCH_ASSOC);
                                      //var_dump($data_s);
                                      echo($data_s["username"]);
                              ?></h6>
                    </div>
              <h3 class="card-title"><?= $data_pertanyaan["judul"] ?></h3>
              <p class="card-text"><?= $data_pertanyaan["isi"] ?></p>
            </div>
        </div>


        <?php 
        $query_jawab="SELECT * FROM jawaban WHERE id_tanya = $id_tanya";
        $stmt = $pdo->prepare($query_jawab);
        $stmt->execute();
        while($data_jawaban= $stmt->fetch(PDO::FETCH_ASSOC)){  ?>
          <div class="card border-0 ml-5">
              <div class="card-body ">
                      <div class="d-flex justify-content-between align-items-center">
                          <!-- author -->
                          <h6 class="card-subtitle text-muted"><?php 
                                      $id_s=$data_jawaban["id_user"];
                                      //var_dump($id_s);
                                      $query_user="SELECT username FROM user WHERE id = '$id_s'";
                                      $stmt = $pdo->prepare($query_user);
                                      $stmt->execute();
                                      $data_s=$stmt->fetch(PDO::FETCH_ASSOC);
                                      //var_dump($data_s);
                                      echo($data_s["username"]);
                              ?>
                            </h6>
                          <!-- author end -->
                          <!-- author delete -->
                          <?php  if( $data_jawaban["id_user"] == $id ) { ?>
                          <div class="row mr-2">
                              <a href="../control/hapus-jwb-control.php?id=<?= $data_jawaban["id"] ?>&p=<?= $data_pertanyaan["id"] ?>"><i class="fas fa-trash-alt mx-3"></i></a>
                          </div>
                          <?php } ?>
                          <!-- end author -->
                      </div>
                <p class="card-text"><?= $data_jawaban["isi"] ?></p>
              </div>
          </div>  
        <?php } ?>

        <div class="card border-0 mt-5">
        <div class="form-row ml-5">
            <div class="form-group ml-3">
                <div class="card-header">
                    Komentar
                </div>
              <form action="../control/buat-jwb-control.php" method=post>
                <!-- <label for="inputEmail4 text-muted">Email</label> -->
              <!-- <input type="hidden" name="id_user" value="$id"> -->
              <input type="hidden" name="id_pertanyaan" value="<?= $id_pertanyaan ?>">
              <textarea class="form-control" id="exampleFormControlTextarea1" cols="95" rows="4" name="isi"></textarea>
                  
              <div class="card-body bg-light">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
              </form>

            </div>

          </div>
        </div>
        
    </div>
    
</body>
</html>
