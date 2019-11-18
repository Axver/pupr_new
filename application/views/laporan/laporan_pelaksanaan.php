
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
		td{
			border:2px solid black;
		}

		tr{
			border:2px solid black;
		}

		th{
			border:2px solid black;
		}


		table {
			border:2px solid black;
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
								<h6 class="m-0 font-weight-bold text-primary">Laporan Pelaksanaan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">
<!--                            Tabel Disini-->
								<br/>
								<button class="btn btn-info">Add Row</button>
								<br/>

								<b>Jadwal Pelaksanaan Pekerjaan</b>

								<table class="table">
									<tr>
										<th class="tg-lboi" rowspan="4">Jenis Pekerjaan</th>
										<th class="tg-9wq8" colspan="60">Tahap/Bulan/Minggu</th>
									</tr>
									<tr>
										<td class="tg-9wq8" colspan="20">Tahap 1</td>
										<td class="tg-c3ow" colspan="20">Tahap 2</td>
										<td class="tg-c3ow" colspan="20">Tahap 3</td>
									</tr>
									<tr>
										<td class="tg-0pky" colspan="5">Januari</td>
										<td class="tg-0pky" colspan="5">Februari</td>
										<td class="tg-0pky" colspan="5">Maret</td>
										<td class="tg-0pky" colspan="5">April</td>
										<td class="tg-0pky" colspan="5">Mei</td>
										<td class="tg-0pky" colspan="5">Juni</td>
										<td class="tg-0pky" colspan="5">Juli</td>
										<td class="tg-0pky" colspan="5">Agustus</td>
										<td class="tg-0pky" colspan="5">September</td>
										<td class="tg-0pky" colspan="5">Oktober</td>
										<td class="tg-0lax" colspan="5">November</td>
										<td class="tg-0pky" colspan="5">Desember</td>
									</tr>
									<tr>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
									<tr>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
								</table>

<!--								Rekapitulasi Jumlah Pekerja-->
								<br/>
								<button class="btn btn-info">Add Row</button>
								<br/>

								<b>Rekapitulasi Jumlah Pekerja</b>

								<table class="table">
									<tr>
										<th class="tg-lboi" rowspan="4">Jenis Pekerjaan</th>
										<th class="tg-9wq8" colspan="60">Tahap/Bulan/Minggu</th>
									</tr>
									<tr>
										<td class="tg-9wq8" colspan="20">Tahap 1</td>
										<td class="tg-c3ow" colspan="20">Tahap 2</td>
										<td class="tg-c3ow" colspan="20">Tahap 3</td>
									</tr>
									<tr>
										<td class="tg-0pky" colspan="5">Januari</td>
										<td class="tg-0pky" colspan="5">Februari</td>
										<td class="tg-0pky" colspan="5">Maret</td>
										<td class="tg-0pky" colspan="5">April</td>
										<td class="tg-0pky" colspan="5">Mei</td>
										<td class="tg-0pky" colspan="5">Juni</td>
										<td class="tg-0pky" colspan="5">Juli</td>
										<td class="tg-0pky" colspan="5">Agustus</td>
										<td class="tg-0pky" colspan="5">September</td>
										<td class="tg-0pky" colspan="5">Oktober</td>
										<td class="tg-0lax" colspan="5">November</td>
										<td class="tg-0pky" colspan="5">Desember</td>
									</tr>
									<tr>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
									<tr>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
								</table>

								<br/>
								<button class="btn btn-info">Add Row</button>
								<br/>

								<b>Rekapitulasi Penggunaan Bahan dan Alat</b>

								<table class="table">
									<tr>
										<th class="tg-lboi" rowspan="4">Jenis Pekerjaan</th>
										<th class="tg-9wq8" colspan="60">Tahap/Bulan/Minggu</th>
									</tr>
									<tr>
										<td class="tg-9wq8" colspan="20">Tahap 1</td>
										<td class="tg-c3ow" colspan="20">Tahap 2</td>
										<td class="tg-c3ow" colspan="20">Tahap 3</td>
									</tr>
									<tr>
										<td class="tg-0pky" colspan="5">Januari</td>
										<td class="tg-0pky" colspan="5">Februari</td>
										<td class="tg-0pky" colspan="5">Maret</td>
										<td class="tg-0pky" colspan="5">April</td>
										<td class="tg-0pky" colspan="5">Mei</td>
										<td class="tg-0pky" colspan="5">Juni</td>
										<td class="tg-0pky" colspan="5">Juli</td>
										<td class="tg-0pky" colspan="5">Agustus</td>
										<td class="tg-0pky" colspan="5">September</td>
										<td class="tg-0pky" colspan="5">Oktober</td>
										<td class="tg-0lax" colspan="5">November</td>
										<td class="tg-0pky" colspan="5">Desember</td>
									</tr>
									<tr>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
									<tr>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-lboi"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
										<td class="tg-0pky"></td>
									</tr>
								</table>
								<br/>
								<button class="btn btn-info"> Add Data</button>
								<br/>

								<table class="table" style="width:100%">
									<tr>
										<th class="tg-cly1">Sketsa Kerja</th>
										<th class="tg-cly1">Lokasi</th>
										<th class="tg-0lax">Jenis Pekerjaan</th>
										<th class="tg-0lax">Panjang Penanganan</th>
										<th class="tg-0lax">Keterangan Dimensi</th>
										<th style="width:500px;" class="tg-0lax">Ket</th>
									</tr>
									<tr style="height:200px;">
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
									</tr>
								</table>

								<br/>
								<button class="btn btn-info">Save</button>
								<button class="btn btn-danger">Cancel</button>
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



</body>

</html>
