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

$select_berkas = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_1, berkas_pak.poin_2, berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan' AND berkas_pak.kode_rubrik BETWEEN 1 AND 48";
$rs_berkas = $koneksi->Execute($select_berkas);
if($rs_berkas->recordCount()>0){
	while(!$rs_berkas->EOF){
		$data_berkas[] = $rs_berkas->fields;
		$rs_berkas->MoveNext();
	}
}

$select_berkas_1 = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_1, berkas_pak.poin_2, berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan' AND berkas_pak.kode_rubrik BETWEEN 49 AND 103";
$rs_berkas_1 = $koneksi->Execute($select_berkas_1);
if($rs_berkas_1->recordCount()>0){
	while(!$rs_berkas_1->EOF){
		$data_berkas_1[] = $rs_berkas_1->fields;
		$rs_berkas_1->MoveNext();
	}
}

$select_berkas_2 = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_1, berkas_pak.poin_2, berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan' AND berkas_pak.kode_rubrik BETWEEN 104 AND 119";
$rs_berkas_2 = $koneksi->Execute($select_berkas_2);
if($rs_berkas_2->recordCount()>0){
	while(!$rs_berkas_2->EOF){
		$data_berkas_2[] = $rs_berkas_2->fields;
		$rs_berkas_2->MoveNext();
	}
}

$select_berkas_3 = "SELECT berkas_pak.id_berkas, rubrik.aspek_rubrik, rubrik.kegiatan_rubrik, berkas_pak.bukti_berkas, berkas_pak.volume, berkas_pak.poin_1, berkas_pak.poin_2, berkas_pak.poin_akhir FROM berkas_pak INNER JOIN rubrik ON berkas_pak.kode_rubrik=rubrik.kode_rubrik WHERE id_pengajuan='$id_pengajuan' AND berkas_pak.kode_rubrik BETWEEN 120 AND 151";
$rs_berkas_3 = $koneksi->Execute($select_berkas_3);
if($rs_berkas_3->recordCount()>0){
	while(!$rs_berkas_3->EOF){
		$data_berkas_3[] = $rs_berkas_3->fields;
		$rs_berkas_3->MoveNext();
	}
}

