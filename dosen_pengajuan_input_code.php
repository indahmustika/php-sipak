<?php
	include_once("koneksi/conn.php");
	$id_pengajuan 		= $_GET['id_pengajuan'];
	$nip_dosen 			= $_POST['nip_dosen'];
	$jabatan_asal 		= $_POST['jabatan_asal'];
	$tanggal_sk 		= $_POST['tanggal_sk'];
	$jabatan_tujuan 	= $_POST['jabatan_tujuan'];
	$dokumen_pendukung 	= $_POST['dokumen_pendukung'];

	$select_kum = "SELECT * FROM syarat_kum WHERE nama_jabatan = '$jabatan_tujuan'";
	$rs_kum = $koneksi->Execute($select_kum);
	if($rs_kum->recordCount()>0){
		while(!$rs_kum->EOF){
			$id_kum = $rs_kum->fields[0];
			$rs_kum->MoveNext();
		}
	} 

	$simpan = "INSERT INTO pengajuan VALUES ('$id_pengajuan', '$id_kum', '$nip_dosen', '', '', '', CURRENT_DATE, '$jabatan_asal', '$tanggal_sk', '$jabatan_tujuan', '$dokumen_pendukung', 'BELUM DIKIRIM', '0', '');";
	$koneksi->Execute($simpan);

	header("location:dosen_pengajuan_tambah_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
?>