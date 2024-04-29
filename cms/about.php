<?php

$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');

if (isset($_POST['btn'])) {
  $skillname = $_POST['skill_name'];
  $skillpercentage = $_POST['skill_percentage'];

  if (!empty($skillname) && !empty($skillpercentage)) {
    $query = "INSERT INTO about(skillname,skillper) VALUE('$skillname','$skillpercentage')";
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
  $query = "DELETE FROM about WHERE id={$stdid}";
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
    <title>About</title>
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
        <h2 class="mb-4">ABOUT</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a style="color: orange;" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
              aria-controls="profile" aria-selected="false">About Description</a>
          </li>
          <li class="nav-item">
            <a style="color: orange;" class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab"
              aria-controls="messages" aria-selected="false">Add Skills</a>
          </li>
        </ul>




        <div class="tab-content" id="myTabContent">






          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <!--  
  <div class="container  m-5 p-3 mx-auto">
        <form method="post" class="d-flex justify-content-around">

            <?php
            if (isset($_GET['updatedes'])) { //if click on update button
              $id = $_GET['updatedes']; //geting update id from search query
              $query = "SELECT * FROM aboutdes WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];
                $description = $rx['des'];
                ?>

            <textarea style="min-height: calc(5.5em + 0.75rem + 2px);" class="nah form-control me-3" name="des" rows="10" cols="80"><?php echo $description ?></textarea>
            <input class="btn btn-dark" type="submit" value="Update" name="update-btn-des">

            <?php
              } //closing previous php while/if backet
            } ?>

              <?php
              if (isset($_POST['update-btn-des'])) {

                $description = $_POST['des'];

                if (!empty($description)) {
                  $query = "UPDATE aboutdes SET des='$description' WHERE id='$id'";
                  $updateQuery = mysqli_query($conn, $query);
                  if ($updateQuery) {
                    echo "<script>window.history.go(-1); return false;</script>";
                  }
                }

              }
              ?>
        </form>
  </div>
              -->




            <div class="container-fluid">
              <div class="row">

                <div class="col-md-8">

                  <div class="container mt-5">
                    <table class="table table-bordered">
                      <tr>
                        <th>About Description</th>
                        <th></th>
                      </tr>

                      <?php
                      $query = "SELECT * FROM aboutdes";
                      $readQuery = mysqli_query($conn, $query);
                      if ($readQuery->num_rows > 0) {

                        while ($rd = mysqli_fetch_assoc($readQuery)) {

                          $stdid = $rd['id'];
                          $description = $rd['des'];
                          ?>

                          <tr>
                            <td><?php echo $description ?></td>




                            <td><button style="background: orange; border-color: orange;" type="button" class="btn btn-dark"
                                data-toggle="modal" data-target="#exampleModal">Update</button></td>
                            <!-- <td><a href="about.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td> -->
                          </tr>

                          <?php
                        }
                      } else {
                        echo "No data to show";
                      }
                      ?>


                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body p-4">


                              <form method="post" class="d-flex justify-content-around">

                                <?php
                                $query = "SELECT * FROM aboutdes";
                                $getData = mysqli_query($conn, $query); //getting data based on query
                              
                                while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                                  $id = $rx['id'];
                                  $description = $rx['des'];
                                  ?>

                                  <textarea style="min-height: calc(20.5em + 0.75rem + 2px);" class="nah form-control me-3"
                                    name="des" id="des" rows="10" cols="80"><?php echo $description ?></textarea>

                                  <div class="modal-footer">
                                    <input class="btn btnn" type="submit" value="Update" name="update-btn-des">
                                  </div>


                                  <?php
                                } //closing previous php while/if backet
                                ?>

                                <?php
                                if (isset($_POST['update-btn-des'])) {
                                  $description = $_POST['des'];
                                  if (!empty($description)) {
                                    $query = "UPDATE aboutdes SET des=? WHERE id=?";
                                    $stmt = mysqli_prepare($conn, $query);
                                    mysqli_stmt_bind_param($stmt, "si", $description, $id);
                                    if (mysqli_stmt_execute($stmt)) {
                                      echo "<script>alert('About Description Successfully Changed.');</script>";
                                      echo "<script>window.history.go(-1); </script>";
                                    } else {
                                      echo "Error updating record: " . mysqli_error($conn);
                                    }
                                  }
                                }
                                ?>

                              </form>

                            </div>
                          </div>
                        </div>
                      </div>



                    </table>
                  </div>

                </div>
              </div>
            </div>






          </div>








          <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">

            <div class="container shadow m-5 p-4 mx-auto rounded">
              <form method="post">


                <div class="row mb-3">
                  <div class="col">
                    <label for="course" class="form-label">Skill Name</label>
                    <input type="text" class="form-control" id="skill_name" name="skill_name" placeholder="Enter a skill">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="start-year" class="form-label">Skill Percentage</label>
                    <input type="number" class="form-control" id="skill_percentage" name="skill_percentage"
                      placeholder="Enter the percentage of skill">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-auto">
                    <button type="submit" class="btn btnn" name="btn">Add a Skill</button>
                  </div>
                </div>
              </form>
            </div>

            <hr>




            <?php
            if (isset($_GET['update'])) { //if click on update button
              $id = $_GET['update']; //geting update id from search query
              $query = "SELECT * FROM about WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];

                $skillname = $rx['skillname'];
                $skillpercentage = $rx['skillper'];

                ?>

                <div class="container  m-5 p-3 mx-auto hidethis">

                  <form method="post" class="d-flex justify-content-around">
                    <button style="padding: 0.7rem 1.2rem 1rem;" type="button" class="btn-close" aria-label="Close"
                      data-bs-dismiss="container" onclick="hideContainer()"></button>
                    <input class="form-control me-3" type="text" name="skill_name" value="<?php echo $skillname ?>">
                    <input class="form-control me-3" type="number" name="skill_percentage"
                      value="<?php echo $skillpercentage ?>">

                    <input class="btn btnn" type="submit" value="Update" name="update-btn">

                  </form>
                </div>

                <?php
              } //closing previous php while/if backet
            } ?>

            <?php
            if (isset($_POST['update-btn'])) {

              $skillname = $_POST['skill_name'];
              $skillpercentage = $_POST['skill_percentage'];

              if (!empty($skillname) && !empty($skillpercentage)) {
                $query = "UPDATE about SET skillname='$skillname', skillper='$skillpercentage' WHERE id='$id'";
                $updateQuery = mysqli_query($conn, $query);
                if ($updateQuery) {
                  echo "<script>window.history.go(-1); </script>";
                }
              }

            }
            ?>



            <div class="container">
              <table class="table table-bordered">
                <tr>
                  <th>Skill Name</th>
                  <th>Skill Percentage</th>
                  <th colspan="2">Edit</th>
                </tr>

                <?php
                $query = "SELECT * FROM about";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                  while ($rd = mysqli_fetch_assoc($readQuery)) {

                    $stdid = $rd['id'];
                    $skillname = $rd['skillname'];
                    $skillpercentage = $rd['skillper'];
                    ?>

                    <tr>
                      <td><?php echo $skillname ?></td>
                      <td><?php echo $skillpercentage ?></td>
                      <td><a href="about.php?update=<?php echo $stdid ?>" style="background: orange; border-color: orange;"
                          class="btn btn-dark">Edit</a></td>
                      <td><a href="about.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td>
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

          <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">

            <p>dasdasd</p>

          </div>



          <script>
            // Get the active tab ID from localStorage or set it to the default value
            var activeTab = localStorage.getItem('activeTab') || '#home';

            // Activate the saved tab
            $(activeTab + '-tab').tab('show');

            // Save the active tab ID to localStorage when a tab is clicked
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var targetTab = e.target.getAttribute('href');
              localStorage.setItem('activeTab', targetTab);
            });
          </script>




          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

          <script>
            // Get the active tab from local storage or default to the first tab
            var activeTab = localStorage.getItem('activeTab') || '#home';

            // Set the active tab on page load
            $('a[href="' + activeTab + '"]').tab('show');

            // Save the active tab to local storage when a new tab is shown
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              var targetTab = e.target.getAttribute('href');
              localStorage.setItem('activeTab', targetTab);
            });
          </script>

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

      <script>

        // Add event listener to all links on the page
        const links = document.querySelectorAll('a');

        links.forEach(link => {
          link.addEventListener('click', function (event) {
            // Check if the link has a hash in the URL
            if (link.getAttribute('href').charAt(0) === '#') {
              // Prevent the default behavior of the link
              event.preventDefault();

              // Add your own code here to handle the link click
              console.log('Link clicked!');
            }
          });
        });


      </script>

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