<?php
session_start();
if (!isset($_SESSION['UserID'])) {
  header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand">Gallery</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index2.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="album.php">Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="foto.php">Foto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</head>

<body>
  <h4>Halaman Foto</h4>
  <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>


  <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Judul</td>
        <td><input type="text" name="JudulFoto"></td>
      </tr>
      <tr>
        <td>Deskripsi</td>
        <td><input type="text" name="DeskripsiFoto"></td>
      </tr>
      <tr>
        <td>Lokasi File</td>
        <td><input type="file" name="LokasiFile"></td>
      </tr>
      <tr>
        <td>Album</td>
        <td>
          <select name="AlbumID">
            <?php
            include "koneksi.php";
            $UserID = $_SESSION['UserID'];
            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$UserID'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
              <option value="<?= $data['AlbumID'] ?>"><?= $data['NamaAlbum'] ?></option>
            <?php
            }
            ?>
          </select>

        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Tambah"></td>
      </tr>
    </table>
  </form>

  <hr>
  <table class="table table-striped table-bordered mt-3 ml-2">
    <tr class="fw-bold">
      <td>No</td>
      <td>Foto ID</td>
      <td>Judul Foto</td>
      <td>Deskripsi</td>
      <td>TanggalUnggah</td>
      <td>Lokasi File</td>
      <td>St</td>
      <td>Album</td>
      <td>Jumlah Like</td>
      <td>Jumlah Dislike</td>
      <td>Status</td>
      <td>Aksi</td>
    </tr>
    <?php
    include "koneksi.php";
    $no = 1;
    $UserID = $_SESSION['UserID'];
    $sql = mysqli_query($koneksi, "SELECT * FROM foto,album WHERE foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['FotoID'] ?></td>
        <td><?= $data['JudulFoto'] ?></td>
        <td><?= $data['DeskripsiFoto'] ?></td>
        <td><?= $data['TanggalUnggah'] ?></td>
        <td>
          <img src="gambar/<?= $data['LokasiFile'] ?>" width="100px">
        </td>
        <td>
          <?php
          $FotoID = $data['FotoID'];
          $UserID = $_SESSION['UserID'];
          $ss = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID=$FotoID and UserID=$UserID");
          $dd = mysqli_fetch_array($ss); {
            if ($dd['Status'] == 0) { ?>
              <span class=""><i><i class="bi bi-eye-slash"></i> Foto ini bersifat privat </i></span>
            <?php } else if ($dd['Status'] == 1) { ?>
              <span class=""><i><i class="bi bi-eye"></i> Foto ini dipublish untuk umum </i></span>
            <?php } else { ?>
              <span class=""><i><i class="bi bi-eye"></i> Foto ini dipublish untuk anggota </i></span>
          <?php }
          } ?>
        </td>
        <td><?= $data['NamaAlbum'] ?></td>
        <td>
          <?php
          $FotoID = $data['FotoID'];
          $sql2 = mysqli_query($koneksi, "SELECT * from likefoto where FotoID='$FotoID'");
          echo mysqli_num_rows($sql2);
          ?>
        </td>
        <td>
          <?php
          $FotoID = $data['FotoID'];
          $sql2 = mysqli_query($koneksi, "SELECT * FROM dislike where FotoID='$FotoID'");
          echo mysqli_num_rows($sql2);
          ?>
        </td>
        <td>
          <?= $data['Status'] ?>
        </td>
        <td>

          <?php

          include 'koneksi.php';
          $status = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'");
          $unpublish = mysqli_fetch_array($status);{

          if ($unpublish['Status'] == 1) {
            echo '<a href="unpublish.php?FotoID=' . $data['FotoID'] . '" class="btn btn-secondary">UnPublish</a>
            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=2" class="btn btn-success">Publish Anggota</a>';
          } else if($unpublish['Status'] == 0) {
            echo '<a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=1" class="btn btn-info">Publish Umum</a>
            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=2" class="btn btn-success">Publish Anggota</a>';
          } else {
            echo '<a href="unpublish.php?FotoID=' . $data['FotoID'] . '" class="btn btn-secondary">UnPublish</a>
            <a href="publish.php?FotoID=' . $data['FotoID'] . '&publish=1" class="btn btn-info">Publish Umum</a>';
          }
        }
          ?>


          <a href="edit_foto.php?FotoID=<?= $data['FotoID'] ?>" class='btn btn-warning'>Edit</a>
          <a onclick="return confirm('Apakah anda yakin akan menghapus data')" href="hapus_foto.php?FotoID=<?= $data['FotoID'] ?>" class='btn btn-danger'>Hapus</a>
      </tr>
    <?php  } ?>
  </table>
</body>

</html>