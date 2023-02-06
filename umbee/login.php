<?php

session_start();

if ( isset($_SESSION["login"]) ) {
  header("Location: index_admin.php");
  exit;
}

require 'function.php';

$username = "";
$password = "";
$err = "";
$n1 = "";

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == '' or $password == ''){
      $err = "Silahkan masukan semua isian";
    }else{
      $query = "SELECT * FROM tb_admin where username = '$username'";
      $q1 = mysqli_query($conn, $query);
      $r1 = mysqli_fetch_array($q1);
      $n1 = mysqli_num_rows($q1);
    }

    if($n1 < 1){
      $err = "Username tidak ditemukan";
    }elseif($r1['password']!= md5($password)){
      $err = "Password yang kamu masukan tidak sesuai";
    }else{
      $_SESSION["login"] = true;
      header("location:index_admin.php");
      exit;
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

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

    <!-- Logo title -->
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">
    <!-- Akhir logo title -->

    <!-- CSS -->
    <link rel="stylesheet" href="stylelogin.css" />
    <title>Login Admin</title>
  </head>
  <body>
    <div class="login">
      <div class="card-login-form">
        <div class="card-body">
    <div class="card-text">
    <div class="header">
        <h1 class="card-title text-center">Selamat Datang Kembali Admin</h1>
        <p class="text-center">Masukan Username dan Password untuk Masuk.</p>
      </div>
      <?php 
      if($err){
      ?>
      <div class="alert alert-danger">
        <?php echo $err ?>
      </div>
      <?php
      }
      ?>
    <form action="" method="post">     
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" />
      </div>
      <div class="d-grid gap-2">
        <button type="submit" name="login" class="btn ">Masuk</button>
      </div>
    </div>
  </div>
</div>
</div>
  </form>
  </body>
</html>
