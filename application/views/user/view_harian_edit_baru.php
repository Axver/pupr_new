
<?php

//	echo $this->session->userdata("nip");
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==2)
	{

	}
	else
	{
		redirect(base_url());
	}
}
else
{
	redirect(base_url());
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>

	<style>
		td,th,table{
			color: black;
			border:1px solid black;
		}

		body{
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
				<?php $this->load->view('admin_content/card_list_user');?>

				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Tambah Laporan Harian Mingguan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<center><b><h4>LAPORAN MINGGUAN PELAKSANAAN KEGIATAN</h4></b></center>
								<b>Id Paket</b>
								<input class="form form-control" type="text" id="id_paket" value="" disabled>
								<id>Laporan Perencanaan</id>
								<select class="form form-control" id="id_perencanaan" disabled>
						
										<option value="<?php echo $this->uri->segment("4")?>"><?php echo $this->uri->segment("4")?></option>
								
								</select>

                                <b>Tanggal Awal</b>
								<input type="text" class="form form-control" id="hari_tanggal" value="<?php echo $this->uri->segment("3") ?>" disabled>

								<br/>
<!--								Tabel 1-->

								<div class="row">
									<div class="col-sm-1"><button class="btn btn-facebook" onclick="rowSatu()">+</button> </div>
									<div class="col-sm-4">
										<select class="form form-control" id="pekerjaan">
											<?php
											$data=$this->db->get("jenis_pekerjaan")->result();
											$count=count($data);
											$i=0;

											while($i<$count)
											{
												?>
												<option value="<?php echo $data[$i]->id ?>"><?php echo $data[$i]->nama_jenis ?></option>
												<?php

												$i++;
											}

											?>
										</select></div>
								</div>

								<br/>



								<table class="table table-responsive-lg" id="tabel_satu">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" rowspan="3">Jenis Upah</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

								</table>
								<b>Rekapitulasi Pekerja Minggu ke-</b>
								<table class="table table-responsive-lg" id="tabel_dua">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" rowspan="3">Jenis Upah</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

								</table>
								<div class="row">
									<div class="col-sm-1"><button class="btn btn-facebook" onclick="rowTiga()">+</button> </div>
									<div class="col-sm-4">
										<select class="form form-control" id="alat_bahan">
											<?php
											$data=$this->db->get("jenis_bahan_alat")->result();
											$count=count($data);
											$i=0;

											while($i<$count)
											{
												?>
											<option value="<?php echo $data[$i]->id_jenis_bahan_alat ?>"><?php echo $data[$i]->jenis_bahan_alat ?></option>
											<?php

												$i++;
											}
											?>
										</select>
									</div>
								</div>

								<b>Rekapitulasi Penggunaan Bahan/Alat Minggu ke-</b>
								<table class="table table-responsive-lg" id="tabel_tiga">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Bahan/Alat</th>
										<th class="tg-nrix" rowspan="3">Satuan</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

								</table>

								<b>Diperiksa Oleh</b>
								<select id="diperiksa_oleh" class="form form-control">

									<?php
									$data=$this->db->get("konfigurasi")->result();
									$count=count($data);
									$i=0;

									while($i<$count)
									{
										?>
									<option value="<?php echo $data[$i]->id_konfigurasi; ?>"><?php echo $data[$i]->nama; ?></option>
									<?php

										$i++;
									}
									?>

								</select>


								<br/>

								<button class="btn btn-facebook" onclick="save()">Simpan</button>




							</div>

							<script>
                                $(document).ready(function() {
                                    $('#example').DataTable();
                                } );
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
	let kuy=0;
	function rowSatu()
	{
        kuy=parseInt(kuy)+5;
	    let pekerjaan=$("#pekerjaan option:selected").text();
	    let pekerjaan_id=$("#pekerjaan").val();

	    if($("#"+pekerjaan_id+"_pekerjaan").length>0)
		{
            $("#tabel_satu").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+pekerjaan_id+"_pekerjaan"+"_"+kuy+'">'+pekerjaan_id+"_"+pekerjaan+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+pekerjaan_id+"_upah"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_1"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_2"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_3"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_4"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_5"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_6"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_7"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

            $("#tabel_dua").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__pekerjaan"+'">'+pekerjaan_id+"_"+pekerjaan+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__upah"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__1"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__2"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__3"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__4"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__5"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__6"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__7"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');


		}
	    else
		{
            $("#tabel_satu").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+pekerjaan_id+"_pekerjaan"+"_"+kuy+'">'+pekerjaan_id+"_"+pekerjaan+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+pekerjaan_id+"_upah"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_1"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_2"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_3"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_4"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_5"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_6"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+pekerjaan_id+"_7"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

            $("#tabel_dua").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__pekerjaan"+'">'+pekerjaan_id+"_"+pekerjaan+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"_upah"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__1"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__2"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__3"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__4"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__5"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__6"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+pekerjaan_id+"__7"+"_"+kuy+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

		}

        kuy++;

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("jenis_upah_klik");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jenis_upah").val(attribute);
            $("#jenisUpah").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //    Event Listener Untuk Hari Warnai
        var classname = document.getElementsByClassName("warnai");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            attribute2=attribute.replace("_","__");
            $("#"+attribute).css("background-color", "white");
            $("#"+attribute2).text("");
            $("#"+attribute2).removeClass("Active1");
            $("#"+attribute).removeClass("Active");
            $("#"+attribute2).addClass("nonActive1");
            $("#"+attribute).addClass("nonActive");
            $("#id_hari").val(attribute);
            $("#dataHari").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

	}

    function rowTiga()
    {
        let alat_bahan=$("#alat_bahan").val();
        let alat_bahan_text=$("#alat_bahan option:selected").text();

        if($("#"+alat_bahan+"___alat").length>0)
		{
		    alert("Tidak Bisa Menambahkan!");
		}
        else
		{
            $("#tabel_tiga").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+alat_bahan+"___alat"+'">'+alat_bahan_text+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 satuan" id="'+alat_bahan+"___satuan"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___1"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___2"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___3"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___4"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___5"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___6"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+alat_bahan+"___7"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');
		}

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("satuan");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_satuan").val(attribute);
            $("#mSatuan").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("warnai1");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#"+attribute).text("");
            $("#"+attribute).removeClass("Active2");
            $("#"+attribute).addClass("nonActive2");
            $("#id_warnai").val(attribute);
            $("#wAlat").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }



    }
