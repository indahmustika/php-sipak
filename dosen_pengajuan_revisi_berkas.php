<?php
error_reporting(0);
include_once("koneksi/conn.php");
$nip_dosen 		= $_GET['nip_dosen'];
$id_pengajuan 	= $_GET['id_pengajuan'];

$select_dosen = "SELECT * FROM dosen WHERE nip_dosen = '$nip_dosen'";
$rs_dosen = $koneksi->Execute($select_dosen);
if($rs_dosen->recordCount()>0){
	while(!$rs_dosen->EOF){
		$nama_dosen = $rs_dosen->fields[2];
		$rs_dosen->MoveNext();
	}
}

$select_berkas = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_akhir, berkas_pak.status_berkas, berkas_pak.catatan_berkas FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan' AND status_berkas!='VALID'";
$rs_berkas = $koneksi->Execute($select_berkas);
if($rs_berkas->recordCount()>0){
	while(!$rs_berkas->EOF){
		$data_berkas[] = $rs_berkas->fields;
		$rs_berkas->MoveNext();
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
					<div class="card-header bg-primary text-light"><b>BERKAS YANG PERLU DIREVISI</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example" class="display">
								<thead>
									<tr>
										<th width="10"><center>No</center></th>
										<th><center>Aspek</center></th>
										<th><center>Kegiatan</center></th>
										<th width="80"><center>Bukti</center></th>
										<th width="55"><center>Volume</center></th>
										<th width="55"><center>Poin</center></th>
										<th width="100"><center>Status</center></th>
										<th width="85"><center>Action</center></th>
									</thead>
									<tbody>
										<?php
										$count = 0; 
										foreach($data_berkas as $value_berkas):
											$count++;?>
											<tr>
												<td><center><?php echo $count;?></center></td>
												<td><?php echo $value_berkas[1];?></td>
												<td><?php echo $value_berkas[2];?></td>
												<td><a target="_blank" href="<?php echo $value_berkas[3];?>">Lihat Berkas</a></td>
												<td><center><?php echo $value_berkas[4];?></center></td>
												<td><center><?php echo $value_berkas[5];?></center></td>
												<td><center><b><?php echo $value_berkas[6];?></b></center></td>
												<td>
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal-<?php echo $value_berkas[0];?>">
														Lihat Catatan
													</button>

													<!-- Modal -->
													<div class="modal" id="exampleModal-<?php echo $value_berkas[0];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="card-header bg-primary text-light">
																	<b>CATATAN BERKAS</b>
																</div>
																<div class="modal-body">
																	<?php echo $value_berkas[7];?>
																</div>
															</div>
														</div>
													</div>
													<h6></h6>
													<a href="dosen_pengajuan_revisi_berkas_ubah.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan?>&id_berkas=<?php echo $value_berkas[0];?>" class="btn btn-sm btn-warning">Revisi Berkas</a>
												</td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<h1></h1>
							<a style="margin: 0 0 0 81%;" href="dosen_pengajuan_revisi_control.php?nip_dosen=<?php echo $nip_dosen?>&id_pengajuan=<?php echo $id_pengajuan;?>" class="btn btn-success">REVISI BERKAS SELESAI</a>
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