<?php
	error_reporting(0);
	include_once("koneksi/conn.php");
	$nip_pegawai = $_GET['nip_pegawai'];
	$select_pegawai = "SELECT * FROM pegawai WHERE nip_pegawai= '$nip_pegawai'";
	$rs_pegawai = $koneksi->Execute($select_pegawai);
	if($rs_pegawai->recordCount()>0){
		while(!$rs_pegawai->EOF){
			$nama_pegawai = $rs_pegawai->fields[2];
			$rs_pegawai->MoveNext();
		}
	}
	$select_pengajuan = "SELECT pengajuan.id_pengajuan,pengajuan.tanggal_pengajuan,dosen.nama_dosen,pengajuan.jabatan_asal,pengajuan.jabatan_tujuan,pengajuan.total_pak_akhir FROM pengajuan INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE status_pengajuan='TERKIRIM'";
	$rs_pengajuan = $koneksi->Execute($select_pengajuan);
	if($rs_pengajuan->recordCount()>0){
		while(!$rs_pengajuan->EOF){
			$data_pengajuan[] = $rs_pengajuan->fields;
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
		<?php include"include/sidebar_pegawai_pengajuan.php"?>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENGAJUAN</b></div>
					<div class="card-body">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a class="nav-link active" href="pegawai_data_pengajuan.php?nip_pegawai=<?php echo $nip_pegawai;?>"><b>BELUM DIPERIKSA</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pegawai_data_pengajuan_berkas_ditolak.php?nip_pegawai=<?php echo $nip_pegawai;?>">BERKAS DITOLAK</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pegawai_data_pengajuan_telah_revisi.php?nip_pegawai=<?php echo $nip_pegawai;?>">TELAH DIREVISI</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pegawai_data_pengajuan_berkas_diterima.php?nip_pegawai=<?php echo $nip_pegawai;?>">BERKAS DITERIMA</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pegawai_data_pengajuan_penilaian.php?nip_pegawai=<?php echo $nip_pegawai;?>">TELAH DINILAI</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="pegawai_data_pengajuan_selesai.php?nip_pegawai=<?php echo $nip_pegawai;?>">SELESAI</a>
							</li>
						</ul>
						<h1></h1>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example" class="display">
								<thead>
									<tr>
										<th><center>ID</center></th>
										<th><center>Tanggal</center></th>
										<th><center>Nama</center></th>
										<th><center>Jabatan</center></th>
										<th><center>Jabatan Tujuan</center></th>
										<th width="100"><center>Total PAK</center></th>
										<th width="110"><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($data_pengajuan as $value_pengajuan):?>
									<tr>
										<td><center><?php echo $value_pengajuan[0];?></center></td>
										<td><?php echo $value_pengajuan[1];?></td>
										<td><?php echo $value_pengajuan[2];?></td>
										<td><?php echo $value_pengajuan[3];?></td>
										<td><?php echo $value_pengajuan[4];?></td>
										<td><center><?php echo $value_pengajuan[5];?></center></td>
										<td>
											<a class="btn btn-sm btn-success" href="pegawai_pengajuan_periksa.php?nip_pegawai=<?php echo $nip_pegawai;?>&id_pengajuan=<?php echo $value_pengajuan[0];?>">PERIKSA BERKAS</a>
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