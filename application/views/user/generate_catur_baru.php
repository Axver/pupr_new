<?php

//	echo $this->session->userdata("nip");
if ($this->session->userdata("privilage")) {
	if ($this->session->userdata("privilage") == 2) { } else {
		redirect(base_url());
	}
} else {
	redirect(base_url());
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>

	<style>
		th,
		td {
			color: black;
			border: 1px solid black;
		}

		th {
			text-align: center;
		}

		fix {
			width: 10px;
		}







		body {
			color: black;
		}
	</style>


</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php $this->load->view('component/sidebar_user'); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>



					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>





						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->


					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
					</div>

					<!-- Content Row -->
					<?php $this->load->view('admin_content/card_list_user'); ?>

					<!-- Content Row -->

					<div class="row">

						<!-- Area Chart -->
						<div class="col-xl-12 col-lg-12">
							<div class="card shadow mb-12">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Generate Laporan Per Tahap</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>

									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<!-- Pilih Datanya Dulu -->


									<?php echo form_open_multipart('upload/aksi_upload_tahap'); ?>
								
									<b>Pilih Paket</b>
									<select onchange="listPerencanaan()" id="id_paket" name="id_paket" class="form form-control">
										<option>--Pilih Paket--</option>
										<?php

										$paket = $this->db->get_where("detail_paket", array("nip" => $this->session->userdata("nip")))->result();
										$count = count($paket);
										$i = 0;

										while ($i < $count) {
											?>
											<option value="<?php echo $paket[$i]->id_paket; ?>"><?php echo $paket[$i]->id_paket; ?></option>
										<?php

											$i++;
										}

										?>
									</select>

									<input type="hidden" id="tahun" name="tahun">
									<br />
									<b>Pilih Perencanaan</b>
									<select class="form form-control" id="id_perencanaan" name="id_perencanaan">
										<option>--Pilih Perencanaan--</option>
									</select>

									<br />
									<br />

									<br />
									<b>Pilih Bulan Awal</b>


									<select name="bulan" class="form form-control" id="bulan">
										<option value="">--Pilih Bulan--</option>
										<option value="1">Januari</option>
										<option value="2">Februari</option>
										<option value="3">Maret</option>
										<option value="4">April</option>
										<option value="5">Mei</option>
										<option value="6">Juni</option>
										<option value="7">Juli</option>
										<option value="8">Agustus</option>
										<option value="9">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
									<br />

									<b>Pilih Bulan Akhir</b>


<select name="bulan_akhir" class="form form-control" id="bulan_akhir">
	<option value="">--Pilih Bulan--</option>
	<option value="1">Januari</option>
	<option value="2">Februari</option>
	<option value="3">Maret</option>
	<option value="4">April</option>
	<option value="5">Mei</option>
	<option value="6">Juni</option>
	<option value="7">Juli</option>
	<option value="8">Agustus</option>
	<option value="9">September</option>
	<option value="10">Oktober</option>
	<option value="11">November</option>
	<option value="12">Desember</option>
</select>
<br />

									<b>*Generate dahulu sebelum upload gambar</b>
									<select class="form form-control" name="jenis_pekerjaan">
										<?php

										$jp = $this->db->get("jenis_pekerjaan")->result();

										$count = count($jp);
										$i = 0;

										while ($i < $count) {

											?>
											<option value="<?php echo $jp[$i]->id; ?>"><?php echo $jp[$i]->nama_jenis; ?></option>
										<?php
											$i++;
										}
										?>

									</select>

									<br />
									<b>Lokasi</b>
                                    <input type="text" class="form form-control" name="lokasi">
									<br/>
									<b>Dimensi</b>
                                    <input type="text" class="form form-control" name="dimensi"  placeholder="Contoh:10 m,8 m,1 m">
									<br/>
									<b>Panjang Penanganan</b>
                                    <input type="text" class="form form-control" name="keterangan">
									<br/>

									<input type="file" name="berkas" class="btn btn-info" />







									<input type="submit" value="upload" class="btn btn-info" />

									</form>

									<br />
									<br />
									<select class="form form-control" id="diperiksa_oleh">
										<?php
										$diperiksa = $this->db->get("konfigurasi")->result();
										$count = count($diperiksa);
										$i = 0;


										while ($i < $count) {
											?>
											<option value="<?php echo $diperiksa[$i]->id_konfigurasi; ?>"><?php echo $diperiksa[$i]->nama; ?></option>
										<?php

											$i++;
										}
										?>
									</select>

									<button class="btn btn-facebook" onclick="generate()">Generate</button>


									<br />

									<br />

									<b>Gambar Untuk Pekerjaan</b>
									<br />
									<br />

									<br />








									<br />

									<br />
									<br />
									<button class="btn btn-facebook" style="width:100%;" onclick="generatePDF()">Cetak PDF</button>

									<div id="cetak">
										<center><b>
												<h3>LAPORAN PER TAHAP</h3>
											</b></center>
										<center><b>
												<h3>PELAKSANAAN KEGIATAN</h3>
											</b></center>

										<br />
										<br />

										<div class="row">

											<div class="col-sm-2">Nama Paket</div>
											<div>:</div>
											<div class="col-sm-3" id="nama_paket_x"></div>
										</div>


										<div class="row">

											<div class="col-sm-2">Nilai Paket</div>
											<div>:</div>
											<div class="col-sm-3" id="nilai_paket_x"></div>
										</div>



										<div class="row">

											<div class="col-sm-2">Periode</div>
											<div>:</div>
											<div class="col-sm-3" id="periode_x"></div>
										</div>


										<div class="row">

											<div class="col-sm-2">Jenis Pekerjaan</div>
											<div>:</div>
											<div class="col-sm-3" id="jenis_pekerjaan_x"></div>
										</div>



										<div class="row">

											<div class="col-sm-2">Lokasi</div>
											<div>:</div>
											<div class="col-sm-3" id="lokasi_x"></div>
										</div>



										<div class="row">

											<div class="col-sm-2">Tahun Anggaran</div>
											<div>:</div>
											<div class="col-sm-3" id="tahun_x"></div>
										</div>


										<br />
										<br />
										<br />

										<b>Jadwal Rencana Pelaksanaan Kegiatan</b>
										<table class="tg table" id="tabel_satu">


										</table>

										<div class="break"></div>

										<b>Perencanaan Penggunaan Jumlah Pekerja</b>


										<table class="tg table" id="tabel_dua">



										</table>
										<div class="break"></div>

										<b>Perencanaan Penggunaan Bahan/Alat</b>
										<table class="tg table" id="tabel_tiga">

										</table>


										<br />
										<br />

										<div class="break"></div>

										<b>Sketsa Kerja Rencana</b>

										<!-- <table class="tg table" id="tabel_empat"> -->

											<!-- <tr>
    <td class="tg-cly1"></td>
    <td class="tg-cly1"></td>
    <td class="tg-0lax"></td>
  </tr> -->
										<!-- </table> -->
                                        <div id="khusus_break"></div>
										<div id="tabel_khusus"></div>

										<br />
										<?php
										function tgl_indo($tanggal)
										{
											$bulan = array(
												1 =>   'Januari',
												'Februari',
												'Maret',
												'April',
												'Mei',
												'Juni',
												'Juli',
												'Agustus',
												'September',
												'Oktober',
												'November',
												'Desember'
											);
											$pecahkan = explode('-', $tanggal);

											// variabel pecahkan 0 = tanggal
											// variabel pecahkan 1 = bulan
											// variabel pecahkan 2 = tahun

											return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
										}
										?>

										<div class="row">
											<div class="col-sm-1"></div>
											<div class="col-sm-3">
												<center><b>Diperiksa Oleh</b><br /><b>
														<div id="testsaja"></div>
													</b></center>
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-3">
												<center><b>Jambi,<?php echo tgl_indo(date('Y-m-d')); ?></b><br /><b>Dibuat Oleh</b></center>
											</div>
											<div class="col-sm-1"></div>
										</div>

										<br />
										<br />
										<br />
										<div class="row">
											<div class="col-sm-1"></div>
											<div class="col-sm-3">
												<center><u><b id="diperiksa"> </b></u><br /><b id="nip_dip"></b><br /><br /></center>
											</div>
											<div class="col-sm-4"></div>
											<div class="col-sm-3">
												<center><b id="dibuat"><?php
																								$data = $this->db->get_where("account", array("nip" => $this->session->userdata("nip")))->result();
																								$count = count($data);
																								$i = 0;

																								while ($i < $count) {
																									echo "<u>" . $data[$i]->nama . "</u>";
																									echo "<br/>";
																									echo "NRP: " . $data[$i]->nip;

																									$i++;
																								}
																								?></b></center>
											</div>
											<div class="col-sm-1"></div>
										</div>

									</div>



								</div>

								<script>
									$(document).ready(function() {
										$('#example').DataTable();
									});
								</script>
							</div>
						</div>


					</div>



				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2019</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>



	<script>
		function listPerencanaan() {
			$("#id_perencanaan").empty();
			let id_paket = $("#id_paket").val();
			// Ajax untuk mengambil data laporan perencanaan
			$.ajax({
				type: "POST",
				url: "http://localhost/pupr_new/generate_bulan_baru/perencanaan",
				data: {
					"id_paket": id_paket
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					data = JSON.parse(data);
					console.log(data);

					let length = data.length;
					let i = 0;

					$("#id_perencanaan").append("<option >" + "--Pilih--" + "</option>")





					while (i < length) {
						$("#tahun").val(data[i].tahun);
						$("#id_perencanaan").append("<option value='" + data[i].id_lap_perencanaan + "'>" + data[i].id_lap_perencanaan + "</option>")

						i++;
					}
				}
			});
		}
	</script>




	<script>
		function generate() {
			let bulan_test = $("#bulan").val();
			
			let bulan_akhir=$("#bulan_akhir").val();
			bulan_test = parseInt(bulan_test);
			bulan_test = bulan_test - 1;
			// alert(bulan_akhir);
			// alert(bulan_test);
			let jarak=parseInt(bulan_akhir)-parseInt(bulan_test);
			// alert(jarak);
			let data = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', '-', '-', '-'];

			let diperiksa_ = $("#diperiksa_oleh").val();

			// alert(diperiksa_);
			// alert(diperiksa_);
			// alert(diperiksa_);
			//konf_kerja data
			$.ajax({
				type: "POST",
				async: false,
				url: "http://localhost/pupr_new/generate_minggu/bidang",
				data: {
					"id_konfigurasi": diperiksa_
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					data = JSON.parse(data);
					let length = data.length;
					let i = 0;

					console.log("Hmmmmmm");
					console.log(data);
					console.log("Hmmmmmm");
					// alert(data);

					while (i < length) {
						$("#testsaja").text(data[i].jabatan);
						$("#diperiksa").text(data[i].nama);
						$("#nip_dip").text("NIP: " + data[i].nip);

						i++;
					}
				}
			});

			hapus();
			let tabel_satu_builder='';
			let tabel_satu_minggu='';
			let tabel_dua_builder='';
			let tabel_dua_minggu='';
			let tabel_tiga_builder='';
			let tabel_tiga_minggu='';
			let mm=0;
			let colspan=parseInt(jarak)*5;
			// alert(jarak);

			while(mm<jarak)
			{
				tabel_satu_builder=tabel_satu_builder+'<td  style="text-align:center;" class="tg-cly1" colspan="5">' + data[bulan_test+mm] + '</td>';
                tabel_satu_minggu=tabel_satu_minggu+'<td class="tg-cly1 fix">1</td>' +
				'<td class="tg-cly1 fix">2</td>' +
				'<td class="tg-cly1 fix">3</td>' +
				'<td class="tg-cly1 fix">4</td>' +
				'<td class="tg-cly1 fix">5</td>';
				tabel_dua_builder=tabel_dua_builder+'<td  style="text-align:center;" class="tg-cly1" colspan="5">' + data[bulan_test+mm] + '</td>';
                tabel_dua_minggu=tabel_dua_minggu+'<td class="tg-cly1 fix">1</td>' +
				'<td class="tg-cly1 fix">2</td>' +
				'<td class="tg-cly1 fix">3</td>' +
				'<td class="tg-cly1 fix">4</td>' +
				'<td class="tg-cly1 fix">5</td>';
				tabel_tiga_builder=tabel_tiga_builder+'<td  style="text-align:center;" class="tg-cly1" colspan="5">' + data[bulan_test+mm] + '</td>';
                tabel_tiga_minggu=tabel_tiga_minggu+'<td class="tg-cly1 fix">1</td>' +
				'<td class="tg-cly1 fix">2</td>' +
				'<td class="tg-cly1 fix">3</td>' +
				'<td class="tg-cly1 fix">4</td>' +
				'<td class="tg-cly1 fix">5</td>';
				mm++;
			}

			console.log(tabel_satu_builder);
			$("#tabel_satu").append('    <tr>' +
				'<th style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>' +
				'<th  style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Jenis Upah</th>' +
				'<th  style="text-align:center;border:1px solid black;" class="tg-cly1" colspan="'+colspan+'">Tahap</th>' +
				'</tr><tr>' +
				tabel_satu_builder+
				'</tr>' +
				'<tr>' +
		        tabel_satu_minggu+
				'</tr>');

			$("#tabel_dua").append('    <tr>' +
				'<th  style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>' +
				'<th  style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Jenis Upah</th>' +
				'<th  style="text-align:center;border:1px solid black;" class="tg-cly1" colspan="'+colspan+'">Tahap</th>' +
				'</tr><tr>' +
				tabel_dua_builder+
				'</tr>' +
				'<tr>' +
				tabel_dua_minggu+
				'</tr>');

			$("#tabel_tiga").append('<tr>' +
				'<th  style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Bahan/Alat</th>' +
				'<th  style="text-align:center;vertical-align: middle;border:1px solid black;" class="tg-cly1" rowspan="3">Satuan</th>' +
				'<th  style="text-align:center;border:1px solid black;" class="tg-cly1" colspan="'+colspan+'">Tahap</th>' +
				'</tr>' +
				'<tr>' +
				tabel_tiga_builder+
				'</tr>' +

				'<tr>' +
				tabel_tiga_minggu+
				'</tr>');




			let id_paket = $("#id_paket").val();
			let id_perencanaan = $("#id_perencanaan").val();
			let bulan = $("#bulan").val();



			// Tahun yang dipaket, bukan tahun sekarang
			let tahun;
			tahun = $("#tahun").val();

			// Buat dulu row tabelnya sesuai dengan jumlah yang ada di db
			$.ajax({
				type: "POST",
				async: false,
				url: "http://localhost/pupr_new/generate_bulan_baru/row1",
				data: {
					"id_paket": id_paket,
					"id_perencanaan": id_perencanaan,
					"bulan": bulan,
					"tahun": tahun
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					data = JSON.parse(data);


					let length = data.length;
					// Buat Row sebanyak data length tersebut
					// Jangan lupa id row didasarkan pada id Pekerjaan dan id jenis upah, serta untuk minggu ditambahkan urutan

					let i = 0;

					while (i < length) {

						$("#jenis_pekerjaan_x").append(data[i].nama_jenis + "<br/>");

						let uwu=1;
						let baris='';
						let baris2='';

						while(uwu<=colspan)
						{

							baris=baris+"<td class='tg-0lax' id='" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_"+uwu+"" + "' ></td>";
							baris2=baris2+"<td class='tg-0lax' id='" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__"+uwu+"" + "' ></td>";


							uwu++;
						}



						$("#tabel_satu").append("<tr>" +
							"<td class='tg-0lax'>" + data[i].nama_jenis + "</td>" +
							"<td class='tg-0lax'>" + data[i].nama + "</td>" +
							baris+
							"</tr>");

						$("#tabel_dua").append("<tr>" +
							"<td class='tg-0lax'>" + data[i].nama_jenis + "</td>" +
							"<td class='tg-0lax'>" + data[i].nama + "</td>" +
							baris2+
							"</tr>");


						i++;
					}
				}
			});


			// Ajax untuk mengenerate tabel alat_bahan

			$.ajax({
				type: "POST",
				async: false,
				url: "http://localhost/pupr_new/generate_bulan_baru/generate_alat1",
				data: {
					"id_paket": id_paket,
					"id_perencanaan": id_perencanaan,
					"bulan": bulan,
					"tahun": tahun
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					data = JSON.parse(data);

					let length = data.length;
					let i = 0;

					let uwu=1;
						let baris3='';
				

						while(uwu<=colspan)
						{

							baris3=baris3+"<td class='tg-0lax' id='" + data[i].id_jenis_bahan_alat + "___"+uwu+"" + "'></td>";


							uwu++;
						}



					while (i < length) {

						$("#tabel_tiga").append(" <tr>" +
							"<td class='tg-0lax'>" + data[i].jenis_bahan_alat + "</td>" +
							"<td class='tg-0lax'>" + data[i].satuan + "</td>" +
							baris3+
							"</tr>");


						i++;
					}
				}
			});




			//    Perulangan 4 kali
			let m = 0;

			while (m < jarak) {
				let bulan = $("#bulan").val();
				if (m == 0) {
					bulan = bulan;
				} else if (m == 1) {
					bulan = parseInt(bulan) + 1;
				} else if (m == 2) {
					bulan = parseInt(bulan) + 2;
				} else if (m == 3) {
					bulan = parseInt(bulan) + 3;
				}
				else if (m == 4) {
					bulan = parseInt(bulan) + 4;
				}
				else if (m == 5) {
					bulan = parseInt(bulan) + 5;
				}
				else if (m == 6) {
					bulan = parseInt(bulan) + 6;
				}
				else if (m == 7) {
					bulan = parseInt(bulan) + 7;
				}
				else if (m == 8) {
					bulan = parseInt(bulan) + 8;
				}
				else if (m == 9) {
					bulan = parseInt(bulan) + 9;
				}
				else if (m == 10) {
					bulan = parseInt(bulan) + 10;
				}
				else if (m == 11) {
					bulan = parseInt(bulan) + 11;
				}
				else if (m == 12) {
					bulan = parseInt(bulan) + 12;
				}
				// Selenjutnya ambil data yang sesuai dengan kriteria diatas
				// Select Sum Kan masing-masing per minggu

				let jumlah = getWeeksInMonth(bulan, tahun);

				console.log("hmmm");
				console.log(jumlah);
				console.log(bulan);
				console.log("hmmm");

				// alert(jumlah);
				let x = 1;

				while (x <= jumlah) {
					// Cari tanggal mulai dan tanggal selesai dari masing-masing minggu didalam bulan tersebut
					$.ajax({
						type: "POST",
						async: false,
						url: "http://localhost/pupr_new/generate_bulan_baru/minggu",
						data: {
							"id_paket": id_paket,
							"id_perencanaan": id_perencanaan,
							"bulan": bulan,
							"tahun": tahun,
							"minggu": x
						},
						dataType: "text",
						cache: false,
						success: function(data) {
							data = JSON.parse(data);

							let length = data.length;
							let i = 0;


							while (i < length) {
								if (m == 1) {
									let sup = parseInt(x) + 5;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								} else if (m == 2) {
									let sup = parseInt(x) + 10;
									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								} else if (m == 3) {
									let sup = parseInt(x) + 15;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								} 
								else if (m == 4) {
									let sup = parseInt(x) + 20;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 5) {
									let sup = parseInt(x) + 25;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 6) {
									let sup = parseInt(x) + 30;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 7) {
									let sup = parseInt(x) + 35;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 8) {
									let sup = parseInt(x) + 40;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 9) {
									let sup = parseInt(x) + 45;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 10) {
									let sup = parseInt(x) + 50;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 11) {
									let sup = parseInt(x) + 55;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else if (m == 12) {
									let sup = parseInt(x) + 60;

									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + sup).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + sup).text(data[i].sum);

								}
								else {
									$("#" + data[i].jenis_pekerjaan + "_" + data[i].id_jenis_upah + "_" + x).css("background-color", "#3b5998");
									$("#" + data[i].jenis_pekerjaan + "__" + data[i].id_jenis_upah + "__" + x).text(data[i].sum);
								}





								i++;
							}
						}
					});

					// Select semua bahan alat yang digunakan dalam bulan tersebut

					$.ajax({
						type: "POST",
						async: false,
						url: "http://localhost/pupr_new/generate_bulan_baru/alat_minggu",
						data: {
							"id_paket": id_paket,
							"id_perencanaan": id_perencanaan,
							"bulan": bulan,
							"tahun": tahun,
							"minggu": x
						},
						dataType: "text",
						cache: false,
						success: function(data) {
							data = JSON.parse(data);

							let length = data.length;
							let i = 0;


							while (i < length) {

								// $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+x).css("background-color","#3b5998");



								if (m == 1) {
									let sup = parseInt(x) + 5;

									$("#" + data[i].id_jenis_bahan_alat + "___" + sup).text(data[i].sum);

								} else if (m == 2) {
									let sup = parseInt(x) + 10;
									$("#" + data[i].id_jenis_bahan_alat + "___" + sup).text(data[i].sum);

								} else if (m == 3) {
									let sup = parseInt(x) + 15;

									$("#" + data[i].id_jenis_bahan_alat + "___" + sup).text(data[i].sum);

								} else {
									$("#" + data[i].id_jenis_bahan_alat + "___" + sup).text(data[i].sum);
								}

								i++;
							}
						}
					});

					x++;
				}

				m++;

			}



			// Tabel paling bawah yang berisi foto dan ditambahkan secara otomatis
			$("#tabel_khusus").empty();

			$("#tabel_empat").append('<tr><th style="text-align:center;vertical-align: middle;border:1px solid black;width:200px;" class="tg-cly1">Jenis Pekerjaan</th><th style="text-align:center;border:1px solid black;width:450px;" class="tg-cly1">Sketsa</th><th style="text-align:center;border:1px solid black;" class="tg-0lax">Keterangan</th></tr>');

			// Pilih semua sketsa dari dalam tabel
			let id_paket_j = $("#id_paket").val();
			let id_perencanaan_j = $("#id_perencanaan").val();
			let bulan_j = $("#bulan").val();
			let bulan_z=$("#bulan_akhir").val();
			$.ajax({
				type: "POST",
				url: "http://localhost/pupr_new/catur_wulan_baru/sketsa",
				data: {
					"id_paket": id_paket_j,
					"id_perencanaan": id_perencanaan_j,
					"bulan": bulan_j,
					"bulan_z":bulan_z
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					data = JSON.parse(data);
					console.log("gambar");
					console.log(data);

					let length = data.length;
					let i = 0;
					let xx=0;
					let length1=i;

					while (i < length) {

						let split=data[i].dimensi.split(",");

						if(length1<3)
						{

							if(length1==0)
							{
								$("#tabel_khusus").append('<table style="margin-top:10px;" class="table" id="tabel_'+xx+'"><tr><th style="text-align:center;vertical-align: middle;border:1px solid black;width:200px;" class="tg-cly1">Jenis Pekerjaan</th><th style="text-align:center;border:1px solid black;width:450px;" class="tg-cly1">Sketsa</th><th style="text-align:center;border:1px solid black;" class="tg-0lax">Keterangan</th></tr></table>');
								
							}
							$("#tabel_"+xx).append('<tr><td style="text-align:left;vertical-align: middle;" class="tg-cly1">' + data[i].nama_jenis + '</td>' +
							'<td class="tg-cly1">' + '<img style="width:380x;height:250px;" src="http://localhost/pupr_new/gambar/' + data[i].gambar + '">' + '</td>' +
							'<td class="tg-0lax">'+"Lokasi:"+data[i].lokasi+"<br/>"+"Panjang Penanganan:"+data[i].keterangan+"<br/>"+"Dimensi:"+"<br/>"+"P:"+split[0]+"<br/>"+"L:"+split[1]+"<br/>"+"T:"+split[2]+'</td></tr> ');
                            
							
							length1++;
							
						}
						else 
						{
							xx++;
							$("#tabel_khusus").append("<div class='break'></div>");
							$("#tabel_khusus").append('<table style="margin-top:10px;" class="table" id="tabel_'+xx+'"><tr><th style="text-align:center;vertical-align: middle;border:1px solid black;width:200px;" class="tg-cly1">Jenis Pekerjaan</th><th style="text-align:center;border:1px solid black;width:450px;" class="tg-cly1">Sketsa</th><th style="text-align:center;border:1px solid black;" class="tg-0lax">Keterangan</th></tr></table>');
							$("#tabel_"+xx).append('<tr><td style="text-align:left;vertical-align: middle;" class="tg-cly1">' + data[i].nama_jenis + '</td>' +
							'<td class="tg-cly1">' + '<img style="width:375x;height:250px;" src="http://localhost/pupr_new/gambar/' + data[i].gambar + '">' + '</td>' +
							'<td class="tg-0lax">'+"Lokasi:"+data[i].lokasi+"<br/>"+"Panjang Penanganan:"+data[i].keterangan+"<br/>"+"Dimensi:"+"<br/>"+"P:"+split[0]+"<br/>"+"L:"+split[1]+"<br/>"+"T:"+split[2]+'</td></tr> ');
							

							


							length1=0;
							length1++;
							
						
						}


					
						i++;
					}
				}
			});




			// Generate Informasinya
			$.ajax({
				type: "POST",
				url: "http://localhost/pupr_new/catur_wulan_baru/informasi",
				data: {
					"id_paket": id_paket_j
				},
				dataType: "text",
				cache: false,
				success: function(data) {
					// alert(data);  //as a debugging message.
					data = JSON.parse(data);

					let length = data.length;

					let i = 0;

					while (i < length) {
						$("#nama_paket_x").append(data[i].nama);
						$("#lokasi_x").append(data[i].lokasi);
						$("#periode_x").append(data[i].masa_pelaksanaan);
						$("#tahun_x").append(data[i].tahun);
						$("#nilai_paket_x").append(data[i].nilai_paket);

						i++;
					}
					// console.log("error");
					// console.log(data);
					// console.log("error");

				}
			});



			// Generate Jenis Pekerjaannya







		}


		function hapus() {
			$("#tabel_satu").empty();
			$("#tabel_dua").empty();
			$("#tabel_tiga").empty();
			$("#tabel_khusus").empty();
		}
	</script>


	<script>
		function getWeeksInMonth(month_number, year) {
			// console.log("year - "+year+" month - "+month_number+1);

			var day = 0;
			var firstOfMonth = new Date(year, month_number, 1);
			var lastOfMonth = new Date(year, parseInt(month_number) + 1, 0);

			if (firstOfMonth.getDay() == 0) {
				day = 2;
				firstOfMonth = firstOfMonth.setDate(day);
				firstOfMonth = new Date(firstOfMonth);
			} else if (firstOfMonth.getDay() != 1) {
				day = 9 - (firstOfMonth.getDay());
				firstOfMonth = firstOfMonth.setDate(day);
				firstOfMonth = new Date(firstOfMonth);
			}

			var days = (lastOfMonth.getDate() - firstOfMonth.getDate()) + 1
			return Math.ceil(days / 7);
		}



		function generatePDF() {
			// Choose the element that our invoice is rendered in.
			const element = document.getElementById("cetak");
			// Choose the element and save the PDF for our user.
			var opt = {
				margin: 1,
				filename: 'myfile.pdf',
				image: {
					type: 'jpeg',
					quality: 0.98
				},
				html2canvas: {
					scale: 2
				},
				jsPDF: {
					unit: 'in',
					format: 'A3',
					orientation: 'landscape'
				},
				pagebreak: {
					before: '.break'
				}
			};
			// Choose the element and save the PDF for our user.
			html2pdf().set(opt).from(element).save();

			swal("PDF Digenerate!!");
		}
	</script>









</body>

</html>
