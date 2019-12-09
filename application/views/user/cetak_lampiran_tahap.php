
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
				<?php $this->load->view('admin_content/card_list_user');?>

				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">List Lampiran Pertahap</h6>
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
										<th>Bulan Awal</th>
										<th>Bulan Akhir</th>
										<th>Tahun</th>
										<th>Paket</th>
                                        <th>Perencanaan</th>
                                        <th>Edit</th>
                                        <th>Cetak</th>

									</tr>
									</thead>
									<tbody>

									<?php
									 $data=$this->db->query("SELECT * FROM lampiran_tahap
									 INNER JOIN jenis_pekerjaan ON lampiran_tahap.jenis_pekerjaan=jenis_pekerjaan.id
									 INNER JOIN paket ON lampiran_tahap.id_paket=paket.id_paket")->result();

									 $count=count($data);
									 $i=0;

									 while($i<$count)
									 {

										if($data[$i]->bulan_awal==1)
										{
											$dari="Januari";
										} else	if($data[$i]->bulan_awal==2)
										{
											$dari="Februari";
										}
										else	if($data[$i]->bulan_awal==3)
										{
											$dari="Maret";
										}
										else	if($data[$i]->bulan_awal==4)
										{
											$dari="April";
										}
										else	if($data[$i]->bulan_awal==5)
										{
											$dari="Mei";
										}
										else	if($data[$i]->bulan_awal==6)
										{
											$dari="Juni";
										}
										else	if($data[$i]->bulan_awal==7)
										{
											$dari="Juli";
										}
										else	if($data[$i]->bulan_awal==8)
										{
											$dari="Agustus";
										}
										else	if($data[$i]->bulan_awal==9)
										{
											$dari="September";
										}
										else	if($data[$i]->bulan_awal==10)
										{
											$dari="Oktober";
										}
										else	if($data[$i]->bulan_awal==11)
										{
											$dari="November";
										}
										else	if($data[$i]->bulan_awal==12)
										{
											$dari="Desember";
										}


										if($data[$i]->bulan_akhir==1)
										{
											$daru="Januari";
										} else	if($data[$i]->bulan_akhir==2)
										{
											$daru="Februari";
										}
										else	if($data[$i]->bulan_akhir==3)
										{
											$daru="Maret";
										}
										else	if($data[$i]->bulan_akhir==4)
										{
											$daru="April";
										}
										else	if($data[$i]->bulan_akhir==5)
										{
											$daru="Mei";
										}
										else	if($data[$i]->bulan_akhir==6)
										{
											$daru="Juni";
										}
										else	if($data[$i]->bulan_akhir==7)
										{
											$daru="Juli";
										}
										else	if($data[$i]->bulan_akhir==8)
										{
											$daru="Agustus";
										}
										else	if($data[$i]->bulan_akhir==9)
										{
											$daru="September";
										}
										else	if($data[$i]->bulan_akhir==10)
										{
											$daru="Oktober";
										}
										else	if($data[$i]->bulan_akhir==11)
										{
											$daru="November";
										}
										else	if($data[$i]->bulan_akhir==12)
										{
											$daru="Desember";
										}
                                        ?>
                                        <tr>
										<td><?php echo $dari; ?></td>
										<td><?php echo $daru; ?></td>
										<td><?php echo $data[$i]->tahun; ?></td>
										<td><?php echo $data[$i]->nama; ?></td>
										<td><?php echo $data[$i]->id_lap_perencanaan; ?></td>
										<td><button>Edit</button></td>
										<td><button onclick="cetak('<?php echo $data[$i]->bulan_awal; ?>,<?php echo $data[$i]->bulan_akhir; ?>,<?php echo $data[$i]->id_lap_perencanaan; ?>')">Cetak</button></td>
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
	function lihatData(data)
	{

	    window.location="http://localhost/pupr_new/user/lihat_paket/"+data;
	}



	function cetak(data)
	{

		data=data.split(",");
		console.log(data);

		let bulan_awal=data[0];
		let bulan_akhir=data[1];
		let perencanaan=data[2];


		window.location="http://localhost/pupr_new/lampiran_tahap/cetak_asli/"+bulan_awal+"/"+bulan_akhir+"/"+perencanaan;


	}
</script>






</body>

</html>
