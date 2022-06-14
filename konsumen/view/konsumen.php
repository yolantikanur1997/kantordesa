<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=Beranda">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Konsumen</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
    <a href="index.php?page=Konsumen"><button class="btn btn-info" title="Refresh"><i class="fa fa-refresh"></i></button></a></div>
    <div class="" style="float: right;">
    <i class="fa fa-users"></i> Konsumen</div>
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
              <label>Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" style="resize: none;" required="required"></textarea>
            </div>
          </div>

            </div>
            <button type="button" class="btn btn-primary" id="save" onclick="tambahKonsumen()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
  <div class="card-header" align="left">
    <i class="fa fa-list-alt"></i> Data Konsumen
  </div>
  <div class="card-body">
    <table id="tblKonsumen" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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
<script src="../konsumen/php/konsumen/aksi.js"></script>


