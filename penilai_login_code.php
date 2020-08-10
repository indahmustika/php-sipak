<?php
	include_once("koneksi/conn.php");
	$nip_penilai		=$_POST['nip_penilai'];
	$password_penilai	=$_POST['password_penilai'];

	$login = "SELECT nip_penilai,password_penilai FROM penilai WHERE nip_penilai='$nip_penilai' AND password_penilai='$password_penilai'";
	$rs = $koneksi->Execute($login);
	if($rs->recordCount()>0){
		header("location:penilai_beranda.php?nip_penilai=$nip_penilai");
	}else{
		header("location:penilai_login_gagal.php");
	}
?>