<?php

session_start();

require 'function.php';

if( !isset($_SESSION["login"]) ){
  header("Location: login.php");
  exit;
}

$id_penyakit = $_GET["id"];

if(hapus_penyakit($id_penyakit) > 0){
    echo "
    <script> alert('Data Berhasil Dihapus!');
    document.location.href = 'daftar_penyakit.php';
    </script>
    ";
} else{
    echo "
    <script> alert('Data Gagal Dihapus!');
    document.location.href = 'daftar_penyakit.php';
    </script>
    ";
}

?>