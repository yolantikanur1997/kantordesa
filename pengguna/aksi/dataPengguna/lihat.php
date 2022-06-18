<?php
session_start();
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id_pengguna,no_kk,nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,rt,rw,kelurahan,kecamatan,agama,status_perkawinan,pekerjaan,kewarganegaraan FROM pengguna WHERE nik=" . $_SESSION['nik']);

$stmt->bind_result($id_pengguna,$no_kk,$nik,$nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$rt,$rw,$kelurahan,$kecamatan,$agama,$status_perkawinan,$pekerjaan,$kewarganegaraan);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_pengguna"=>$id_pengguna,"no_kk"=>$no_kk,"nik"=>$nik,"nama"=>$nama,"tempat_lahir"=>$tempat_lahir,"tanggal_lahir"=>$tanggal_lahir,"jenis_kelamin"=>$jenis_kelamin,"alamat"=>$alamat,"rt"=>$rt,"rw"=>$rw,"kelurahan"=>$kelurahan,"kecamatan"=>$kecamatan,"agama"=>$agama,"status_perkawinan"=>$status_perkawinan,"pekerjaan"=>$pekerjaan,"kewarganegaraan"=>$kewarganegaraan);
    }
    echo json_encode($output);
}
$stmt->close();
?>