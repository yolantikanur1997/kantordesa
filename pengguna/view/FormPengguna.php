<div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-sm-6">
           <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6></div>
           <div class="col-sm-6 mr-auto" style="text-align: right;">
           <a href="index.php?page=Pengguna"><button class="btn btn-primary" title="Segarkan"><i class="fas fa-fw fa-retweet"></i></button></a>

           </div>
            </div>   
          </div>
            <div class="card-body">
        <div class="col-lg-12 col-md-6 col-sm-6 mt-4">
                <table id="tabelPengguna" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


 <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalFormPengguna" tabindex="-1" role="dialog" aria-labelledby="modalFormPengguna" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormPengguna">Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
<form id="formPengguna">
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
   
          <div class="col-lg-12 col-md-12 col-sm-12 ">
            <button type="button" class="btn btn-primary" id="save" onclick="tambahPengguna()">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
      </div>
      </div>
        </form>
        </div>
  </div>
</div>







<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../style/js/datatables.min.js"></script>
<script src="aksi/dataPengguna/action.js"></script>


