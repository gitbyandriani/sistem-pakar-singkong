<?php

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

$id = $_GET["id"];

$gejala = query("SELECT * FROM gejala WHERE id_gejala= $id")[0];

  if (isset($_POST["submit"])){ 
  
    if (ubahgejala($_POST) > 0){
      echo "
      <script> alert('Data Berhasil Diubah!');
      document.location.href = 'daftar_gejala.php';
      </script>
      ";
    } else {
      echo "
      <script> alert('Data gagal Diubah!');
      document.location.href = 'daftar_gejala.php';
      </script>
      ";
    }
  
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="admin.css" />

    <!-- Responsive style -->
    <link rel="stylesheet" href="responsive.css" />

    <title>Ubah Gejala</title>
  </head>
  <!-- Logo title -->
  <link rel="icon" href="assets/logo.ico" type="image/x-icon" />
  <!-- Akhir logo title -->
  <body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index_admin.php">Selamat Datang di Halaman Admin</a>
        <button type="button" class="btn btn-dark">Logout</button>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a class="nav-link text-white" href="index_admin.php"><i class="bi bi-speedometer2 mr-2"></i> Dashboard</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="daftar_penyakit.php"><i class="bi bi-clipboard-pulse"></i> Daftar Penyakit</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="daftar_gejala.php"><i class="bi bi-check2-circle"></i> Daftar Gejala</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="daftar_solusi.php"> Daftar Pengendalian</a>
            <hr class="bg-secondary" />
          </li>
        </ul>
      </div>

    <!-- Form Ubah Penyakit -->
    <div class="card col-md-10 p-5 pt-3">
      <div class="card-header">
        <h3>Ubah Data Gejala</h3>
      </div>
      <div class="card-body">
        <form action="" method="post">
        <div class="row mb-3">
            <label for="id_gejala" class="col-sm-2 col-form-label">Id Gejala</label>
            <div class="col-sm-5">
              <input type="text" name="id_gejala" class="form-control" id="id_gejala" value="<?=$gejala["id_gejala"]; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="kd_gejala" class="col-sm-2 col-form-label">Kode Gejala</label>
            <div class="col-sm-5">
              <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" value="<?=$gejala["kd_gejala"]; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="pertanyaan" class="col-sm-2 col-form-label">Gejala</label>
            <div class="col-sm-5">
              <input type="text" name="pertanyaan" class="form-control" id="pertanyaan" value="<?=$gejala["pertanyaan"]; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="ifyes" class="col-sm-2 col-form-label">ifyes</label>
            <div class="col-sm-5">
              <input type="text" name="ifyes" class="form-control" id="ifyes" value="<?=$gejala["ifyes"]; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label for="ifno" class="col-sm-2 col-form-label">ifno</label>
            <div class="col-sm-5">
              <input type="text" name="ifno" class="form-control" id="ifno" value="<?=$gejala["ifno"]; ?>">
            </div>
          </div>
      <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-dark">Ubah</button>
        <a href = "daftar_gejala.php">
        <button type="button" class="btn btn-warning">Batal</button>
        </a>
      </div>
    </div>
</form>
    <!-- Akhir Form -->

    <script src="js/script.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

