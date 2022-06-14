<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT informasi_rumah.id_rumah,informasi_rumah.biaya_pemesanan_rumah,informasi_rumah.biaya_uang_muka,informasi_rumah.harga_jual,informasi_rumah.plafon_kredit,informasi_rumah.alamat_rumah,informasi_rumah.blok_rumah,informasi_rumah.no_rumah,informasi_rumah.status,tipe_rumah.tipe_rumah,tipe_rumah.luas_tanah,tipe_rumah.luas_bangunan,tipe_rumah.kamar_mandi,tipe_rumah.kamar_tidur,tipe_rumah.listrik,tipe_rumah.sumur,tipe_rumah.lantai,fasilitas_umum.kode_fasilitas,fasilitas_umum.luas_jalan,fasilitas_umum.fasilitas_umum_terdekat
        FROM informasi_rumah 
        INNER JOIN tipe_rumah ON informasi_rumah.id_tipe = tipe_rumah.id_tipe
        INNER JOIN fasilitas_umum ON informasi_rumah.id_fasilitas_umum = fasilitas_umum.id_fasilitas_umum
        WHERE id_rumah=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_rumah = $_POST['id_rumah'];
    $stmt->bind_param("i", $id_rumah);


   $stmt->bind_result($id_rumahh,$biaya_pemesanan_rumah,$biaya_uang_muka,$harga_jual,$plafon_kredit,$alamat_rumah,$blok_rumah,$no_rumah,$status,$tipe_rumah,$luas_tanah,$luas_bangunan,$kamar_mandi,$kamar_tidur,$listrik,$sumur,$lantai,$kode_fasilitas,$luas_jalan,$fasilitas_umum_terdekat);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_rumahh"=>$id_rumahh,"biaya_pemesanan_rumah"=>$biaya_pemesanan_rumah,"biaya_uang_muka"=>$biaya_uang_muka,"harga_jual"=>$harga_jual,"plafon_kredit"=>$plafon_kredit,"alamat_rumah"=>$alamat_rumah,"blok_rumah"=>$blok_rumah,"no_rumah"=>$no_rumah,"status"=>$status,"tipe_rumah"=>$tipe_rumah,"luas_tanah"=>$luas_tanah,"luas_bangunan"=>$luas_bangunan,"kamar_mandi"=>$kamar_mandi,"kamar_tidur"=>$kamar_tidur,"listrik"=>$listrik,"sumur"=>$sumur,"lantai"=>$lantai,"kode_fasilitas"=>$kode_fasilitas,"luas_jalan"=>$luas_jalan,"fasilitas_umum_terdekat"=>$fasilitas_umum_terdekat);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>