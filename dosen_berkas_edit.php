<?php
	include_once("koneksi/conn.php");
	$nip_dosen 		= $_GET['nip_dosen'];
	$id_pengajuan   = $_GET['id_pengajuan'];
	$id_berkas		= $_GET['id_berkas'];

	$select_dosen = "SELECT * FROM dosen WHERE nip_dosen = '$nip_dosen'";
	$rs_dosen = $koneksi->Execute($select_dosen);
	if($rs_dosen->recordCount()>0){
		while(!$rs_dosen->EOF){
			$nama_dosen = $rs_dosen->fields[2];
			$rs_dosen->MoveNext();
		}
	}

	$select_berkas = "SELECT rubrik.aspek_rubrik,rubrik.kegiatan_rubrik,rubrik.poin_rubrik,berkas_pak.bukti_berkas,berkas_pak.volume FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_berkas=$id_berkas";
	$rs_berkas = $koneksi->Execute($select_berkas);
	if($rs_berkas->recordCount()>0){
		while(!$rs_berkas->EOF){
			$aspek_rubrik 		= $rs_berkas->fields[0];
			$kegiatan_rubrik 	= $rs_berkas->fields[1];
			$poin_rubrik 		= $rs_berkas->fields[2];
			$bukti_berkas		= $rs_berkas->fields[3];
			$volume 			= $rs_berkas->fields[4];
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
					<div class="card-header bg-primary text-light"><b>MASUKKAN DATA BERKAS</b></div>
					<div class="card-body">	
						<form action="dosen_berkas_edit_code.php?nip_dosen=<?php echo $nip_dosen?>&id_pengajuan=<?php echo $id_pengajuan?>&id_berkas=<?php echo $id_berkas?>" method="POST">
							<div class="form-group">
								<label class="control-label col-sm-12" for="aspek_rubrik">Aspek:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="aspek_rubrik" readonly="readonly" value="<?php echo $aspek_rubrik;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="kegiatan_rubrik">Kegiatan:</label>
								<div class="col-sm-8">
									<textarea rows="7" class="form-control" name="kegiatan_rubrik" readonly="readonly"> <?php echo $kegiatan_rubrik;?></textarea>
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
									<input type="text" class="form-control" name="bukti_berkas" placeholder="Masukkan link google drive" required="required" value="<?php echo $bukti_berkas;?>"> 
								</div>	
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12" for="volume">Volume:</label>
								<div class="col-sm-2">
									<input type="number" class="form-control" name="volume" placeholder="Volume" required="required" value="<?php echo $volume;?>"> 
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