<?php
    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['UserID'])){
        //Untuk bisa like harus login dulu
        header("location:index.php");
    }else{
        $FotoID=$_GET['FotoID'];
        $UserID=$_SESSION['UserID'];
        //Cek apakah user sudah pernah like foto ini apa belum

        $sql=mysqli_query($koneksi,"SELECT * from dislike where FotoID='$FotoID' and UserID='$UserID'");

        if(mysqli_num_rows($sql)==1){
            //User sudah pernah like foto ini
            header("location:index.php");
        }else{
            $TanggalDislike=date("Y-m-d");
            mysqli_query($koneksi,"INSERT into dislike values('','$FotoID','$UserID','$TanggalDislike')");
            header("location:index.php");
        }
    }

    
?>