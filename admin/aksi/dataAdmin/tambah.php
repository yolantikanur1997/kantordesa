<?php
include("../../../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $nama = $_POST['nama'];
    $username = $_POST["username"];
    $password = mysqli_escape_string ($koneksi, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);



    $stmt = $koneksi->prepare("INSERT INTO admin (nama,username,password) VALUES (?,?,?)");

    $stmt->bind_param("sss",$nama,$username,$password);

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();

}
?>