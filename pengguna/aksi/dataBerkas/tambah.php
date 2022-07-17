<?php
  session_start();
  include '../../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $temp = "../../../admin/aksi/dataBerkas/gambar/";
  if (!file_exists($temp))
    mkdir($temp);

  $id_pengguna       = $_SESSION['id_pengguna'];
  $jenis_berkas     = $_POST['jenis_berkas'];
  $fileupload      = $_FILES['fileupload']['tmp_name'];
  $ImageName       = $_FILES['fileupload']['name'];
  $ImageType       = $_FILES['fileupload']['type'];

  if (!empty($fileupload)){
    $acak           = rand(11111111, 99999999);
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

    $stmt = $koneksi->prepare("INSERT into berkas (id_pengguna,jenis_berkas,nama_berkas) VALUES (?,?,?)");
    $stmt->bind_param("iss",$id_pengguna,$jenis_berkas,$NewImageName );
  

    if ($stmt->execute())
    {
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();
  }
}
?>