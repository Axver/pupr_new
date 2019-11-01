
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


				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Report Minggu</h6>
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
										<div class="row">
											Nama Paket:
										</div>
										<div class="row">
											Jenis Pekerjaan:
										</div>
										<div class="row">
											Lokasi:
										</div>
										<div class="row">
											Pagu :
										</div>
									</div>

									<div class="col-sm-6" style="border:2px solid black;">
										<div class="row">Progres Pekerjaan:</div>
										<div class="row">Progres Fisik Periode Lalu:</div>
										<div class="row">Progres Fisik Minggu 1:</div>
										<div class="row">Progres Selanjutnya:</div>
										<div class="row">Progres Fisik Total:</div>
									</div>
								</div>
<!--								Tabel Disini-->
								<table class="tg table" >
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" colspan="15">Tahap 1</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="5">Bulan X</td>
										<td class="tg-baqh" colspan="5">Bulan X</td>
										<td class="tg-baqh" colspan="5">Bulan X</td>
									</tr>
									<tr>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
									</tr>
									<tr>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
										<td class="tg-0lax"></td>
									</tr>
								</table>

								<b>Rekapilutasi Pekerja Minggu 1</b>
								<table class="tg table">
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-cly1" colspan="7"></th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">(Bulan) Minggu Ke X</td>
									</tr>
									<tr>
										<td class="tg-cly1">Hari 1</td>
										<td class="tg-cly1">Hari 2</td>
										<td class="tg-cly1">Hari 3</td>
										<td class="tg-cly1">Hari 4</td>
										<td class="tg-cly1">Hari 5</td>
										<td class="tg-cly1">Hari 6</td>
										<td class="tg-cly1">Hari 7</td>
									</tr>
									<tr>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
									</tr>
								</table>
								<b>Rekapitulasi Penggunaan Bahan/Alat Minggu Ke X</b>
								<table class="tg table">
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-baqh" rowspan="3">Satuan</th>
										<th class="tg-cly1" colspan="7"></th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">(Bulan) Minggu Ke X</td>
									</tr>
									<tr>
										<td class="tg-cly1">Hari 1</td>
										<td class="tg-cly1">Hari 2</td>
										<td class="tg-cly1">Hari 3</td>
										<td class="tg-cly1">Hari 4</td>
										<td class="tg-cly1">Hari 5</td>
										<td class="tg-cly1">Hari 6</td>
										<td class="tg-cly1">Hari 7</td>
									</tr>
									<tr>
										<td class="tg-cly1"></td>
										<td class="tg-0lax"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
									</tr>
								</table>

								<div class="row">
									<div class="col-sm-2"></div>
									<div class="col-sm-2"><b>Dibuat Oleh</b></div>
									<div class="col-sm-2"></div>
									<div class="col-sm-2"></div>
									<div class="col-sm-2"><b>Di Tandatangani Oleh</b></div>
									<div class="col-sm-2"></div>
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






</body>

</html>
