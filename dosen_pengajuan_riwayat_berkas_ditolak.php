<?php
	error_reporting(0);
	include_once("koneksi/conn.php");
	$nip_dosen = $_GET['nip_dosen'];
	$select_dosen = "SELECT * FROM dosen WHERE nip_dosen = '$nip_dosen'";
	$rs_dosen = $koneksi->Execute($select_dosen);
	if($rs_dosen->recordCount()>0){
		while(!$rs_dosen->EOF){
			$nama_dosen = $rs_dosen->fields[2];
			$rs_dosen->MoveNext();
		}
	}

	$select_pengajuan ="SELECT id_pengajuan,tanggal_pengajuan,jabatan_asal,tanggal_sk,jabatan_tujuan,total_pak_akhir,status_pengajuan FROM pengajuan WHERE nip_dosen = $nip_dosen AND status_pengajuan = 'BERKAS DITOLAK' ORDER BY id_pengajuan DESC";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$data_pengajuan[] = $rs_pengajuan->fields;
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
	<link rel="stylesheet" type="text/css" href="DataTables/assets/css/jquery.dataTables.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="d-flex" id="wrapper">
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><b>Main Menu</b></div>
			<div class="list-group list-group-flush">
				<a href="dosen_beranda.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="dosen_pengajuan_riwayat.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-info text-light">Riwayat Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_dosen.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>RIWAYAT PENGAJUAN</b></div>
					<div class="card-body">
						<a class="btn btn-success" href="dosen_pengajuan_input.php?nip_dosen=<?php echo $nip_dosen;?>">TAMBAH PENGAJUAN</a>
						<h1></h1>
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link" href="dosen_pengajuan_riwayat.php?nip_dosen=<?php echo $nip_dosen?>">BELUM TERKIRIM</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dosen_pengajuan_riwayat_terkirim.php?nip_dosen=<?php echo $nip_dosen?>">TERKIRIM</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="dosen_pengajuan_riwayat_berkas_ditolak.php?nip_dosen=<?php echo $nip_dosen?>"><b>BERKAS DITOLAK</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dosen_pengajuan_riwayat_telah_revisi.php?nip_dosen=<?php echo $nip_dosen?>">TELAH REVISI</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dosen_pengajuan_riwayat_berkas_diterima.php?nip_dosen=<?php echo $nip_dosen?>">BERKAS DITERIMA</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="dosen_pengajuan_riwayat_selesai.php?nip_dosen=<?php echo $nip_dosen?>">SELESAI</a>
							</li>
						</ul>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-bordered" id="example" class="display width="100%" cellspacing="0">
								<thead>
									<tr>
										<th width="10"><center>ID</center></th>
										<th><center>Tanggal</center></th>
										<th><center>Jabatan</center></th>
										<th><center>Tanggal SK</center></th>
										<th><center>Jabatan Tujuan</center></th>
										<th><center>Total PAK</center></th>
										<th><center>Status</center></th>
										<th width="65"><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_pengajuan as $value_pengajuan):?>
									<tr>
										<td><center><?php echo $value_pengajuan[0];?></center></td>
										<td><center><?php echo $value_pengajuan[1];?></center></td>
										<td><?php echo $value_pengajuan[2];?></td>
										<td><center><?php echo $value_pengajuan[3];?></center></td>
										<td><?php echo $value_pengajuan[4];?></td>
										<td><center><?php echo $value_pengajuan[5];?></center></td>
										<td><a href="dosen_pengajuan_detail_berkas.php?nip_dosen=<?php echo $nip_dosen?>&id_pengajuan=<?php echo $value_pengajuan[0]?>"><?php echo $value_pengajuan[6];?></a></td>
										<td>
											<a class="btn btn-sm btn-warning" href="dosen_pengajuan_revisi_berkas.php?nip_dosen=<?php echo $nip_dosen?>&id_pengajuan=<?php echo $value_pengajuan[0]?>"><b>REVISI</b></a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables/assets/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>