
<?php

//	echo $this->session->userdata("nip");
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==1)
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
	<?php $this->load->view('component/sidebar'); ?>
	<?php $this->load->view('modal/add_waktu'); ?>
	<?php $this->load->view('modal/add_alat_bahan'); ?>
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
							<div class="card-body">




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
											<div class="col-sm-8"><select id="nama_paket" class="form form-control">
													<?php
													$jum_paket=count($paket);
													$i=0;
													while($i<$jum_paket)
													{
														?>
														<option value="<?php echo $paket[$i]->id_paket.'_'.$paket[$i]->tahun; ?>"><?php echo $paket[$i]->nama ?></option>
													<?php

														$i++;
													}
													?>
												</select>
											    <a href="#">New</a>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-3">Nilai Paket</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="nilai_paket"></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Jumlah Tahap</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="jumlah_tahap"></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Jenis Pekerjaan</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="jenis_pelaksanaan"></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Masa Pelaksanaan</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="masa_pelaksanaan"></div>


										</div>
										<div class="row">
											<div class="col-sm-3">Lokasi</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="lokasi"></div>

										</div>
										<div class="row">
											<div class="col-sm-3">Tahun Anggaran</div>
											<div class="col-sm-1">:</div>
											<div class="col-sm-8"><input type="text" class="form form-control" id="tahun_anggaran"></div>

										</div>
									</div>
									<div class="col-sm-6" id="gambar">
										<b>Sketsa Kerja</b>

										<div class="contain animated bounce">
											<form id="form1" runat="server">
												<div class="alert"></div>
												<div id='img_contain'><img id="blah" align='middle' src="http://www.clker.com/cliparts/c/W/h/n/P/W/generic-image-file-icon-hi.png" alt="your image" title=''/></div>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01">
														<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
													</div>
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
									    <a href="#">New</a>
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
										<a href="#">New</a>
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
									<b>Informasi</b>
									<br/>
									<label for="">Lokasi</label>
									<input type="text" class="form form-control" placeholder="Lokasi">
									<label for="">Jenis Pekerjaan</label>
									<input type="text" class="form form-control" placeholder="Jenis Pekerjaan">
									<label for="">Panjang Penanganan</label>
									<input type="text" class="form form-control" placeholder="Panjang Penanganan">
									<label for="">Keterangan Dimensi</label>
									<input type="text" class="form form-control" placeholder="Keterangan Dimensi">
									<label for="">Keterengan</label>
									<input type="text" class="form form-control" placeholder="Keterangan">



								</div>

								<div class="col-sm-6" id="border">
									<b>Tandatangan</b>
									<a href="#">New</a>
									<br/>
									Disetujui Oleh:
									<select class="form form-control">

									</select>
									<br/>
									<b>Diperiksa Oleh:</b>
									<select class="form form-control">

									</select>
									<br/>
									<b>Dibuat Oleh:</b>
									<select class="form form-control">

									</select>

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
        alert(id_col);
        id_col=id_col.replace('_','__');

        $("#"+id_col).text("");
    }

    $("#inputGroupFile01").change(function(event) {
        RecurFadeIn();
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
        alert("Sukses Ditambahkan!");
	    $("#"+col_).text(valuenya);

		console.log(col_);
	}

	function savePerencanaan() {



        let i=0;
        let dataArray=new Array();
        let dataArray1=new Array();

        $(".Active").each(function (index, element) {
            // element == this
            // if ($(this).attr("src") == "style/EmptyStar.png") {
            //     return false;
            // }
            // else {
            //     score = score + 1;
            // };


			dataArray[i]=$(this).attr("id");
			i++;
        });

        let x=0;
        $(".Active1").each(function (index, element) {

            dataArray1[x]=$(this).text();
            x++;
        });


        let nama_paket=$("#nama_paket").val();
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
            $.ajax({
                type : "POST",
                url : "http://localhost/pupr_new/laporan_perencanaan/add_perencanaan",
                cache:false,
				async:false,
                dataType : "text",
                data : {"id_paket" : nama_paket, "tahun" : tahun_anggaran},
                success : function(data) {

                    // console.log(data);
					let max_id=data;

                    $.ajax({
                        type : "POST",
                        url : "http://localhost/pupr_new/laporan_perencanaan/add_jenis_pekerjaan",
                        cache:false,
                        async:false,
                        dataType : "text",
                        data : {"data" : dataArray,"data1":dataArray1,"id_paket":nama_paket,"tahun":tahun_anggaran,"id_lap_perencanaan":max_id},
                        success : function(data) {

                           alert(data);

                        }
                    });

                }
            });
        //    Tambahkan Jenis Pekerjaan

		}



    }
</script>

</body>

</html>
