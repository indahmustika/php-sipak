<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas		= $_GET['id_berkas'];
	$bukti_berkas 	= $_POST['bukti_berkas'];

	$ubah = "UPDATE berkas_pak SET bukti_berkas = '$bukti_berkas', status_berkas = 'TELAH REVISI' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($ubah);

	header("location:dosen_pengajuan_revisi_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
?>