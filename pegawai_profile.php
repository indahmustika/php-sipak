<?php
	include_once("koneksi/conn.php");
	$nip_pegawai = $_GET['nip_pegawai'];
	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai = '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$password_pegawai 	= $rs_pegawai->fields[1];
			$nama_pegawai 		= $rs_pegawai->fields[2];
			$unit_kerja_pegawai = $rs_pegawai->fields[3];
			$alamat_pegawai 	= $rs_pegawai->fields[4];
			$telepon_pegawai 	= $rs_pegawai->fields[5];
			$rs_pegawai->MoveNext();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sistem Informasi PAK</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><b>Main Menu</b></div>
			<div class="list-group list-group-flush">
				<a href="pegawai_beranda.php?nip_pegawai=<?php echo $nip_pegawai?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="pegawai_data_penilai.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-light">Data Penilai</a>
				<a href="pegawai_data_pengajuan.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-light">Data Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>PROFIL</b></div>
					<div class="card-body">
						<a class="btn btn-success" href="pegawai_profile_ubah.php?nip_pegawai=<?php echo $nip_pegawai;?>">UBAH PROFIL</a>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-borderless" id="tabelberkas" width="100%" cellspacing="0">
								<tr>
									<td width="150">NIP</td>
									<td><?php echo $nip_pegawai;?></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td><?php echo $nama_pegawai;?></td>
								</tr>
								<tr>
									<td>Unit Kerja</td>
									<td><?php echo $unit_kerja_pegawai;?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat_pegawai;?></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td><?php echo $telepon_pegawai;?></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><?php echo $password_pegawai;?></td>
								</tr>
							</table>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>