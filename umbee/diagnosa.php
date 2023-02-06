<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>umbeeku</title>
        <link rel="icon" type="image/x-icon" href="assets/logo.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html">umbeeku</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="diagnosa.php">Diagnosa</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="informasi.php">Informasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h2>Jenis - Jenis Penyakit Singkong</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Terdapat beberapa penyakit yang dapat menyerang tanaman singkong, berikut diantaranya</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Andriani Marsh 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Logo title -->
    <link rel="icon" href="assets/logo.ico" type="image/x-icon" />
	<title>Diagnosa</title>

<?php
//START KONVERSI VERSI PHP KE PHP 7 OTOMATIS
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
//JIKA MASIH ERROR, COBA OPSI LAIN (ADA 4 OPSI PEMANGGILAN)
//require_once "parser-php-version.php"; OPSI 1
//include_once "parser-php-version.php"; OPSI 2
//require_once ("parser-php-version.php"); OPSI 3
//include_once ("parser-php-version.php"); OPSI 4
require_once "parser-php-version.php";
//END KONVERSI VERSI PHP KE PHP 7 OTOMATIS

require 'function.php';
$server = "localhost";
$username = "root";
$password = "";
$database = "spk_ubikayu";
mysql_connect($server,$username,$password) or die ("Gagal");
mysql_select_db($database) or die ("Database tidak ditemukan");

	$answer		= $_GET['answer'];
	if ($answer != ''){
	mysql_query("INSERT INTO rule_temporary (username, pilihan, jawaban)
										VALUES ('Mycoding','$answer','$_GET[pilihan]')");
	}elseif($_GET[pilih] == ''){
		mysql_query("DELETE FROM rule_temporary where username='Mycoding'");
	}
	if(!$answer) $answer = 1;
	$sql2=mysql_query("SELECT * FROM tb_penyakit where kd_penyakit='{$answer}'");
    $s = mysql_fetch_array($sql2);
	$penyakit = nl2br($s['nm_penyakit']);
	
	$result = mysql_query("SELECT * FROM gejala where id='{$answer}'");
	if(mysql_num_rows($result)){
		$row 		= mysql_fetch_array($result);
		$pertanyaan = nl2br($row['pertanyaan']);
		echo("");
		echo("<br/><span style=' font-size:20px; color: #000;'>".$pertanyaan."</span>");
		echo("<br/><br/>");
		if($row['ifyes'] != "0" && $row['ifno'] != "0"){
		
			echo("<a class='jawab' href=\"?pilih=tanya&pilihan=Y&answer={$row['ifyes']}\">Ya</a>&nbsp;
				<a class='jawab' href=\"?pilih=tanya&pilihan=N&answer={$row['ifno']}\">Tidak</a>");
		}else{
			echo "";
		}
	}

	if($s['ifyes'] == "0" && $s['ifno'] == "0"){			
	echo "<br/><span style=' font-size:20px; color: #000;'><b>Hasil Konsultasi :</b><br> ".$penyakit."<br><br>
				<b>Rule yang Di lewati :</b><ol>";
				$rule=mysql_query("SELECT * FROM rule_temporary 
												left join gejala on rule_temporary.pilihan=gejala.id 
													where username='Mycoding' AND pilihan NOT LIKE 'P%'");
				while ($o = mysql_fetch_array($rule)){
					if ($o[jawaban] == 'Y'){
						$jawaban = "<span style='color:green'>Yes</span>";
					}else{
						$jawaban = "<span style='color:red'>No</span>";
					}
					echo " <li>$o[pertanyaan] $jawaban</li>";

				}
				echo "</ol><a href='diagnosa.php'>Coba Konsultasi Lagi</a></span>";
	}else{
		echo "";
	}
?>