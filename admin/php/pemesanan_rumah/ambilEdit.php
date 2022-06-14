<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_pemesanan,id_konsumen,id_rumah,tenor,jml_uang_pemesanan_rumah,tgl_pesan_rumah,status FROM pemesanan_rumah WHERE id_pemesanan=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_pemesanan = $_POST['id_pemesanan'];
    $stmt->bind_param("i", $id_pemesanan);


    $stmt->bind_result($id_pemesanan,$id_konsumen,$id_rumah,$tenor,$jml_uang_pemesanan_rumah,$tgl_pesan_rumah,$status);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_pemesanan"=>$id_pemesanan,"id_konsumen"=>$id_konsumen,"id_rumah"=>$id_rumah,"tenor"=>$tenor,"jml_uang_pemesanan_rumah"=>$jml_uang_pemesanan_rumah,"tgl_pesan_rumah"=>$tgl_pesan_rumah,"status"=>$status);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>