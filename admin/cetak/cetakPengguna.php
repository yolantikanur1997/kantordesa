<?php
include("../../config/koneksi.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_pengguna = $_GET['id_pengguna'];
    $sql = "SELECT id_pengguna,no_kk,nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,rt,rw,kelurahan,kecamatan,agama,status_perkawinan,pekerjaan,kewarganegaraan FROM pengguna WHERE id_pengguna = $id_pengguna";

    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_pengguna = $orderdata[0];
    $no_kk = $orderdata[1];
    $nik = $orderdata[2];
    $nama = $orderdata[3];
    $tempat_lahir = $orderdata[4];
    $tanggal_lahir = $orderdata[5];
    $jenis_kelamin = $orderdata[6];
    $alamat = $orderdata[7];
    $rt = $orderdata[8];
    $rw = $orderdata[9];
    $kelurahan = $orderdata[10];
    $kecamatan = $orderdata[11];
    $agama = $orderdata[12];
    $status_perkawinan = $orderdata[13];
    $pekerjaan = $orderdata[14];
    $kewarganegaraan = $orderdata[15];



    ?>
   

 <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
         $no = 1;
          ?>
   
    <div class="container  mt-5">
          <div class="row">
                    <!-- <div class="col-sm-3 pl-5" style="text-align: center;">
                        <img src="../../style/img/logo.png" style="width:90%; display: block;">
                    </div> -->
                    <div class="col-sm-12" style="text-align: center;">
                        <h3 style="font-weight: bold;">Data Pengguna</h3>
                        <!-- <p style="font-weight: bold;">JL. Jendral A. Yani (Seberang SPBU Paris 2) - Pontianak<br> Telp. 085252522087 - 081262864992</p> -->
                    </div>
                </div>
                <hr style="background: #000000;">

        <div class="row">
            <div class="col-sm-12">
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

            <!-- <div class="row">
                <div class="col-sm-12">
                    <div style="float: right; text-align: center; padding-top: 80px; padding-right: 50px;">
                    <span>Pontianak, <?php echo date('Y-m-d')?></span><br>
                    <br><br><br><br>
                    </div>
                </div>
            </div> -->

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
  