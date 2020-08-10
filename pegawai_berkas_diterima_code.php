<?php
	include_once("koneksi/conn.php");
	$nip_pegawai	= $_GET['nip_pegawai'];
	$id_pengajuan	= $_GET['id_pengajuan'];

	$update = "UPDATE pengajuan SET status_pengajuan = 'BERKAS DITERIMA' WHERE id_pengajuan = '$id_pengajuan';";
	$koneksi->Execute($update);

	header("location:pegawai_penilai_input.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan");
?>