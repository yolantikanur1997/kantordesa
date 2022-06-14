<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE konsumen SET nik=?,nama_konsumen=?,tempat_lahir=?,tanggal_lahir=?,alamat=?,no_hp=?,pekerjaan=?,jenis_kelamin=?,email=?,no_npwp=? WHERE id_konsumen=?");

     $stmt->bind_param("ssssssssssi",$nik,$nama_konsumen,$tempat_lahir,$tanggal_lahir,$alamat,$no_hp,$pekerjaan,$jenis_kelamin,$email,$no_npwp,$id_konsumen);

    $nik = $_POST['nik'];
    $nama_konsumen = $_POST["nama"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $pekerjaan = $_POST["pekerjaan"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $email = $_POST["email"];
    $no_npwp = $_POST["no_npwp"];
    $id_konsumen = $_POST['id_konsumen'];

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