</script>





<!--Kumpulan Modal-->
<!-- Modal -->
<div class="modal fade" id="jenisUpah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="id_jenis_upah" disabled>
				<b>Jenis Upah</b>
				<select id="data_jenis_upah" class="form form-control">
					<?php
					$data=$this->db->get("jenis_upah")->result();
					$count=count($data);
					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $data[$i]->id_jenis_upah; ?>"><?php echo $data[$i]->id_jenis_upah."_".$data[$i]->nama; ?></option>
					<?php
						$i++;
					}
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveUpah()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="dataHari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="id_hari" disabled>
				<b>Jumlah</b>
				<input type="text" class="form form-control" id="hari_value" value="0">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveHari()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="mSatuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="id_satuan" disabled>
				<b>Satuan</b>
				<select class="form form-control" id="id_satuan_data">
					<?php
					$data=$this->db->get("satuan")->result();
					$count=count($data);

					$i=0;


					while($i<$count)
					{
						?>

					<option value="<?php echo $data[$i]->id_satuan; ?>"><?php echo $data[$i]->satuan; ?></option>
					<?php


						$i++;
					}
					?>
				</select>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveAlat()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Baru -->
<div class="modal fade" id="wAlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="id_warnai" disabled>
				<b>Jumlah</b>
				<input type="text" class="form form-control" id="jumlah_alat" value="0">



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveJumlah()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	function saveUpah()
	{
	    let id=$("#id_jenis_upah").val();
        let hm=$("#"+id);
		console.log(hm[0].id);
	    let data=$("#data_jenis_upah option:selected").text();
	    let id2=id.replace("_","__");

	    $("#"+id).text(data);
        $("#"+id2).text(data);
	    $("#jenisUpah").modal("hide");
	}

    function saveHari()
    {
        let id=$("#id_hari").val();
        let data=$("#hari_value").val();
        let id2=id.replace("_","__");

        // alert(id);
        // alert(id2);

        //Ubah Status Class
        $( "#"+id ).removeClass( "nonActive" );
        $( "#"+id2 ).removeClass( "nonActive1" );
        $( "#"+id ).addClass( "Active" );
        $( "#"+id2 ).addClass( "Active1" );

        // $("#"+id).text(data);
        $("#"+id).css("background-color", "#3b5998");
        $("#"+id2).text(data);
        $("#dataHari").modal("hide");
    }


    function saveAlat() {

	    $id=$("#id_satuan").val();
	    $data=$("#id_satuan_data option:selected").text();
	    $data_id=$("#id_satuan_data").val();

	    $("#"+$id).text($data_id+"_"+$data);

	    // alert("test");

		$("#mSatuan").modal("hide");

    }
    
    
    function saveJumlah() {
		// alert("test");
		let id_warnai=$("#id_warnai").val();
		let jumlah_alat=$("#jumlah_alat").val();
        $("#"+id_warnai).removeClass("nonActive2");
        $("#"+id_warnai).addClass("Active2");

		$("#"+id_warnai).text(jumlah_alat);
		$("#wAlat").modal("hide");

    }
    
    
    function save() {
		// alert("Save");
        let i=0;
        let l=0;
        let dataArray=new Array();
        let dataArray1=new Array();

        $(".Active").each(function (index, element) {
            dataArray[i]=$(this).attr("id");
            i++;
        });

        $(".Active2").each(function (index, element) {
            dataArray1[l]=$(this).attr("id");
            l++;
        });


        console.log(dataArray);
        console.log(dataArray1)

        let length=dataArray.length;
        let length1=dataArray1.length;
        let j=0;
        let q=0;
        let id_paket=$("#id_paket").val();
        let id=$("#hari_tanggal").val();
        let id_perencanaan=$("#id_perencanaan").val();


        // console.log(id_paket);
        // console.log(id);
        // console.log(id_perencanaan);

        let jumlah_pekerja;
        let transform;


        //Input laporan harian mingguan dulu
        $.ajax({
            type: "POST",
			async:false,
            url: "http://localhost/pupr_new/user/baru_harian_edit",
            data: {"id_harian":id,"id_perencanaan":id_perencanaan,"id_paket":id_paket},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    // alert(data);  //as a debugging message.

					
                    while(j<length)
                    {
                        transform=dataArray[j].replace("_","__");
                        let jumlah_pekerja=$("#"+transform).text();
                        let upah=dataArray[j].split("_");
                        let ambil=dataArray[j].split("_");

                      

                        upah=upah[0]+"_upah"+"_"+upah[2];
                     
                        upah=$("#"+upah).text();
                        upah=upah.split("_");
                        upah=upah[0];
                        //Ambil Jnis Upah
						// ambil=dataArray[i].split("_");
						// console.log("---------");
						// console.log(transform);
						// console.log(jumlah_pekerja);
                        // console.log(upah);
                        // console.log("---------");
						//Ambil yang sesuai
						// ambil1=$("#"+ambil[0]+"upah").text();
						// console.log(ambil);
                        // console.log(ambil1);
						// ambil2=ambil.split("_");
                        // console.log(ambil2);
						// upah=ambil2[0]; //Ini Id Upah nya
						//
                        // jumlah_pekerja=$("#"+transform).text();

                        console.log("kenapa semua terhapus?");
                        console.log(id);
                        console.log(id_perencanaan);
                        console.log(id_paket);
                        console.log(upah);
                        console.log(ambil[1]);
                        console.log(jumlah_pekerja);



                        //Ajax Disini untuk menambahkan
                        $.ajax({
                            type: "POST",
                            async:false,
                            url: "http://localhost/pupr_new/user/baru_pekerjaan",
                            data: {"id_harian":id,"id_perencanaan":id_perencanaan,"id_paket":id_paket,"id_upah":upah,"hari":ambil[1],"jenis_pekerjaan":ambil[0],"total":jumlah_pekerja},
                            dataType: "text",
                            cache:false,
                            success:
                                function(data){
                                    // console.log(data);
                                }
                        });






                        j++;
                    }


                    while(q<length1)
					{
					    let transform1;

					    // console.log("hnnnnn");
					    // console.log(dataArray1[q]);
					    // console.log("hnnnnnn");

                        transform1=dataArray1[q];
                        let jumlah_alat=$("#"+transform1).text();

                        // console.log("hmmmmm");
                        // console.log(transform1);
                        // console.log("hmmmmm");
                        let satuan=transform1.split("___");
                     
                        let ambil=dataArray1[q].split("___");

                        

                        satuan=satuan[0]+"___satuan";
                        // console.log(satuan);
                        satuan=$("#"+satuan).text();
                        // console.log(satuan);
                        satuan=satuan.split("_");
                        // console.log(satuan);
                        satuan=satuan[0];
                        // console.log(satuan);



                        // console.log("list lengkap");
                        // console.log(id);
                        // console.log(id_perencanaan);
                        // console.log(id_paket);
                        // console.log(satuan);
                        // console.log(ambil[1]);
                        // console.log(ambil[0]);
                        // console.log(jumlah_alat);







                        
                        //Ambil Jnis Upah
                        // ambil=dataArray[i].split("_");
                        // console.log("---------");
                        // console.log(transform);
                        // console.log(jumlah_alat);
                        // console.log(satuan);
                        // console.log("---------");
                        //Ambil yang sesuai
                        // ambil1=$("#"+ambil[0]+"upah").text();
                        // console.log(ambil);
                        // console.log(ambil1);
                        // ambil2=ambil.split("_");
                        // console.log(ambil2);
                        // upah=ambil2[0]; //Ini Id Upah nya
                        //
                        // jumlah_pekerja=$("#"+transform).text();

                        //Ajax Disini untuk menambahkan
                        $.ajax({
                            type: "POST",
                            async:false,
                            url: "http://localhost/pupr_new/user/baru_alat",
                            data: {"id_harian":id,"id_perencanaan":id_perencanaan,"id_paket":id_paket,"id_satuan":satuan,"hari":ambil[1],"jenis_bahan_alat":ambil[0],"total":jumlah_alat},
                            dataType: "text",
                            cache:false,
                            success:
                                function(data){
                                    console.log(data);
                                }
                        });



                        q++;
					}

                    let diperiksa_oleh=$("#diperiksa_oleh").val();
                    $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/view_harian/ttd_update", 
         data: {"id_harian":id,"id_perencanaan":id_perencanaan,"id_paket":id_paket,"diperiksa_oleh":diperiksa_oleh},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                alert("Data Berhasil Di Update!!");
              }
          });
                }
        });




    }
