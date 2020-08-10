<?php
	include_once"adodb5/adodb.inc.php";
	$koneksi=NewADOConnection("mysqli");
	$koneksi->Connect("localhost","root","","sipak");

	global $koneksi;

?>