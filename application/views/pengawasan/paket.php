
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


				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Paket Users</h6>
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
										<th>Id Paket</th>
										<th>Tahun</th>
										<th>Alihkan Tugas</th>

									</tr>
									</thead>
									<tbody>

									<?php
									$data=$this->db->get_where("detail_paket",array("nip"=>$this->uri->segment("3")))->result();
									$count=count($data);
									$i=0;

									while($i<$count)
									{
										?>
										<tr>
											<td><?php echo $data[$i]->id_paket; ?></td>
											<td><?php echo $data[$i]->tahun; ?></td>
											<td><button class="btn btn-info" onclick="alihkan('<?php echo $data[$i]->id_paket; ?>')">Alihkan</button></td>
										</tr>
									<?php

										$i++;
									}
									?>


									</tbody>

									<script>
										function alihkan(id)
										{
										    // alert(id);
										    $("#id_paket_alih").val(id);

										    //Ganti Ke Nama
                                            $.ajax({
                                                type: "POST",
                                                url: "http://localhost/pupr_new/pengawasan/nama",
												async:false,
                                                data: {"id_paket":id},
                                                dataType: "text",
                                                cache:false,
                                                success:
                                                    function(data){
                                                        // alert(data);  //as a debugging message.
                                                        data=JSON.parse(data);
                                                        console.log(data);
                                                        let length=data.length;
                                                        let i=0;

                                                        let ganti_nama;

                                                        while(i<length)
                                                        {
                                                            ganti_nama=data[i].nama;
                                                            // alert(ganti_nama);
                                                            $("#id_paket_alih1").val(ganti_nama);


                                                            i++;
                                                        }
                                                    }
                                            });


										    $("#modalAlih").modal("show");
										//
										}


										function alihkanPaket() {

										    let id_paket_alih=$("#id_paket_alih").val();
										    let id_user_alih=$("#id_user_alih").val();

										    // alert(id_paket_alih);
										    // alert(id_user_alih);
										    //Kirim dengan Ajax
                                            $.ajax({
                                                type: "POST",
                                                url: "http://localhost/pupr_new/pengawasan/alih_paket",
                                                data: {"id_paket":id_paket_alih,"id_user":id_user_alih},
                                                dataType: "text",
                                                cache:false,
                                                success:
                                                    function(data){
                                                          //as a debugging message.
                                                        location.reload(true);
                                                    }
                                            });
                                            $("#modalAlih").modal("hide");
										    // alert("test");

                                        }
									</script>
								</table>

<!--								Modal Alohkan Paket-->

								<!-- Modal -->
								<div class="modal fade" id="modalAlih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Alihkan Paket</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Paket:
												<input type="text" class="form form-control" id="id_paket_alih1" disabled>
												<input type="hidden" class="form form-control" id="id_paket_alih" disabled>
												Kepada User:
												<select id="id_user_alih" class="form form-control">
													<?php
													$datanya=$this->db->get("account")->result();

													$count=count($datanya);
													$i=0;

													while($i<$count)
													{
														?>
														<option value="<?php echo $datanya[$i]->nip; ?>"><?php echo $datanya[$i]->nama; ?></option>
													<?php

														$i++;
													}
													?>
												</select>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" onclick="alihkanPaket()">Save changes</button>
											</div>
										</div>
									</div>
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




</script>



</body>

</html>
