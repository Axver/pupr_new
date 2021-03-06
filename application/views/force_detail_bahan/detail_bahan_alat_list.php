
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

								<b style="color:darkgreen">Laporan Harian</b>

								<div class="row" style="margin-bottom: 10px">
									<div class="col-md-4">
										<?php echo anchor(site_url('force_detail_bahan/create'),'Create', 'class="btn btn-primary"'); ?>
									</div>
									<div class="col-md-4 text-center">
										<div style="margin-top: 8px" id="message">
											<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
										</div>
									</div>
									<div class="col-md-1 text-right">
									</div>
									<div class="col-md-3 text-right">
										<form action="<?php echo site_url('force_detail_bahan/index'); ?>" class="form-inline" method="get">
											<div class="input-group">
												<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
												<span class="input-group-btn">
                            <?php
							if ($q <> '')
							{
								?>
								<a href="<?php echo site_url('force_detail_bahan'); ?>" class="btn btn-default">Reset</a>
								<?php
							}
							?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
											</div>
										</form>
									</div>
								</div>
								<table class="table table-bordered" style="margin-bottom: 10px">
									<tr>
										<th>No</th>
										<th>Id Jenis Bahan Alat</th>
										<th>Id Satuan</th>
										<th>Jumlah</th>
										<th>Action</th>
									</tr><?php
									foreach ($force_detail_bahan_data as $force_detail_bahan)
									{
										?>
										<tr>
											<td width="80px"><?php echo ++$start ?></td>
											<td><?php echo $force_detail_bahan->id_jenis_bahan_alat ?></td>
											<td><?php echo $force_detail_bahan->id_satuan ?></td>
											<td><?php echo $force_detail_bahan->jumlah ?></td>
											<td style="text-align:center" width="200px">
												<?php
												echo anchor(site_url('force_detail_bahan/read/'.$force_detail_bahan->id_lap_perencanaan),'Read');
												echo ' | ';
												echo anchor(site_url('force_detail_bahan/update/'.$force_detail_bahan->id_lap_perencanaan),'Update');
												echo ' | ';
												echo anchor(site_url('force_detail_bahan/delete/'.$force_detail_bahan->id_lap_perencanaan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
												?>
											</td>
										</tr>
										<?php
									}
									?>
								</table>
								<div class="row">
									<div class="col-md-6">
										<a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
									</div>
									<div class="col-md-6 text-right">
										<?php echo $pagination ?>
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
    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/admin/hitung/",
        data: {"id": "1"},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log(data);
                console.log(data.harian[0].harian);
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: ['Paket', 'Laporan Harian', 'Lapoan Pengawasan', 'Laporan Perencanaan'],
                        datasets: [{
                            label: 'Jumlah Laporan',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: [data.paket[0].paket, data.harian[0].harian, data.pengawasan[0].pengawasan, data.perencanaan[0].perencanaan]
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });
            }
    });
</script>



</body>

</html>
