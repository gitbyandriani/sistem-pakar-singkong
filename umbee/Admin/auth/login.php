
<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])) {
	echo "<script>window.location='".base_url()."';</script>";
}else
{
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login Klinik Allia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="<?=base_url('_assets/css/login.css');?>" rel="stylesheet">
	
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="d-flex">
		      		<div class="w-100"><h3 class="mb-4">Log In</h3></div>		
		      	</div>

					<?php
					if(isset($_POST['login'])) {
						$user = trim(mysqli_real_escape_string($con, $_POST['user']));
						$pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
						$sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($con));
						if(mysqli_num_rows($sql_login) > 0){
							$_SESSION['user'] = $user;
							echo "<script>window.location='".base_url()."';</script>";
						} else { ?>
							<div class="row">
								<div class="col-lg-6 col-lg-offset-3">
									<div class="alert alert-danger alert-dismissable" role="alert">
										<a href="" class="close" data-dissmiss="alert" aria-label="close">&times;</a>
										<span class="glyphicon glphicon-exclamation-sign" asria-hidden="true"></span>
										<strong>Login gagal!</strong> Username / password salah
									</div>	
								</div>
						</div>
						<?php
						}
					}
					?>	

						<form action="" method="post" class="navbar-form">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" name="user" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" name="pass" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-flex align-items-center">
	            	<div class="w-100">
	            		<label class="checkbox-wrap checkbox-primary mb-0">Save Password
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-100 d-flex justify-content-end">
		            	<button type="submit" name="login" class="btn btn-primary rounded submit">Login</button>
	            	</div>
	            </div>
	            
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=base_url('_assets/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>

	</body>
</html>
<?php
}
?>