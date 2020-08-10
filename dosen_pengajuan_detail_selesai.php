<?php
	error_reporting(0);
	include_once("koneksi/conn.php");
	$nip_dosen 	= $_GET['nip_dosen'];
	$id_pengajuan 	= $_GET['id_pengajuan'];

	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai= '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$nama_pegawai = $rs_pegawai->fields[2];
			$rs_pegawai->MoveNext();
		}
	}

	$select_berkas = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_1,berkas_pak.poin_2, berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan'";
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

	$select_pengajuan = "SELECT pengajuan.tanggal_pengajuan, dosen.nip_dosen, dosen.nama_dosen, pengajuan.jabatan_asal, pengajuan.tanggal_sk, pengajuan.jabatan_tujuan, pengajuan.dokumen_pendukung, pengajuan.status_pengajuan, syarat_kum.total_pak, pengajuan.total_pak_akhir, pengajuan.file_sk FROM pengajuan INNER JOIN syarat_kum ON pengajuan.id_kum=syarat_kum.id_kum INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE id_pengajuan='$id_pengajuan'";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$tanggal_pengajuan	= $rs_pengajuan->fields[0];
			$nip_dosen			= $rs_pengajuan->fields[1];
			$nama_dosen			= $rs_pengajuan->fields[2];
			$jabatan_asal		= $rs_pengajuan->fields[3];
			$tanggal_sk			= $rs_pengajuan->fields[4];
			$jabatan_tujuan		= $rs_pengajuan->fields[5];
			$dokumen_pendukung	= $rs_pengajuan->fields[6];
			$status_pengajuan	= $rs_pengajuan->fields[7];
			$syarat_pak			= $rs_pengajuan->fields[8];
			$total_pak_akhir	= $rs_pengajuan->fields[9];
			$file_sk			= $rs_pengajuan->fields[10];
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
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENGAJUAN [<?php echo $status_pengajuan?>]</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td>Tanggal Pengajuan</td>
									<td><?php echo $tanggal_pengajuan;?></td>
								</tr>
								<tr>
									<td>NIP Dosen</td>
									<td><?php echo $nip_dosen;?></td>
								</tr>
								<tr>
									<td>Nama Dosen</td>
									<td><?php echo $nama_dosen;?></td>
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
					<div class="card-header bg-primary text-light"><b>FILE SK KENAIKAN JABATAN</b></div>
					<div class="card-body">
						<a target="_blank" href="<?php echo $file_sk;?>"><?php echo $file_sk;?></a>
					</div>
				</div>
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA BERKAS</b></div>
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
										<th width="55"><center>Poin 1</center></th>
										<th width="55"><center>Poin 2</center></th>
										<th width="55"><center>Poin Akhir</center></th>
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
												<td><center><?php echo $value_berkas[6];?></center></td>
												<td><center><?php echo $value_berkas[7];?></center></td>
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