<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

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
    $password = mysqli_escape_string ($koneksi, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);



    $stmt = $koneksi->prepare("INSERT INTO konsumen (nik,nama_konsumen,tempat_lahir,tanggal_lahir,alamat,no_hp,pekerjaan,jenis_kelamin,email,no_npwp,password) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssssssss",$nik,$nama_konsumen,$tempat_lahir,$tanggal_lahir,$alamat,$no_hp,$pekerjaan,$jenis_kelamin,$email,$no_npwp,$password);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>