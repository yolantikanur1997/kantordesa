<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=Beranda">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pemesanan Rumah</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
    <a href="index.php?page=Pemesanan"><button class="btn btn-info" title="Refresh"><i class="fa fa-refresh"></i></button></a></div>
    <div class="" style="float: right;">
    <i class="fa fa-building"></i> Pemesanan Rumah</div>
  </div>
  <div class="card-body">
     <form id="frmPemesanan">
            <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Rumah</label>
              <!-- <input type="text" name="id_rumah" id="id_rumah"> -->
              <select id="id_rumah" name="id_rumah" class="theSelect form-control" required="required">
                <option value="">Pilih Rumah</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Tenor</label>
                <select id="tenor" name="tenor" class="theSelect form-control" required="required">
                <option value="">Pilih Rumah</option>
                  <option value="10 Tahun">10 Tahun</option>
                  <option value="15 Tahun">15 Tahun</option>
                  <option value="20 Tahun">20 Tahun</option>
              </select>
            </div>
          </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label>Jumlah Uang Pemesanan Rumah</label>
              <input type="text" class="form-control" id="jml_uang_pemesanan_rumah" name="jml_uang_pemesanan_rumah" placeholder="Jumlah Uang Pemesanan Rumah" required="required" readonly>
            </div>
          </div>

            </div>
            <button type="button" class="btn btn-primary" id="save" onclick="tambahPemesananRumah()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
  <div class="card-header" align="left">
    <i class="fa fa-list-alt"></i> Data Pemesanan Rumah
  </div>
  <div class="card-body">
    <table id="tblPemesananRumah" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
       <thead>
          <tr>
             <th></th>
             <th></th>
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
<script src="php/pemesanan_rumah/aksi.js"></script>




