<!doctype html>
<html lang="en">

<head>
	<title>ADMIN LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<style>
		body {
			color: #666666;
			background-color: orange;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			font-family: Arial, sans-serif;
			font-weight: 300;
		}

		.btn-primaryy {
			background: orange;
			border: 1px solid orange;
			color: #fff;
			background: orange;
			border-radius: 5px;
		}
	</style>

</head>

<body>
<a href="../index.php" class="btn btn-danger">Back</a>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div style="background: black; color: orange;"
							class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2 style="font-family: Arial, sans-serif; color: orange;">PORTFOLIO CONTENT MANAGEMENT
									SYSTEM</h2>
								<h6 style="font-family: Arial, sans-serif;">© AHM</h6>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 style="font-family: Arial, sans-serif;">Log In</h3>
								</div>
							</div>


							<form method="post" action="login.php">

								<?php if (isset($_GET['error'])) { ?>
									<p class="error"><?php echo $_GET['error']; ?></p>
								<?php } ?>

								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="uname" class="form-control" id="username" required>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" class="form-control" id="password" required>
								</div>
								<button type="submit" class="btn-primaryy">Login</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>