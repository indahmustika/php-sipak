<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan	= $_GET['id_pengajuan'];

	$select = "SELECT COUNT(*) FROM berkas_pak WHERE id_pengajuan = '$id_pengajuan' AND status_berkas = 'TOLAK'";
	$rs=$koneksi->Execute($select);
	if($rs->recordCount()>0){
		while(!$rs->EOF){
			$data = $rs->fields[0];
			$rs->MoveNext();
		}
	}
	if($data=='0'){
		$update = "UPDATE pengajuan SET status_pengajuan = 'TELAH REVISI' WHERE id_pengajuan = '$id_pengajuan'";
		$koneksi->Execute($update);
		header("location:dosen_pengajuan_riwayat_telah_revisi.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
	}else{
		header("location:dosen_pengajuan_revisi_berkas.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan");
	}
?>