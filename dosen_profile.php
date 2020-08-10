<?php
	include_once("koneksi/conn.php");
	$nip_dosen = $_GET['nip_dosen'];
	$select_dosen = "SELECT * FROM dosen WHERE nip_dosen = '$nip_dosen'";
	$rs_dosen = $koneksi->Execute($select_dosen);
	if($rs_dosen->recordCount()>0){
		while(!$rs_dosen->EOF){
			$password_dosen 	= $rs_dosen->fields[1];
			$nama_dosen 		= $rs_dosen->fields[2];
			$unit_kerja_dosen 	= $rs_dosen->fields[3];
			$alamat_dosen 		= $rs_dosen->fields[4];
			$telepon_dosen 		= $rs_dosen->fields[5];
			$rs_dosen->MoveNext();
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
				<a href="dosen_beranda.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-light ">Beranda</a>
				<a href="dosen_pengajuan_riwayat.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-light">Riwayat Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_dosen.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>PROFIL</b></div>
					<div class="card-body">
						<a class="btn btn-success" href="dosen_profile_ubah.php?nip_dosen=<?php echo $nip_dosen;?>">UBAH PROFIL</a>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-borderless" id="tabelberkas" width="100%" cellspacing="0">
								<tr>
									<td width="150">NIP</td>
									<td><b><?php echo $nip_dosen;?></b></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td><?php echo $nama_dosen;?></td>
								</tr>
								<tr>
									<td>Unit Kerja</td>
									<td><?php echo $unit_kerja_dosen;?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat_dosen;?></td>
								</tr>
								<tr>
									<td>Telepon</td>
									<td><?php echo $telepon_dosen;?></td>
								</tr>
								<tr>
									<td>Password</td>
									<td><?php echo $password_dosen;?></td>
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