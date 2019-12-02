
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


				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Paket <?php echo $this->uri->segment("3"); ?></h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<div class="row">
									<div class="col-sm-4"><a href="../perencanaan/<?php echo $this->uri->segment('3'); ?>">Laporan Perencanaan</a> </div>
									<div class="col-sm-4"><a href="../user_harian_baru/<?php echo $this->uri->segment('3'); ?>">Laporan Harian</a></div>
									<div class="col-sm-4"><a href="../user_pengawasan_create_baru/<?php echo $this->uri->segment('3'); ?>">Laporan Pengawasan</a></div>

								</div>

								<br>
								<b>Grafik</b>
								<input type="hidden" id="id_paket_hidden" value="<?php echo $this->uri->segment('3'); ?>">
								<div class="panel panel-info">
									<div class="panel-head"></div>
									<div class="panel-body">
										<div class="row">
										<div class="col-sm-6">
										<canvas id="bar-chart" width="800" height="450"></canvas></div>

										<div class="col-sm-6">

<canvas id="bar-chart1" width="800" height="450"></canvas>
</div>
										</div>

									
										<script>
//Ajaxnya
let id_paket_hidden=$("#id_paket_hidden").val();
// alert(id_paket_hidden);
$.ajax({
    type: "POST",
    url: "http://localhost/pupr_new/user/chart",
    data: {"id_paket":id_paket_hidden},
    dataType: "text",
    cache:false,
    success:
        function(data){
            data=JSON.parse(data);
            console.log(data);
            new Chart(document.getElementById("bar-chart"), {
                type: 'pie',
                data: {
                    labels: ["Laporan Harian", "Laporan Perencanaan","Laporan Pengawasan"],
                    datasets: [
                        {
                            label: "Laporan",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                            data: [data.harian,data.perencanaan,data.pengawasan]
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Jumlah Laporan Dikerjakan'
                    }
                }
            });


			new Chart(document.getElementById("bar-chart1"), {
                type: 'line',
                data: {
                    labels: ["Laporan Harian", "Laporan Perencanaan","Laporan Pengawasan"],
                    datasets: [
                        {
                            label: "Laporan",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                            data: [data.harian,data.perencanaan,data.pengawasan]
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Jumlah Laporan Dikerjakan'
                    }
                }
            });

        }
});
                                            // Bar chart

										</script>
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








</body>

</html>
