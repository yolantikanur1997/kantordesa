<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $no_kk = $_POST['no_kk'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
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
    $password = mysqli_escape_string ($koneksi, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);



    $stmt = $koneksi->prepare("INSERT INTO pengguna (no_kk,nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,alamat,rt,rw,kelurahan,kecamatan,agama,status_perkawinan,pekerjaan,kewarganegaraan,password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("iisssssiisssssss",$no_kk,$nik,$nama,$tempat_lahir,$tanggal_lahir,$jenis_kelamin,$alamat,$rt,$rw,$kelurahan,$kecamatan,$agama,$status_perkawinan,$pekerjaan,$kewarganegaraan,$password);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>