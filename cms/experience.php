<?php
$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');

if (isset($_POST['btn'])) {

  $companyname = $_POST['companyname'];
  $companyaddr = $_POST['companyaddr'];
  $jobtitle = $_POST['jobtitle'];
  $jobdes = $_POST['jobdes'];
  $startyear = $_POST['start_year'];
  $endyear = $_POST['end_year'];
  $startyearmonth = $_POST['start_year_month'];
  $endyearmonth = $_POST['end_year_month'];

  if (!empty($companyname) && !empty($companyaddr) && !empty($jobtitle) && !empty($jobdes)) {

    $query = "INSERT INTO experience(company_name,company_address,job_title,job_description,start_year,end_year,start_year_month,end_year_month) VALUE('$companyname','$companyaddr','$jobtitle','$jobdes','$startyear','$endyear','$startyearmonth','$endyearmonth')";

    //sending data to database
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
  $query = "DELETE FROM experience WHERE id={$stdid}";
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
    <title>Experience</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="images/img-2.jpg" type="image/png">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

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
        <h2 class="mb-4">EXPERIENCE</h2>

        <button type="button" style="background: orange; border-color: orange;" class="btn btn-dark"
          onclick="togglePopUp('experience')"> Add Experience</button>

        <div id="experience" class="popup" style="display: none;">
          <div class="popup-content">
            <span class="close" onclick="togglePopUp('experience')">&times;</span>

            <div class="container shadow m-5 p-4 mx-auto rounded">

              <form method="post">

                <div class="row mb-3">
                  <div class="col">
                    <label for="school" class="form-label">Enter Company Name</label>
                    <input type="text" class="form-control" id="companyname" name="companyname"
                      placeholder="Enter Company Name">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="course" class="form-label">Enter Company Address</label>
                    <input type="text" class="form-control" id="companyaddr" name="companyaddr"
                      placeholder="Enter Company Address">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="course" class="form-label">Enter Job Title</label>
                    <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Enter Job Title">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="course" class="form-label">Enter Job Description</label>
                    <input type="text" class="form-control" id="jobdes" name="jobdes" placeholder="Enter Job Description">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="start-year" class="form-label">Start year</label>
                    <input type="number" class="form-control" id="start-year" name="start_year" placeholder="Start year">
                  </div>
                  <div class="col">
                    <label for="end-year" class="form-label">End year</label>
                    <input type="number" class="form-control" id="end-year" name="end_year" placeholder="End year">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="start_year_month" class="form-label">Enter Start Month</label>
                    <select class="form-select" id="start_year_month" name="start_year_month">
                      <option disabled>Enter Month</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="end_year_month" class="form-label">Enter End Month</label>
                    <select class="form-select" id="end_year_month" name="end_year_month">
                      <option disabled>Enter Month</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
                </div>



                <div class="row mb-3">
                  <div class="col-auto">
                    <button type="submit" class="btn btnn" name="btn">Submit</button>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>





        <!-- 
    <div class="container  m-5 p-3 mx-auto">
        <form method="post" class="d-flex justify-content-around">

            <?php
            if (isset($_GET['update'])) { //if click on update button
              $id = $_GET['update']; //geting update id from search query
              $query = "SELECT * FROM experience WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];


                $companyname = $rx['company_name'];
                $companyaddr = $rx['company_address'];
                $jobtitle = $rx['job_title'];
                $jobdes = $rx['job_description'];
                $startyear = $rx['start_year'];
                $endyear = $rx['end_year'];
                $startyearmonth = $rx['start_year_month'];
                $endyearmonth = $rx['end_year_month'];

                ?>

            <input class="form-control me-3" type="text" name="companyname" value="<?php echo $companyname ?>">
            <input class="form-control me-3" type="text" name="companyaddr" value="<?php echo $companyaddr ?>">
            <input class="form-control me-3" type="text" name="jobtitle" value="<?php echo $jobtitle ?>">
            <input class="form-control me-3" type="text" name="jobdes" value="<?php echo $jobdes ?>">
            
            <input class="form-control me-3" type="number" name="startyear" value="<?php echo $startyear ?>">
            <input class="form-control me-3" type="number" name="endyear" value="<?php echo $endyear ?>">

            <select class="form-select me-3" name="startyearmonth">
              <option disabled>Enter Month</option>
              <option value="January" <?php if ($startyearmonth == 'January')
                echo 'selected'; ?>>January</option>
              <option value="February" <?php if ($startyearmonth == 'February')
                echo 'selected'; ?>>February</option>
              <option value="March" <?php if ($startyearmonth == 'March')
                echo 'selected'; ?>>March</option>
              <option value="April" <?php if ($startyearmonth == 'April')
                echo 'selected'; ?>>April</option>
              <option value="May" <?php if ($startyearmonth == 'May')
                echo 'selected'; ?>>May</option>
              <option value="June" <?php if ($startyearmonth == 'June')
                echo 'selected'; ?>>June</option>
              <option value="July" <?php if ($startyearmonth == 'July')
                echo 'selected'; ?>>July</option>
              <option value="August" <?php if ($startyearmonth == 'August')
                echo 'selected'; ?>>August</option>
              <option value="September" <?php if ($startyearmonth == 'September')
                echo 'selected'; ?>>September</option>
              <option value="October" <?php if ($startyearmonth == 'October')
                echo 'selected'; ?>>October</option>
              <option value="November" <?php if ($startyearmonth == 'November')
                echo 'selected'; ?>>November</option>
              <option value="December" <?php if ($startyearmonth == 'December')
                echo 'selected'; ?>>December</option>
            </select>

            <select class="form-select me-3" name="endyearmonth">
              <option disabled>Enter Month</option>
              <option value="January" <?php if ($endyearmonth == 'January')
                echo 'selected'; ?>>January</option>
              <option value="February" <?php if ($endyearmonth == 'February')
                echo 'selected'; ?>>February</option>
              <option value="March" <?php if ($endyearmonth == 'March')
                echo 'selected'; ?>>March</option>
              <option value="April" <?php if ($endyearmonth == 'April')
                echo 'selected'; ?>>April</option>
              <option value="May" <?php if ($endyearmonth == 'May')
                echo 'selected'; ?>>May</option>
              <option value="June" <?php if ($endyearmonth == 'June')
                echo 'selected'; ?>>June</option>
              <option value="July" <?php if ($endyearmonth == 'July')
                echo 'selected'; ?>>July</option>
              <option value="August" <?php if ($endyearmonth == 'August')
                echo 'selected'; ?>>August</option>
              <option value="September" <?php if ($endyearmonth == 'September')
                echo 'selected'; ?>>September</option>
              <option value="October" <?php if ($endyearmonth == 'October')
                echo 'selected'; ?>>October</option>
              <option value="November" <?php if ($endyearmonth == 'November')
                echo 'selected'; ?>>November</option>
              <option value="December" <?php if ($endyearmonth == 'December')
                echo 'selected'; ?>>December</option>
            </select>

            <input class="btn btn-dark" type="submit" value="Update" name="update-btn">

            <?php
              } //closing previous php while/if backet
            } ?>

              <?php
              if (isset($_POST['update-btn'])) {

                $companyname = $_POST['companyname'];
                $companyaddr = $_POST['companyaddr'];
                $jobtitle = $_POST['jobtitle'];
                $jobdes = $_POST['jobdes'];
                $startyear = $_POST['startyear'];
                $endyear = $_POST['endyear'];
                $startyearmonth = $_POST['start_year_month'];
                $endyearmonth = $_POST['end_year_month'];

                if (!empty($companyname) && !empty($companyaddr) && !empty($jobtitle) && !empty($jobdes) && !empty($startyear) && !empty($endyear)) {
                  $query = "UPDATE experience SET company_name='$companyname', company_address='$companyaddr', job_title='$jobtitle', job_description='$jobdes', start_year='$startyear', end_year='$endyear', start_year_month='$startyearmonth', start_year_month='$endyearmonth' WHERE id='$id'";
                  $updateQuery = mysqli_query($conn, $query);
                  // if($updateQuery){
                  //   echo "Data Updated successful";
                  // }
                }

              }
              ?>
        </form>
    </div>
              -->

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
        </style>






        <?php
        if (isset($_GET['update'])) { //if click on update button
          $id = $_GET['update']; //geting update id from search query
          $query = "SELECT * FROM experience WHERE id={$id}";
          $getData = mysqli_query($conn, $query); //getting data based on query
      
          while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
            $id = $rx['id'];


            $companyname = $rx['company_name'];
            $companyaddr = $rx['company_address'];
            $jobtitle = $rx['job_title'];
            $jobdes = $rx['job_description'];
            $startyear = $rx['start_year'];
            $endyear = $rx['end_year'];
            $startyearmonth = $rx['start_year_month'];
            $endyearmonth = $rx['end_year_month'];

            ?>
            <div class="container mb-5 mt-5 hidethis">
              <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
                onclick="hideContainer()"></button>
              <form method="post" class="d-flex justify-content-around">
                <table class="bordered padded wide">

                  <tr>
                    <td colspan="2">
                      <h4>UPDATE EXPERIENCE DETAILS</h4>
                    </td>
                  </tr>
                  <tr>
                    <td>Company Name</td>
                    <td><input class="form-control me-3" type="text" name="companyname" value="<?php echo $companyname ?>">
                    </td>
                  </tr>

                  <tr>
                    <td>Company Address</td>
                    <td><input class="form-control me-3" type="text" name="companyaddr" value="<?php echo $companyaddr ?>">
                    </td>
                  </tr>

                  <tr>
                    <td>Job Title</td>
                    <td><input class="form-control me-3" type="text" name="jobtitle" value="<?php echo $jobtitle ?>"></td>
                  </tr>

                  <tr>
                    <td>Job Description</td>
                    <td><input class="form-control me-3" type="text" name="jobdes" value="<?php echo $jobdes ?>"></td>
                  </tr>
                  <tr>
                    <td>Start Year</td>
                    <td><input class="form-control me-3" type="number" name="startyear" value="<?php echo $startyear ?>"></td>
                  </tr>
                  <tr>
                    <td>Start Year Month</td>
                    <td>
                      <select class="form-select me-3" name="startyearmonth">
                        <option disabled>Enter Month</option>
                        <option value="January" <?php if ($startyearmonth == 'January')
                          echo 'selected'; ?>>January</option>
                        <option value="February" <?php if ($startyearmonth == 'February')
                          echo 'selected'; ?>>February</option>
                        <option value="March" <?php if ($startyearmonth == 'March')
                          echo 'selected'; ?>>March</option>
                        <option value="April" <?php if ($startyearmonth == 'April')
                          echo 'selected'; ?>>April</option>
                        <option value="May" <?php if ($startyearmonth == 'May')
                          echo 'selected'; ?>>May</option>
                        <option value="June" <?php if ($startyearmonth == 'June')
                          echo 'selected'; ?>>June</option>
                        <option value="July" <?php if ($startyearmonth == 'July')
                          echo 'selected'; ?>>July</option>
                        <option value="August" <?php if ($startyearmonth == 'August')
                          echo 'selected'; ?>>August</option>
                        <option value="September" <?php if ($startyearmonth == 'September')
                          echo 'selected'; ?>>September
                        </option>
                        <option value="October" <?php if ($startyearmonth == 'October')
                          echo 'selected'; ?>>October</option>
                        <option value="November" <?php if ($startyearmonth == 'November')
                          echo 'selected'; ?>>November</option>
                        <option value="December" <?php if ($startyearmonth == 'December')
                          echo 'selected'; ?>>December</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>End Year</td>
                    <td><input class="form-control me-3" type="number" name="endyear" value="<?php echo $endyear ?>"></td>
                  </tr>

                  <tr>
                    <td>End Year Month</td>
                    <td>
                      <select class="form-select me-3" name="endyearmonth">
                        <option disabled>Enter Month</option>
                        <option value="January" <?php if ($endyearmonth == 'January')
                          echo 'selected'; ?>>January</option>
                        <option value="February" <?php if ($endyearmonth == 'February')
                          echo 'selected'; ?>>February</option>
                        <option value="March" <?php if ($endyearmonth == 'March')
                          echo 'selected'; ?>>March</option>
                        <option value="April" <?php if ($endyearmonth == 'April')
                          echo 'selected'; ?>>April</option>
                        <option value="May" <?php if ($endyearmonth == 'May')
                          echo 'selected'; ?>>May</option>
                        <option value="June" <?php if ($endyearmonth == 'June')
                          echo 'selected'; ?>>June</option>
                        <option value="July" <?php if ($endyearmonth == 'July')
                          echo 'selected'; ?>>July</option>
                        <option value="August" <?php if ($endyearmonth == 'August')
                          echo 'selected'; ?>>August</option>
                        <option value="September" <?php if ($endyearmonth == 'September')
                          echo 'selected'; ?>>September</option>
                        <option value="October" <?php if ($endyearmonth == 'October')
                          echo 'selected'; ?>>October</option>
                        <option value="November" <?php if ($endyearmonth == 'November')
                          echo 'selected'; ?>>November</option>
                        <option value="December" <?php if ($endyearmonth == 'December')
                          echo 'selected'; ?>>December</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><input class="btn btnn" type="submit" value="Update" name="update-btn"></td>
                  </tr>


                </table>
            </div>
            </form>
            <?php
          } //closing previous php while/if backet
        } ?>

        <?php
        if (isset($_POST['update-btn'])) {

          $companyname = $_POST['companyname'];
          $companyaddr = $_POST['companyaddr'];
          $jobtitle = $_POST['jobtitle'];
          $jobdes = $_POST['jobdes'];
          $startyear = $_POST['startyear'];
          $endyear = $_POST['endyear'];
          $startyearmonth = $_POST['startyearmonth'];
          $endyearmonth = $_POST['endyearmonth'];

          if (!empty($companyname) && !empty($companyaddr) && !empty($jobtitle) && !empty($jobdes) && !empty($startyear) && !empty($endyear)) {
            $query = "UPDATE experience SET company_name='$companyname', company_address='$companyaddr', job_title='$jobtitle', job_description='$jobdes', start_year='$startyear', end_year='$endyear', start_year_month='$startyearmonth', end_year_month='$endyearmonth' WHERE id='$id'";
            $updateQuery = mysqli_query($conn, $query);
            if ($updateQuery) {
              echo "<script>alert('Experience details successfully updated.');</script>";
            }
          }

        }
        ?>




        <hr>

        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Company Name</th>
              <th>Company Address</th>
              <th>Job Title</th>
              <th>Job Description</th>
              <th>Start Year</th>
              <th>End Year</th>
              <th>Start Year Month</th>
              <th>End Year Month</th>
              <th colspan="2">Edit</th>
            </tr>
            <?php
            $result_per_page = 2;
            $query = "SELECT * FROM experience ORDER BY end_year DESC";
            $result = mysqli_query($conn, $query);
            $number_of_results = mysqli_num_rows($result);
            $number_of_pages = ceil($number_of_results / $result_per_page);

            if (!isset($_GET['page'])) {
              $page = 1;
            } else {
              $page = $_GET['page'];
            }

            $this_page_first_result = ($page - 1) * $result_per_page;

            $query = "SELECT * FROM experience ORDER BY end_year DESC LIMIT " . $this_page_first_result . ',' . $result_per_page;
            $readQuery = mysqli_query($conn, $query);

            if ($readQuery->num_rows > 0) {
              while ($rd = mysqli_fetch_assoc($readQuery)) {
                $stdid = $rd['id'];
                $companyname = $rd['company_name'];
                $companyaddr = $rd['company_address'];
                $jobtitle = $rd['job_title'];
                $jobdes = $rd['job_description'];
                $startyear = $rd['start_year'];
                $endyear = $rd['end_year'];
                $startyearmonth = $rd['start_year_month'];
                $endyearmonth = $rd['end_year_month'];
                ?>
                <tr>
                  <td><?php echo "$companyname" ?></td>
                  <td><?php echo "$companyaddr" ?></td>
                  <td><?php echo "$jobtitle" ?></td>
                  <td><?php echo "$jobdes" ?></td>
                  <td><?php echo "$startyear" ?></td>
                  <td><?php echo "$endyear" ?></td>
                  <td><?php echo "$startyearmonth" ?></td>
                  <td><?php echo "$endyearmonth" ?></td>
                  <td><a href="experience.php?update=<?php echo "$stdid" ?>" style="background: orange; border-color: orange;"
                      class="btn btn-dark">Edit</a></td>
                  <td><a href="experience.php?delete=<?php echo "$stdid" ?>" class="btn btn-danger">Delete</a></td>
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
                  echo '<li class="page-item"><a href="experience.php?page=' . $page . '" class="btn btnn text-white h5 mr-2">' . $page . '</a></li> ';
                }
                ?>
              </ul>
            </nav>
          </div>

        </div>




        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->



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