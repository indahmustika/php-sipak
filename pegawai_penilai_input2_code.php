<?php
	include_once("koneksi/conn.php");
	$nip_pegawai	= $_GET['nip_pegawai'];
	$id_pengajuan	= $_GET['id_pengajuan'];
	$nip_penilai 	= $_GET['nip_penilai'];

	$update = "UPDATE pengajuan SET nip_penilai_2 = '$nip_penilai' WHERE id_pengajuan = '$id_pengajuan';";
	$koneksi->Execute($update);

	header("location:pegawai_penilai_input.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan")
?>