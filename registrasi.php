<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrasi</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="style/css/custom.min.css" rel="stylesheet">
    <link href="style/css/style.css" rel="stylesheet">
    <link href="style/css/jquery-confirm.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style/css/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

  </head>

  <body class="registrasiForm">
    <div class="container mt-4" style="width: 50%;">
      <div class="card">
      
        <div class="card-header">
           <i class="fa fa-users mr-auto"></i> Form Registrasi<br><br>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                </ol>
              </nav>
        
    
        </div>
        <div class="card-body">
          <form id="frmKonsumen">
            <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required="required">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required="required">
            </div>
          </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required="required">
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
              <label>Nomor NPWP</label>
              <input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="Nomor NPWP" required="required">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Nomor Handphone</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone" required="required" number="number">
            </div>
          </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Pekerjaan</label>
              <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required="required">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="theSelect form-control" required="required">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required">
            </div>
          </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
            </div>
          </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="resize: none;" required="required"></textarea>
            </div>
          </div>
            </div>
            <button type="button" class="btn btn-primary" id="save" onclick="tambahKonsumen()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </body>
   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="style/js/jquery-confirm.js"></script>
    <script src="style/js/jquery.validate.min.js"></script>
    <script src="style/js/datatables.min.js"></script>
    <script src="konsumen/php/konsumen/aksi.js"></script>

    <!-- Custom Theme Scripts -->
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="style/js/custom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        $(".theSelect").select2();
    </script>

</html>
