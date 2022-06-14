<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT uang_muka.id_uang_muka,uang_muka.jml_uang_muka,uang_muka.tgl_uang_muka,pemesanan_rumah.tenor,pemesanan_rumah.jml_uang_pemesanan_rumah,pemesanan_rumah.tgl_pesan_rumah,pemesanan_rumah.status,konsumen.nik,konsumen.nama_konsumen,informasi_rumah.no_rumah,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,tipe_rumah.tipe_rumah,pengguna.nama
        FROM uang_muka 
        INNER JOIN pemesanan_rumah ON pemesanan_rumah.id_pemesanan = uang_muka.id_pemesanan_rumah
        INNER JOIN konsumen ON pemesanan_rumah.id_konsumen = konsumen.id_konsumen
        INNER JOIN informasi_rumah ON pemesanan_rumah.id_rumah = informasi_rumah.id_rumah
        INNER JOIN tipe_rumah ON informasi_rumah.id_tipe = tipe_rumah.id_tipe
        INNER JOIN pengguna ON pengguna.id_pengguna = uang_muka.id_pengguna
        WHERE uang_muka.id_uang_muka=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_uang_muka = $_POST['id_uang_muka'];
    $stmt->bind_param("i", $id_uang_muka);


    $stmt->bind_result($id_uang_muka,$jml_uang_muka,$tgl_uang_muka,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status,$nik,$nama_konsumen,$no_rumah,$alamat_rumah,$blok_rumah,$tipe_rumah,$nama);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_uang_muka"=>$id_uang_muka,"jml_uang_muka"=>$jml_uang_muka,"tgl_uang_muka"=>$tgl_uang_muka,"tenor"=>$tenor,"jml_uang_pemesanan_rumah"=>$jml_uang_pemesanan_rumah,"tgl_pesan_rumah"=>$tgl_pesan_rumah,"status"=>$status,"nik"=>$nik,"nama_konsumen"=>$nama_konsumen,"no_rumah"=>$no_rumah,"alamat_rumah"=>$alamat_rumah,"blok_rumah"=>$blok_rumah,"tipe_rumah"=>$tipe_rumah,"nama"=>$nama);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>