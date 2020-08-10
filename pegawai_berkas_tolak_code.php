<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas 		= $_GET['id_berkas'];
	$catatan_berkas	= $_POST['catatan_berkas'];

	$update = "UPDATE berkas_pak SET status_berkas = 'TOLAK', catatan_berkas = '$catatan_berkas' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($update);

	header("location:pegawai_pengajuan_periksa.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan");
?>