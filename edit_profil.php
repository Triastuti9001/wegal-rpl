<?php
session_start();
?>

<?php
  $UserID = $_SESSION['UserID'];
  include 'koneksi.php';
  $sql = "SELECT * FROM user WHERE UserID='$UserID'";
  $query = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_array($query);
  ?>
  <h4 class="mt-3">Edit Profil</h4>
  <p>Jaga detail privasi profil anda!!</p>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <a href="profil.php" class="btn btn-primary">Kembali </a>
  <div class="col-md-8">
    <div class="box">
      <form method="post" action="proses_edit_profil.php?UserID=<?= $UserID; ?>" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group mb-2">
            <label>User ID</label>
            <input value="<?= $data['UserID'] ?>" type="text" name="UserID" maxlength="20" class="form-control" disabled>
          </div>
          <div class="form-group mb-2">
            <label>Username</label>
            <input value="<?= $data['Username'] ?>" type="text" name="Username" maxlength="20" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Email</label>
            <input value="<?= $data['Email'] ?>" type="email" name="Email" maxlength="20" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Nama Lengkap</label>
            <input value="<?= $data['NamaLengkap'] ?>" type="text" name="NamaLengkap" maxlength="20" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Alamat</label>
            <input value="<?= $data['Alamat'] ?>" type="text" name="Alamat" maxlength="50" class="form-control" required>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </form>
    </div>
  </div>