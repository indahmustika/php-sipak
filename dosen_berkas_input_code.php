<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas		= $_GET['id_berkas'];
	$kode_rubrik	= $_GET['kode_rubrik'];

	$bukti_berkas 	= $_POST['bukti_berkas'];
	$volume 		= $_POST['volume'];
	$poin 			= $_POST['poin'];
	$total_poin		= $poin*$volume;

	$simpan = "INSERT INTO berkas_pak VALUES ('$id_berkas', '$id_pengajuan', '$kode_rubrik', '$bukti_berkas', '', '$volume', '$total_poin', '$total_poin', '$total_poin', '')";
	$koneksi->Execute($simpan);

	header("location:dosen_pengajuan_tambah_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
?>