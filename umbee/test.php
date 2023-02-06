
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
				echo "</ol><a href='test.php'>Coba Konsultasi Lagi</a></span>";
	}else{
		echo "";
	}
?>
