<?php

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

$id_gejala = $_GET["id"];
if( hapus_gejala($id_gejala) > 0){
  echo "
  <script> alert('Data Berhasil Dihapus!');
  document.location.href = 'daftar_gejala.php';
  </script>
  ";
} else{
  echo "
  <script> alert('Data Gagal Dihapus!');
  document.location.href = 'daftar_gejala.php';
  </script>
  ";
}