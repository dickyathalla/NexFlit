<?php
session_start();
if(isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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
                <a class="nav-link active" aria-current="page" href="movie-list.php">Movies</a>
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

    <!-- Daftar Film -->
    <div class="container align-self-center mt-5 pt-2 text-light">
    <?php if(isset($_SESSION['username'])){ ?>
    <div class="container text-center mt-5 pt-3" style="margin-top: 20px">
      <div class="table-responsive">
        <h2 class="display-4 text-white">Daftar Movies</h2>
        <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th>No</th>    
                <th>Nama Film</th>
                <th>Genre</th>
                <th>Tahun Rilis</th>
                <th>viewers</th>
                <th>Poster</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
                //siapkan query untuk mengmbil semua data barang yang ada
                include "koneksi.php";
                $sql = "SELECT * FROM movies";
                $kueri = mysqli_query($con, $sql);
                //karena datanya lebih dari 1 record maka gunakan while
                //semua data disimpan dalam array
                //loopnr untuk menampilkan data barang
                $no = 1;
                while($data = mysqli_fetch_array($kueri)){
            ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php //tampilin data dari database
                //$data adalah nama array yg kita buat
                // kodebarang adalah nama field yang ada di tabel
                echo $data['name'];?></td>
                <td><?php echo $data['genre'];?></td>
                <td><?php echo $data['rdate'];?></td>
                <td><?php echo $data['viewers'];?></td>
                <td><?php echo $data['imgpath'];?></td>
                <td>
                <a class="bi bi-x-square-fill text-white" href="delete.php?kode=<?php echo $data['name']?>"></a>
                </td>
            </tr>
            <?php
                $no++;}
            ?>
        </tbody>    
        </table>
      </div>
    </div>
    <?php } else { ?>      
        <p class="display-5 fw-bold text-center mt-5 mb-0">Only user that can access this page</p>
        <img src="img/logo.png" alt="logo NexFlit" class="mx-auto d-block mt-3" sizes="" srcset="">
        <p class="display-5 fw-bold text-center mt-3">Please Login first!</p>
      <?php } ?>
    </div>
    <!-- Akhir Daftar Barang -->

</body>