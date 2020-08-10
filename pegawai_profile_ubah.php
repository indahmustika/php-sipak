<?php
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai = '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$password_pegawai 	= $rs_pegawai->fields[1];
			$nama_pegawai 		= $rs_pegawai->fields[2];
			$unit_kerja_pegawai = $rs_pegawai->fields[3];
			$alamat_pegawai 	= $rs_pegawai->fields[4];
			$telepon_pegawai	= $rs_pegawai->fields[5];
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
						<div class="table-responsive">
							<table class="table table-borderless" id="tabelberkas" width="100%" cellspacing="0">
								<form action="pegawai_profile_ubah_code.php?nip_pegawai=<?php echo $nip_pegawai;?>" method="POST">
									<tr>
										<td width="150">NIP</td>
										<td>
											<div class="col-sm-3">
												<input type="text" name="nip_pegawai" value="<?php echo $nip_pegawai;?>" readonly="readonly" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="nama_pegawai" value="<?php echo $nama_pegawai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Unit Kerja</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="unit_kerja_pegawai" value="<?php echo $unit_kerja_pegawai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="alamat_pegawai" value="<?php echo $alamat_pegawai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Telepon</td>
										<td><div class="col-sm-3">
											<input type="text" name="telepon_pegawai" value="<?php echo $telepon_pegawai;?>" class="form-control">
										</div></td>
									</tr>
									<tr>
										<td>Password</td>
										<td>
											<div class="col-sm-3">
												<input type="text" name="password_pegawai" value="<?php echo $password_pegawai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<input style="margin: 0 0 0 130%;" type="submit" name="ubah" value="Simpan" class="btn btn-success">
										</td>
									</tr>
								</form>
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