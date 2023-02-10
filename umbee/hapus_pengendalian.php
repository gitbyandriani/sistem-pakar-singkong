<?php

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

$id_pengendalian = $_GET["id"];

if( hapus_pengendalian($id_pengendalian) > 0){
    echo "
    <script> alert('Data Berhasil Dihapus!');
    document.location.href = 'daftar_pengendalian.php';
    </script>
    ";
} else{
    echo "
    <script> alert('Data Gagal Dihapus!');
    document.location.href = 'daftar_pengendalian.php';
    </script>
    ";
}

?>