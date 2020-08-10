<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan   = $_GET['id_pengajuan'];
	$kode_rubrik	= $_GET['kode_rubrik'];

	$select_dosen = "SELECT * FROM dosen WHERE nip_dosen = '$nip_dosen'";
	$rs_dosen = $koneksi->Execute($select_dosen);
	if($rs_dosen->recordCount()>0){
		while(!$rs_dosen->EOF){
			$nama_dosen = $rs_dosen->fields[2];
			$rs_dosen->MoveNext();
		}
	}

	$select_rubrik = "SELECT * FROM rubrik WHERE kode_rubrik = '$kode_rubrik'";
	$rs_rubrik = $koneksi->Execute($select_rubrik);
	if($rs_rubrik->recordCount()>0){
		while(!$rs_rubrik->EOF){
			$aspek_rubrik 		= $rs_rubrik->fields[1];
			$kegiatan_rubrik 	= $rs_rubrik->fields[2];
			$poin_rubrik 		= $rs_rubrik->fields[3];
			$rs_rubrik->MoveNext();
		}
	}

	$select_berkas = "SELECT * FROM berkas_pak ORDER BY id_berkas DESC LIMIT 1";
	$rs_berkas = $koneksi->Execute($select_berkas);
	if($rs_berkas->recordCount()>0){
		while(!$rs_berkas->EOF){
			$id_berkas = $rs_berkas->fields[0];
			$rs_berkas->MoveNext();
		}
	}else{
		$id_berkas = 0;
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
				<a href="dosen_beranda.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="dosen_pengajuan_riwayat.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-info text-light">Riwayat Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_dosen.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light">Masukkan Data Berkas</div>
					<div class="card-body">
						<button style="margin: 0 0 0 1%;" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">
							PILIH ASPEK & KEGIATAN
						</button>
						<h1></h1>
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="card">
										<div class="card-header bg-primary text-light"><b>PILIH ASPEK & KEGIATAN</b></div>
										<div class="card-body">
											<h1></h1> 
											<div class="table-responsive">
												<table class="table table-bordered" width="100%" cellspacing="0" id="example" class="display">
													<thead>
														<tr>
															<th width="10">ID</th>
															<th>ASPEK</th>
															<th>KEGIATAN</th>
															<th>POIN</th>
															<th>ACTION</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($data_rubrik as $value_rubrik): ?>
															<tr>
																<td><?php echo $value_rubrik[0];?></td>
																<td><?php echo $value_rubrik[1];?></td>
																<td><?php echo $value_rubrik[2];?></td>
																<td><?php echo $value_rubrik[3];?></td>
																<td>
																	<a class="btn btn-sm btn-primary" href="dosen_berkas_input.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan;?>&kode_rubrik=<?php echo $value_rubrik[0];?>">Pilih</a>
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
						<form action="dosen_berkas_input_code.php?nip_dosen=<?php echo $nip_dosen?>&id_pengajuan=<?php echo $id_pengajuan?>&id_berkas=<?php echo $id_berkas+1?>&kode_rubrik=<?php echo $kode_rubrik?>" method="POST">
							<div class="form-group">
								<label class="control-label col-sm-12" for="aspek_rubrik">Aspek:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="aspek_rubrik" readonly="readonly" value="<?php echo $aspek_rubrik;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="kegiatan_rubrik">Kegiatan:</label>
								<div class="col-sm-8">
									<textarea rows="7" class="form-control" name="kegiatan_rubrik" readonly="readonly"><?php echo $kegiatan_rubrik;?></textarea>
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="poin">Poin</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="poin" readonly="readonly" value="<?php echo $poin_rubrik;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="bukti_berkas">Bukti:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="bukti_berkas" placeholder="Masukkan link google drive" required="required"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="volume">Volume:</label>
								<div class="col-sm-2">
									<input type="number" class="form-control" name="volume" placeholder="Volume" required="required"> 
								</div>	
							</div>
							<input type="submit" name="simpan" value="Simpan Berkas" style="margin: 0 0 0 53%;" class="btn btn-primary"> 
						</form>
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