<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas		= $_GET['id_berkas'];

	$bukti_berkas 	= $_POST['bukti_berkas'];
	$volume 		= $_POST['volume'];
	$poin 			= $_POST['poin'];
	$total_poin		= $poin*$volume;

	$ubah = "UPDATE berkas_pak SET bukti_berkas = '$bukti_berkas', volume = '$volume', poin_1 = '$total_poin', poin_2 = '$total_poin', poin_akhir = '$total_poin' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($ubah);

	header("location:dosen_pengajuan_tambah_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
?>