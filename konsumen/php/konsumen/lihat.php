<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id_konsumen,nik,nama_konsumen,tempat_lahir,tanggal_lahir,alamat,no_hp,pekerjaan,jenis_kelamin,email,no_npwp FROM konsumen WHERE nik=" . $_SESSION['nik']);

$stmt->bind_result($id_konsumen,$nik,$nama_konsumen,$tempat_lahir,$tanggal_lahir,$alamat,$no_hp,$pekerjaan,$jenis_kelamin,$email,$no_npwp);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_konsumen"=>$id_konsumen,"nik"=>$nik,"nama_konsumen"=>$nama_konsumen,"tempat_lahir"=>$tempat_lahir,"tanggal_lahir"=>$tanggal_lahir,"alamat"=>$alamat,"no_hp"=>$no_hp,"pekerjaan"=>$pekerjaan,"jenis_kelamin"=>$jenis_kelamin,"no_npwp"=>$no_npwp);
    }
    echo json_encode($output);
}
$stmt->close();
?>