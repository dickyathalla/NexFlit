<?php
session_start();
if(isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
if (isset($_POST['submit'])) {

  $title = $_POST['submit'];

  include 'koneksi.php';
  $im = "SELECT * FROM movies WHERE name = '$title'" ;

  $records = mysqli_query($con,$im);
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php echo"<title> ".$title." </title>";?>
    
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
        <a class="navbar-brand" href="index.php">
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
                <a class="nav-link" href="admin.php">Add Movies</a>
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

    <!-- content -->
    <?php
    while($result = mysqli_fetch_assoc($records)){
      if(isset($_SESSION['username'])){
        $mname = $result['name'];
        $person = $_SESSION['username'];
        $movieid = $result['mid'];
        $current = $result['viewers'];
        $newcount = $current + 1;
        $newsql = "UPDATE movies SET viewers = '$newcount' WHERE name='$mname' ";
        $updatecount = mysqli_query($con,$newsql);
      }
        ?>

      <div class='container mt-2 mb-2 pt-3 text-white'>
        <form action="">
          <div class="row">
            <div class="col d-flex justify-content-center text-center">
            <table>
              <tr>
                <td>
                  <?php
                    echo"<img src='uploads/".$result['imgpath']."' class='align-items-center' height='310' width='240' style='margin-top: 55px;margin-left:0pxpx;margin-right:20px;' /><br>";
                  ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php
                  echo"<br><h1 style='display: inline;'>".ucwords($result['name'])."</h1>";
                  echo"<br><h4 style='display: inline;' >genre : </h4><h4 style='display: inline;'>".ucwords($result['genre'])."</h4>";
                  echo"<br><h4 style='display: inline;' >release year : </h4><h4 style='display: inline;'>".$result['rdate']."</h4>";
                  echo"<br><h4 style='display: inline;' >views : </h4><h4 style='display: inline;'>".$result['viewers']."</h4>";
                  ?>
                </td>                  
              </tr>
            </table>
            </div>
            <?php
            echo"<div class='ratio ratio-16x9 mt-3 ps-3 pe-3 mb-3'>";
            echo"<iframe class='embed-responsive-item' src='video-uploads/".$result['videopath']."' poster='uploads/".$result['imgpath']."' width='800' height='450' frameborder='0' allowfullscreen ></iframe>";
            echo"</video>";
            echo"</div>";
            ?>
          </div>
        </form>
      </div>

    <?php } ?>

  </body>
</html>

<?php
}
?>