<?php
include("../../config/koneksi.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id_pemesanan = $_GET['id_pemesanan'];
    $sql = "SELECT pemesanan_rumah.id_pemesanan,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,informasi_rumah.no_rumah,tipe_rumah.tipe_rumah,konsumen.nama_konsumen,konsumen.no_hp
      FROM pemesanan_rumah, bukti_transfer, informasi_rumah, tipe_rumah, konsumen WHERE
       pemesanan_rumah.id_rumah = informasi_rumah.id_rumah AND informasi_rumah.id_tipe = tipe_rumah.id_tipe AND pemesanan_rumah.id_konsumen = konsumen.id_konsumen AND pemesanan_rumah.id_pemesanan = $id_pemesanan";

    $orderResult = $koneksi->query($sql);
    $orderdata = $orderResult->fetch_array();


    $id_pemesanan = $orderdata[0];
    $jml_uang_pemesanan_rumah = $orderdata[1];
    $tgl_pesan_rumah = $orderdata[2];
    $alamat_rumah = $orderdata[3];
    $blok_rumah = $orderdata[4];
    $no_rumah = $orderdata[5];
    $tipe_rumah = $orderdata[6];
    $nama_konsumen = $orderdata[7];
    $no_hp = $orderdata[8];



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
                        <td>Tanggal Pemesanan</td>
                        <td>:</td>
                        <td><?=$tgl_pesan_rumah?></td>
                    </tr>
                      <tr>
                        <td>Uang Sebanyak</td>
                        <td>:</td>
                        <td>Rp. <?=$jml_uang_pemesanan_rumah?></td>
                    </tr>
                      <tr>
                        <td>Untuk Pembayaran</td>
                        <td>:</td>
                        <td>Booking Perumahan <?=$alamat_rumah?> No. <?= $no_rumah ?> Blok. <?= $blok_rumah ?> Type. <?=$tipe_rumah?></td>
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
             window.location.href = '../index.php?page=Pemesanan';
         }
     </script>
<?php }?>
