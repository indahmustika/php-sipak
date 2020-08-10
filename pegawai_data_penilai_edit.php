<?php
	include_once("koneksi/conn.php");
	$nip_pegawai = $_GET['nip_pegawai'];
	$nip_penilai = $_GET['nip_penilai'];

	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai= '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$nama_pegawai = $rs_pegawai->fields[2];
			$rs_pegawai->MoveNext();
		}
	}

	$select_penilai = "SELECT * FROM penilai WHERE nip_penilai = '$nip_penilai'";
	$rs_penilai = $koneksi->Execute($select_penilai);
	if($rs_penilai->recordCount()>0){
		while(!$rs_penilai->EOF){
			$nip_penilai		= $rs_penilai->fields[0];
			$password_penilai	= $rs_penilai->fields[1];
			$nama_penilai		= $rs_penilai->fields[2];
			$unit_kerja_penilai	= $rs_penilai->fields[3];
			$rumpun_ilmu		= $rs_penilai->fields[4];
			$alamat_penilai		= $rs_penilai->fields[5];
			$telepon_penilai	= $rs_penilai->fields[6];
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
					<div class="card-header bg-primary text-light"><b>UBAH DATA PENILAI</b></div>
					<div class="card-body">
						<form action="pegawai_data_penilai_edit_code.php?nip_pegawai=<?php echo $nip_pegawai;?>" method="post">
							<div class="form-group">
								<label class="control-label col-sm-2">Nama:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama_penilai" placeholder="Nama Penilai" required="required" value="<?php echo $nama_penilai;?>">
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">NIP:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nip_penilai" placeholder="NIP Penilai" required="required" value="<?php echo $nip_penilai;?>" readonly="readonly"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Unit Kerja:</label>
								<div class="col-sm-6">
									<select class="form-control" name="unit_kerja_penilai" required="required">
										<option value="" disabled hidden="hidden">Pilih Unit Kerja</option>
										<option selected hidden="hidden"><?php echo $unit_kerja_penilai;?></option>
										<option>FAKULTAS ADAB DAN HUMANIORA</option>
										<option>FAKULTAS DAKWAH DAN KOMUNIKASI</option>
										<option>FAKULTAS SYARIAH DAN HUKUM</option>
										<option>FAKULTAS TARBIYAH DAN KEGURUAN</option>
										<option>FAKULTAS USHULUDDIN DAN FILSAFAT</option>
										<option>FAKULTAS ILMU SOSIAL DAN ILMU POLITIK</option>
										<option>FAKULTAS EKONOMI DAN BISNIS ISLAM</option>
										<option>FAKULTAS PSIKOLOGI DAN KESEHATAN</option>
										<option>FAKULTAS SAINS DAN TEKNOLOGI</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Rumpun Ilmu:</label>
								<div class="col-md-6">
									<select class="form-control" name="rumpun_ilmu" required="required">
										<option value="" disabled hidden="hidden">Pilih Rumpun Ilmu</option>
										<option selected hidden="hidden"><?php echo $rumpun_ilmu?></option>
										<option>AGAMA</option>
										<option>HUMANIORA</option>
										<option>ILMU-ILMU SOSIAL</option>
										<option>SAINS</option>
										<option>TEKNIK</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Alamat:</label>
								<div class="col-sm-6">
									<textarea rows="7" class="form-control" name="alamat_penilai" placeholder="Alamat Penilai" required="required"><?php echo $alamat_penilai;?></textarea> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" >Telepon:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="telepon_penilai" placeholder="Telepon Penilai" required="required" value="<?php echo $telepon_penilai;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2" >Password:</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="password_penilai" placeholder="Password Penilai" required="required" value="<?php echo $password_penilai;?>"> 
								</div>	
							</div>
							<input type="submit" name="ubah" value="Simpan" style="margin: 0 0 0 40.5%;" class="btn btn-success">
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