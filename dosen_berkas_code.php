<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];
	$id_berkas		= $_GET['id_berkas'];
	$kode_rubrik	= $_GET['kode_rubrik'];

	$select_rubrik = "SELECT * FROM rubrik WHERE kode_rubrik = '$kode_rubrik'";
	$rs_rubrik = $koneksi->Execute($select_rubrik);
	if($rs_rubrik->recordCount()>0){
		while(!$rs_rubrik->EOF){
			$poin_rubrik = $rs_rubrik->fields[3];
			$rs_rubrik->MoveNext();
		}
	}	
	$simpan = "INSERT INTO berkas_pak VALUES ('$id_berkas', '$id_pengajuan', '$kode_rubrik', '', '', '0', '0', '0', '0')";
	$koneksi->Execute($simpan);

	header("location:dosen_berkas_input.php?nip_dosen=$nip_dosen&id_pengajuan=$id_pengajuan&id_berkas=$id_berkas");
?>