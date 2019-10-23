
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
	</style>


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<?php $this->load->view('component/sidebar'); ?>
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
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
							<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
						</a>
						<!-- Dropdown - User Information -->
						<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="#">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Profile
							</a>
							<a class="dropdown-item" href="#">
								<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
								Settings
							</a>
							<a class="dropdown-item" href="#">
								<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
								Activity Log
							</a>
							<div class="dropdown-divider"></div>

						</div>
					</li>

				</ul>

			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
				</div>

				<!-- Content Row -->
				<?php $this->load->view('admin_content/card_list');?>

				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Today Overview</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">




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
									<div class="col-sm-2"><input type="text" class="form form-control" id="nama_paket"></div>

								</div>
								<div class="row">
									<div class="col-sm-3">Nilai Paket</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="nilai_paket"></div>


								</div>
								<div class="row">
									<div class="col-sm-3">Jumlah Tahap</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="jumlah_tahap"></div>


								</div>
								<div class="row">
									<div class="col-sm-3">Jenis Pekerjaan</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="jenis_pelaksanaan"></div>


								</div>
								<div class="row">
									<div class="col-sm-3">Masa Pelaksanaan</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="masa_pelaksanaan"></div>


								</div>
								<div class="row">
									<div class="col-sm-3">Lokasi</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="lokasi"></div>

								</div>
								<div class="row">
									<div class="col-sm-3">Tahun Anggaran</div>
									<div class="col-sm-1">:</div>
									<div class="col-sm-2"><input type="text" class="form form-control" id="tahun_anggaran"></div>

								</div>
								<br/>
								<b>Jadwal Rencana Pelaksanaan Kegiatan</b>
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

        let x=1;

        while(x<=60)
		{
		    var data=pekerjaan_id+"_"+x;
		    data=data.toString();
		    console.log(data);
			var newCol="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai('"+data+"')\" id='"+data+"'></td>";
            $("#pekerjaan_id"+pekerjaan_id).append(newCol);
		    x++;
		}


	//    Add Row

	}

	function warnai(id)
	{
      alert(id);
      console.log(id);
	}
</script>

</body>

</html>
