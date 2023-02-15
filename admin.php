<?php
  session_start();
  if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NexFlit-Beyond Your Expectations</title>
  
  <!-- Logo -->
  <link type="image/x-icon" href="img/logo.png" rel="shortcut icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <style type="text/css">
  body { background: #181616 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
  </style>
  <link rel="stylesheet" href="css/app.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- box icons -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <!-- navbarr -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bx bx-movie-play bx-tada main-color"></i>
        <img src="img/NexFlit.png" alt="" width="60" height="15">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item align-self-center">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item align-self-center">
              <a class="nav-link" href="movie-list.php">Movies</a>
            </li>
            <li class="nav-item align-self-center">
              <a class="nav-link active" aria-current="page" href="admin.php">Add Movies</a>
            </li>
            <li class="nav-item align-self-center">
              <a class="nav-link" href="graphic.php">Graphic</a>
            </li>
            <li class="nav-item align-self-center">
              <?php if(isset($_SESSION['username'])){ ?>                                
                  <a class="nav-link" href="index.php?logout='1'"><span>Logout</span></a>
                    <?php } else if(isset($_GET['logout'])){ 
                    header("location: index.php"); ?>
                    <?php } else { ?>
                  <a class="nav-link" href="login_register/login.php"><span>Log In</span></a>
              <?php } ?>
            </li>
        </ul>
        <form action="search.php" method="POST" class="d-flex">
          <input class="form-control me-2" name="textoption" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-danger" name="submit" type="submit" value="Search">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- end navbarr -->

  <!-- add movies -->
  <div class="container align-self-center mt-5 pt-2 text-light">
    <?php if(isset($_SESSION['username'])){ ?>                    
  <div class="container-fluid mt-5 pt-3 text-white">
    <div class="container">
      <div class="jumbotron">
        <h1>NexFlit -  Upload Movie</h1>
          <form class="" action="admin-control.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control" placeholder="Movie Name" name="mname" value=""><br>
            <input type="text" class="form-control" placeholder="Year of Release" name="release" value=""><br>
            <input type="text" class="form-control" placeholder="Genre" name="genre" value=""><br><br>
            <div class="row">
              <div class="col">
                <table>
                  <tr>
                    <td> <label for=""><b>Upload Image : </b></label> </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="">
                          <input type="hidden" name="size" value="100000">
                          <input type="file" name="image" value="">
                        </div>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col mt-2">
                <table>
                  <tr>
                    <td> <label for=""><b>Upload Video : </b></label> </td>
                  </tr>
                  <tr>
                    <td>
                        <div class="">
                            <input type="hidden" name="size" value="30000000">

                            <input type="file" name="video" value="">
                        </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div> <br><br>
            <div class="signupbutton">
              <input type="submit"  class ="btn btn-danger" name="upload" value="Submit" >
            </div>
          </form>
      </div>
    </div>
  </div>
    <?php } else { ?>      
      <p class="display-5 fw-bold text-center mt-5 mb-0">Only user that can access this page</p>
      <img src="img/logo.png" alt="logo NexFlit" class="mx-auto d-block mt-3" sizes="" srcset="">
      <p class="display-5 fw-bold text-center mt-3">Please Login first!</p>
    <?php } ?>
  </div>
  <!-- end add movies -->
</body>
</html>
