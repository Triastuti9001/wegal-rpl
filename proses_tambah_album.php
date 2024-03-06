<?php
    include 'koneksi.php';
    session_start();

    $NamaAlbum=$_POST['NamaAlbum'];
    $Deskripsi=$_POST['Deskripsi'];
    $TanggalDibuat=date("Y-m-d");
    $UserID=$_SESSION['UserID'];

    $sql=mysqli_query($koneksi, "INSERT into album values('','$NamaAlbum','$Deskripsi',
    '$TanggalDibuat','$UserID')");

    header("Location:album.php");
?>


