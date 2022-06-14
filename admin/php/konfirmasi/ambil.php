<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT id_konfirmasi,id_bukti_transfer FROM konfirmasi WHERE id_konfirmasi=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_konfirmasi = $_POST['id_konfirmasi'];
    $stmt->bind_param("i", $id_konfirmasi);


    $stmt->bind_result($id_konfirmasi,$id_bukti_transfer);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_konfirmasi"=>$id_konfirmasi,"id_bukti_transfer"=>$id_bukti_transfer);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>