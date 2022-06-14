<?php
include("../../config/koneksi.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_uang_muka = $_GET['id_uang_muka'];
    $sql = "SELECT uang_muka.id_uang_muka,uang_muka.jml_uang_muka,uang_muka.tgl_uang_muka,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,informasi_rumah.no_rumah,tipe_rumah.tipe_rumah,konsumen.nama_konsumen,konsumen.no_hp
      FROM uang_muka, pemesanan_rumah, bukti_transfer, informasi_rumah, tipe_rumah, konsumen WHERE uang_muka.id_pemesanan_rumah = pemesanan_rumah.id_pemesanan AND pemesanan_rumah.id_rumah = informasi_rumah.id_rumah AND informasi_rumah.id_tipe = tipe_rumah.id_tipe AND pemesanan_rumah.id_konsumen = konsumen.id_konsumen AND uang_muka.id_uang_muka = $id_uang_muka";

    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_uang_muka = $orderdata[0];
    $jml_uang_muka = $orderdata[1];
    $tgl_uang_muka = $orderdata[2];
    $jml_uang_pemesanan_rumah = $orderdata[3];
    $tgl_pesan_rumah = $orderdata[4];
    $alamat_rumah = $orderdata[5];
    $blok_rumah = $orderdata[6];
    $no_rumah = $orderdata[7];
    $tipe_rumah = $orderdata[8];
    $nama_konsumen = $orderdata[9];
    $no_hp = $orderdata[9];



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
                    <div class="col-sm-3 pl-5" style="text-align: center;">
                        <img src="../../style/img/logo.png" style="width:90%; display: block;">
                    </div>
                    <div class="col-sm-9" style="text-align: center;">
                        <h3 style="font-weight: bold;">PT. JIWA PROPERTI INDAH</h3>
                        <p style="font-weight: bold;">JL. Jendral A. Yani (Seberang SPBU Paris 2) - Pontianak<br> Telp. 085252522087 - 081262864992</p>
                    </div>
                </div>
                <hr style="background: #000000;">

        <div class="row">
            <div class="col-sm-12">
                 <table cellpadding="10">
                    <tr>
                        <td>No.</td>
                        <td>:</td>
                        <td>.................................</td>
                    </tr>
                     <tr>
                        <td>Sudah Diterima Dari</td>
                        <td>:</td>
                        <td><?=$nama_konsumen?></td>
                    </tr>
                      <tr>
                        <td>Tanggal Uang Muka</td>
                        <td>:</td>
                        <td><?=$tgl_uang_muka?></td>
                    </tr>
                      <tr>
                        <td>Uang Sebanyak</td>
                        <td>:</td>
                        <td>Rp. <?=$jml_uang_muka?></td>
                    </tr>
                      <tr>
                        <td>Untuk Pembayaran</td>
                        <td>:</td>
                        <td>Uang Muka Perumahan <?=$alamat_rumah?> No. <?= $no_rumah ?> Blok. <?= $blok_rumah ?> Type. <?=$tipe_rumah?></td>
                    </tr>
                </table> 
            </div>
         </div>

            <div class="row">
                <div class="col-sm-12">
                    <div style="float: right; text-align: center; padding-top: 80px; padding-right: 50px;">
                    <span>Pontianak, <?php echo date('Y-m-d')?></span><br>
                    <!-- <span>Kepala Madrasah</span> -->
                    <br><br><br><br>
                    <!-- <u><b><?php echo $nama_kepala_madrasah?></b></u><br>
                    <span><?php echo $nip_kepala_madrasah?></span> -->
                    </div>
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
             window.location.href = '../index.php?page=UangMuka';
         }
     </script>
<?php }?>
  