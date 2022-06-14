<?php
$id_pemesanan = $_GET['id_pemesanan'];
// echo $id_pemesanan
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=Beranda">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bukti Pemesanan Rumah</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">
    <div class="" style="float: right;">
    <i class="fa fa-users"></i> Bukti Pemesanan Rumah</div>
  </div>
  <div class="card-body">
<form id="frmPemesananBukti">
  <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12">
       <div class="form-group">
              <label>Foto</label>
              <input type="hidden" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?= $id_pemesanan?>"> 
              <input type="file" class="form-control" id="fileupload" name="fileupload"> 
            </div>
          </div>
 <div class="col-lg-12 col-md-12 col-sm-12" align="right">
  <button type="button" class="btn btn-primary" id="save" onclick="tambahPemesananBukti()">Simpan</button>
  <button type="reset" class="btn btn-danger">Batal</button>
</div>
</div>
</div>
  </form>
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
  <div class="card-header" align="left">
    <i class="fa fa-list-alt"></i> Bukti Pemesanan Rumah
  </div>
  <div class="card-body">
    <table id="tblPemesananBukti" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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
<script src="php/pemesanan_rumah_bukti/aksi.js"></script>
