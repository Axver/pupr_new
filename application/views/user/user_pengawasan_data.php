
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
								<h6 class="m-0 font-weight-bold text-primary">Today Overview</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">


								<table id="example" class="display" style="width:100%">
									<thead>
									<tr>
										<th>No</th>
										<th>Id Perencanaan</th>
										<th>Minggu</th>
										<th>Perencanaan</th>
										<th>View</th>
										<th>Edit</th>
										<th>Image</th>
										<th>Lampiran</th>


									</tr>
									</thead>
									<tbody>

									<?php
									$this->db->select('*');
									$this->db->from('lap_pengawasan');
									$this->db->join('detail_paket', 'lap_pengawasan.id_paket = detail_paket.id_paket');
									$this->db->join('lap_perencanaan', 'lap_pengawasan.id_lap_perencanaan = lap_perencanaan.id_lap_perencanaan');
									$this->db->where('detail_paket.nip', $this->session->userdata("nip"));


									$query = $this->db->get()->result();
									$length=count($query);
									$i=0;
									while($i<$length)
									{
										?>
										<tr>
                                         <td ><?php echo $i+1; ?></td>
											<td><?php echo $query[$i]->id_lap_pengawasan; ?></td>
											<td><?php echo $query[$i]->minggu; ?></td>
											<td><?php echo $query[$i]->keterangan; ?></td>
											<td><button class="btn btn-info" onclick="viewLap('<?php echo $query[$i]->id_lap_pengawasan.",".$query[$i]->id_lap_perencanaan.",".$query[$i]->minggu; ?>')">View</button></td>
											<td><button class="btn btn-warning" onclick="editLap('<?php echo $query[$i]->id_lap_pengawasan.",".$query[$i]->id_lap_perencanaan.",".$query[$i]->minggu; ?>')">Edit</button></td>
											<td><button class="btn btn-danger" onclick="image('<?php echo $query[$i]->id_lap_pengawasan.",".$query[$i]->id_lap_perencanaan.",".$query[$i]->minggu; ?>')">Upload</button></td>
											<td><button class="btn btn-success" onclick="lamp('<?php echo $query[$i]->id_lap_pengawasan.",".$query[$i]->id_lap_perencanaan.",".$query[$i]->minggu; ?>')">Lampiran</button></td>
										</tr>
									<?php

										$i++;
									}

									?>




									</tbody>
								</table>

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

	function viewLap(id)
	{
	    let data=id.split(",");
	    // alert(id);
	    window.location='http://localhost/pupr_new/user_pengawasan_data/view/'+data[0]+"/"+data[1]+"/"+data[2];
	}

    function editLap(id)
    {
        let data=id.split(",");
        // alert(id);
        window.location='http://localhost/pupr_new/user_pengawasan_data/edit/'+data[0]+"/"+data[1]+"/"+data[2];
    }

    function lamp(id)
    {
        let data=id.split(",");
        // alert(id);
        window.location='http://localhost/pupr_new/user_pengawasan_data/lampiran/'+data[0]+"/"+data[1]+"/"+data[2];
    }

    function image(id)
    {
        let data=id.split(",");
        // alert(id);
        window.location='upload/pengawasan/'+data[0]+"/"+data[1]+"/"+data[2];
    }
</script>








</body>

</html>
