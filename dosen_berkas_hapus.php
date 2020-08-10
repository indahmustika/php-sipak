<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas 		= $_GET['id_berkas'];

	$hapus = "DELETE FROM berkas_pak WHERE id_berkas='$id_berkas'";
	$koneksi->Execute($hapus);

	header("location:dosen_pengajuan_tambah_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
?>