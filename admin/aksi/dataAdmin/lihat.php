<?php
include("../../../config/koneksi.php");

$stmt = $koneksi->prepare("SELECT id_admin,nama,username FROM admin ORDER BY id_admin DESC");

$stmt->bind_result($id_admin,$nama,$username);

if ($stmt->execute())
{
    while($stmt->fetch())
    {
        $output[] = array("id_admin"=>$id_admin,"nama"=>$nama,"username"=>$username);
    }
    echo json_encode($output);
}
$stmt->close();
?>