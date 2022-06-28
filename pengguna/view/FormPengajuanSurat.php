<?php 
 include '../config/autoNumber.php';
?>
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-sm-6">
           <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Surat</h6></div>
           <div class="col-sm-6 mr-auto" style="text-align: right;">
           <a href="index.php?page=Pengajuan-Surat"><button class="btn btn-primary" title="Segarkan"><i class="fas fa-fw fa-retweet"></i></button></a>

           </div>
            </div>   
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
              
            <form id="formPengajuanSurat">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Nomor Pengajuan Surat</label>
                        <input type="text" id="no_pengajuan_surat" name="no_pengajuan_surat" class="form-control" value="<?=autonumber("pengajuan_surat", "no_pengajuan_surat", "7", "PS-")?>" readonly>      
                      </div>
                      <div class="form-group">
                        <label>Jenis Surat</label>
                        <select id="id_jenis_surat" name="id_jenis_surat" class="theSelect form-control">
                          <option value="">Pilih Jenis Surat</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Keperluan</label>
                        <textarea class="form-control" id="keperluan" name="keperluan"  required="required"></textarea>
                      </div>
                    </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <button type="button" class="btn btn-primary" id="save" onclick="tambahPengajuanSurat()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </div>
          </div>
            </form>
            </div>

            
            <div class="col-lg-12 col-md-6 col-sm-6 mt-4">
          <table id="tabelPengajuanSurat" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
       <thead>
          <tr>
             <th></th>
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



         
<!-- Modal -->
<div class="modal fade" id="modalPengajuanSurat" tabindex="-1" role="dialog" aria-labelledby="modalPengajuanSuratLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPengajuanSuratLabel">Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-sm">
      <tbody>
      <tr>
          <th scope="col">Nomor Pengajuan Surat</th>
          <td id="no_pengajuan_surat2"></td>
        </tr>
      <tr>
          <th scope="col">Nama Surat</th>
          <td id="nama_surat2"></td>
        </tr>
      <tr>
          <th scope="col">Tanggal Pengajuan</th>
          <td id="tanggal_pengajuan2"></td>
        </tr>
      <tr>
          <th scope="col">Tanggal Selesai</th>
          <td id="tanggal_selesai2"></td>
        </tr>
      <tr>
          <th scope="col">Keperluan</th>
          <td id="keperluan2"></td>
        </tr>
      <tr>
          <th scope="col">Komentar</th>
          <td id="komentar2"></td>
        </tr>
      <tr>
          <th scope="col">Status</th>
          <td id="status2"></td>
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
<script src="aksi/dataPengajuanSurat/action.js"></script>


