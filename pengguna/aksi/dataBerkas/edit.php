<?php
  include '../../../config/koneksi.php';
  global $link;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $temp = "gambar/";

  
  if (!file_exists($temp))
    mkdir($temp);

    $id_pengguna     = $_POST['id_pengguna'];
    $jenis_berkas    = $_POST['jenis_berkas'];
    $fileupload      = $_FILES['fileupload']['tmp_name'];
    $ImageName       = $_FILES['fileupload']['name'];
    $ImageType       = $_FILES['fileupload']['type'];
    $id_berkas       = $_POST['id_berkas'];

    $stmt1   = "SELECT * FROM berkas WHERE id_berkas='$id_berkas'";
    $result = mysqli_query($koneksi, $stmt1);

    $row = mysqli_fetch_assoc($result);


  if (!empty($fileupload)){
    $acak           = rand(11111111, 99999999);
    $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.','',$ImageExt); // Extension
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

    move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

  
    $stmt = $koneksi->prepare("UPDATE berkas SET id_pengguna=?,jenis_berkas=?,nama_berkas=? WHERE id_berkas=?");
    $stmt->bind_param("issi",$id_pengguna,$jenis_berkas,$NewImageName,$id_berkas);

    $temp2 = "gambar/".$row['nama_berkas'];

    if ($stmt->execute())
    {
        unlink($temp2);
        echo 1;
    }else{
        echo 0;
    }

    $stmt->close();
  }
}
?>