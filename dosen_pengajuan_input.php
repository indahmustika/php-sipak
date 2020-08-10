<?php
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
	$select_jabatan = "SELECT * FROM syarat_kum";
	$rs_jabatan = $koneksi->Execute($select_jabatan);
	if($rs_jabatan->recordCount()>0){
		while(!$rs_jabatan->EOF){
			$data_jabatan[] = $rs_jabatan->fields;
			$rs_jabatan->MoveNext();
		}
	}
	$select_pengajuan = "SELECT * FROM pengajuan ORDER BY id_pengajuan DESC LIMIT 1";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$id_pengajuan = $rs_pengajuan->fields[0];
			$rs_pengajuan->MoveNext();
		}
	}else{
		$id_pengajuan = 0;
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
				<a href="dosen_beranda.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="dosen_pengajuan_riwayat.php?nip_dosen=<?php echo $nip_dosen?>" class="list-group-item list-group-item-action bg-info text-light">Riwayat Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_dosen.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>MASUKKAN DATA PENGAJUAN</b></div>
					<div class="card-body">
						<form action="dosen_pengajuan_input_code.php?id_pengajuan=<?php echo $id_pengajuan+1?>" method="post">
							<div class="form-group">
								<label class="control-label col-sm-10" for="nama">Nama</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_dosen" readonly="readonly" value="<?php echo $nama_dosen;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-10" for="nip">NIP</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nip_dosen" readonly="readonly" value="<?php echo $nip_dosen;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-10" for="jabatan">Jabatan Saat Ini</label>
								<div class="col-sm-6">
									<select class="form-control" name="jabatan_asal" required="required">
										<option value="" selected disabled hidden="hidden">Pilih Jabatan Saat Ini</option>
										<?php foreach($data_jabatan as $value_jabatan):?>
											<option><?php echo $value_jabatan[1];?></option>
										<?php endforeach;?>
									</select>
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-10" for="tanggal">Tanggal SK Jabatan</label>
								<div class="col-sm-6">
									<input type="date" class="form-control" name="tanggal_sk" required="required"> 
								</div>	
							</div>					
							<div class="form-group">
								<label class="control-label col-sm-10" for="jabatan">Jabatan Tujuan</label>
								<div class="col-sm-6">
									<select class="form-control" name="jabatan_tujuan" required="required">
										<option value="" selected disabled hidden="hidden">Pilih Jabatan Tujuan</option>
										<?php foreach($data_jabatan as $value_jabatan):?>
											<option><?php echo $value_jabatan[1];?></option>
										<?php endforeach;?>
									</select>
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-10" for="jabatan">Dokumen Pendukung</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="dokumen_pendukung" required="required" placeholder="Masukkan link google drive"> 
								</div>	
							</div>
							<input type="submit" name="simpan" value="Simpan Pengajuan" style="margin: 0 0 0 33.5%;" class="btn btn-success">
						</form>
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