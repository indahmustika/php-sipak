<?php
	error_reporting(0);
	include_once("koneksi/conn.php");
	$nip_pegawai 	= $_GET['nip_pegawai'];
	$id_pengajuan 	= $_GET['id_pengajuan'];

	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai= '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$nama_pegawai = $rs_pegawai->fields[2];
			$rs_pegawai->MoveNext();
		}
	}

	$select_penilai = "SELECT nip_penilai_1,nip_penilai_2 FROM pengajuan WHERE id_pengajuan = '$id_pengajuan'";
	$rs_penilai = $koneksi->Execute($select_penilai);
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$nip_penilai_1_awal = $rs_penilai->fields[0];
			$nip_penilai_2_awal = $rs_penilai->fields[1];
			$rs_penilai->MoveNext();
		}
	}
	$nip_penilai_1_akhir = rtrim($nip_penilai_1_awal, "V");
	$nip_penilai_2_akhir = rtrim($nip_penilai_2_awal, "V");

	$select_penilai_1 = "SELECT nip_penilai,nama_penilai,unit_kerja_penilai,rumpun_ilmu FROM penilai WHERE nip_penilai = '$nip_penilai_1_akhir'";
	$rs_penilai_1 = $koneksi->Execute($select_penilai_1);
	if($rs_penilai_1->recordCount()>0){
		while (!$rs_penilai_1->EOF) {
			$nip_penilai_1			= $rs_penilai_1->fields[0];
			$nama_penilai_1			= $rs_penilai_1->fields[1];
			$unit_kerja_penilai_1	= $rs_penilai_1->fields[2];
			$rumpun_ilmu_penilai_1	= $rs_penilai_1->fields[3];
			$rs_penilai_1->MoveNext();
		}
	}

	$select_penilai_2 ="SELECT nip_penilai,nama_penilai,unit_kerja_penilai,rumpun_ilmu FROM penilai WHERE nip_penilai = '$nip_penilai_2_akhir'";
	$rs_penilai_2 = $koneksi->Execute($select_penilai_2);
	if($rs_penilai_2->recordCount()>0){
		while (!$rs_penilai_2->EOF) {
			$nip_penilai_2			= $rs_penilai_2->fields[0];
			$nama_penilai_2			= $rs_penilai_2->fields[1];
			$unit_kerja_penilai_2	= $rs_penilai_2->fields[2];
			$rumpun_ilmu_penilai_2	= $rs_penilai_2->fields[3];
			$rs_penilai_2->MoveNext();
		}
	}
	$select_pengajuan = "SELECT dosen.nip_dosen, dosen.nama_dosen, dosen.unit_kerja_dosen, pengajuan.jabatan_asal, pengajuan.jabatan_tujuan FROM pengajuan INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE id_pengajuan='$id_pengajuan'";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$nip_dosen			= $rs_pengajuan->fields[0];
			$nama_dosen			= $rs_pengajuan->fields[1];
			$unit_kerja_dosen	= $rs_pengajuan->fields[2];
			$jabatan_asal		= $rs_pengajuan->fields[3];
			$jabatan_tujuan		= $rs_pengajuan->fields[4];
			$rs_pengajuan->MoveNext();
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
				<a href="pegawai_data_pengajuan.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-info text-light">Data Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENGAJUAN</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td width="250">NIP Dosen</td>
									<td><b><?php echo $nip_dosen;?></b></td>
								</tr>
								<tr>
									<td>Nama Dosen</td>
									<td><?php echo $nama_dosen;?></td>
								</tr>
								<tr>
									<td>Unit Kerja Dosen</td>
									<td><?php echo $unit_kerja_dosen;?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td><?php echo $jabatan_asal;?></td>
								</tr>
								<tr>
									<td>Jabatan Tujuan</td>
									<td><?php echo $jabatan_tujuan;?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENILAI</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td width="250">NIP Penilai 1</td>
									<td><b><?php echo $nip_penilai_1?></b></td>
								</tr>
								<tr>
									<td>Nama Penilai 1</td>
									<td><?php echo $nama_penilai_1;?></td>
								</tr>
								<tr>
									<td>Unit Kerja Penilai 1</td>
									<td><?php echo $unit_kerja_penilai_1;?></td>
								</tr>
								<tr>
									<td>Rumpun Ilmu Penilai 1</td>
									<td><?php echo $rumpun_ilmu_penilai_1;?></td>
								</tr>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td width="250">NIP Penilai 2</td>
									<td><b><?php echo $nip_penilai_2?></b></td>
								</tr>
								<tr>
									<td>Nama Penilai 2</td>
									<td><?php echo $nama_penilai_2;?></td>
								</tr>
								<tr>
									<td>Unit Kerja Penilai 2</td>
									<td><?php echo $unit_kerja_penilai_2;?></td>
								</tr>
								<tr>
									<td>Rumpun Ilmu Penilai 2</td>
									<td><?php echo $rumpun_ilmu_penilai_2;?></td>
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