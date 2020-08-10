<?php 
	include_once("koneksi/conn.php");
	$nip_dosen = $_GET['nip_dosen'];
	$id_pengajuan = $_GET['id_pengajuan'];

	$hapus = "DELETE FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'";
	$koneksi->Execute($hapus);

	header("location:dosen_pengajuan_riwayat.php?nip_dosen=$nip_dosen");
?>