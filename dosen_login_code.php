<?php
	include_once("koneksi/conn.php");
	$nip_dosen		=$_POST['nip_dosen'];
	$password_dosen	=$_POST['password_dosen'];

	$login	= "SELECT nip_dosen, password_dosen FROM dosen WHERE nip_dosen='$nip_dosen' AND password_dosen='$password_dosen'";
	$rs = $koneksi->Execute($login);
	
	if($rs->recordCount()>0){
		header("location:dosen_beranda.php?nip_dosen=$nip_dosen");
	}else{
		header("location:dosen_login_gagal.php");
	}
?>