</script>


<script>

// Untuk bagian ambil data yang telaha da

// Ambil id_paket

let id_perencanaan_baru=$("#id_perencanaan").val();

$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/view_harian/id_baru", 
         data: {"id_perencanaan":id_perencanaan_baru},
         async:false,
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.


                $("#id_paket").val(data);


                // Sekarang Select Semua data untuk dimasukkan kedalam tabel tersebut

        let id_paket_baru=$("#id_paket").val();
        let tanggal_baru=$("#hari_tanggal").val();
        $.ajax({
         type: "POST",
         async:false,
         url: "http://localhost/pupr_new/view_harian/all_data", 
         data: {"id_perencanaan":id_perencanaan_baru,"id_paket":id_paket_baru,"tanggal":tanggal_baru},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                data=JSON.parse(data);

                console.log("-----");
                console.log(data);
                console.log("-----");


                let length=data.length;
                let i=0;


                while(i<length)
                {

                    // Tambahkan row disini
                    
	    if($("#"+data[i].jenis_pekerjaan+"_pekerjaan").length>0)
		{
            $("#tabel_satu").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+data[i].jenis_pekerjaan+"_pekerjaan"+"_"+data[i].id_jenis_upah+'">'+data[i].jenis_pekerjaan+"_"+data[i].nama_jenis+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+data[i].jenis_pekerjaan+"_upah"+"_"+data[i].id_jenis_upah+'">'+data[i].id_jenis_upah+"_"+data[i].nama+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_1"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_2"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_3"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_4"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_5"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_6"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_7"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

            $("#tabel_dua").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__pekerjaan"+"_"+data[i].id_jenis_upah+'">'+data[i].jenis_pekerjaan+"_"+data[i].nama_jenis+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__upah"+"_"+data[i].id_jenis_upah+'">'+data[i].id_jenis_upah+"_"+data[i].nama+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__1"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__2"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__3"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__4"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__5"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__6"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__7"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');


		}
	    else
		{
            $("#tabel_satu").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+data[i].jenis_pekerjaan+"_pekerjaan"+"_"+data[i].id_jenis_upah+'">'+data[i].jenis_pekerjaan+"_"+data[i].nama_jenis+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+data[i].jenis_pekerjaan+"_upah"+"_"+data[i].id_jenis_upah+'">'+data[i].id_jenis_upah+"_"+data[i].nama+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_1"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_2"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_3"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_4"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_5"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_6"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_7"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

            $("#tabel_dua").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__pekerjaan"+'">'+data[i].jenis_pekerjaan+"_"+data[i].nama_jenis+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__upah"+"_"+data[i].id_jenis_upah+'">'+data[i].id_jenis_upah+"_"+data[i].nama+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__1"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__2"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__3"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__4"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__5"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__6"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__7"+"_"+data[i].id_jenis_upah+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

		}

        kuy++;

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("jenis_upah_klik");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jenis_upah").val(attribute);
            $("#jenisUpah").modal("show");
        };

        for (var k = 0; k < classname.length; k++) {
            classname[k].addEventListener('click', myFunction, false);
        }

        //    Event Listener Untuk Hari Warnai
        var classname = document.getElementsByClassName("warnai");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            attribute2=attribute.replace("_","__");
            $("#"+attribute).css("background-color", "white");
            $("#"+attribute2).text("");
            $("#"+attribute2).removeClass("Active1");
            $("#"+attribute).removeClass("Active");
            $("#"+attribute2).addClass("nonActive1");
            $("#"+attribute).addClass("nonActive");
            $("#id_hari").val(attribute);
            $("#dataHari").modal("show");
        };

        for (var j = 0; j < classname.length; j++) {
            classname[j].addEventListener('click', myFunction, false);
        }


       


                    i++;
                }
              }



            //   Select semua data dan tampilkan

       
            
          });

        //   Sekarang Jenis Bahan Alat yang diambil dari database

              }
          });

          let id_paket_baru=$("#id_paket").val();
        let tanggal_baru=$("#hari_tanggal").val();

          $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/view_harian/all_data1", 
         async:false,
         data: {"id_perencanaan":id_perencanaan_baru,"id_paket":id_paket_baru,"tanggal":tanggal_baru},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.

                data=JSON.parse(data);
                let length=data.length;

                let i=0;


                while(i<length)
                {

                     // Beri warna dan isikan data terlebih dahulu
        $("#"+data[i].jenis_pekerjaan+"_"+data[i].hari+"_"+data[i].id_jenis_upah).css("background-color","yellow");
        $("#"+data[i].jenis_pekerjaan+"__"+data[i].hari+"_"+data[i].id_jenis_upah).text(data[i].total);

        $("#"+data[i].jenis_pekerjaan+"_"+data[i].hari+"_"+data[i].id_jenis_upah).removeClass("nonActive");
        $("#"+data[i].jenis_pekerjaan+"_"+data[i].hari+"_"+data[i].id_jenis_upah).addClass("Active");

        
        $("#"+data[i].jenis_pekerjaan+"__"+data[i].hari+"_"+data[i].id_jenis_upah).removeClass("nonActive1");
        $("#"+data[i].jenis_pekerjaan+"__"+data[i].hari+"_"+data[i].id_jenis_upah).addClass("Active1");

                    i++;
                }
              }
          });



        //   Select Bahan/Alat dari database
        $.ajax({
         type: "POST",
         async:false,
         url: "http://localhost/pupr_new/view_harian/list_alat_baru", 
         data: {"id_perencanaan":id_perencanaan_baru,"id_paket":id_paket_baru,"tanggal":tanggal_baru},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                data=JSON.parse(data);

                console.log("Bahan alat yang ditemukan");
                console.log(data);
                console.log("finished");


                let length=data.length;

                let i=0;

                while(i<length)
                {
                    $("#tabel_tiga").append('\t\t<tr>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+data[i].id_jenis_bahan_alat+"___alat"+'">'+data[i].jenis_bahan_alat+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 satuan" id="'+data[i].id_jenis_bahan_alat+"___satuan"+'">'+data[i].id_satuan+"_"+data[i].satuan+'</td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___1"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___2"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___3"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___4"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___5"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___6"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___7"+'"></td>\n' +
                '\t\t\t\t\t\t\t\t\t</tr>');

                    i++;
                }

                // Baru isi datanya sekarang

                $.ajax({
                type: "POST",
                async:false,
                url: "http://localhost/pupr_new/view_harian/all_alat", 
                data: {"id_perencanaan":id_perencanaan_baru,"id_paket":id_paket_baru,"tanggal":tanggal_baru},
                dataType: "text",  
                cache:false,
                success: 
              function(data){
                // alert(data);  //as a debugging message.
                data=JSON.parse(data);
                let length=data.length;
                let i=0;

                while(i<length)
                {

                    $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].hari).text(data[i].jumlah);

                    $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].hari).removeClass("nonActive2");
                    $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].hari).addClass("Active2");

                    i++;
                }


                var classname = document.getElementsByClassName("satuan");

