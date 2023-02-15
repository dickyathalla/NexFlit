<?php
session_start();
if (isset($_POST['upload'])) {

  include 'koneksi.php';

  $targetvid = "video-uploads/".basename($_FILES['video']['name']);
  $target = "uploads/".basename($_FILES['image']['name']);
  $name = strtolower($_POST['mname']);
  $rdate = $_POST['release'];
  $genre = strtolower($_POST['genre']);
  $image = $_FILES['image']['name'];
  $video = $_FILES['video']['name'];

  $sql = "INSERT INTO movies (name, rdate, genre, imgpath, videopath)
    VALUES('$name','$rdate','$genre','$image','$video')";

  mysqli_query($con,$sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'],$target) && move_uploaded_file($_FILES['video']['tmp_name'],$targetvid)) {
    header("Location: index.php");
  }else {
    echo "error uploading";
  }
}


?>
