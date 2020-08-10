<?php
	error_reporting(0);
	include_once("koneksi/conn.php");
	$nip_penilai = $_GET['nip_penilai'];
	$select_penilai = "SELECT * FROM penilai WHERE nip_penilai = '$nip_penilai'";
	$rs_penilai = $koneksi->Execute($select_penilai);
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$nama_penilai = $rs_penilai->fields[2];
			$rs_penilai->MoveNext();
		}
	}
	$select_pengajuan1 = "SELECT pengajuan.id_pengajuan,pengajuan.tanggal_pengajuan,dosen.nama_dosen,pengajuan.jabatan_asal,pengajuan.jabatan_tujuan,pengajuan.total_pak_akhir FROM pengajuan INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE nip_penilai_1 = '$nip_penilai' AND status_pengajuan = 'BERKAS DITERIMA'";
	$rs_pengajuan1 = $koneksi->Execute($select_pengajuan1);
	if($rs_pengajuan1->recordCount()>0){
		while(!$rs_pengajuan1->EOF){
			$data_pengajuan1[] = $rs_pengajuan1->fields;
			$rs_pengajuan1->MoveNext();
		}
	}
	$select_pengajuan2 = "SELECT pengajuan.id_pengajuan,pengajuan.tanggal_pengajuan,dosen.nama_dosen,pengajuan.jabatan_asal,pengajuan.jabatan_tujuan,pengajuan.total_pak_akhir FROM pengajuan INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE nip_penilai_2 = '$nip_penilai' AND status_pengajuan = 'BERKAS DITERIMA'";
	$rs_pengajuan2 = $koneksi->Execute($select_pengajuan2);
	if($rs_pengajuan2->recordCount()>0){
		while(!$rs_pengajuan2->EOF){
			$data_pengajuan2[] = $rs_pengajuan2->fields;
			$rs_pengajuan2->MoveNext();
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
				<a href="penilai_beranda.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="penilai_daftar_pengajuan.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-info text-light">Daftar Pengajuan</a>
				<a href="penilai_tabel_pak.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Tabel Nilai Angka Kredit</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_penilai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENGAJUAN KENAIKAN JABATAN</b></div>
					<div class="card-body">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="penilai_daftar_pengajuan.php?nip_penilai=<?php echo $nip_penilai;?>"><b>BELUM DINILAI</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="penilai_daftar_pengajuan_selesai.php?nip_penilai=<?php echo $nip_penilai;?>">TELAH DINILAI</a>
							</li>
						</ul>
						<h1></h1>
						<h5><span class="badge badge-success">SEBAGAI PENILAI 1</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0" id="example1" class="display">
								<thead>
									<tr>
										<th width="10"><center>ID</center></th>
										<th width="70"><center>Tanggal</center></th>
										<th><center>Nama</center></th>
										<th width="120"><center>Jabatan</center></th>
										<th width="120"><center>Jabatan Tujuan</center></th>
										<th width="100"><center>Total PAK Awal</center></th>
										<th width="77"><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_pengajuan1 as $value_pengajuan1):?>
										<tr>
											<td><center><?php echo $value_pengajuan1[0]?></center></td>
											<td><?php echo $value_pengajuan1[1]?></td>
											<td><?php echo $value_pengajuan1[2]?></td>
											<td><?php echo $value_pengajuan1[3]?></td>
											<td><?php echo $value_pengajuan1[4]?></td>
											<td><center><?php echo $value_pengajuan1[5]?></center></td>
											<td><a class="btn btn-sm btn-primary" href="penilai_data_berkas_penilai1.php?nip_penilai=<?php echo $nip_penilai;?>&id_pengajuan=<?php echo $value_pengajuan1[0]?>">Lihat Berkas</a> 
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
						<h1></h1>
						<h5><span class="badge badge-success">SEBAGAI PENILAI 2</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0" id="example2" class="display">
								<thead>
									<tr>
										<th width="10"><center>ID</center></th>
										<th width="70"><center>Tanggal</center></th>
										<th><center>Nama</center></th>
										<th width="120"><center>Jabatan</center></th>
										<th width="120"><center>Jabatan Tujuan</center></th>
										<th width="100"><center>Total PAK Awal</center></th>
										<th width="77"><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_pengajuan2 as $value_pengajuan2):?>
										<tr>
											<td><center><?php echo $value_pengajuan2[0]?></center></td>
											<td><?php echo $value_pengajuan2[1]?></td>
											<td><?php echo $value_pengajuan2[2]?></td>
											<td><?php echo $value_pengajuan2[3]?></td>
											<td><?php echo $value_pengajuan2[4]?></td>
											<td><center><?php echo $value_pengajuan2[5]?></center></td>
											<td><a class="btn btn-sm btn-primary" href="penilai_data_berkas_penilai2.php?nip_penilai=<?php echo $nip_penilai;?>&id_pengajuan=<?php echo $value_pengajuan2[0]?>">Lihat Berkas</a> 
											</td>
										</tr>
									<?php endforeach;?>
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
			$('#example1').DataTable({
				"pageLength": 3
			});
		});
	</script>
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example2').DataTable({
				"pageLength": 3
			});
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