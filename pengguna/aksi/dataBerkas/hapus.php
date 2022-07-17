<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");
    global $link;

   
    $id_berkas = $_POST["id_berkas"];

    $stmt1   = "SELECT * FROM berkas WHERE id_berkas='$id_berkas'";
    $result = mysqli_query($koneksi, $stmt1);

    $row = mysqli_fetch_assoc($result);

    $filePath = '../../../admin/aksi/dataBerkas/gambar/'.$row['nama_berkas'];

    $stmt = $koneksi->prepare("DELETE FROM berkas WHERE id_berkas=?");
    $stmt->bind_param("i",$id_berkas);

    if ($stmt->execute()) {
        unlink($filePath);
        echo 1;
    }
    else{
        echo 2;
    }
    $stmt->close();

}


?>