<?php

$conn = mysqli_connect('localhost', 'root', '', 'ahmportfolio');


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

        <h2 class="mb-4">HOME</h2>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a style="color: orange;" class="nav-link active" id="homephotos-tab" data-toggle="tab" href="#homephotos"
              role="tab" aria-controls="homephotos" aria-selected="true">Edit Home Area</a>
          </li>
          <li class="nav-item">
            <a style="color: orange;" class="nav-link" id="displayskillname-tab" data-toggle="tab"
              href="#displayskillname" role="tab" aria-controls="displayskillname" aria-selected="false">Edit Names and
              Skills</a>
          </li>
        </ul>




        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="homephotos" role="tabpanel" aria-labelledby="homephotos-tab">

            <?php

            // Get uploaded file
            if (isset($_FILES['homeimg'])) {
              // Handle Home Image upload
              $homeimg = $_FILES['homeimg']['name'];
              $targetDir = "../img/";
              $sql = "UPDATE homephotos SET home_img='$homeimg' WHERE id=1"; // Assumes there is only one row in the table
              if (mysqli_query($conn, $sql)) {
                move_uploaded_file($_FILES['homeimg']['tmp_name'], $targetDir . $homeimg);
                echo "Home Image uploaded successfully.";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            } else if (isset($_FILES['coverimg'])) {
              // Handle Cover Image upload
              $coverimg = $_FILES['coverimg']['name'];
              $targetDir = "../img/";
              $sql = "UPDATE homephotos SET cover_img='$coverimg' WHERE id=1"; // Assumes there is only one row in the table
              if (mysqli_query($conn, $sql)) {
                move_uploaded_file($_FILES['coverimg']['tmp_name'], $targetDir . $coverimg);
                echo "Cover Image uploaded successfully.";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }

            } else if (isset($_FILES['signatureimg'])) {
              // Handle Signature Image upload
              $signatureimg = $_FILES['signatureimg']['name'];
              $targetDir = "../img/";
              $sql = "UPDATE homephotos SET signature_img='$signatureimg' WHERE id=1"; // Assumes there is only one row in the table
              if (mysqli_query($conn, $sql)) {
                move_uploaded_file($_FILES['signatureimg']['tmp_name'], $targetDir . $signatureimg);
                echo "Signature Image uploaded successfully.";
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            }

            ?>



            <div class="container mt-5">

              <div class="container">

                <button style="background: orange; border-color: orange;" type="button" class="btn btn-dark"
                  onclick="togglePopUp('popup3')">
                  Edit Logo Image</button>

                <div id="popup3" class="popup mt-3" style="display: none;">
                  <div class="popup-content">
                    <span class="close" onclick="togglePopUp('popup3')">&times;</span>

                    <form method="post" action="index.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="homeimg">Logo Image</label>
                        <input type="file" class="form-control-file" id="homeimg" name="homeimg">
                      </div>
                      <button type="submit" class="btnn">Upload Logo Image</button>
                    </form>

                  </div>
                </div>

              </div>
              <hr>

              <div class="container mt-5">

                <button style="background: orange; border-color: orange;" type="button" class="btn btn-dark"
                  onclick="togglePopUp('popup4')">
                  Update Profie Image</button>

                <div id="popup4" class="popup mt-3" style="display: none;">
                  <div class="popup-content">
                    <span class="close" onclick="togglePopUp('popup4')">&times;</span>

                    <form method="post" action="index.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="coverimg">Profie Image</label>
                        <input type="file" class="form-control-file" id="coverimg" name="coverimg">
                      </div>
                      <button type="submit" class="btnn">Upload Profie Image</button>
                    </form>

                  </div>
                </div>
              </div>



            </div>

            <hr>

            <table>

              <tr>

                <td>Logo Image</td>
                <td>Profile Image</td>

              </tr>

              <tr>
                <td>

                  <?php
                  $result = $conn->query("SELECT * FROM homephotos");
                  while ($row = $result->fetch_assoc()) {
                    echo '<img style="width:15rem;border-radius: 10px;" src="../img/' . $row["home_img"] . '" alt="Photo">';
                  }
                  ?>
                </td>



                <td>
                  <?php
                  $result = $conn->query("SELECT * FROM homephotos");
                  while ($row = $result->fetch_assoc()) {
                    echo '<img style="width:15rem;border-radius: 10px;" src="../img/' . $row["cover_img"] . '" alt="Photo">';
                  }
                  ?>
                </td>





              </tr>

            </table>


            <hr>

          </div>




          <div class="tab-pane fade" id="displayskillname" role="tabpanel" aria-labelledby="displayskillname-tab">



            <?php
            if (isset($_GET['updatesoc'])) { //if click on update button
              $id = $_GET['updatesoc']; //geting update id from search query
              $query = "SELECT * FROM displaycontent WHERE id={$id}";
              $getData = mysqli_query($conn, $query); //getting data based on query
          
              while ($rx = mysqli_fetch_assoc($getData)) { //keep data rx variable afte fetch
                $id = $rx['id'];

                $displayname = $rx['display_name'];
                $skill1 = $rx['display_skill_1'];
                $skill2 = $rx['display_skill_2'];
                $skill3 = $rx['display_skill_3'];

                ?>

                <div class="container  m-5 p-3 mx-auto hidethis">
                  <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="container"
                    onclick="hideContainer()"></button>
                  <form method="post" class="d-flex justify-content-around">
                    <table class="bordered padded wide">

                      <tr>
                        <td>Name</td>
                        <td><input class="form-control me-3" type="text" name="displayname"
                            value="<?php echo $displayname ?>"></td>
                      </tr>

                      <tr>
                        <td>Skill 1</td>
                        <td><input class="form-control me-3" type="text" name="skill1" value="<?php echo $skill1 ?>"></td>
                      </tr>

                      <tr>
                        <td>Skill 2</td>
                        <td><input class="form-control me-3" type="text" name="skill2" value="<?php echo $skill2 ?>"></td>
                      </tr>

                      <tr>
                        <td>Skill 3</td>
                        <td><input class="form-control me-3" type="text" name="skill3" value="<?php echo $skill3 ?>"></td>
                      </tr>


                      <tr>
                        <td colspan="2"><input class="btn btnn" type="submit" value="Update" name="update-btn"></td>
                      </tr>

                    </table>
                  </form>
                </div>
                <?php
              } //closing previous php while/if backet
            } ?>

            <?php
            if (isset($_POST['update-btn'])) {

              $displayname = $_POST['displayname'];
              $skill1 = $_POST['skill1'];
              $skill2 = $_POST['skill2'];
              $skill3 = $_POST['skill3'];

              if (!empty($displayname)) {
                $query = "UPDATE displaycontent SET display_name='$displayname', display_skill_1='$skill1', display_skill_2='$skill2', display_skill_3='$skill3' WHERE id='$id'";
                $updateQuery = mysqli_query($conn, $query);

                if ($updateQuery) {
                  echo "<script>alert('Data successfully update.');</script>";
                }

              }

            }
            ?>


            <div class="container mt-5">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Skill 1</th>
                  <th>Skill 2</th>
                  <th>Skill 3</th>
                  <th>Edit</th>
                </tr>

                <?php
                $query = "SELECT * FROM displaycontent";
                $readQuery = mysqli_query($conn, $query);
                if ($readQuery->num_rows > 0) {

                  while ($rd = mysqli_fetch_assoc($readQuery)) {

                    $stdid = $rd['id'];
                    $displayname = $rd['display_name'];
                    $skill1 = $rd['display_skill_1'];
                    $skill2 = $rd['display_skill_2'];
                    $skill3 = $rd['display_skill_3'];

                    ?>
                    <tr>
                      <td><?php echo $displayname ?></td>
                      <td><?php echo $skill1 ?></td>
                      <td><?php echo $skill2 ?></td>
                      <td><?php echo $skill3 ?></td>


                      <td><a href="index.php?updatesoc=<?php echo $stdid ?>"
                          style="background: orange; color: white; border-color: orange;" class="btn btnn">Edit</a></td>
                      <!-- <td><a href="index.php?delete=<?php echo $stdid ?>" class="btn btn-danger">Delete</a></td> -->
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



        </div>



        <script>
          // Get the active tab ID from localStorage or set it to the default value
          var activeTab = localStorage.getItem('activeTab') || '#homephotos';

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