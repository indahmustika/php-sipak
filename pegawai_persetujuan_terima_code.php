<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$file_sk 		= $_POST['file_sk'];

	$update = "UPDATE pengajuan SET status_pengajuan = 'DITERIMA', file_sk = '$file_sk' WHERE id_pengajuan = '$id_pengajuan'";
	$koneksi->Execute($update);

	header("location:pegawai_data_pengajuan_selesai.php?nip_pegawai=$nip_pegawai");
?>