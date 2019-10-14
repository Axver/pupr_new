
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
	<?php $this->load->view('modal/add_perencanaan') ?>
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
								<h6 class="m-0 font-weight-bold text-primary">Laporan Perencanaan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<button style="margin:10px;" class="btn btn-info" data-toggle="modal" data-target="#add_perencanaan">Tambah</button>
								<table class="table table-bordered" id="perencanaan" style="margin-bottom: 10px">
									<thead>
									<tr>
										<th>No</th>
										<th>Tukang</th>
										<th>Paket</th>
										<th>Pekerja</th>
										<th>Action</th>

									</tr>
									</thead>


									<tbody>
									<?php
									$count=count($tabel);
									$i=0;
									while($i<$count)
									{
										?>
										<tr>
											<td><?php echo $i+1; ?></td>
											<td><?php echo $tabel[$i]->tukang; ?></td>
											<td><?php echo $informasi['id']; ?></td>
											<td><?php echo $tabel[$i]->pekerja; ?></td>
											<td><button class="btn btn-info" onclick="jenis_pekerjaan(<?php echo $tabel[$i]->id_lap_perencanaan; ?>)">Show</button>
											<button class="btn btn-info">Cetak</button>
											</td>

										</tr>
									<?php
										$i++;
									}


									?>

									</tbody>



								</table>



								<div id="pekerja_container" class="pekerja">
									Informasi Pekerja


								</div>

								<script>
                                    $(document).ready( function () {
                                        $('#perencanaan').DataTable();

                                    } );

                                    function jenis_pekerjaan(id_perencanaan)
									{
									    alert("Showing: "+id_perencanaan);
									    removeContent();
									    // alert(id_perencanaan);
                                        $('.pekerja').append("<div id='data_"+id_perencanaan+"'></div>");
                                        $('#data_'+id_perencanaan).append("<select class='form form-control' id='select_data'></select>");
                                        $('#data_'+id_perencanaan).append("<input type='text' class='form form-control' id='tahun1' placeholder='Tahun'>");
                                        $('#data_'+id_perencanaan).append("<input type='text' class='form form-control' id='tukang1' placeholder='Jumlah Tukang'>");
                                        $('#data_'+id_perencanaan).append("<input type='text' class='form form-control' id='pekerja1' placeholder='Jumlah Pekerja'>");
                                        $('#data_'+id_perencanaan).append("<button class='btn btn-info' onclick='savePekerjaan("+id_perencanaan+")'>Add</button>");


                                        $.ajax({url: "<?php echo base_url('index.php/pekerjaan') ?>",async:false, success: function(result){
                                               result=JSON.parse(result);
                                                console.log(result);
                                                // alert(result.length);
												length=result.length;
                                                let i=0;
                                                while(i<length)
												{
                                                    $('#select_data').append("<option value='"+result[i]['id']+"'>"+result[i]['nama_jenis']+"</option>");
												    i++;
												}


                                                $.ajax({url: "<?php echo base_url('index.php/pekerjaan/data_pekerjaan') ?>",async:false, success: function(result){
                                                       result=JSON.parse(result);
                                                       console.log(result[0].id);
                                                       length=result.length;
                                                       console.log(length);
                                                        $('#data_'+id_perencanaan).append("<br/><h3>Detil Pekerjaan</h3>");
                                                    //    Generate Table
                                                        $('#data_'+id_perencanaan).append("<table class='table table-bordered' id='tabel_pekerjaan'>\t\t<thead>\n" +
                                                            "\t\t\t\t\t\t\t\t\t<tr>\n" +
                                                            "\t\t\t\t\t\t\t\t\t\t<th>Id</th>\n" +
                                                            "\t\t\t\t\t\t\t\t\t\t<th>Tahun</th>\n" +
                                                            "\t\t\t\t\t\t\t\t\t\t<th>Tukang</th>\n" +
                                                            "\t\t\t\t\t\t\t\t\t\t<th>Pekerja</th>\n" +
                                                            "\t\t\t\t\t\t\t\t\t\t<th>Action</th>\n" +
                                                            "\n" +
                                                            "\t\t\t\t\t\t\t\t\t</tr>\n" +
                                                            "\t\t\t\t\t\t\t\t\t</thead><tbody></tbody></table>");

                                                        let i=0;
                                                        while (i<length)
														{
                                                            newRowContent = "<tr><td>" + result[i].id + "</td><td>" + result[i].tahun + "</td><td>" + result[i].tukang + "</td><td>"+result[i].pekerja+"</td><td><button class='btn btn-danger'>Delete</button></td></tr>";
                                                            $("#tabel_pekerjaan tbody").append(newRowContent);
														    i++;
														}


                                                        $('#tabel_pekerjaan').DataTable();


                                                        console.log(result);
                                                    }});

                                        }});

                                        // $.each(data, function (index, value) {
                                        //     $('#data_'+id_perencanaan+'').append($('<option/>', {
                                        //         value: index,
                                        //         text : value
                                        //     }));
                                        // });

                                    }

									function removeContent()
									{
									    $(".pekerja").empty();
									}

									function savePekerjaan(id_pekerjaan)
									{

									    let id_paket;
									    id_paket=window.location.href;
									    id_paket=id_paket.split("/");
									    let length=id_paket.length;
									    id_paket=id_paket[length-1];
									    let tahun=document.getElementById("tahun1").value;
									    let tukang=document.getElementById("tukang1").value;
                                        let pekerja=document.getElementById("pekerja1").value;
                                        let id=document.getElementById("select_data").value;

                                        console.log("-----");
                                        console.log(id);
                                        console.log(id_paket);
                                        console.log(id_pekerjaan);
                                        console.log(tahun);
                                        console.log(tukang);
                                        console.log(pekerja);
                                        console.log("-------");


									//    Ajax For Insert Data



                                        $.ajax({
											async:false,
                                            type: "POST",
                                            data: {"id":id,"id_paket":id_paket,"id_pekerjaan":id_pekerjaan,"tahun":tahun,"tukang":tukang,"pekerja":pekerja},
                                            url: "<?php echo base_url('index.php/pekerjaan/add_detail_pekerjaan') ?>",
                                            success: function(msg){
                                                alert(msg);
                                            }
                                        });

									}
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



</body>

</html>
