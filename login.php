<?php session_start();

if(isset($_SESSION['nik'])){ // Jika tidak ada session username berarti dia belum login
header("location: pengguna/index.php"); // Kita Redirect ke halaman index.php karena belum login
}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" href="../style/img/logo.png" type="image/ico" /> -->
    <title>Kantor Desa Sungau Bundung Laut</title>
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesme -->
    <link href="vendors/fontawesome/css/all.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="style/css/custom.min.css" rel="stylesheet">
    <link href="style/css/jquery-confirm.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../style/css/datatables.min.css">
     <link href="style/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  </head>

<body class="bg-gradient-primary">
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <form action="config/_login.php" class="user" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                </div>
                <button type="input" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="registrasi.php">Buat Akun!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</body>


    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="style/js/jquery-confirm.js"></script>
    <script src="style/js/jquery.validate.min.js"></script>
    <script src="style/js/datatables.min.js"></script>
    <!-- Custom Theme Scripts -->  
   <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="style/js/custom.min.js"></script>
    <!-- <script src="../config/custom.js"></script> -->
    <script src="style/js/sb-admin-2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        $(".theSelect").select2();
    </script>
  </body>
</html>
