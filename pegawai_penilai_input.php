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
	$select_penilai_1 ="SELECT pengajuan.nip_penilai_1,penilai.nama_penilai,penilai.unit_kerja_penilai,penilai.rumpun_ilmu FROM pengajuan INNER JOIN penilai ON pengajuan.nip_penilai_1=penilai.nip_penilai WHERE id_pengajuan='$id_pengajuan'";
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
	$select_penilai_2 ="SELECT pengajuan.nip_penilai_2,penilai.nama_penilai,penilai.unit_kerja_penilai,penilai.rumpun_ilmu FROM pengajuan INNER JOIN penilai ON pengajuan.nip_penilai_2=penilai.nip_penilai WHERE id_pengajuan='$id_pengajuan'";
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
	$select_penilai = "SELECT * FROM penilai WHERE nip_penilai != '$nip_penilai_1' AND nip_penilai != '$nip_penilai_2'";
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
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"><b>Main Menu</b></div>
			<div class="list-group list-group-flush">
				<a href="#" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="#" class="list-group-item list-group-item-action bg-light">Data Penilai</a>
				<a href="#" class="list-group-item list-group-item-action bg-info text-light">Data Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>TENTUKAN PENILAI</b></div>
					<div class="card-body">
						<button style="margin: 0 0 0 1%;" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
							PILIH PENILAI 1
						</button>
						<h1></h1>
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="card">
										<div class="card-header bg-primary text-light"><b>PILIH PENILAI 1</b></div>
										<div class="card-body">
											<h1></h1> 
											<div class="table-responsive">
												<table class="table table-bordered" width="100%" cellspacing="0" id="example" class="display">
													<thead>
														<tr>
															<th>NIP</th>
															<th>NAMA</th>
															<th>UNIT KERJA</th>
															<th>RUMPUN ILMU</th>
															<th>ALAMAT</th>
															<th>TELEPON</th>
															<th>ACTION</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($data_penilai as $value_penilai): ?>
															<tr>
																<td><?php echo $value_penilai[0];?></td>
																<td><?php echo $value_penilai[2];?></td>
																<td><?php echo $value_penilai[3];?></td>
																<td><?php echo $value_penilai[4];?></td>
																<td><?php echo $value_penilai[5];?></td>
																<td><?php echo $value_penilai[6];?></td>
																<td>
																	<a class="btn btn-sm btn-primary" href="pegawai_penilai_input1_code.php?nip_pegawai=<?php echo $nip_pegawai?>&id_pengajuan=<?php echo $id_pengajuan?>&nip_penilai=<?php echo $value_penilai[0];?>">Pilih</a>
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
						<form>
							<div class="form-group">
								<label class="control-label col-sm-12">NIP Penilai 1</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nip_penilai_1" placeholder="Pilih Penilai 1" readonly="readonly" value="<?php echo $nip_penilai_1?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Nama Penilai 1</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_penilai_1" placeholder="Pilih Penilai 1" readonly="readonly" value="<?php echo $nama_penilai_1;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Unit Kerja Penilai 1</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="unit_kerja_penilai_1" readonly="readonly" placeholder="Pilih Penilai 1" value="<?php echo $unit_kerja_penilai_1;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Rumpun Ilmu Penilai 1</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="rumpun_ilmu_penilai_1" placeholder="Pilih Penilai 1" readonly="readonly" value="<?php echo $rumpun_ilmu_penilai_1;?>"> 
								</div>	
							</div>
						</form>
						
						<button style="margin: 0 0 0 1%;" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg1">
							PILIH PENILAI 2
						</button>
						<h1></h1>
						<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="card">
										<div class="card-header bg-primary text-light"><b>PILIH PENILAI 2</b></div>
										<div class="card-body">
											<h1></h1> 
											<div class="table-responsive">
												<table class="table table-bordered" width="100%" cellspacing="0" id="example1" class="display">
													<thead>
														<tr>
															<th>NIP</th>
															<th>NAMA</th>
															<th>UNIT KERJA</th>
															<th>RUMPUN ILMU</th>
															<th>ALAMAT</th>
															<th>TELEPON</th>
															<th>ACTION</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($data_penilai as $value_penilai): ?>
															<tr>
																<td><?php echo $value_penilai[0];?></td>
																<td><?php echo $value_penilai[2];?></td>
																<td><?php echo $value_penilai[3];?></td>
																<td><?php echo $value_penilai[4];?></td>
																<td><?php echo $value_penilai[5];?></td>
																<td><?php echo $value_penilai[6];?></td>
																<td>
																	<a class="btn btn-sm btn-primary" href="pegawai_penilai_input2_code.php?nip_pegawai=<?php echo $nip_pegawai?>&id_pengajuan=<?php echo $id_pengajuan?>&nip_penilai=<?php echo $value_penilai[0];?>">Pilih</a>
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
						<form>
							<div class="form-group">
								<label class="control-label col-sm-12">NIP Penilai 2</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nip_penilai_2" placeholder="Pilih Penilai 2" readonly="readonly" value="<?php echo $nip_penilai_2;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Nama Penilai 2</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_penilai_2" placeholder="Pilih Penilai 2" readonly="readonly" value="<?php echo $nama_penilai_2;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Unit Kerja Penilai 2</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="unit_kerja_penilai_2" readonly="readonly" placeholder="Pilih Penilai 2" value="<?php echo $unit_kerja_penilai_2?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Rumpun Ilmu Penilai 2</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="rumpun_ilmu_penilai_2" placeholder="Pilih Penilai 2" readonly="readonly" value="<?php echo $rumpun_ilmu_penilai_2?>"> 
								</div>	
							</div>
						</form>
						<a href="pegawai_penilai_input_control.php?nip_pegawai=<?php echo $nip_pegawai;?>&id_pengajuan=<?php echo $id_pengajuan;?>" style="margin: 0 0 0 40.5%;" class="btn btn-primary">SELESAI</a>
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
	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example1').DataTable();
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