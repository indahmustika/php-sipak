<?php 
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$nip_penilai 	= $_GET['nip_penilai'];

	$hapus = "DELETE FROM penilai WHERE nip_penilai='$nip_penilai'";
	$koneksi->Execute($hapus);

	header("location:pegawai_data_penilai.php?nip_pegawai=$nip_pegawai");
?>