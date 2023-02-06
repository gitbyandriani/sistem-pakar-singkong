<?php
require_once "_config/config.php";
if(isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
	
}else{
    
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>KLINIK ALLIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url('_assets/css/style.css')?>">

  </head>
  <body>
  <script src="<?=base_url('_assets/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
		
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a class="logo">KLINIK ALLIA</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="sidebar-brand">
            <a href="#">KLINIK ALLIA</a>
          </li>
          <li>
              <a href="#">Dashboard</a>
          </li>
          <li>
            <a href=#><i class="fa fa-edit fa-fw"></i> Input <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                  <a href="?menu=pasien">Data Pasien</a>
                </li>
               <li>
                  <a href="?menu=dokter">Data Dokter</a>
                </li>
                <li>
                  <a href="?menu=dokter">Jadwal Dokter</a>
                </li>
            </ul>
          </li>
          <li>
            <a href="#">Data Pasien</a>
          </li>
          <li>
            <a href="#">Data Dokter</a>
          </li>
          <li>
            <a href="#">Data Obat</a>
          </li>
          <li>
            <a href="#">Information</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Sidebar #04</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
}
?>
		