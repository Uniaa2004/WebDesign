<?php
include('../../cauhinh/ketnoi.php');
session_start();
$error = NULL;
if (isset($_POST['submit'])) {
	if ($_POST['email'] == "") {
		$error = "Please enter username and passowrd";
	} else {
		$email = $_POST['email'];
	}
	if ($_POST['password'] == "") {
		$error = "Please enter username and passowrd";
	} else {
		$password = $_POST['password'];
	}
	if (isset($email) && isset($password) && $email != 'Nguyenmanh.hd.8avd@gmail.com') {
		$query1 = "SELECT password,id_thanhvien FROM thanhvien WHERE email = '$email'";
		$resultemail = mysqli_query($conn, $query1);
		$row = mysqli_fetch_assoc($resultemail);
		if ($row && password_verify($password, $row['password'])) {
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['quyentruycap'] = $result['quyentruycap'];
			$_SESSION['user_id'] = $row['id_thanhvien'];
			echo " <script>window.location.href = '../../khachhang.php';</script>";
		} else {
			$error = "Incorrect account";
		}
	} else {
		$error = "Incorrect account";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf8" />
	<title>Shop bán máy tính</title>
	<link rel="stylesheet" type="text/css" href="css/dangnhap.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<?php
	if (!isset($_SESSION['email'])) {
	?>
		<section class="vh-100 " style="background-color: #9A616D; height:100vh">
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col col-xl-10">
						<div class="card" style="border-radius: 1rem;">
							<div class="row g-0">
								<div class="col-md-6 col-lg-5 d-none d-md-block ">
									<img src="anh/anh-login.webp" alt="login" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%" />
								</div>
								<div class="col-md-6 col-lg-7 d-flex align-items-center">
									<div class="card-body p-4 p-lg-5 text-black">

										<form method="post">
											<div class="d-flex align-items-center mb-3 pb-1">
												<i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
												<span class="h1 fw-bold mb-0">Wellcome</span>
											</div>

											<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login in here</h5>

											<div class="form-outline mb-4">
												<label class="form-label" for="form2Example17">Email</label>
												<input type="text" required id="form2Example17"  name="email" class="form-control form-control-lg" />

											</div>

											<div class="form-outline mb-4">
												<label class="form-label" for="form2Example27">Password</label>
												<input type="password" required id="form2Example17" name="password" class="form-control form-control-lg" />
												<center><span style="color:red;"><?php echo $error; ?></span></center>
											</div>

											<div class="pt-1 mb-4">
												<button type="submit" name="submit" class="btn btn-dark btn-lg btn-block">Login</button>
											</div>
											<p class="mb-5 pb-lg-2" style="color: #393f81;">Don't you have an account? <a href="dangky.php" style="color: #FF3300"><u>Create account</u></a></p>
											<a href="#!" class="small text-muted">Terms of use.</a>
											<a href="#!" class="small text-muted">Privacy policy</a>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php
	} else {
		header('location:../../khachhang.php');
	}

	?>
</body>

</html>