<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 		= $_GET['nip_pegawai'];
	$password_pegawai 	= $_POST['password_pegawai'];
	$nama_pegawai 		= $_POST['nama_pegawai'];
	$unit_kerja_pegawai = $_POST['unit_kerja_pegawai'];
	$alamat_pegawai 	= $_POST['alamat_pegawai'];
	$telepon_pegawai 	= $_POST['telepon_pegawai'];

	$ubah = "UPDATE pegawai SET password_pegawai = '$password_pegawai', nama_pegawai = '$nama_pegawai', unit_kerja_pegawai = '$unit_kerja_pegawai', alamat_pegawai = '$alamat_pegawai', telepon_pegawai = '$telepon_pegawai' WHERE nip_pegawai = '$nip_pegawai'";
	$koneksi->Execute($ubah);

	header("location:pegawai_profile.php?nip_pegawai=$nip_pegawai");
?>