<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include("../../../config/koneksi.php");

    $stmt = $koneksi->prepare("SELECT pengajuan_surat.id_pengajuan_surat,pengajuan_surat.no_pengajuan_surat,
    pengajuan_surat.id_jenis_surat,pengajuan_surat.tanggal_pengajuan,pengajuan_surat.tanggal_selesai,
    pengajuan_surat.keperluan,pengajuan_surat.komentar,pengajuan_surat.status,jenis_surat.nama_surat,
    pengguna.id_pengguna,pengguna.nama,pengguna.nik
    FROM pengajuan_surat 
    INNER JOIN pengguna ON pengguna.id_pengguna = pengajuan_surat.id_pengguna
    INNER JOIN jenis_surat ON pengajuan_surat.id_jenis_surat = jenis_surat.id_jenis_surat
    WHERE id_pengajuan_surat=?");

    //fungsi ini samakan dengan function  id_kelas = data.id di kelas.php untuk edit data sesuai id
    $id_pengajuan_surat = $_POST['id_pengajuan_surat'];
    $stmt->bind_param("i", $id_pengajuan_surat);


    $stmt->bind_result($id_pengajuan_surat,$no_pengajuan_surat,$id_jenis_surat,$tanggal_pengajuan,$tanggal_selesai,$keperluan,$komentar,$status,$nama_surat,$id_pengguna,$nama,$nik);

    if ($stmt->execute()) {

        while($stmt->fetch())
        {
            $output = array("id_pengajuan_surat"=>$id_pengajuan_surat,"no_pengajuan_surat"=>$no_pengajuan_surat,"id_jenis_surat"=>$id_jenis_surat,"tanggal_pengajuan"=>$tanggal_pengajuan,"tanggal_selesai"=>$tanggal_selesai,"keperluan"=>$keperluan,"komentar"=>$komentar,"status"=>$status,"nama_surat"=>$nama_surat,"id_pengguna"=>$id_pengguna,"nama"=>$nama,"nik"=>$nik);
        }
        echo json_encode($output);
    }
    $stmt->close();
}


?>