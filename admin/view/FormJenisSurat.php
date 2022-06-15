<div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <div class="col-sm-6">
           <h6 class="m-0 font-weight-bold text-primary">Data Jenis Surat</h6></div>
           <div class="col-sm-6 mr-auto" style="text-align: right;">
           <a href="index.php?page=Jenis-Surat"><button class="btn btn-primary" title="Segarkan"><i class="fas fa-fw fa-retweet"></i></button></a>

           </div>
            </div>   
          </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
              
            <form id="formJenisSurat">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Nama Surat</label>
                        <input type="text" class="form-control" id="nama_surat" name="nama_surat"  required="required"> 
                      </div>
                    </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"  required="required"></textarea>
                      </div>
                    </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <button type="button" class="btn btn-primary" id="save" onclick="tambahJenisSurat()">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </div>
          </div>
            </form>
            </div>

            
            <div class="col-lg-12 col-md-6 col-sm-6 mt-4">
          <table id="tabelJenisSurat" class="table-bordered" cellspacing="0" width="100%" style="text-align: center;">
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


<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../style/js/datatables.min.js"></script>
<script src="aksi/dataJenisSurat/action.js"></script>


