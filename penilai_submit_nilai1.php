<?php
	include_once("koneksi/conn.php");
	$nip_penilai 		= $_GET['nip_penilai'];
	$id_pengajuan 		= $_GET['id_pengajuan'];

	$nip_selesai = $nip_penilai . 'V';

	$update = "UPDATE pengajuan SET nip_penilai_1 = '$nip_selesai' WHERE id_pengajuan = '$id_pengajuan'";
	$koneksi->Execute($update);

	$select_penilai = "SELECT nip_penilai_1,nip_penilai_2 FROM pengajuan WHERE nip_penilai_1 LIKE '%V' AND nip_penilai_2 LIKE '%V' AND id_pengajuan = '$id_pengajuan'";
	$rs_penilai = $koneksi->Execute($select_penilai);
	
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$nip_penilai_1 = $rs_penilai->fields[0];
			$nip_penilai_2 = $rs_penilai->fields[1];
			$rs_penilai->MoveNext();
		}
		$nip_penilai_1_baru = rtrim($nip_penilai_1, "V");
		$nip_penilai_2_baru = rtrim($nip_penilai_2, "V");

		$select_poin = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan'";
		$rs_poin=$koneksi->Execute($select_poin);
		if($rs_poin->recordCount()>0){
			while(!$rs_poin->EOF){
				$total_poin = $rs_poin->fields[0];
				$rs_poin->MoveNext();
			}
		} 

		$update_pengajuan = "UPDATE pengajuan SET status_pengajuan = 'PENILAIAN SELESAI', nip_penilai_1 = '$nip_penilai_1_baru', nip_penilai_2 = '$nip_penilai_2_baru', total_pak_akhir = '$total_poin' WHERE id_pengajuan = '$id_pengajuan'";
		$koneksi->Execute($update_pengajuan);
	}
	header("location:penilai_daftar_pengajuan_selesai.php?nip_penilai=$nip_penilai");
?>