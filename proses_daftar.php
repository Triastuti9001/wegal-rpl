<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];
 
mysqli_query($koneksi, "INSERT into user values('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");

header("location:login.php?pesan=info_daftar");
 
?>

