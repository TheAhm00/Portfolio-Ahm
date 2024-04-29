<?php

$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');

if (isset($_POST['btn'])) {
	$socialmedialink = $_POST['socialmedialink'];
	$socialmedialogo = $_POST['socialmedialogo'];

	if (!empty($socialmedialink) && !empty($socialmedialogo)) {
		$query = "INSERT INTO socialmedia(socialmedialink,socialmedialogo) VALUE('$socialmedialink','$socialmedialogo')";
		$createQuery = mysqli_query($conn, $query);
		if ($createQuery) {
			echo "<script>alert('Data successfully inserted.');</script>";
		}
	} else {
		echo "Field Should not be empty";
	}
}

?>


<?php


//if click on delete
if (isset($_GET['delete'])) {
	$stdid = $_GET['delete']; //keeping the delete id in stdid
	$query = "DELETE FROM socialmedia WHERE id={$stdid}";
	$deleteQuery = mysqli_query($conn, $query);
	if ($deleteQuery) {
		echo "<script>alert('Data successfully deleted.');</script>";
	}
}
?>

<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

	?>

	<!doctype html>
	<html lang="en">

	<head>
		<title>Contact</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="images/img-2.jpg" type="image/png">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
			integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/altstyle.css">

	</head>

	<body>

		<div class="container d-flex align-items-stretch">

			<!-- Page Content  -->
			<style>
				.menu-bar {
					display: flex;
					border-radius: 10px;
				}

				.menu-item {
					padding: 10px 20px;
					border-radius: 10px;
				}

				.menu-item a {
					text-decoration: none;
					color: white;
				}

				.menu-item:hover {
					background-color: #ffa500;
					/* Change color on hover */
				}

				.bordered {
					border-collapse: collapse;
					border: 1px solid black;
				}

				.padded td,
				.padded th {
					padding: 2px;
				}

				.wide {
					width: 100%;
				}

				.bordered td,
				.bordered th {
					border: 1px solid black;
				}

				.bordered tbody td {
					text-align: center;
				}

				table {
					width: 100%;
					border-collapse: collapse;
				}

				td {
					padding: 10px;
					border: 1px solid #ccc;
				}

				.btnn {
					color: orange;
					background-color: black;
					border-color: black;
				}
			</style>




			<div id="content" class="p-4 p-md-5 pt-5">
				<div class="menu-bar">
					<div class="menu-item"><a style="color: black;" href="./">Home</a></div>
					<div class="menu-item"><a style="color: black;" href="about.php">About</a></div>
					<div class="menu-item"><a style="color: black;" href="education.php">Education</a></div>
					<div class="menu-item"><a style="color: black;" href="experience.php">Experience</a></div>
					<div class="menu-item"><a style="color: black;" href="service.php">Service</a></div>
					<div class="menu-item"><a style="color: black;" href="portfolio.php">Portfolio</a></div>
					<div class="menu-item"><a style="color: black;" href=" contact.php">Contact</a></div>
					<div class="menu-item"><a style="color: red;" href="../adminlogin/logout.php">Log Out</a></div>
				</div>
				<h2 class="mb-4">CONTACT</h2>


				<button style="background: orange; border-color: orange;" type="button" class="btn btn-dark"
					onclick="togglePopUp('contact')"> Add Social Media</button>

				<div id="contact" class="popup" style="display: none;">
					<div class="popup-content">
						<span class="close" onclick="togglePopUp('contact')">&times;</span>

						<div class="container shadow m-5 p-4 mx-auto rounded">
							<form method="post">

								<div class="row mb-3">
									<div class="col">
										<label for="start-year" class="form-label">Social Media Link</label>
										<input type="text" class="form-control" id="socialmedialink" name="socialmedialink"
											placeholder="Enter the social media link">
									</div>
								</div>


								<div class="row mb-3">
									<div class="col">
										<label for="socialmedialogo" class="form-label">Set Social Media Logo</label>
										<input type="text" class="form-control" id="socialmedialogo" name="socialmedialogo"
											placeholder="Enter the social media icon (e.g. fab fa-twitter)">
										<select class="form-select mt-1" id="socialmedialogo" name="socialmedialogo">
											<option selected disabled>Or choose here </option>
											<option value="fab fa-twitter">Twitter</option>
											<option value="fab fa-facebook-f">Facebook</option>
											<option value="fab fa-linkedin-in">LinkedIn</option>
											<option value="fab fa-instagram">Instagram</option>
											<option value="fab fa-youtube">Youtube</option>
											<option value="fa-brands fa-deviantart">DeviantArt</option>

										</select>
									</div>
								</div>


								<div class="row mb-3">
									<div class="col-auto">
										<button type="submit" class="btn btnn" name="btn">Add Social Media</button>
									</div>
								</div>
							</form>
						</div>


					</div>
				</div>



				<hr>

				<style>
					.bordered {
						border-collapse: collapse;
						border: 1px solid black;
					}

					.padded td,
					.padded th {
						padding: 2px;
					}

					.wide {
						width: 100%;
					}

					.bordered td,
					.bordered th {
						border: 1px solid black;
					}

					.bordered tbody td {
						text-align: center;
					}

					table {
						width: 100%;
						border-collapse: collapse;
					}

					td {
						padding: 10px;
						border: 1px solid #ccc;
					}


					#socialmedialogo::placeholder {
						color: #a1a1a1;
					}
				</style>


				<?php
				if (isset($_GET['update'])) { //if click on update button
					$id = $_GET['update']; //geting update id from search query
					$query = "SELECT * FROM contact WHERE id={$id}";
					$getData = mysqli_query($conn, $query); //getting data based on query
			
					while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
						$id = $rx['id'];

						$email = $rx['email'];
						$mobilenum = $rx['mobile_num'];
						$address = $rx['address'];

						?>

						<div class="container  m-5 p-3 mx-auto hidethis">
							<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
								onclick="hideContainer()"></button>
							<form method="post" class="d-flex justify-content-around">
								<table class="bordered padded wide">

									<tr>
										<td>Update Email</td>
										<td><input class="form-control me-3" type="text" name="email" value="<?php echo $email ?>">
										</td>
									</tr>

									<tr>
										<td>Update Mobile Number</td>
										<td><input class="form-control me-3" type="text" name="mobilenum"
												value="<?php echo $mobilenum ?>"></td>
									</tr>

									<tr>
										<td>Update Address</td>
										<td><input class="form-control me-3" type="text" name="address"
												value="<?php echo $address ?>"></td>
									</tr>

									<tr>
										<td colspan="2"><input class="btn btnn" type="submit" value="Update" name="update-btn">
										</td>
									</tr>

								</table>
							</form>
						</div>


						<?php
					} //closing previous php while/if backet
				} ?>

				<?php
				if (isset($_POST['update-btn'])) {

					$email = $_POST['email'];
					$mobilenum = $_POST['mobilenum'];
					$address = $_POST['address'];

					if (!empty($email) && !empty($mobilenum) && !empty($address)) {
						$query = "UPDATE contact SET email='$email', mobile_num='$mobilenum', address='$address' WHERE id='$id'";
						$updateQuery = mysqli_query($conn, $query);

						if ($updateQuery) {
							echo "<script>alert('Data successfully update.');</script>";
						}

					}

				}
				?>







				<?php
				if (isset($_GET['updatesoc'])) { //if click on update button
					$id = $_GET['updatesoc']; //geting update id from search query
					$query = "SELECT * FROM socialmedia WHERE id={$id}";
					$getData = mysqli_query($conn, $query); //getting data based on query
			
					while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
						$id = $rx['id'];

						$socialmedialogo = $rx['socialmedialogo'];
						$socialmedialink = $rx['socialmedialink'];

						?>

						<div class="container  m-5 p-3 mx-auto hidethis">
							<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
								onclick="hideContainer()"></button>
							<form method="post" class="d-flex justify-content-around">
								<table class="bordered padded wide">

									<tr>
										<td>Update Social Media Logo</td>
										<td><input class="form-control me-3" type="text" name="socialmedialogo"
												value="<?php echo $socialmedialogo ?>"></td>
									</tr>

									<tr>
										<td>Update Social Media Link</td>
										<td><input class="form-control me-3" type="text" name="socialmedialink"
												value="<?php echo $socialmedialink ?>"></td>
									</tr>

									<tr>
										<td colspan="2"><input class="btn btnn" type="submit" value="Update" name="update-btnn">
										</td>
									</tr>

								</table>
							</form>
						</div>
						<?php
					} //closing previous php while/if backet
				} ?>

				<?php
				if (isset($_POST['update-btnn'])) {

					$socialmedialogo = $_POST['socialmedialogo'];
					$socialmedialink = $_POST['socialmedialink'];

					if (!empty($socialmedialogo) && !empty($socialmedialink)) {
						$query = "UPDATE socialmedia SET socialmedialogo='$socialmedialogo', socialmedialink='$socialmedialink' WHERE id='$id'";
						$updateQuery = mysqli_query($conn, $query);

						if ($updateQuery) {
							echo "<script>alert('Data successfully update.');</script>";
						}

					}

				}
				?>




				<div class="container">
					<table class="table table-bordered">
						<tr>
							<th>Social Media Link</th>
							<th>Social Media Logo</th>
							<th>Edit</th>
						</tr>

						<?php
						$query = "SELECT * FROM socialmedia";
						$readQuery = mysqli_query($conn, $query);
						if ($readQuery->num_rows > 0) {

							while ($rd = mysqli_fetch_assoc($readQuery)) {

								$stdid = $rd['id'];
								$socialmedialink = $rd['socialmedialink'];
								$socialmedialogo = $rd['socialmedialogo'];

								?>
								<tr>
									<td><?php echo $socialmedialink ?></td>
									<td><?php echo '<i class="' . $socialmedialogo . ' fa-2x"></i>' ?></td>

									<td><a href="contact.php?updatesoc=<?php echo $stdid ?>"
											style="background: orange; border-color: orange;" class="btn btn-dark">Edit</a></td>
									<td><a href="contact.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td>
								</tr>
								<?php
							}
						} else {
							echo "No data to show";
						}
						?>
					</table>
				</div>


				<div class="container">
					<table class="table table-bordered">
						<tr>
							<th>Email<br><i class="fa fa-envelope"></i></th>
							<th>Mobile Number<br><i class="fa fa-phone"></i></th>
							<th>Address<br><i class="fa fa-map-marker"></i></th>
							<th>Edit</th>
						</tr>

						<?php
						$query = "SELECT * FROM contact";
						$readQuery = mysqli_query($conn, $query);
						if ($readQuery->num_rows > 0) {

							while ($rd = mysqli_fetch_assoc($readQuery)) {

								$stdid = $rd['id'];
								$email = $rd['email'];
								$mobilenum = $rd['mobile_num'];
								$address = $rd['address'];
								?>
								<tr>
									<td><?php echo $email ?></td>
									<td><?php echo $mobilenum ?></td>
									<td><?php echo $address ?></td>

									<td><a href="contact.php?update=<?php echo $stdid ?>"
											style="background: orange; border-color: orange;" class="btn btn-dark">Edit</a></td>
									<!--	<td><a href="contact.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td> -->
								</tr>
								<?php
							}
						} else {
							echo "No data to show";
						}
						?>
					</table>
				</div>

			</div>


			<script src="js/altscript.js"></script>
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/main.js"></script>
	</body>

	</html>

	<?php
} else {
	header("Location: ../adminlogin/index.php");
	exit();
}
?>