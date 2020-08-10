<?php
	include_once("koneksi/conn.php");
	$nip_dosen 			= $_GET['nip_dosen'];
	$password_dosen		= $_POST['password_dosen'];
	$nama_dosen 		= $_POST['nama_dosen'];
	$unit_kerja_dosen 	= $_POST['unit_kerja_dosen'];
	$alamat_dosen 		= $_POST['alamat_dosen'];
	$telepon_dosen 		= $_POST['telepon_dosen'];

	$ubah = "UPDATE dosen SET password_dosen = '$password_dosen', nama_dosen = '$nama_dosen', unit_kerja_dosen = '$unit_kerja_dosen', alamat_dosen = '$alamat_dosen', telepon_dosen = '$telepon_dosen' WHERE nip_dosen = '$nip_dosen'";
	$koneksi->Execute($ubah);

	header("location:dosen_profile.php?nip_dosen=$nip_dosen");
?>