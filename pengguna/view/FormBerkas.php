<div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-sm-6">
           <h6 class="m-0 font-weight-bold text-primary">Data Berkas</h6></div>
           <div class="col-sm-6 mr-auto" style="text-align: right;">
           <a href="index.php?page=Berkas"><button class="btn btn-primary" title="Segarkan"><i class="fas fa-fw fa-retweet"></i></button></a>

           </div>
            </div>   
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
              
            <form id="formBerkas">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Jenis Berkas</label>
                        <select id="jenis_berkas" name="jenis_berkas" class="theSelect form-control">
                          <option value="">Pilih Jenis Berkas</option>
                          <option value="KTP">KTP</option>
                          <option value="KK">KK</option>
                          <option value="Surat Pengantar RT">Surat Pengantar RT</option>
                        </select>
                      </div>
                    </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Berkas</label>
                        <input type="file" class="form-control" id="fileupload" name="fileupload"  required="required">
                      </div>
                    </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <button type="button" class="btn btn-primary" id="save" onclick="tambahBerkas()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </div>
          </div>
            </form>
            </div>

            
            <div class="col-lg-12 col-md-6 col-sm-6 mt-4">
          <table id="tabelBerkas" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../style/js/datatables.min.js"></script>
<script src="aksi/dataBerkas/action.js"></script>


