<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_berkas,id_pengguna,jenis_berkas,nama_berkas FROM berkas WHERE id_berkas=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_berkas = $_POST['id_berkas'];
    $stmt->bind_param("i", $id_berkas);


    $stmt->bind_result($id_berkas,$id_pengguna,$jenis_berkas,$nama_berkas);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_berkas"=>$id_berkas,"id_pengguna"=>$id_pengguna,"jenis_berkas"=>$jenis_berkas,"nama_berkas"=>$nama_berkas);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>