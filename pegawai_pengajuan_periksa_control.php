<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$id_pengajuan	= $_GET['id_pengajuan'];

	$select = "SELECT COUNT(*) FROM berkas_pak WHERE id_pengajuan = '$id_pengajuan' AND status_berkas = ''";
	$rs=$koneksi->Execute($select);
	if($rs->recordCount()>0){
		while(!$rs->EOF){
			$data = $rs->fields[0];
			$rs->MoveNext();
		}
	}
	if($data=='0'){
		header("location:pegawai_berkas_diterima_code.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan");
	}else{
		header("location:pegawai_pengajuan_periksa.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan");
	}
?>