<?php 
require 'pengguna/aksi/dataPengguna/tambah.php';

if ( isset($_POST["regis"])) {
  if ( registrasi($_POST) > 0) {   
      echo "<script> 
           alert('Pengguna Berhasil Di Simpan');
           window.location='login.php'</script>";
   }else{
     echo mysqli_error($koneksi);
   }
 }
?>
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

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form id="formPengguna" method="POST">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">      
            <div class="form-group">
              <label>Nomor KK</label>
              <input type="text" class="form-control" id="no_kk" name="no_kk" required="required" number="number" maxlength="16"> 
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>NIK</label>
              <input type="text" class="form-control" id="nik" name="nik"  required="required" number="number" maxlength="16"> 
            </div>
          </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required="required"> 
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required="required">
            </div>
          </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="required">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="theSelect form-control">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Alamat</label>
              <textarea cols="20" rows="6" class="form-control" id="alamat" name="alamat"  required="required"></textarea>
            </div>
          </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>RT</label>
              <input type="text" class="form-control" id="rt" name="rt" required="required" number="number">
            </div>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>RW</label>
              <input type="text" class="form-control" id="rw" name="rw" required="required" number="number">
            </div>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kelurahan</label>
              <input type="text" class="form-control" id="kelurahan" name="kelurahan" required="required">
            </div>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" name="kecamatan" required="required">
            </div>
            </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Agama</label>
              <select id="agama" name="agama" class="theSelect form-control">
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katolik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Status Perkawinan</label>
              <select id="status_perkawinan" name="status_perkawinan" class="theSelect form-control">
                <option value="">Pilih Status Perkawinan</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Kawin">Kawin</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required="required">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kewarganegaraan</label>
              <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required="required">
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required="required">
            </div>
          </div>
   
          <div class="col-lg-12 col-md-12 col-sm-12 ">
            <button type="submit" class="btn btn-primary btn-block" id="save" name="regis" onclick="tambahPengguna()">Simpan</button>
      </div>
      </div>
        </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Sudah memiliki akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

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
