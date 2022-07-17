<?php
include("../../config/koneksi.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_pengajuan_surat = $_GET['id_pengajuan_surat'];
    $sql = "SELECT pengajuan_surat.id_pengajuan_surat,pengajuan_surat.id_jenis_surat,pengajuan_surat.tanggal_pengajuan,
    pengajuan_surat.tanggal_selesai,pengajuan_surat.keperluan,pengajuan_surat.komentar,pengajuan_surat.status,
    pengguna.no_kk,
    pengguna.nik,pengguna.nama,pengguna.tempat_lahir,
    pengguna.tanggal_lahir,pengguna.jenis_kelamin,pengguna.alamat,
    pengguna.rt,pengguna.rw,pengguna.kelurahan,pengguna.kecamatan,pengguna.agama,
    pengguna.status_perkawinan,pengguna.pekerjaan,pengguna.kewarganegaraan,
    jenis_surat.nama_surat,pengajuan_surat.no_pengajuan_surat
    FROM pengajuan_surat, jenis_surat, pengguna
    WHERE pengajuan_surat.id_jenis_surat = jenis_surat.id_jenis_surat AND pengajuan_surat.id_pengguna = pengguna.id_pengguna 
    AND pengajuan_surat.id_pengajuan_surat = $id_pengajuan_surat";

    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_pengajuan_surat = $orderdata[0];
    $id_jenis_surat = $orderdata[1];
    $tanggal_pengajuan = $orderdata[2];
    $tanggal_selesai = $orderdata[3];
    $keperluan = $orderdata[4];
    $komentar = $orderdata[5];
    $status = $orderdata[6];
    $no_kk = $orderdata[7];
    $nik = $orderdata[8];
    $nama = $orderdata[9];
    $tempat_lahir = $orderdata[10];
    $tanggal_lahir = $orderdata[11];
    $jenis_kelamin = $orderdata[12];
    $alamat = $orderdata[13];
    $rt = $orderdata[14];
    $rw = $orderdata[15];
    $kelurahan = $orderdata[16];
    $kecamatan = $orderdata[17];
    $agama = $orderdata[18];
    $status_perkawinan = $orderdata[19];
    $pekerjaan = $orderdata[20];
    $kewarganegaraan = $orderdata[21];
    $nama_surat = $orderdata[22];
    $no_pengajuan_surat = $orderdata[23];



    ?>
   

 <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
         $no = 1;
         $no2 = 1;
          ?>
   
    <div class="container  mt-5">
          <div class="row">
                    <!-- <div class="col-sm-3 pl-5" style="text-align: center;">
                        <img src="../../style/img/logo.png" style="width:90%; display: block;">
                    </div> -->
                    <div class="col-sm-12" style="text-align: center;">
                        <h3 style="font-weight: bold;">Data Pengajuan Surat</h3>
                        <!-- <p style="font-weight: bold;">JL. Jendral A. Yani (Seberang SPBU Paris 2) - Pontianak<br> Telp. 085252522087 - 081262864992</p> -->
                    </div>
                </div>
                <hr style="background: #000000;">

        <div class="row">
            <div class="col-sm-12">
                <p>Data Pengguna</p>
            <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Nomor KK</th>
                        <th scope="row">:</th>
                        <td><?=$no_kk?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">NIK</th>
                        <th scope="row">:</th>
                        <td><?=$nik?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Nama</th>
                        <th scope="row">:</th>
                        <td><?=$nama?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Tempat/Tanggal Lahir</th>
                        <th scope="row">:</th>
                        <td><?=$tempat_lahir?> / <?=$tanggal_lahir?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Jenis Kelamin</th>
                        <th scope="row">:</th>
                        <td><?=$jenis_kelamin?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Alamat</th>
                        <th scope="row">:</th>
                        <td><?=$alamat?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">RT / RW</th>
                        <th scope="row">:</th>
                        <td><?=$rt?> / <?=$rw?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Kelurahan / Kecamatan</th>
                        <th scope="row">:</th>
                        <td><?=$kelurahan?> / <?=$kecamatan?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Agama</th>
                        <th scope="row">:</th>
                        <td><?=$agama?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Status Perkawinan</th>
                        <th scope="row">:</th>
                        <td><?=$status_perkawinan?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Pekerjaan</th>
                        <th scope="row">:</th>
                        <td><?=$pekerjaan?></td>
                        </tr>
                    <tr>
                        <td><?=$no++?>.</td>
                        <th scope="row">Kewarganegaraan</th>
                        <th scope="row">:</th>
                        <td><?=$kewarganegaraan?></td>
                        </tr>
                       
                    </tbody>
                    </table>
            </div>
         </div>

         <div class="row">
            <div class="col-sm-12">
                <p>Data Pengajuan Surat</p>
            <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Nomor Pengajuan Surat</th>
                        <th scope="row">:</th>
                        <td><?=$no_pengajuan_surat?></td>
                    </tr>
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Nama Surat</th>
                        <th scope="row">:</th>
                        <td><?=$nama_surat?></td>
                    </tr>
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Tanggal Pengajuan</th>
                        <th scope="row">:</th>
                        <td><?=$tanggal_pengajuan?></td>
                    </tr>
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Tanggal Selesai</th>
                        <th scope="row">:</th>
                        <td><?=$tanggal_selesai?></td>
                    </tr> 
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Keperluan</th>
                        <th scope="row">:</th>
                        <td><?=$keperluan?></td>
                    </tr>                    
                    <tr>
                        <td><?=$no2++?>.</td>
                        <th scope="row">Status</th>
                        <th scope="row">:</th>
                        <td><?=$status?></td>
                    </tr>                       
                    </tbody>
                    </table>
            </div>
         </div>
    </div>

        </body>
     </html>



  <script type="text/javascript">
         myFunction();

         function myFunction(){
             window.print();
         }
         window.onafterprint = function(e){
             closePrintView();
         }
         function closePrintView(){
             window.location.href = '../index.php?page=Pengguna';
         }
     </script>
<?php }?>
  