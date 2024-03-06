<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h5>Halaman Login</h5>
                <div class="card">
                    <div class="card-header">
                        <img src="assets/img/login.png" width="100%">
                    </div>
                <div class="card-body">
                    <form action="proses_login.php" method="post">
                        <div class="form-group mb-2">
                            <label>Username</label>
                            <input type="text" name="Username" class="form-control" placeholder="Masukkan username anda" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" placeholder="Masukkan password anda" required>
                        </div>
                        <div class="from-group mb-2">
                            <button type="submit" class="btn btn-primary">Login</button>    
                        </div>
                        <div class="form-group mt-2">
                            <label>Belum punya akun silahkan klik tombol berikut :</label>
                            <a href="daftar.php" class="btn btn-warning btn-sm">Register</a>
                        </div>
                    </form>
                </div>  
                </div>
            </div>
        </div>
    </div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>