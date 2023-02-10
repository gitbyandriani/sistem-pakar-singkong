<?php 

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}
$gejala = query("SELECT * FROM gejala");

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

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="admin.css" />

    <!-- Responsive style -->
    <link rel="stylesheet" href="responsive.css" />

  <title>Daftar Gejala</title>
  </head>
  <!-- Logo title -->
  <link rel="icon" href="assets/logo.ico" type="image/x-icon" />
  <!-- Akhir logo title -->
  <body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index_admin.php">Selamat Datang di Halaman Admin</a>
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
            <a class="nav-link text-white" href="daftar_pengendalian.php"> Daftar Pengendalian</a>
            <hr class="bg-secondary" />
          </li>
        </ul>
      </div>
      
      <!-- Akhir Dasboar -->

      <div class="col-md-10 p-5 pt-3">
        <h3><i class="bi bi-check2-circle"></i> DAFTAR GEJALA</h3>
        <hr />
        <a href="tambah_gejala.php" class="btn btn-primary mb-4"><i class="bi bi-plus-square-fill me-2"></i>Tambah Gejala</a>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">Id Gejala</th>
              <th scope="col">Kode Gejala</th>
              <th scope="col">Gejala</th>
              <th scope="col">ifyes</th>
              <th scope="col">ifno</th>
              <th colspan="3" scope="col">Aksi</th>
            </tr>
          </thead>
          <!-- <?php $i = 1; ?> -->
          <?php foreach($gejala as $row) : ?>
          <tbody>
            <tr>
              <!-- <th scope="row"><?= $i; ?></th> -->
              <td><?= $row["id_gejala"]; ?></td>
              <td><?= $row["kd_gejala"]; ?></td>
              <td><?= $row["pertanyaan"]; ?></td>
              <td><?= $row["ifyes"]; ?></td>
              <td><?= $row["ifno"]; ?></td>
              <td><a class="btn btn-warning" href="ubah_gejala.php?id=<?= $row["id_gejala"]; ?>" ><i class="bi bi-pencil-square text-white"></i></td>
              <td><a class="btn btn-danger" href="hapus_gejala.php?id= <?= $row["id_gejala"]; ?>" onclick= "return confirm('Apakah Yakin Akan Menghapus Data Ini?')"><i class="bi bi-trash bg-danger text-white"></i></td>
            </tr>
          </tbody>
          <!-- <?php $i++; ?> -->
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </body>
</html>