var myFunction = function() {
    var attribute = this.id;
    console.log(attribute);
    $("#id_satuan").val(attribute);
    $("#mSatuan").modal("show");
};

for (var j = 0; j < classname.length; j++) {
    classname[j].addEventListener('click', myFunction, false);
}

//    Event Listener Untuk Jenis
var classname = document.getElementsByClassName("warnai1");

var myFunction = function() {
    var attribute = this.id;
    console.log(attribute);
    $("#"+attribute).text("");
    $("#"+attribute).removeClass("Active2");
    $("#"+attribute).addClass("nonActive2");
    $("#id_warnai").val(attribute);
    $("#wAlat").modal("show");
};

for (var k = 0; k < classname.length; k++) {
    classname[k].addEventListener('click', myFunction, false);
}


              }
          });
              }
          });


</script>



<script>


// Script untuk memastikan kolom tandatangan sesuai dengan apa yang telah diinputkan user

let id_perencanaan_x=$("#id_perencanaan").val();
let tanggal_x=$("#hari_tanggal").val();

// Select dari db

$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/view_harian/ttd_edit", 
         data: {"id_perencanaan":id_perencanaan_x,"tanggal":tanggal_x},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                data=JSON.parse(data);

                let length=data.length;
                let i=0;

                while(i<length)
                {
                    $('#diperiksa_oleh option[value="'+data[i].id_diperiksa+'"]').attr('selected','selected');
                    i++;
                }
              }
          });


</script>



</body>

</html>
