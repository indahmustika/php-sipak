<?php
include_once("koneksi/conn.php");
$nip_penilai 	= $_GET['nip_penilai'];
$id_berkas 		= $_GET['id_berkas'];
$id_pengajuan	= $_GET['id_pengajuan'];

$select_penilai = "SELECT * FROM penilai WHERE nip_penilai = '$nip_penilai'";
$rs_penilai = $koneksi->Execute($select_penilai);
if($rs_penilai->recordCount()>0){
	while(!$rs_penilai->EOF){
		$nama_penilai = $rs_penilai->fields[2];
		$rs_penilai->MoveNext();
	}
}

$select_berkas = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.poin_1/berkas_pak.volume, berkas_pak.volume, berkas_pak.poin_1 FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_berkas = $id_berkas;";
$rs_berkas = $koneksi->Execute($select_berkas);
if($rs_berkas->recordCount()>0){
	while(!$rs_berkas->EOF){
		$aspek_rubrik 		= $rs_berkas->fields[1];
		$kegiatan_rubrik 	= $rs_berkas->fields[2];
		$bukti_berkas 		= $rs_berkas->fields[3];
		$poin_awal 			= $rs_berkas->fields[4];
		$volume 			= $rs_berkas->fields[5];
		$poin_1 			= $rs_berkas->fields[6];
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
					<div class="card-header bg-primary text-light"><b>NILAI BERKAS</b></div>
					<div class="card-body">
						<h1></h1>
						<div class="table-responsive">
							<table class="table" id="tabelberkas" width="100%" cellspacing="0">
								<tr>
									<td width="150">Aspek</td>
									<td><?php echo $aspek_rubrik;?></td>
								</tr>
								<tr>
									<td>Kegiatan</td>
									<td><?php echo $kegiatan_rubrik;?></td>
								</tr>
								<tr>
									<td>Bukti</td>
									<td><a target="_blank" href="<?php echo $bukti_berkas;?>"><?php echo $bukti_berkas;?></a></td>
								</tr>
							</table>
						</div>
						<div class="table-responsive table-borderless">
							<table class="table" id="tabelberkas" width="100%" cellspacing="0">
								<tr>
									<td width="133">Poin</td>
									<td>
										<div class="col-sm-2">
											<input class="form-control" readonly="readonly" type="text" name="poin_awal" id="poin_awal" value="<?php echo $poin_awal;?>"> <a href="javascript: void(0)" onClick="calc()"></a>
										</div>
									</td>
								</tr>
								<tr>
									<td>Volume</td>
									<td>
										<div class="col-sm-2">
											<input class="form-control" readonly="readonly" type="text" name="volume" id="volume" value="<?php echo $volume;?>">
										</div>
									</td>
								</tr>
									<tr>
										<td>Total Poin</td>
										<td>
											<div class="col-sm-2">
												<input class="form-control" readonly="readonly" type="text" name="poin_1" id="poin_1" value="<?php echo $poin_1;?>">
											</div>
										</td>
									</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		$("#poin_awal,#volume").keyup(function () {
			$('#poin_1').val($('#volume').val() * $('#poin_awal').val());
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