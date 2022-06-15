<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_jenis_surat,nama_surat,keterangan FROM jenis_surat WHERE id_jenis_surat=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_jenis_surat = $_POST['id_jenis_surat'];
    $stmt->bind_param("i", $id_jenis_surat);


    $stmt->bind_result($id_jenis_surat,$nama_surat,$keterangan);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_jenis_surat"=>$id_jenis_surat,"nama_surat"=>$nama_surat,"keterangan"=>$keterangan);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>