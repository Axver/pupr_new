
<?php

//	echo $this->session->userdata("nip");
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==1 || $this->session->userdata("privilage")==2)
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
		table {
			display: block;
			overflow-x: auto;
			white-space: nowrap;
		}

		#gambar{
			border-style: solid;
			border-width: 5px;
		}

		#border{
			border-style: solid;
			border-width: 5px;
		}

		body{
			/*background-color:#add8e6;  */
		}
		.contain{
			margin-left:auto;
			margin-right:auto;
			margin-top:calc(calc(100vh - 405px)/2);
		}
		#form1{
			width:auto;
		}
		.alert{
			text-align:center;
		}

		#blah{
			max-height:256px;
			height:auto;
			width:auto;
			display:block;
			margin-left: auto;
			margin-right: auto;
			padding:5px;
		}
		#img_contain{
			border-radius:5px;
			/*  border:1px solid grey;*/
			margin-top:20px;
			width:auto;
		}

		.imgInp{
			width:150px;
			margin-top:10px;
			padding:10px;
			background-color:#d3d3d3;
		}
		.loading{
			animation:blinkingText ease 2.5s infinite;
		}
		@keyframes blinkingText{
			0%{     color: #000;    }
			50%{   color: #transparent; }
			99%{    color:transparent;  }
			100%{ color:#000; }
		}
		.custom-file-label{
			cursor:pointer;
		}

		/************CREDITS**************/
		.credit{
			font: 14px "Century Gothic", Futura, sans-serif;
			font-size:12px;
			color:#3d3d3d;
			text-align:left;
			margin-top:10px;
			margin-left:auto;
			margin-right:auto;
			text-align:center;
		}
		.credit a{
			color:gray;
		}
		.credit a:hover{
			color:black;
		}
		.credit a:visited{
			color:MediumPurple;
		}

	</style>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<?php $this->load->view('component/sidebar_user'); ?>
	<?php $this->load->view('modal/add_waktu'); ?>
	<?php $this->load->view('modal/add_alat_bahan'); ?>

	<?php $this->load->view('modal/addPekerjaan'); ?>
	<?php $this->load->view('modal/addBahan'); ?>


	<?php

	$paket_info=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("3")))->result();

	$id_paket=$paket_info[0]->id_paket;
//	Pilih paket info

	$paket_info=$this->db->get_where("paket",array("id_paket"=>$id_paket))->result();

	?>
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
					<input type="hidden" id="uri_nya" value="<?php echo $this->uri->segment('3'); ?>">

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


				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Laporan Perencanaan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<button class="btn btn-danger" onclick="generatePDF('<?php echo $this->uri->Segment("3"); ?>')" >Generate PDF</button>

							<div id="editor"></div>

							<div class="card-body" id="cetakIni">

								<input type="hidden" id="id_perencanaan_hidden" value="<?php echo $this->uri->segment('3'); ?>">





								<div class="row">
									<div class="col-sm-6">
										<div class="row" style="text-align: center">
											<b>
												<h4>LAPORAN PERENCANAAN
													<br/>
													PELAKSANAAN KEGIATAN</h4>

											</b>
										</div>
										<div class="row">
											<div class="col-sm-3">Nama Paket</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8">
												<input type="text" class="form form-control" id="nama_paket" value="<?php echo $paket_info[0]->nama; ?>" disabled>
												<input type="hidden" class="form form-control" id="nama_paket1" value="<?php echo $paket_info[0]->id_paket.'_'.$paket_info[0]->tahun; ?>" >

											</div>

										</div>
										<div class="row">
											<div class="col-sm-3">Nilai Paket</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="nilai_paket" value="<?php echo $paket_info[0]->nilai_paket; ?>" disabled></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Jumlah Tahap</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="jumlah_tahap" value="<?php echo $paket_info[0]->jumlah_tahap; ?>" disabled></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Jenis Pekerjaan</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="jenis_pelaksanaan" value="<?php echo $paket_info[0]->jenis_pekerjaan; ?>" disabled></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Masa Pelaksanaan</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="masa_pelaksanaan" value="<?php echo $paket_info[0]->masa_pelaksanaan; ?>" disabled></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Lokasi</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="lokasi" value="<?php echo $paket_info[0]->lokasi; ?>" disabled></div>

										</div>
										<div class="row">
											<div class="col-sm-3">Tahun Anggaran</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="tahun_anggaran" value="<?php echo $paket_info[0]->tahun_anggaran; ?>" disabled> </div>

										</div>
									</div>
									<div class="col-sm-6" id="gambar">
										<b>Sketsa Kerja</b>

										<div class="contain animated bounce">
											<form id="form1" runat="server">
												<div class="alert"></div>
												<?php
												$getImage=$this->db->get_where("gambar_perencanaan",array("id_lap_perencanaan"=>$this->uri->Segment("3")))->result();
												?>
												<div id='img_contain'>
													<?php
													$i=0;
													while($i<count($getImage))
													{
														?>
														<img id="blah" align='middle' src="<?php echo base_url('gambar/'.$getImage[$i]->gambar) ?>" alt="your image" title=''/>
													<?php

														$i++;
													}
													?>
												</div>

											</form>
											<div class="credit">Modified using <a target="_blank" href="https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded">Ivan Baev's</a> code.</div>
										</div>
									</div>
								</div>
								<br/>

								<br>
								<div class="row">
									<div class="col-sm-2"><button style="width:100%" class="btn btn-info" onclick="tambahPekerjaan()">Add</button></div>
									<div class="col-sm-4"><select id="pekerjaan" class="form form-control">
											<?php
											$panjang=count($pekerjaan);
											$i=0;
											while($i<$panjang)
											{
												?>

												<option value="<?php echo $pekerjaan[$i]->id; ?>"><?php echo $pekerjaan[$i]->nama_jenis; ?></option>

												<?php
												$i++;
											}
											?>
										</select>
										<a href="#" onclick="addPekerjaan()">New</a>
										<script>
                                            function addPekerjaan() {


                                                $("#addPekerjaan").modal("show");



                                            }
										</script>
									</div>
								</div>
								<br/>



								<!--	Irregular Table-->
								<b>Jadwal Rencana Pelaksanaan Kegiatan</b>
								<table id="tabel_jadwal" class="table table-striped" cellspacing="0" border="0">

									<tr>
										<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="6" rowspan="4" height="80" align="center" valign="middle"><font face="Comic Sans MS" color="#000000">Jenis Pekerjaan</font></td>
										<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="60" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap/Bulan/Minggu</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap I</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap II</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap III</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Januari</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Februari<br>Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">April</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Mei</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juni</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juli</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Agustus</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">September</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Oktober</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">November</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Desember</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
									</tr>



									<tbody>



									</tbody>
								</table>
								<b>Perencanaan Penggunaan Jumlah Pekerja </b>
								<table id="tabel_jumlah" class="table table-striped" cellspacing="0" border="0">

									<tr>
										<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="6" rowspan="4" height="80" align="center" valign="middle"><font face="Comic Sans MS" color="#000000">Jenis Pekerjaan</font></td>
										<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="60" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap/Bulan/Minggu</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap I</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap II</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap III</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Januari</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Februari<br>Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">April</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Mei</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juni</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juli</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Agustus</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">September</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Oktober</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">November</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Desember</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
									</tr>



									<tbody>



									</tbody>
								</table>
								<b>Perencanaan Penggunaan Bahan/Alat </b>
								<br/>
								<div class="row">
									<div class="col-sm-2">
										<button onclick="addBahanAlat()" class="btn btn-info" style="width:100%">Add</button>
									</div>
									<div class="col-sm-4">
										<select id="alat_bahan" class="form form-control">
											<?php

											$count=count($alat);
											$i=0;
											while($i<$count)
											{
												?>
												<option value="<?php echo $alat[$i]->id_jenis_bahan_alat ?>"><?php echo $alat[$i]->jenis_bahan_alat; ?></option>
												<?php
												$i++;
											}
											?>
										</select>
										<a href="#" onclick="newBahan()">New</a>
										<script>
                                            function newBahan() {
                                                $("#addBahan").modal("show");
                                            }
										</script>
									</div>

								</div>
								<br/>
								<table id="tabel_alat" class="table table-striped" cellspacing="0" border="0">

									<tr>
										<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="6" rowspan="4" height="80" align="center" valign="middle"><font face="Comic Sans MS" color="#000000">Jenis Bahan/Alat</font></td>
										<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="60" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap/Bulan/Minggu</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap I</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap II</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap III</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Januari</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Februari<br>Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Maret</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">April</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Mei</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juni</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juli</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Agustus</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">September</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Oktober</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">November</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Desember</font></td>

									</tr>
									<tr>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
										<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
										<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
									</tr>



									<tbody>



									</tbody>
								</table>

								<!--								Bagian Bawah-->
								<div class="row">
									<div class="col-sm-6" id="border">
										<?php $infoPerencanaan=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("3")))->result();

										?>
										<b>Informasi</b>
										<br/>
										<label for="">Lokasi</label>
										<input type="text" class="form form-control" id="u_lokasi" placeholder="Lokasi" value="<?php echo $infoPerencanaan[0]->lokasi; ?>">
										<label for="">Jenis Pekerjaan</label>
										<input type="text" class="form form-control" id="u_jenis_pekerjaan" placeholder="Jenis Pekerjaan" value="<?php echo  $infoPerencanaan[0]->jenis_pekerjaan; ?>">
										<label for="">Panjang Penanganan</label>
										<input type="text" class="form form-control" id="u_panjang_penanganan" placeholder="Panjang Penanganan" value="<?php echo  $infoPerencanaan[0]->panjang_penanganan; ?>">
										<label for="">Keterangan Dimensi</label>
										<input type="text" class="form form-control" id="u_keterangan_dimensi" placeholder="Keterangan Dimensi" value="<?php echo  $infoPerencanaan[0]->keterangan_dimensi; ?>">
										<label for="">Keterengan</label>
										<input type="text" class="form form-control" id="u_keterangan" placeholder="Keterangan" value="<?php echo  $infoPerencanaan[0]->keterangan; ?>">



									</div>

									<div class="col-sm-6" id="border">
										<b>Tandatangan</b>
										<a href="#">New</a>
										<br/>
										<?php
										$ttd=$this->db->get("konfigurasi")->result();

										?>
										Disetujui Oleh:
										<select class="form form-control" id="disetujui_oleh">
											<?php
											$count=count($ttd);
											$i=0;
											while($i<$count)
											{
												?>
												<option value="<?php echo $ttd[$i]->id_konfigurasi; ?>"><?php echo $ttd[$i]->nama; ?></option>
											<?php
												$i++;
											}
											?>

										</select>
										<br/>
										<b>Diperiksa Oleh:</b>
										<select class="form form-control" id="diperiksa_oleh">

											<?php
											$count=count($ttd);
											$i=0;
											while($i<$count)
											{
												?>
												<option value="<?php echo $ttd[$i]->id_konfigurasi; ?>"><?php echo $ttd[$i]->nama; ?></option>
												<?php
												$i++;
											}
											?>

										</select>
										<br/>


									</div>
								</div>

								<br/>
								<br/>
								<div class="row">
									<div class="col-sm-3">
										<button class="btn btn-warning" onclick="savePerencanaan()">Save</button>
										<button class="btn btn-danger">Cancel</button>
									</div>
								</div>



							</div>
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
    let save_pekerjaan= new Array();

    function tambahPekerjaan()
    {
        let pekerjaan_id=$("#pekerjaan").val();
        let pekerjaan_text=$("#pekerjaan option:selected").html();


        var newRow="\t<tr id='pekerjaan_id"+pekerjaan_id+"'>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
            "\n" +
            "\n" +
            "\t\t\t\t\t\t\t\t\t</tr>";

        $("#tabel_jadwal").append(newRow);
        var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
            "\n" +
            "\n" +
            "\t\t\t\t\t\t\t\t\t</tr>";
        $("#tabel_jumlah").append(newRow);

        let x=1;

        while(x<=60)
        {
            var data=pekerjaan_id+"_"+x;
            var data1=pekerjaan_id+"__"+x;
            data=data.toString();
            data1=data1.toString();
            console.log(data);
            var newCol="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai('"+data+"')\" id='"+data+"' class='nonActive'></td>";
            var newCol1="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai1('"+data1+"')\" id='"+data1+"' class='nonActive1'></td>";
            $("#pekerjaan_id"+pekerjaan_id).append(newCol);
            $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
            x++;
        }


        //    Add Row

    }

    function warnai(id)
    {
        let col_id=$("#"+id);
        let class_=col_id.attr('class');
        if(class_=="nonActive")
        {
            col_id.css("background-color","yellow");
            col_id.removeClass("nonActive");
            col_id.addClass("Active");
            $("#id_column").val(id);
            $('#modalWaktu').modal('show');


        }
        else
        {
            col_id.css("background-color","white");
            col_id.removeClass("Active");
            col_id.addClass("nonActive");
            removeValue(col_id);
        }

    }

    function addValue()
    {
        let id_col=$("#id_column").val();
        let tanggal_kerja=$("#tanggal_kerja").val();
        // alert(id_col);
        col_id=id_col.replace('_','__');
        // alert(col_id);
        let jumlah=$("#jumlah_kerja").val();
        $("#"+col_id).text(jumlah+"_"+tanggal_kerja);
        console.log(col_id);
        console.log($("#"+col_id).attr('class'));
        let data_class=$("#"+col_id).attr('class');

        if(data_class=="nonActive1")
        {
            $("#"+col_id).removeClass("nonActive1");
            $("#"+col_id).addClass("Active1");
        }
        else
        {
            $("#"+col_id).removeClass("Active1");
            $("#"+col_id).addClass("nonActive1");
        }


    }

    function removeValue(id)
    {
        let id_col=$("#id_column").val();
        // alert(id_col);
        id_col=id_col.replace('_','__');

        $("#"+id_col).text("");
    }

    $("#inputGroupFile01").change(function(event) {
        RecurFadeIn();
        console.log(this);
        readURL(this);
    });
    $("#inputGroupFile01").on('click',function(event){
        RecurFadeIn();
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\')+1);
            reader.onload = function(e) {
                debugger;
                $('#blah').attr('src', e.target.result);
                $('#blah').hide();
                $('#blah').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
            console.log(input.files[0]);
        }
        $(".alert").removeClass("loading").hide();
    }
    function RecurFadeIn(){
        console.log('ran');
        FadeInAlert("Wait for it...");
    }
    function FadeInAlert(text){
        $(".alert").show();
        $(".alert").text(text).addClass("loading");
    }

    function addBahanAlat()
    {
        let alat_bahan=$("#alat_bahan").val();
        let alat_bahan_text=$("#alat_bahan option:selected").text();
        // alert(alat_bahan);
        // alert(alat_bahan_text);

        var newRowX="\t<tr id='pekerjaan_waktu_"+alat_bahan+"'>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+alat_bahan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
            "\n" +
            "\n" +
            "\t\t\t\t\t\t\t\t\t</tr>";
        $("#tabel_alat").append(newRowX);
        let x=1;
        while(x<=60)
        {
            let data=alat_bahan+"___"+x;



            data=data.toString();

            console.log(data);
            var newColX="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"tambahAngka('"+data+"')\" id='"+data+"' class='nonActive2'></td>";
            $("#pekerjaan_waktu_"+alat_bahan).append(newColX);
            x++;
        }
    }


    function tambahAngka(id)
    {
        // alert(id);
        let col_=id;
        console.log("------");
        console.log(col_);
        console.log("------");
        // alert(col_);
        $("#id_column_alat").val(col_);
        $('#modalAlat').modal('show');

    }

    function addValueAlat()
    {
        let col_=$("#id_column_alat").val();
        let valuenya=$("#jumlah_alat").val();
        let satuan=$("#alat_satuan_jesi").val();
        let tanggal_alat=$("#tanggal_alat").val();
        // alert("Sukses Ditambahkan!");

        $("#"+col_).text(valuenya+"_"+satuan+"_"+tanggal_alat);
        var className = $("#"+col_).attr('class');
        $("#"+col_).removeClass("nonActive2");
        $("#"+col_).addClass("Active2");

        console.log(col_);
    }

    function savePerencanaan() {



        let i=0;
        let dataArray=new Array();
        let dataArray1=new Array();

        $(".Active").each(function (index, element) {



            dataArray[i]=$(this).attr("id");
            i++;
        });

        let x=0;
        $(".Active1").each(function (index, element) {

            dataArray1[x]=$(this).text();
            x++;
        });


        let nama_paket=$("#nama_paket1").val();
        let nilai_paket=$("#nilai_paket").val();
        let jumlah_tahap=$("#jumlah_tahap").val();
        let jenis_pekerjaan=$("#jenis_pelaksanaan").val();
        let masa_pelaksanaan=$("#masa_pelaksanaan").val();
        let lokasi=$("#lokasi").val();
        let tahun_anggaran=$("#tahun_anggaran").val();

        //Check jika kosong atau tidak
        console.log("a");
        if(nama_paket=="" || nilai_paket==""|| jumlah_tahap==""||jenis_pekerjaan==""||masa_pelaksanaan==""||lokasi==""||tahun_anggaran=="")
        {
            alert("Data Tidak Boleh Kosong!!");
        }
        else
        {
            console.log("b");
            //    Jika data berisi maka lanjut di proses
            //Tambahkan Laporan Perencanaan Ke Database


                    // console.log(data);

                    let max_id=id_perencanaan_hidden;
                    // alert(max_id);

                    $.ajax({
                        type : "POST",
                        url : "http://localhost/pupr_new/laporan_perencanaan/add_jenis_pekerjaan1",
                        cache:false,
                        async:false,
                        dataType : "text",
                        data : {"data" : dataArray,"data1":dataArray1,"id_paket":nama_paket,"tahun":tahun_anggaran,"id_lap_perencanaan":max_id},
                        success : function(data) {

                            // alert(data);
                            // console.log("add jenis pekerjaan");
                            // console.log(data);

                            // alert(data);

                        }
                    });

                    // console.log("-----");
                    // console.log(max_id);
                    // console.log("------");
                    // alert(max_id);

                    //    Tambahkan Jenis Pekerjaan

                    let dataArray2=new Array();
                    let zx=0;
                    $(".Active2").each(function (index, element) {

                        dataArray2[zx]=$(this).text();
                        console.log("log");
                        zx++;
                    });




                    let dataArray3=new Array();
                    let zz=0;
                    $(".Active2").each(function (index, element) {

                        dataArray3[zz]=$(this).attr("id");
                        console.log("jes");
                        zz++;
                    });

                    console.log(dataArray2);
                    console.log(dataArray3);

                    let nama_paket_baru=$("#nama_paket1").val();

                    //    Kemudian save menggunakan Ajax
                    $.ajax({
                        type: "POST",
                        async:false,
                        url: "http://localhost/pupr_new/user/perencanaan_alat1",
                        data: {"data":dataArray2,"minggu":dataArray3,"id_lap":max_id,"id_paket":nama_paket_baru,"tahun":tahun_anggaran},
                        dataType: "text",
                        cache:false,
                        success:
                            function(data){
                                console.log(data);
                                // alert(data);
                            }
                    });


                    //    Update Informasi Laporan Perencanaan
                    let u_lokasi=$("#u_lokasi").val();
                    let u_jenis_pekerjaan=$("#u_jenis_pekerjaan").val();
                    let u_panjang_penanganan=$("#u_panjang_penanganan").val();
                    let u_keterangan_dimensi=$("#u_keterangan_dimensi").val();
                    let u_keterangan=$("#u_keterangan").val();

                    let updateArray=[u_lokasi,u_jenis_pekerjaan,u_panjang_penanganan,u_keterangan_dimensi,u_keterangan];
                    $.ajax({
                        type: "POST",
                        async:false,
                        url: "http://localhost/pupr_new/user/update_info1",
                        data: {"data":updateArray,"id":id_perencanaan_hidden},
                        dataType: "text",
                        cache:false,
                        success:
                            function(data){
                                console.log("jesidisini");
                                console.log(data);
                                // alert(data);  //as a debugging message.
                            }
                    });

                    //    Ajax Untuk Menambahkan Tanda Tangan
                    let disetujui_oleh=$("#disetujui_oleh").val();
                    let diperiksa_oleh=$("#diperiksa_oleh").val();
                    $.ajax({
                        type: "POST",
                        async:false,
                        url: "http://localhost/pupr_new/user/ttd_perencanaan1",
                        data: {"id_perencanaan":max_id,"disetujui_oleh":disetujui_oleh,"diperiksa_oleh":diperiksa_oleh},
                        dataType: "text",
                        cache:false,
                        success:
                            function(data){
                                // alert(data);  //as a debugging message.
                                // console.log("hmmmm");
                                // console.log(data);
                                // alert(data);
                                // console.log("hmmmm");
                            }
                    });


                    alert("SUCCESS!!");


        }



    }


    //    Ambil data paket
    let uri_nya=$("#uri_nya").val();
    // alert(uri_nya);
    //   Getting Package Data

    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/user/detail_paket/",
        data: {"id_paket":uri_nya},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log(data);

                $("#nama_paket").val(data[0].id_paket+"_"+data[0].tahun);
                $("#jumlah_tahap").val(data[0].jumlah_tahap);
                $("#jenis_pelaksanaan").val(data[0].jenis_pekerjaan);
                $("#masa_pelaksanaan").val(data[0].masa_pelaksanaan);
                $("#lokasi").val(data[0].lokasi);
                $("#tahun_anggaran").val(data[0].tahun_anggaran);
            }
    });

    function savePerencanaan_()
    {


        $("#inputGroupFile01").each(function(){
            $(this);
            console.log(this);
            saveReadURL(this);
        });


    }

    function saveReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#inputGroupFile01").val();
            filename = filename.substring(filename.lastIndexOf('\\')+1);
            reader.onload = function(e) {
                debugger;
                $('#blah').attr('src', e.target.result);
                $('#blah').hide();
                $('#blah').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
            console.log(input.files[0]);
            //    Ajax Disini Untuk Menyimpan Data
            // $.ajax({
            //     url: 'http://localhost/pupr_new/user/upload',
            //     dataType: 'text',
            // 	async:false,
            //     cache: false,
            //     contentType: false,
            //     processData: false,
            //     data: form_data,
            //     type: 'post',
            //     success: function(php_script_response){
            //         alert(php_script_response);
            //     }
            // });
        }
        $(".alert").removeClass("loading").hide();
    }

