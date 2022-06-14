<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?page=Beranda">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Informasi Rumah</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header">
    <div class="" style="float: left;">
    <a href="index.php?page=Rumah"><button class="btn btn-info" title="Refresh"><i class="fa fa-refresh"></i></button></a></div>
    <div class="" style="float: right;">
    <i class="fa fa-building"></i> Informasi Rumah</div>
  </div>
  <div class="card-body">
           <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
          <div class="card-header" align="left">
            <i class="fa fa-list-alt"></i> Data Informasi Rumah
          </div>
          <div class="card-body">
            <table id="tblInformasiRumah" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
               <thead>
                  <tr>
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





<!-- Modal -->
<div class="modal fade" id="frmInformasiRumahDetail" tabindex="-1" role="dialog" aria-labelledby="frmInformasiRumahDetailTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Informasi Rumah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
      <tbody>
        <tr>
          <th>Tipe Rumah</th>
          <td id="tipe_rumah"></td>
          <th>No Rumah</th>
          <td id="no_rumah"></td>
        </tr>
         <tr>
          <th>Blok Rumah</th>
          <td id="blok_rumah"></td>
          <th>Alamat Rumah</th>
          <td id="alamat_rumah"></td>
        </tr>
         <tr>
          <th>Luas Bangunan</th>
          <td id="luas_bangunan"></td>
          <th>Luas Tanah</th>
          <td id="luas_tanah"></td>
        </tr>
        <tr>
          <th>Kamar Tidur</th>
          <td id="kamar_tidur"></td>
          <th>Kamar Mandi</th>
          <td id="kamar_mandi"></td>
        </tr>
        <tr>
          <th>Sumur</th>
          <td id="sumur"></td>
          <th>Listrik</th>
          <td id="listrik"></td>
        </tr>
        <tr>
          <th>Luas Jalan</th>
          <td id="luas_jalan"></td>
          <th>Lantai</th>
          <td id="lantai"></td>
        </tr>
         <tr>
          <th>Harga Jual</th>
          <td id="harga_jual"></td>
          <th>Fasilitas Umum Terdekat</th>
          <td id="fasilitas_umum_terdekat"></td>
        </tr>
        <tr>
          <th>Biaya Uang Muka</th>
          <td id="biaya_uang_muka"></td>
          <th>Biaya Pemesanan Rumah</th>
          <td id="biaya_pemesanan_rumah"></td>
        </tr>
      </tbody>
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <script src="../style/js/datatables.min.js"></script>
        <script src="php/informasi_rumah/aksi.js"></script>