$select_pengajuan = "SELECT pengajuan.tanggal_pengajuan, dosen.nip_dosen, dosen.nama_dosen, pengajuan.jabatan_asal, pengajuan.tanggal_sk, pengajuan.jabatan_tujuan, pengajuan.dokumen_pendukung, pengajuan.status_pengajuan, syarat_kum.total_pak, pengajuan.total_pak_akhir, pengajuan.id_kum FROM pengajuan INNER JOIN syarat_kum ON pengajuan.id_kum=syarat_kum.id_kum INNER JOIN dosen ON pengajuan.nip_dosen=dosen.nip_dosen WHERE id_pengajuan='$id_pengajuan'";
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
		$id_kum 			= $rs_pengajuan->fields[10];
		$rs_pengajuan->MoveNext();
	}
}
$select_kum = "SELECT pelaksanaan_pendidikan,penelitian,pengabdian,penunjang FROM syarat_kum WHERE id_kum = '$id_kum'";
$rs_kum = $koneksi->Execute($select_kum);
if($rs_kum->recordCount()>0){
	while(!$rs_kum->EOF){
		$pendidikan 	= $rs_kum->fields[0];
		$penelitian 	= $rs_kum->fields[1];
		$pengabdian   	= $rs_kum->fields[2];
		$penunjang 		= $rs_kum->fields[3];
		$rs_kum->MoveNext();		
	}
}
$select_pendidikan = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan' AND kode_rubrik BETWEEN 1 AND 48";
$rs_pendidikan=$koneksi->Execute($select_pendidikan);
if($rs_pendidikan->recordCount()>0){
	while(!$rs_pendidikan->EOF){
		$total_pendidikan = $rs_pendidikan->fields[0];
		$rs_pendidikan->MoveNext();
	}
}
if(is_null($total_pendidikan)){
	$total_pendidikan = 0;
}
$select_penelitian = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan' AND kode_rubrik BETWEEN 49 AND 103";
$rs_penelitian=$koneksi->Execute($select_penelitian);
if($rs_penelitian->recordCount()>0){
	while(!$rs_penelitian->EOF){
		$total_penelitian = $rs_penelitian->fields[0];
		$rs_penelitian->MoveNext();
	}
}
if(is_null($total_penelitian)){
	$total_penelitian = 0;
}
$select_pengabdian = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan' AND kode_rubrik BETWEEN 104 AND 119";
$rs_pengabdian=$koneksi->Execute($select_pengabdian);
if($rs_pengabdian->recordCount()>0){
	while(!$rs_pengabdian->EOF){
		$total_pengabdian = $rs_pengabdian->fields[0];
		$rs_pengabdian->MoveNext();
	}
}
if(is_null($total_pengabdian)){
	$total_pengabdian = 0;
}
$select_penunjang = "SELECT SUM(poin_akhir) FROM berkas_pak WHERE id_pengajuan='$id_pengajuan' AND kode_rubrik BETWEEN 120 AND 151";
$rs_penunjang=$koneksi->Execute($select_penunjang);
if($rs_penunjang->recordCount()>0){
	while(!$rs_penunjang->EOF){
		$total_penunjang = $rs_penunjang->fields[0];
		$rs_penunjang->MoveNext();
	}
}
if(is_null($total_penunjang)){
	$total_penunjang = 0;
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
				<a href="pegawai_beranda.php?nip_pegawai=<?php echo $nip_pegawai?>" class="list-group-item list-group-item-action bg-light">Beranda</a>
				<a href="pegawai_data_penilai.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-light">Data Penilai</a>
				<a href="pegawai_data_pengajuan.php?nip_pegawai=<?php echo $nip_pegawai;?>" class="list-group-item list-group-item-action bg-info text-light">Data Pengajuan</a>
			</div>
		</div>
		<div id="page-content-wrapper">
			<?php include"include/navbar_pegawai.php"?>
			<div class="container-fluid">
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENGAJUAN</b></div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-sm table-borderless" width="100%" cellspacing="0">
								<tr>
									<td>Tanggal Pengajuan</td>
									<td><?php echo $tanggal_pengajuan;?></td>
								</tr>
								<tr>
									<td>NIP Dosen</td>
									<td><b><?php echo $nip_dosen;?></b></td>
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
									<td><b><?php echo $syarat_pak;?></b></td>
								</tr>
								<tr>
									<td>Total PAK Akhir</td>
									<td><b><?php echo $total_pak_akhir;?></b></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<h1></h1>
				<div class="card">
					<div class="card-header bg-primary text-light"><b>DATA PENILAIAN</b></div>
					<div class="card-body">
						<h5><span class="badge badge-success">ASPEK PELAKSANAAN PENDIDIKAN</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example" class="display">
								<thead>
									<tr>
										<th width="10"><center>No</center></th>
										<th><center>Kegiatan</center></th>
										<th width="80"><center>Bukti</center></th>
										<th width="55"><center>Volume</center></th>
										<th width="55"><center>Poin 1</center></th>
										<th width="55"><center>Poin 2</center></th>
										<th width="55"><center>Poin Akhir</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 0; 
									foreach($data_berkas as $value_berkas):
										$count++;?>
										<tr>
											<td><center><?php echo $count;?></center></td>
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
						<div class="table-responsive">
							<table class="table table-sm">
								<tr>
									<td>
										<p><b>TOTAL ASPEK PENDIDIKAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $total_pendidikan;?></center></b></p>
									</td>
								</tr>
								<tr>
									<td>
										<p><b>SYARAT MINIMAL ASPEK PENDIDIKAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $pendidikan;?></center></b></p>
									</td>
								</tr>
							</table>
						</div>
						<h1></h1>
						<h5><span class="badge badge-success">ASPEK PENELITIAN</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example1" class="display">
								<thead>
									<tr>
										<th width="10"><center>No</center></th>
										<th><center>Kegiatan</center></th>
										<th width="80"><center>Bukti</center></th>
										<th width="55"><center>Volume</center></th>
										<th width="55"><center>Poin 1</center></th>
										<th width="55"><center>Poin 2</center></th>
										<th width="55"><center>Poin Akhir</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 0; 
									foreach($data_berkas_1 as $value_berkas_1):
										$count++;?>
										<tr>
											<td><center><?php echo $count;?></center></td>
											<td><?php echo $value_berkas_1[2];?></td>
											<td><a target="_blank" href="<?php echo $value_berkas_1[3];?>">Lihat Berkas</a></td>
											<td><center><?php echo $value_berkas_1[4];?></center></td>
											<td><center><?php echo $value_berkas_1[5];?></center></td>
											<td><center><?php echo $value_berkas_1[6];?></center></td>
											<td><center><?php echo $value_berkas_1[7];?></center></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table table-sm">
								<tr>
									<td>
										<p><b>TOTAL ASPEK PENELITIAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $total_penelitian;?></center></b></p>
									</td>
								</tr>
								<tr>
									<td>
										<p><b>SYARAT MINIMAL ASPEK PENELITIAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $penelitian;?></center></b></p>
									</td>
								</tr>
							</table>
						</div>
						<h1></h1>
						<h5><span class="badge badge-success">ASPEK PENGABDIAN</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example2" class="display">
								<thead>
									<tr>
										<th width="10"><center>No</center></th>
										<th><center>Kegiatan</center></th>
										<th width="80"><center>Bukti</center></th>
										<th width="55"><center>Volume</center></th>
										<th width="55"><center>Poin 1</center></th>
										<th width="55"><center>Poin 2</center></th>
										<th width="55"><center>Poin Akhir</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 0; 
									foreach($data_berkas_2 as $value_berkas_2):
										$count++;?>
										<tr>
											<td><center><?php echo $count;?></center></td>
											<td><?php echo $value_berkas_2[2];?></td>
											<td><a target="_blank" href="<?php echo $value_berkas_2[3];?>">Lihat Berkas</a></td>
											<td><center><?php echo $value_berkas_2[4];?></center></td>
											<td><center><?php echo $value_berkas_2[5];?></center></td>
											<td><center><?php echo $value_berkas_2[6];?></center></td>
											<td><center><?php echo $value_berkas_2[7];?></center></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table table-sm">
								<tr>
									<td>
										<p><b>TOTAL ASPEK PENGABDIAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $total_pengabdian;?></center></b></p>
									</td>
								</tr>
								<tr>
									<td>
										<p><b>SYARAT MAKSIMAL ASPEK PENGABDIAN</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $pengabdian;?></center></b></p>
									</td>
								</tr>
							</table>
						</div>
						<h1></h1>
						<h5><span class="badge badge-success">ASPEK PENUNJANG</span></h5>
						<div class="table-responsive">
							<table class="table table-bordered" width="100%" cellspacing="0"  id="example3" class="display">
								<thead>
									<tr>
										<th width="10"><center>No</center></th>
										<th><center>Kegiatan</center></th>
										<th width="80"><center>Bukti</center></th>
										<th width="55"><center>Volume</center></th>
										<th width="55"><center>Poin 1</center></th>
										<th width="55"><center>Poin 2</center></th>
										<th width="55"><center>Poin Akhir</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 0; 
									foreach($data_berkas_3 as $value_berkas_3):
										$count++;?>
										<tr>
											<td><center><?php echo $count;?></center></td>
											<td><?php echo $value_berkas_3[2];?></td>
											<td><a target="_blank" href="<?php echo $value_berkas_3[3];?>">Lihat Berkas</a></td>
											<td><center><?php echo $value_berkas_3[4];?></center></td>
											<td><center><?php echo $value_berkas_3[5];?></center></td>
											<td><center><?php echo $value_berkas_3[6];?></center></td>
											<td><center><?php echo $value_berkas_3[7];?></center></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table table-sm">
								<tr>
									<td>
										<p><b>TOTAL ASPEK PENUNJANG</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $total_penunjang;?></center></b></p>
									</td>
								</tr>
								<tr>
									<td>
										<p><b>SYARAT MAKSIMAL ASPEK PENUNJANG</b></p>
									</td>
									<td width="95"> 
										<p><b><center><?php echo $penunjang;?></center></b></p>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<td width="700"></td>
							<td width="380">
								<a href="pegawai_persetujuan_tolak_code.php?nip_pegawai=<?php echo $nip_pegawai?>&id_pengajuan=<?php echo $id_pengajuan;?>" class="btn btn-danger">TOLAK PENGAJUAN</a>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
									TERIMA PENGAJUAN
								</button>

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="card-header bg-primary text-light">
												<b>UPLOAD SK JABATAN</b>
											</div>
											<div class="modal-body">
												<form action="pegawai_persetujuan_terima_code.php?nip_pegawai=<?php echo $nip_pegawai;?>&id_pengajuan=<?php echo $id_pengajuan;?>" method="POST">
													<div class="form-group">
														<div class="col-sm-12">
															<textarea rows="3" class="form-control" name="file_sk" placeholder="Masukkan link google drive" required="required"></textarea>
														</div>
													</div>
													<input type="submit" name="simpan" value="Simpan" style="margin: 0 0 0 80%;" class="btn btn-success"> 
												</form>
											</div>
										</div>
									</div>
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
<script type="text/javascript" class="init">
	$(document).ready(function() {
		$('#example2').DataTable();
	});
</script>
<script type="text/javascript" class="init">
	$(document).ready(function() {
		$('#example3').DataTable();
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