</script>

<!--Ambil Data Yang Lama dari detil jenis pekerjaan-->
<script>
    let id_laporan="<?php echo $id ?>";
    console.log(id_laporan);
    $.ajax({
        type : "POST",
        url : "http://localhost/pupr_new/index.php/edit/edit_perencanaan",
        cache:false,
        async:false,
        dataType : "text",
        data : {"id_lap_perencanaan" : id_laporan},
        success : function(data) {

            let data1=JSON.parse(data);
            console.log(data1);
            //    Getting data Length
            data_length=data1.length;
            let x=0;

            while(x<data_length)
            {

                let pekerjaan_id=data1[x].id;
                let pekerjaan_text=data1[x].nama_jenis;
                console.log(pekerjaan_text);
                if($("#" +data1[x].id+pekerjaan_id).length == 0) {
                    //it doesn't exist

                    var newRow="\t<tr id='"+data1[x].id+pekerjaan_id+"'>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
                        "\n" +
                        "\n" +
                        "\t\t\t\t\t\t\t\t\t</tr>";

                    $("#tabel_jadwal").append(newRow);

                    var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
                        "\n" +
                        "\n" +
                        "\t\t\t\t\t\t\t\t\t</tr>";
                    $("#tabel_jumlah").append(newRow);
                }







                let y=1;

                while(y<=60)
                {
                    var data_=pekerjaan_id+"_"+y;
                    console.log(data_);
                    var data2=pekerjaan_id+"__"+y;
                    data_=data_.toString();
                    // data1=data1.toString();
                    // console.log(data);
                    let newCol="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai('"+data_+"')\" id='"+data_+"' class='nonActive'></td>";
                    var newCol1="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai1('"+data2+"')\" id='"+data2+"' class='nonActive1'></td>";
                    $("#"+data1[x].id+pekerjaan_id).append(newCol);
                    $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
                    // $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
                    y++;
                }


                x++;
            }

            //	Berikan dia warna

            let z=0;
            while(z<data_length)
            {
                let text_builder=data1[z].id+"_"+data1[z].minggu;
                let text_builder1=data1[z].id+"__"+data1[z].minggu;
                console.log(text_builder);

                let selector=$("#"+text_builder).css("background-color","black");
                let selector1=$("#"+text_builder1).text(data1[z].pekerja+"_"+data1[z].tanggal);

                $("#"+text_builder).removeClass("nonActive");
                $("#"+text_builder).addClass("Active");

                $("#"+text_builder1).removeClass("nonActive1");
                $("#"+text_builder1).addClass("Active1");

                z++;
            }

        }
    });
