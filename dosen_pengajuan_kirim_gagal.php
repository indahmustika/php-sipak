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

	$select_berkas = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas,  berkas_pak.volume,berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan'";
	$rs_berkas = $koneksi->Execute($select_berkas);
	if($rs_berkas->recordCount()>0){
		while(!$rs_berkas->EOF){
			$data_berkas[] = $rs_berkas->fields;
			$rs_berkas->MoveNext();
		}
	}

	$select_poin = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan'";
	$rs_poin=$koneksi->Execute($select_poin);
	if($rs_poin->recordCount()>0){
		while(!$rs_poin->EOF){
			$total_poin = $rs_poin->fields[0];
			$rs_poin->MoveNext();
		}
	}

	$update_poin = "UPDATE pengajuan SET total_pak_akhir = '$total_poin' WHERE id_pengajuan = $id_pengajuan;";
	$koneksi->Execute($update_poin);

	$select_pengajuan = "SELECT pengajuan.tanggal_pengajuan, pengajuan.jabatan_asal, pengajuan.tanggal_sk, pengajuan.jabatan_tujuan, pengajuan.dokumen_pendukung, pengajuan.status_pengajuan, syarat_kum.total_pak, pengajuan.total_pak_akhir FROM pengajuan INNER JOIN syarat_kum ON pengajuan.id_kum=syarat_kum.id_kum WHERE id_pengajuan='$id_pengajuan'";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$tanggal_pengajuan	= $rs_pengajuan->fields[0];
			$jabatan_asal		= $rs_pengajuan->fields[1];
			$tanggal_sk			= $rs_pengajuan->fields[2];
			$jabatan_tujuan		= $rs_pengajuan->fields[3];
			$dokumen_pendukung	= $rs_pengajuan->fields[4];
			$status_pengajuan	= $rs_pengajuan->fields[5];
			$syarat_pak			= $rs_pengajuan->fields[6];
			$total_pak_akhir	= $rs_pengajuan->fields[7];
			$rs_pengajuan->MoveNext();
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
				<div class="alert alert-danger" role="alert">
					<strong>Maaf!</strong> Total PAK belum memenuhi syarat
				</div>
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>RIWAYAT PENGAJUAN [<?php echo $status_pengajuan?>]</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td width="250">ID Pengajuan</td>
									<td><?php echo $id_pengajuan;?></td>
								</tr>
								<tr>
									<td>Tanggal Pengajuan</td>
									<td><?php echo $tanggal_pengajuan;?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td><?php echo $jabatan_asal;?></td>
								</tr>
								<tr>
									<td>Tanggal SK</td>
									<td><?php echo $tanggal_sk;?></td>
								</tr>
								<tr>
									<td>Jabatan Tujuan</td>
									<td><?php echo $jabatan_tujuan;?></td>
								</tr>
								<tr>
									<td>Dokumen Pendukung</td>
									<td><a target="_blank" href="<?php echo $dokumen_pendukung?>"><?php echo $dokumen_pendukung?></a></td>
								</tr>
								<tr>
									<td>Syarat PAK</td>
									<td><?php echo $syarat_pak;?></td>
								</tr>
								<tr>
									<td>Total PAK</td>
									<td><?php echo $total_pak_akhir;?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA BERKAS</b></div>
					<div class="card-body">
						<a href="dosen_berkas.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan;?>" class="btn btn-success">TAMBAH BERKAS</a>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example" class="display">
								<thead>
									<tr>
										<th width="10">No</th>
										<th>Aspek</th>
										<th>Kegiatan</th>
										<th>Bukti</th>
										<th width="55">Volume</th>
										<th width="55">Poin</th>
										<th width="130">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 0; 
									foreach($data_berkas as $value_berkas):
										$count++;?>
										<tr>
											<td><?php echo $count;?></td>
											<td><?php echo $value_berkas[1];?></td>
											<td><?php echo $value_berkas[2];?></td>
											<td><a target="_blank" href="<?php echo $value_berkas[3];?>">Lihat Berkas</a></td>
											<td><?php echo $value_berkas[4];?></td>
											<td><?php echo $value_berkas[5];?></td>
											<td>
												<a class="btn btn-sm btn-info" href="dosen_berkas_edit.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan?>&id_berkas=<?php echo $value_berkas[0];?>">Edit</a>
												<a class="btn btn-sm btn-danger" href="dosen_berkas_hapus.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan?>&id_berkas=<?php echo $value_berkas[0];?>">Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>
										<p><b>Total PAK</b></p>
									</td>
									<td width="60"> 
										<p><b><?php echo $total_pak_akhir;?></b></p>
									</td>
									<td width="190">
										<a href="dosen_pengajuan_periksa_code.php?nip_dosen=<?php echo $nip_dosen;?>&id_pengajuan=<?php echo $id_pengajuan;?>&syarat_pak=<?php echo $syarat_pak;?>&total_pak_akhir=<?php echo $total_pak_akhir;?>" class="btn btn-success">KIRIM PENGAJUAN</a>
									</td>
								</tr>
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