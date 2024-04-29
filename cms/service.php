<?php

$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');

if (isset($_POST['btn'])) {
	$servicelogo = $_POST['ser_logo'];
	$servicename = $_POST['ser_name'];
	$servicedes = $_POST['ser_des'];

	if (!empty($servicename) && !empty($servicedes)) {
		$query = "INSERT INTO service(logo,name,des) VALUE('$servicelogo','$servicename','$servicedes')";
		$createQuery = mysqli_query($conn, $query);
		if ($createQuery) {
			echo "<script>alert('Data successfully inserted.');</script>";
		}
	} else {
		echo "Field Should not be empty";
	}
}

?>

<!-- code for delete  -->
<?php
//if click on delete
if (isset($_GET['delete'])) {
	$stdid = $_GET['delete']; //keeping the delete id in stdid
	$query = "DELETE FROM service WHERE id={$stdid}";
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
		<title>Service</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="shortcut icon" href="images/img-2.jpg" type="image/png">

		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
				<h2 class="mb-4">SERVICE</h2>


				<button type="button" style="background: orange; border-color: orange;" class="btn btn-dark"
					onclick="togglePopUp('service')"> Add
					a Service</button>

				<div id="service" class="popup" style="display: none;">
					<div class="popup-content">
						<span class="close" onclick="togglePopUp('service')">&times;</span>

						<div class="container shadow m-5 p-4 mx-auto rounded">
							<form method="post">


								<div class="row mb-3">
									<div class="col">
										<label for="course" class="form-label">Service Logo</label>
										<input type="text" class="form-control" id="ser_logo" name="ser_logo"
											placeholder="Enter the service logo (e.g. fas fa-wine-bottle)">

										<select class="form-select mt-1" id="ser_logo" name="ser_logo">
											<option selected disabled>Or choose here </option>
											<option value="fas fa-tv">TV</option>
											<option value="fa fa-desktop">Desktop</option>
											<option value="fa fa-laptop">Laptop</option>
											<option value="fas fa-mobile-alt">Mobile</option>
											<option value="fas fa-palette">Brush</option>
											<option value="fas fa-envelope">Envelope</option>
											<option value="fas fa-utensils">Windows</option>
											<option value="fas fa-wine-bottle">Wine Bottle</option>
											<option value="fas fa-video">Video</option>
											<option value="fas fa-list">List</option>
											<option value="fas fa-volume-up">Volume</option>
										</select>
									</div>
								</div>


								<div class="row mb-3">
									<div class="col">
										<label for="start-year" class="form-label">Service Name</label>
										<input type="text" class="form-control" id="ser_name" name="ser_name"
											placeholder="Enter the service name">
									</div>
								</div>

								<div class="row mb-3">
									<div class="col">
										<label for="start-year" class="form-label">Service Description</label>
										<input type="text" class="form-control" id="ser_des" name="ser_des"
											placeholder="Enter the service description">
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-auto">
										<button type="submit" class="btn btnn" name="btn">Add Service</button>
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


					#ser_logo::placeholder {
						color: #a1a1a1;
					}
				</style>



				<?php
				if (isset($_GET['update'])) { //if click on update button
					$id = $_GET['update']; //geting update id from search query
					$query = "SELECT * FROM service WHERE id={$id}";
					$getData = mysqli_query($conn, $query); //getting data based on query
			
					while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
						$id = $rx['id'];

						$servicelogo = $rx['logo'];
						$servicename = $rx['name'];
						$servicedes = $rx['des'];

						?>

						<div class="container m-5 p-3 mx-auto hidethis">
							<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
								onclick="hideContainer()"></button>
							<form method="post" class="d-flex justify-content-around">
								<table class="bordered padded wide">
									<tr>
										<td>Update Service Logo</td>
										<td><input class="form-control me-3" type="text" name="servicelogo"
												value="<?php echo $servicelogo ?>"></td>
									</tr>
									<tr>
										<td>Update Service Name</td>
										<td><input class="form-control me-3" type="text" name="servicename"
												value="<?php echo $servicename ?>"></td>
									</tr>
									<tr>
										<td>Update Service Description</td>
										<td><input class="form-control me-3" type="text" name="servicedes"
												value="<?php echo $servicedes ?>"></td>
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

					$servicelogo = $_POST['servicelogo'];
					$servicename = $_POST['servicename'];
					$servicedes = $_POST['servicedes'];

					if (!empty($servicelogo) && !empty($servicename) && !empty($servicedes)) {
						$query = "UPDATE service SET logo='$servicelogo', name='$servicename', des='$servicedes' WHERE id='$id'";
						$updateQuery = mysqli_query($conn, $query);

						if ($updateQuery) {
							echo "<script>alert('Data successfully update.');</script>";
						}

					}

				}
				?>


				<?php
				// determine current page number
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

				// set the number of results per page
				$results_per_page = 5;

				// calculate the offset for the SQL query
				$offset = ($current_page - 1) * $results_per_page;

				// query to get the total number of rows in the table
				$query = "SELECT COUNT(*) as total FROM service";
				$readQuery = mysqli_query($conn, $query);
				$row = mysqli_fetch_assoc($readQuery);
				$total_results = $row['total'];

				// calculate the total number of pages
				$number_of_pages = ceil($total_results / $results_per_page);

				// query to get the data for the current page
				$query = "SELECT * FROM service LIMIT $results_per_page OFFSET $offset";
				$readQuery = mysqli_query($conn, $query);

				?>

				<div class="container">
					<table class="table table-bordered">
						<tr>
							<th>Logo</th>
							<th>Service Name</th>
							<th>Service Description</th>
							<th colspan="2">Edit</th>
						</tr>

						<?php
						if ($readQuery->num_rows > 0) {
							while ($rd = mysqli_fetch_assoc($readQuery)) {
								$stdid = $rd['id'];
								$servicelogo = $rd['logo'];
								$servicename = $rd['name'];
								$servicedes = $rd['des'];
								?>
								<tr>
									<td><?php echo '<i class="' . $servicelogo . ' fa-2x"></i>' ?></td>
									<td><?php echo $servicename ?></td>
									<td><?php echo $servicedes ?></td>
									<td><a href="service.php?update=<?php echo $stdid ?>"
											style="background: orange; border-color: orange;" class="btn btn-dark">Edit</a></td>
									<td><a href="service.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td>
								</tr>
								<?php
							}
						} else {
							echo "No data to show";
						}
						?>

					</table>

					<div class="text-center">
						<nav aria-label="Page navigation">
							<ul class="pagination">
								<?php
								for ($page = 1; $page <= $number_of_pages; $page++) {
									echo '<li class="page-item"><a href="service.php?page=' . $page . '" class="btn btnn text-white h5 mr-2">' . $page . '</a></li> ';
								}
								?>
							</ul>
						</nav>
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