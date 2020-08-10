<?php
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
$select_rubrik = "SELECT * FROM rubrik";
$rs_rubrik = $koneksi->Execute($select_rubrik);
if($rs_rubrik->recordCount()>0){
	while(!$rs_rubrik->EOF){
		$data_rubrik[] = $rs_rubrik->fields;
		$rs_rubrik->MoveNext();
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
				<a href="penilai_daftar_pengajuan.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-light">Daftar Pengajuan</a>
				<a href="penilai_tabel_pak.php?nip_penilai=<?php echo $nip_penilai;?>" class="list-group-item list-group-item-action bg-info text-light">Tabel Nilai Angka Kredit</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_penilai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DAFTAR NILAI ANGKA KREDIT</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0" id="example" class="display">
								<thead>
									<tr>
										<th width="10">ID</th>
										<th>BIDANG</th>
										<th>KEGIATAN</th>
										<th>POIN</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_rubrik as $value_rubrik): ?>
										<tr>
											<td><?php echo $value_rubrik[0];?></td>
											<td><?php echo $value_rubrik[1];?></td>
											<td><?php echo $value_rubrik[2];?></td>
											<td><?php echo $value_rubrik[3];?></td>
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