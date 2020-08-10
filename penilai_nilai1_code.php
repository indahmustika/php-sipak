<?php
	include_once("koneksi/conn.php");
	$nip_penilai	= $_GET['nip_penilai'];
	$id_berkas		= $_GET['id_berkas'];
	$id_pengajuan	= $_GET['id_pengajuan'];
	$poin_1 		= $_POST['poin_1'];

	$update = "UPDATE berkas_pak SET poin_1 = '$poin_1' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($update);

	$select_poin_2 = "SELECT poin_2 FROM berkas_pak WHERE id_berkas = '$id_berkas'";
	$rs_poin_2 = $koneksi->Execute($select_poin_2);
	if($rs_poin_2->recordCount()>0){
		while(!$rs_poin_2->EOF){
			$poin_2 = $rs_poin_2->fields[0];
			$rs_poin_2->MoveNext();
		}
	}

	$poin_akhir = ($poin_1+$poin_2)/2;
	$update_poin = "UPDATE berkas_pak SET poin_akhir = '$poin_akhir' WHERE id_berkas = '$id_berkas'";
	$koneksi->Execute($update_poin); 

	header("location:penilai_data_berkas_penilai1.php?nip_penilai=$nip_penilai&id_pengajuan=$id_pengajuan")
?>