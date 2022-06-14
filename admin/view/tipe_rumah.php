<?php
function autonumber($tabel, $kolom, $lebar=0, $awalan=''){


    $server = "localhost";//nama server
    $user = "root"; //username server
    $pass = "";  //password
    $dbase = "ptjiwaproperti"; // database yang dipakai
    $koneksi = mysqli_connect($server, $user, $pass, $dbase);
    if(mysqli_connect_error()){
        echo 'database gagal dikoneksikan!'.mysqli_connect_error();

    }

    //proses auto number
    $auto = mysqli_query($koneksi, "select $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
    $jumlah_record = mysqli_num_rows($auto);
    if($jumlah_record == 0)
        $nomor = 1;

    else{
        $row = mysqli_fetch_array($auto);
        $nomor = intval(substr($row[0], strlen($awalan)))+1;
    }
    if($lebar>0)
        $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
    else
        $angka=$awalan.$nomor;
    return $angka;
}
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=Beranda">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tipe Rumah</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
    <a href="index.php?page=Tipe"><button class="btn btn-info" title="Refresh"><i class="fa fa-refresh"></i></button></a></div>
    <div class="" style="float: right;">
    <i class="fa fa-users"></i> Tipe Rumah</div>
  </div>
  <div class="card-body">
<form id="frmTipeRumah">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kode Rumah</label>
              <input type="text" class="form-control" id="kode_tipe_rumah" name="kode_tipe_rumah" placeholder="Kode Tipe Rumah" value="<?=autonumber("tipe_rumah", "kode_tipe_rumah", "7", "TR-")?>" readonly> 
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tipe Rumah</label>
              <input type="text" class="form-control" id="tipe_rumah" name="tipe_rumah" placeholder="Tipe Rumah" required="required"> 
            </div>
          </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Luas Tanah</label>
              <input type="text" class="form-control" id="luas_tanah" name="luas_tanah" placeholder="Luas Tanah" required="required"> 
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Luas Bangunan</label>
              <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Luas Bangunan" required="required">
            </div>
          </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kamar Mandi</label>
              <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi" placeholder="Kamar Mandi" required="required" number="number">
            </div>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Kamar Tidur</label>
              <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur" placeholder="Kamar Tidur" required="required" number="number">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Listrik</label>
              <input type="text" class="form-control" id="listrik" name="listrik" placeholder="Listrik" required="required">
            </div>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Sumur</label>
              <select id="sumur" name="sumur" class="theSelect form-control">
                <option value="">Pilih Sumur</option>
                <option value="Sumur Gorong - Gorong">Sumur Gorong - Gorong</option>
                <option value="Sumur Bor">Sumur Bor</option>
                <option value="PDAM">PDAM</option>
              </select>
            </div>
          </div>
         <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Lantai</label>
              <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Lantai" required="required">
            </div>
          </div>
 <div class="col-lg-12 col-md-12 col-sm-12" align="right">
  <button type="button" class="btn btn-primary" id="save" onclick="tambahTipeRumah()">Simpan</button>
  <button type="reset" class="btn btn-danger">Batal</button>
</div>
</div>
  </form>
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
  <div class="card-header" align="left">
    <i class="fa fa-list-alt"></i> Data Tipe Rumah
  </div>
  <div class="card-body">
    <table id="tblTipeRumah" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
       <thead>
          <tr>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
           

            </tr>
              </thead>
           <tbody>

           </tbody>

       </table>
     </div>
   </div>
    </div>


</div>
</div>
</div>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../style/js/datatables.min.js"></script>
<script src="php/tipe_rumah/aksi.js"></script>
