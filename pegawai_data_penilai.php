<?php
	include_once("koneksi/conn.php");
	$nip_pegawai = $_GET['nip_pegawai'];
	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai= '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$nama_pegawai = $rs_pegawai->fields[2];
			$rs_pegawai->MoveNext();
		}
	}
	$select_penilai = "SELECT * FROM penilai";
	$rs_penilai = $koneksi->Execute($select_penilai);
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$data_penilai[] = $rs_penilai->fields;
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
	<link rel="stylesheet" type="text/css" href="DataTables/assets/css/jquery.dataTables.min.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">	
</head>
<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><b>Main Menu</b></div>
			<div class="list-group list-group-flush">
				<a href="pegawai_beranda.php?nip_pegawai=<?php echo $nip_pegawai?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="pegawai_data_penilai.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-info text-light">Data Penilai</a>
				<a href="pegawai_data_pengajuan.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-light">Data Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENILAI</b></div>
					<div class="card-body">
						<a class="btn btn-success" href="pegawai_data_penilai_input.php?nip_pegawai=<?php echo $nip_pegawai;?>">TAMBAH PENILAI</a>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-bordered" id="example" class="display width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NIP</th>
										<th>NAMA</th>
										<th width="130">UNIT KERJA</th>
										<th>RUMPUN ILMU</th>
										<th>ALAMAT</th>
										<th>TELEPON</th>
										<th width="100">ACTION</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_penilai as $value_penilai): ?>
										<tr>
											<td><?php echo $value_penilai[0];?></td>
											<td><?php echo $value_penilai[1];?></td>
											<td><?php echo $value_penilai[2];?></td>
											<td><?php echo $value_penilai[3];?></td>
											<td><?php echo $value_penilai[4];?></td>
											<td><?php echo $value_penilai[5];?></td>
											<td>
												<a class="btn btn-sm btn-info" href="pegawai_data_penilai_edit.php?nip_pegawai=<?php echo $nip_pegawai;?>&nip_penilai=<?php echo $value_penilai[0];?>">Edit</a>
												<a class="btn btn-sm btn-danger" href="pegawai_data_penilai_hapus_code.php?nip_pegawai=<?php echo $nip_pegawai;?>&nip_penilai=<?php echo $value_penilai[0];?>">Hapus</a>
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