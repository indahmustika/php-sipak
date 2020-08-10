<?php
	include_once("koneksi/conn.php");
	$nip_penilai	= $_GET['nip_penilai'];
	$id_berkas		= $_GET['id_berkas'];
	$id_pengajuan	= $_GET['id_pengajuan'];
	$poin_2 		= $_POST['poin_2'];

	$update = "UPDATE berkas_pak SET poin_2 = '$poin_2' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($update);

	$select_poin_1 = "SELECT poin_1 FROM berkas_pak WHERE id_berkas = '$id_berkas'";
	$rs_poin_1 = $koneksi->Execute($select_poin_1);
	if($rs_poin_1->recordCount()>0){
		while(!$rs_poin_1->EOF){
			$poin_1 = $rs_poin_1->fields[0];
			$rs_poin_1->MoveNext();
		}
	}

	$poin_akhir = ($poin_1+$poin_2)/2;
	$update_poin = "UPDATE berkas_pak SET poin_akhir = '$poin_akhir' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($update_poin); 

	header("location:penilai_data_berkas_penilai2.php?nip_penilai=$nip_penilai&id_pengajuan=$id_pengajuan")
?>