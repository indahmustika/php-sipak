<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 		= $_GET['nip_pegawai'];
	$id_pengajuan		= $_GET['id_pengajuan'];

	$select_penilai = "SELECT nip_penilai_1, nip_penilai_2 FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'";
	$rs = $koneksi->Execute($select_penilai);
	if($rs->recordCount()>0){
		while(!$rs->EOF){
			$nip_penilai_1 = $rs->fields[0];
			$nip_penilai_2 = $rs->fields[1];
			$rs->MoveNext();
		}
	}
	if(empty($nip_penilai_1) || empty($nip_penilai_2)){
		header("location:pegawai_penilai_input.php?nip_pegawai=$nip_pegawai&id_pengajuan=$id_pengajuan");
	}else{
		header("location:pegawai_data_pengajuan_berkas_diterima.php?nip_pegawai=$nip_pegawai");
	}
?>