<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT pemesanan_rumah.id_pemesanan,pemesanan_rumah.id_rumah,pemesanan_rumah.tenor,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,pemesanan_rumah.status,konsumen.nik,konsumen.nama_konsumen,informasi_rumah.no_rumah,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,tipe_rumah.tipe_rumah,bukti_transfer.foto_bukti_transfer
        FROM pemesanan_rumah 
        INNER JOIN konsumen ON pemesanan_rumah.id_konsumen = konsumen.id_konsumen
        INNER JOIN informasi_rumah ON pemesanan_rumah.id_rumah = informasi_rumah.id_rumah
        INNER JOIN tipe_rumah ON informasi_rumah.id_tipe = tipe_rumah.id_tipe
        INNER JOIN bukti_transfer ON pemesanan_rumah.id_pemesanan = bukti_transfer.id_pemesanan WHERE pemesanan_rumah.id_pemesanan=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_pemesanan = $_POST['id_pemesanan'];
    $stmt->bind_param("i", $id_pemesanan);


    $stmt->bind_result($id_pemesanan,$id_rumah,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status,$nik,$nama_konsumen,$no_rumah,$alamat_rumah,$blok_rumah,$tipe_rumah,$foto_bukti_transfer);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_pemesanan"=>$id_pemesanan,"id_rumah"=>$id_rumah,"tenor"=>$tenor,"jml_uang_pemesanan_rumah"=>$jml_uang_pemesanan_rumah,"tgl_pesan_rumah"=>$tgl_pesan_rumah,"status"=>$status,"nik"=>$nik,"nama_konsumen"=>$nama_konsumen,"no_rumah"=>$no_rumah,"alamat_rumah"=>$alamat_rumah,"blok_rumah"=>$blok_rumah,"tipe_rumah"=>$tipe_rumah,"foto_bukti_transfer"=>$foto_bukti_transfer);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>