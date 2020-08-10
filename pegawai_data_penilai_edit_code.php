<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 			= $_GET['nip_pegawai'];
	$nama_penilai			= $_POST['nama_penilai'];
	$nip_penilai			= $_POST['nip_penilai'];
	$unit_kerja_penilai		= $_POST['unit_kerja_penilai'];
	$rumpun_ilmu			= $_POST['rumpun_ilmu'];
	$alamat_penilai			= $_POST['alamat_penilai'];
	$telepon_penilai		= $_POST['telepon_penilai'];
	$password_penilai		= $_POST['password_penilai'];

	$ubah = "UPDATE penilai SET password_penilai = '$password_penilai', nama_penilai = '$nama_penilai', unit_kerja_penilai = '$unit_kerja_penilai', rumpun_ilmu = '$rumpun_ilmu', alamat_penilai = '$alamat_penilai', telepon_penilai = '$telepon_penilai' WHERE nip_penilai = '$nip_penilai';";
	$koneksi->Execute($ubah);

	header("location:pegawai_data_penilai.php?nip_pegawai=$nip_pegawai");
?>