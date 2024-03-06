<?php
$UserID = $_SESSION['UserID'];
$Username = $_POST['Username'];
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];

include 'koneksi.php';
$sql = "UPDATE user SET UserID='$UserID', Username='$Username', Email='$Email', NamaLengkap='$NamaLengkap', Alamat='$Alamat' WHERE UserID='$UserID'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("location:profil.php");
}else {
    echo"<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('profil.php');</script>";
}