<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("UPDATE admin SET nama=?,username=? WHERE id_admin=?");

     $stmt->bind_param("ssi",$nama,$username,$id_admin);

    $nama = $_POST['nama'];
    $username = $_POST["username"];
    $id_admin = $_POST['id_admin'];

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