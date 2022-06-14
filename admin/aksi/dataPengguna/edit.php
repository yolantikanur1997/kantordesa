<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE pengguna SET no_kk=?,nik=?,nama=?,tempat_lahir=?,tanggal_lahir=?,jenis_kelamin=?,alamat=?,rt=?,rw=?,kelurahan=?,kecamatan=?,agama=?,status_perkawinan=?,pekerjaan=?,kewarganegaraan=? WHERE id_pengguna=?");

     $stmt->bind_param("iisssssssssssssi",$no_kk,$nik,$nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$rt,$rw,$kelurahan,$kecamatan,$agama,$status_perkawinan,$pekerjaan,$kewarganegaraan,$id_pengguna);

    $no_kk = $_POST['no_kk'];
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $kelurahan = $_POST["kelurahan"];
    $kecamatan = $_POST["kecamatan"];
    $agama = $_POST["agama"];
    $status_perkawinan = $_POST["status_perkawinan"];
    $pekerjaan = $_POST["pekerjaan"];
    $kewarganegaraan = $_POST["kewarganegaraan"];
    $id_pengguna = $_POST['id_pengguna'];

    if ($stmt->execute()) {
        echo 1;
    }
    else
    {
        echo 0;
    }
    $stmt->close();
}
?> 