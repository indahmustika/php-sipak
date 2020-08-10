<?php
	include_once("koneksi/conn.php");
	$nip_penilai = $_GET['nip_penilai'];
	$select_penilai = "SELECT * FROM penilai WHERE nip_penilai = '$nip_penilai'";
	$rs_penilai = $koneksi->Execute($select_penilai);
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$password_penilai		= $rs_penilai->fields[1];
			$nama_penilai			= $rs_penilai->fields[2];
			$unit_kerja_penilai		= $rs_penilai->fields[3];
			$rumpun_ilmu			= $rs_penilai->fields[4];
			$alamat_penilai			= $rs_penilai->fields[5];
			$telepon_penilai		= $rs_penilai->fields[6];
			$rs_penilai->MoveNext();
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
				<a href="penilai_beranda.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="penilai_daftar_pengajuan.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Daftar Pengajuan</a>
				<a href="penilai_tabel_pak.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Tabel Nilai Angka Kredit</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_penilai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>PROFIL</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-borderless" id="tabelberkas" width="100%" cellspacing="0">
								<form action="penilai_profile_ubah_code.php?nip_penilai=<?php echo $nip_penilai;?>" method="POST">
									<tr>
										<td width="150">NIP</td>
										<td>
											<div class="col-sm-3">
												<input type="text" name="nip_penilai" value="<?php echo $nip_penilai;?>" readonly="readonly" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="nama_penilai" value="<?php echo $nama_penilai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Unit Kerja</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="unit_kerja_penilai" value="<?php echo $unit_kerja_penilai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Rumpun Ilmu</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="rumpun_ilmu" value="<?php echo $rumpun_ilmu;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>
											<div class="col-sm-8">
												<input type="text" name="alamat_penilai" value="<?php echo $alamat_penilai;?>" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<td>Telepon</td>
										<td><div class="col-sm-3">
											<input type="text" name="telepon_penilai" value="<?php echo $telepon_penilai;?>" class="form-control">
										</div></td>
									</tr>
									<tr>
										<td>Password</td>
										<td>
											<div class="col-sm-3">
												<input type="text" name="password_penilai" value="<?php echo $password_penilai;?>" class="form-control">
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