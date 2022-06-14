<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_rumah,id_tipe,id_fasilitas_umum,biaya_pemesanan_rumah,biaya_uang_muka,harga_jual,plafon_kredit,alamat_rumah,blok_rumah,no_rumah,status FROM informasi_rumah WHERE id_rumah=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_rumah = $_POST['id_rumah'];
    $stmt->bind_param("i", $id_rumah);


    $stmt->bind_result($id_rumah,$id_tipe,$id_fasilitas_umum,$biaya_pemesanan_rumah,$biaya_uang_muka,$harga_jual,$plafon_kredit,$alamat_rumah,$blok_rumah,$no_rumah,$status);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output[] = array("id_rumah"=>$id_rumah,"id_tipe"=>$id_tipe,"id_fasilitas_umum"=>$id_fasilitas_umum,"biaya_pemesanan_rumah"=>$biaya_pemesanan_rumah,"biaya_uang_muka"=>$biaya_uang_muka,"harga_jual"=>$harga_jual,"plafon_kredit"=>$plafon_kredit,"alamat_rumah"=>$alamat_rumah,"blok_rumah"=>$blok_rumah,"no_rumah"=>$no_rumah,"status"=>$status);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>