</script>


<script>
function generatePDF(id) {

    window.location="http://localhost/pupr_new/cetak_perencanaan/"+id;

}


let id_perencanaan_hidden=$("#id_perencanaan_hidden").val();
// alert(id_perencanaan_hidden);
//Ambil data dari paket


</script>



<script>
<!--	Generate Tabel Bahan Alat-->
$.ajax({
    type: "POST",
    url: "http://localhost/pupr_new/edit_perencanaan_user/bahan_alat",
    data: {"id_perencanaan":id_perencanaan_hidden},
    dataType: "text",
    cache:false,
    success:
        function(data){
            data=JSON.parse(data);
            console.log("jesi");
            console.log(data);
            console.log("jesi");

        //    Generate table rows

			let length= data.length;
			let i=0;
			while(i<length)
			{
                var newRowX="\t<tr id='pekerjaan_waktu_"+data[i].id_jenis_bahan_alat+"'>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+data[i].id_jenis_bahan_alat+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
                    "\n" +
                    "\n" +
                    "\t\t\t\t\t\t\t\t\t</tr>";
                $("#tabel_alat").append(newRowX);
                let x=1;
                while(x<=60)
                {
                    let data_=data[i].id_jenis_bahan_alat+"___"+x;



                    data_=data_.toString();


                    var newColX="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"tambahAngka('"+data_+"')\" id='"+data_+"' class='nonActive2'></td>";
                    $("#pekerjaan_waktu_"+data[i].id_jenis_bahan_alat).append(newColX);
                    x++;
                }

                // alert(data[i].id_jenis_bahan_alat+"___"+data[i].minggu);
                $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).text(data[i].jumlah+"_"+data[i].id_satuan+"_"+data[i].tanggal);
                $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).removeClass( "nonActive2" );
                $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).addClass( "Active2" );


			    i++;
			}
        }
});
</script>









</body>

</html>
