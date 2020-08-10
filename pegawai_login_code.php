<?php
	include_once("koneksi/conn.php");
	$nip_pegawai		=$_POST['nip_pegawai'];
	$password_pegawai	=$_POST['password_pegawai'];

	$login = "SELECT nip_pegawai, password_pegawai FROM pegawai WHERE nip_pegawai='$nip_pegawai' AND password_pegawai='$password_pegawai'";
	$rs = $koneksi->Execute($login);
	
	if($rs->recordCount()>0){
		header("location:pegawai_beranda.php?nip_pegawai=$nip_pegawai");
	}else{
		header("location:pegawai_login_gagal.php");
	}
?>