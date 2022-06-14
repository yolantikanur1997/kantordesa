<?php
  include '../../../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $temp = "upload/";
  if (!file_exists($temp))
    mkdir($temp);

  $id_pemesanan    = $_POST['id_pemesanan'];
  $tgl_upload      = date('Y-m-d');
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

    $stmt = $koneksi->prepare("INSERT into bukti_transfer (id_pemesanan,foto_bukti_transfer,tgl_upload) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $id_pemesanan,$NewImageName,$tgl_upload );
  

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