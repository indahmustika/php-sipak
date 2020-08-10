<?php
	include_once("koneksi/conn.php");
	$nip_dosen			= $_GET['nip_dosen'];
	$id_pengajuan		= $_GET['id_pengajuan'];
	$syarat_pak			= $_GET['syarat_pak'];
	$total_pak_akhir	= $_GET['total_pak_akhir'];

	if($total_pak_akhir>=$syarat_pak){
		header("location:dosen_pengajuan_kirim_sukses.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
		$update = "UPDATE pengajuan SET tanggal_pengajuan = CURRENT_DATE, status_pengajuan = 'TERKIRIM' WHERE id_pengajuan = $id_pengajuan;";
		$koneksi->Execute($update);
	}else{
		header("location:dosen_pengajuan_kirim_gagal.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
	}
?>