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

	$simpan = "INSERT INTO penilai VALUES ('$nip_penilai', '$password_penilai', '$nama_penilai', '$unit_kerja_penilai', '$rumpun_ilmu', '$alamat_penilai', '$telepon_penilai');";
	$koneksi->Execute($simpan);

	header("location:pegawai_data_penilai.php?nip_pegawai=$nip_pegawai");
?>