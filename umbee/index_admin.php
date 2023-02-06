<?php

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}


$jumlahPenyakit = mysqli_query($conn, "SELECT COUNT('id_penyakit') as jml_penyakit FROM tb_penyakit");
$penyakit = mysqli_fetch_assoc($jumlahPenyakit);

$jumlahGejala = mysqli_query($conn, "SELECT COUNT('id_gejala') as jml_gejala FROM gejala");
$gejala = mysqli_fetch_assoc($jumlahGejala);

$jumlahSolusi = mysqli_query($conn, "SELECT COUNT('id_pengendalian') as jml_solusi FROM tb_pengendalian");
$solusi = mysqli_fetch_assoc($jumlahSolusi);

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

    <title>Dashboard Admin</title>
  </head>
  <!-- Logo title -->
  <link rel="icon" href="assets/logo.ico" type="image/x-icon" />
  <!-- Akhir logo title -->
  <body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index_admin.php">Selamat Datang di Halaman Admin <b></b></a>
        <a href="logout.php">
        <button type="button" class="btn btn-dark">Logout</button>
        </a>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Dasboard -->

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
      <!-- Akhir Dasboar -->

      <!-- Kontent Dasboard Admin -->
      <div class="col-md-8 p-5 pt-3 ">
        <h3><i class="bi bi-speedometer2 mr-2"></i> DASHBOARD</h3>
        <hr />
        <div class="row text-white">
          <div class="card bg-dark bg-gradient ms-5 mb-3" style="width: 18rem">
            <div class="card-body">
              <h5 class="card-title">Jumlah Penyakit</h5>
              <div class="display-4"><?= $penyakit['jml_penyakit']; ?></div>
              <a href="daftar_penyakit.php"
                ><p class="card-text text-white">Lihat Detail <i class="bi bi-chevron-double-right ml-2"></i></p>
              </a>
            </div>
          </div>

          <div class="card bg-danger bg-gradient ms-5 mb-3" style="width: 18rem">
            <div class="card-body">
              <h5 class="card-title">Jumlah Gejala</h5>
              <div class="display-4"><?= $gejala['jml_gejala']; ?></div>
              <a href="daftar_gejala.php"
                ><p class="card-text text-white">Lihat Detail <i class="bi bi-chevron-double-right ml-2"></i></p>
              </a>
            </div>
          </div>

          <div class="card bg-success bg-gradient ms-5" style="width: 18rem">
            <div class="card-body">
              <h5 class="card-title">Jumlah Pengendalian</h5>
              <div class="display-4"><?= $solusi['jml_solusi']; ?></div>
              <a href="daftar_solusi.php"
                ><p class="card-text text-white">Lihat Detail <i class="bi bi-chevron-double-right ml-2"></i></p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Konten -->
  </body>
</html>
