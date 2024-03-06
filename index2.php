<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="index.php">Beranda</a>
                    <a class="nav-link" href="album.php">Album</a>
                    <a class="nav-link" href="foto.php">Foto</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
           <a href="profil.php"><img src="assets/img/Kachow!.jpg" class="rounded-circle" width="40px" alt="..."></a>
        </div>
    </nav>

<style>
        @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

body  {
    background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
  background-size:cover;
        -webkit-animation: slidein 100s;
        animation: slidein 100s;

        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;

        -webkit-animation-direction: alternate;
        animation-direction: alternate;              
}

@-webkit-keyframes slidein {
from {background-position: top; background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}
}

@keyframes slidein {
from {background-position: top;background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}

}



.center
{
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(75, 75, 250, 0.3);
  border-radius: 3px;
}
.center h1{
  text-align:center;
  color:white;
  font-family: 'Source Code Pro', monospace;
  text-transform:uppercase;
}
</style>
</head>

<body>
<div class="">
        <div class="row">
            <?php
            include 'koneksi.php';
            $sql = mysqli_query($koneksi,"SELECT * FROM foto WHERE Status='1' or Status='2'");
            while($data=mysqli_fetch_array($sql)){
                ?>

        <div class="col-md-3">
            <div class="" style="min-height: 100px;">
            <a href="zoom.php?ID=<?= $data['FotoID'] ?>"><img src="gambar/<?=$data['LokasiFile']?>" class="card-img-top mt-2 rounded-4" width="100px" alt="..."></a>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
</body>
</html>