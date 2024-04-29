<?php
//creating connection
$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');
// //checking connection
// if($conn){
//     echo "Connection Established";
// }

//if click on button take filed value & insert to db
if (isset($_POST['btn'])) {
  //finding input filed value into variable
  $education = $_POST['edu'];
  $school = $_POST['school'];
  $course = $_POST['course'];
  $startyear = $_POST['start_year'];
  $endyear = $_POST['end_year'];

  //if education & stdreg field not empty perform insert operation
  if (!empty($education) && !empty($school)) {
    //sql query // education string that's why keeping like string/text
    $query = "INSERT INTO education(edu,school,course,startyear,endyear) VALUE('$education','$school','$course','$startyear','$endyear')";

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
  $query = "DELETE FROM education WHERE id={$stdid}";
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
    <title>Education</title>
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
        <h2 class="mb-4">EDUCATION</h2>

        <button type="button" style="background: orange; border-color: orange;" class="btn btn-dark"
          onclick="togglePopUp('education')"> Add
          Educational Background</button>

        <div id="education" class="popup" style="display: none;">
          <div class="popup-content">
            <span class="close" onclick="togglePopUp('education')">&times;</span>

            <div class="container shadow m-5 p-4 mx-auto rounded">
              <form method="post">

                <div class="row mb-3">
                  <div class="col">
                    <label for="edu" class="form-label">Enter Education</label>
                    <select class="form-select" id="edu" name="edu">
                      <option selected disabled>Choose...</option>
                      <option value="Elementary">Elementary</option>
                      <option value="High School">High School</option>
                      <option value="College">College</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="school" class="form-label">Enter School</label>
                    <input type="text" class="form-control" id="school" name="school" placeholder="Enter School">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="course" class="form-label">Enter Course (Optional)</label>
                    <input type="text" class="form-control" id="course" name="course"
                      placeholder="Enter Course (Optional)">
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
                  <div class="col-auto">
                    <button type="submit" class="btn btnn" name="btn">Submit</button>
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>



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
          $query = "SELECT * FROM education WHERE id={$id}";
          $getData = mysqli_query($conn, $query); //getting data based on query
      
          while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
            $id = $rx['id'];

            $school = $rx['school'];
            $course = $rx['course'];
            $startyear = $rx['startyear'];
            $endyear = $rx['endyear'];
            $education = $rx['edu'];

            ?>

            <div class="container mb-5 mt-5 hidethis">
              <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
                onclick="hideContainer()"></button>
              <form method="post" class="d-flex justify-content-around">
                <table class="bordered padded wide">

                  <tr>
                    <td>Education</td>
                    <td>
                      <select class="form-select me-3" name="education">
                        <option disabled>Enter Education</option>
                        <option value="Elementary" <?php if ($education == 'Elementary')
                          echo 'selected'; ?>>Elementary</option>
                        <option value="High School" <?php if ($education == 'High School')
                          echo 'selected'; ?>>High School
                        </option>
                        <option value="College" <?php if ($education == 'College')
                          echo 'selected'; ?>>College</option>
                      </select>
                    </td>
                  </tr>

                  <tr>
                    <td>School</td>
                    <td> <input class="form-control me-3" type="text" name="school" value="<?php echo $school ?>"></td>
                  </tr>

                  <tr>
                    <td>Course</td>
                    <td> <input class="form-control me-3" type="text" name="course" value="<?php echo $course ?>"></td>
                  </tr>

                  <tr>
                    <td>Start Year</td>
                    <td><input class="form-control me-3" type="number" name="startyear" value="<?php echo $startyear ?>"></td>
                  </tr>

                  <tr>
                    <td>End School</td>
                    <td> <input class="form-control me-3" type="number" name="endyear" value="<?php echo $endyear ?>"></td>
                  </tr>

                  <tr>
                    <td colspan="2"> <input class="btn btnn" type="submit" value="Update" name="update-btn"></td>
                  </tr>
                </table>
              </form>
            </div>
            <?php
          } //closing previous php while/if backet
        } ?>

        <?php
        if (isset($_POST['update-btn'])) {

          $education = $_POST['education'];
          $school = $_POST['school'];
          $course = $_POST['course'];
          $startyear = $_POST['startyear'];
          $endyear = $_POST['endyear'];

          if (!empty($education) && !empty($school) && !empty($startyear) && !empty($endyear)) {
            $query = "UPDATE education SET edu='$education', school='$school', course='$course', startyear='$startyear', endyear='$endyear' WHERE id='$id'";
            $updateQuery = mysqli_query($conn, $query);
            if ($updateQuery) {
              echo "<script>alert('Data successfully update.');</script>";
            }
          }

        }
        ?>


        <hr>

        <?php
        // pagination
        $limit = 4; // number of items per page
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $query = "SELECT * FROM education ORDER BY endyear DESC LIMIT $offset, $limit";
        $readQuery = mysqli_query($conn, $query);

        // count number of rows in the table
        $countQuery = mysqli_query($conn, "SELECT COUNT(*) FROM education");
        $rowCount = mysqli_fetch_row($countQuery)[0];

        // calculate number of pages
        $number_of_pages = ceil($rowCount / $limit);

        ?>

        <div class="container">
          <table class="table table-bordered">
            <tr>
              <th>Education</th>
              <th>School</th>
              <th>Course</th>
              <th>Start Year</th>
              <th>End Year</th>
              <th colspan="2">Edit</th>
            </tr>
            <?php
            if ($readQuery->num_rows > 0) {
              while ($rd = mysqli_fetch_assoc($readQuery)) {
                $stdid = $rd['id'];
                $education = $rd['edu'];
                $school = $rd['school'];
                $course = $rd['course'];
                $startyear = $rd['startyear'];
                $endyear = $rd['endyear'];
                ?>
                <tr>
                  <td><?php echo $education ?></td>
                  <td><?php echo $school ?></td>
                  <td><?php echo $course ?></td>
                  <td><?php echo $startyear ?></td>
                  <td><?php echo $endyear ?></td>
                  <td><a href="education.php?update=<?php echo $stdid ?>" style="background: orange; border-color: orange;"
                      class="btn btn-dark">Update</a></td>
                  <td><a href="education.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
              }
            } else {
              echo "<tr><td colspan='7'>No data to show</td></tr>";
            }
            ?>
          </table>

          <div class="text-center">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
                  echo '<li class="page-item"><a href="education.php?page=' . $page . '" class="btn btnn text-orange h5 mr-2">' . $page . '</a></li> ';
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