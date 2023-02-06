<?php
require_once "_config/config.php";
if(!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
	
}?>

<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" href="<?=base_url('_assets/js/jquery.js')?>">
      <link rel="stylesheet" href="<?=base_url('_assets/js/boostrap-min.js')?>">
      <link rel="stylesheet" href="<?=base_url('_assets/css/boostrap.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('_assets/css/style1.css')?>">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
  <body>
      <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      
      <nav class="sidebar">
      <div class="scroll">
         <div class="text"><span class="text-primary"><h>KLINIK ALLIA</span></h>
         </div>
         <ul>
            <li class="active"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
            <li>
               <a href="#" class="feat-btn">Input
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
               <li><a href="#">Daftar Pasien</a></li>
               <li><a href="#">Daftar Dokter</a></li>
               <li><a href="#">Daftar Obat</a></li>
               <li><a href="#">Jadwal Dokter</a></li>
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn">Rekam Medis
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show">
               <li><a href="#">Daftar Rekam Medis</a></li>
              <li><a href="#">Surat Kesehatan</a></li>
               </ul>
            </li>
            <li><a href="#" class="pend-btn">Pendaftaran
            <span class="fas fa-caret-down third"></span>
          </a>
            <ul class="pend-show">
              <li><a href="#">Daftar Antrian</a></li>
              <li><a href="#">Sudah Diperiksa</a></li>
            </ul>
            </li>
            <li><a href="#" class="lap-btn">Laporan
            <span class="fas fa-caret-down fourth"></span>
            </a>
            <ul class="lap-show">
            <li><a href="#">Laporan Pasien</a></li>
            <li><a href="#">Laporan Dokter</a></li>
            <li><a href="#">Laporan Obat</a></li>
            <li><a href="#">Laporan Rekam Medis</a></li>
            <li><a href="#">Laporan Pendaftaran</a></li> 
            <li><a href="#">Laporan User</a></li>
            <li><a href="#">Laporan Lengkap</a></li>
            </ul>
            </li>
            <li><a href="#">User</a></li>
            <li><a href="<?=base_url('auth/logout.php')?>">Logout</a></li>
         </ul>
      </div>
      </nav>
      
 

		