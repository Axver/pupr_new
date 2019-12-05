
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
								<h6 class="m-0 font-weight-bold text-primary">Uplaod Gambar Perencanaan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<?php echo $error;?>
								<?php $id=$this->uri->segment("3"); ?>
								<?php echo form_open_multipart('upload/aksi_upload_perencanaan/'.$id);?>

								<input type="file" name="berkas" class="btn btn-info"/>

								<br /><br />

								<!-- Pilih Jenis Pekrjaan Disini -->
								<b>Pilih Jenis Pekerjaan</b>


                                <br/>

								<select id="jenis_pakerjaan" name="jenis_pekerjaan" class="form form-control">
								
								<?php
                                $id_perencanaan=$this->uri->segment("3");
								$data11=$this->db->query("SELECT * FROM detail_jenis_pekerjaan 
								INNER JOIN jenis_pekerjaan ON detail_jenis_pekerjaan.id=jenis_pekerjaan.id
								WHERE id_lap_perencanaan='$id_perencanaan' GROUP BY detail_jenis_pekerjaan.id")->result();


								$count=count($data11);
								$i=0;


								while($i<$count)
								{

									?>

                                    <option value="<?php echo $data11[$i]->id ?>"><?php echo $data11[$i]->nama_jenis ?></option>
                                    

									<?php


									$i++;
								}

								?>
								
								</select>
                                <br/>
								
								<b>Panjang Penanganan:</b>
								<input type="text" id="panjang_penanganan" name="panjang_penanganan" class="form form-control">
								<br/>

								
								<b>Dimensi: p,l,t</b>
								<br/>

								<input type="text" id="dimensi" name="dimensi" class="form form-control">
								<br/>

								<input type="submit" value="upload" class="btn btn-info"/>

								</form>

								<br/>
								<br/>

								<b>Daftar Gambar</b>


								<table id="example" class="display" style="width:100%">
									<thead>
									<tr>
										<th>Name</th>
										<th>Gambar</th>
										<th>Delete</th>

									</tr>
									</thead>
									<tbody>
									<?php
//									echo $this->uri->segment("3");
									$gambar=$this->db->get_where("gambar_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("3")))->result();

									$count=count($gambar);

									$i=0;

									while($i<$count)

									{
										?>
										<tr>
											<td><?php echo $gambar[$i]->gambar ?></td>
											<td><img style="width:200px;" src="<?php echo base_url('gambar/'.$gambar[$i]->gambar) ?>"></td>
											<td><button class="btn btn-danger" onclick="hapus('<?php echo $gambar[$i]->id_lap_perencanaan; ?>','<?php echo $gambar[$i]->gambar; ?>')">Delete</button></td>
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

                                function hapus(per,gam)
								{


                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost/pupr_new/index.php/upload/hapus1",
                                        data: {"perencanaan":per,"nama":gam},
                                        dataType: "text",
                                        cache:false,
                                        success:
                                            function(data){
                                                location.reload(true);
                                            }
                                    });
								}
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
</script>






</body>

</html>
