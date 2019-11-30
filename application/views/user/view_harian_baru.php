
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

	<style>
		th,td,table{
			border:2px solid black;
		}
		body{
			color:black;
		}
	</style>


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
								<h6 class="m-0 font-weight-bold text-primary">View Laporan Harian</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<input type="hidden" class="form form-control" id="id_harian" value="<?php echo $this->uri->segment('3') ?>">
							<input type="hidden" class="form form-control" id="id_perencanaan" value="<?php echo $this->uri->segment('4') ?>">
							<div class="card-body">
								<center><b>LAPORAN MINGGUAN</b></center>
								<center><b>PELAKSANAAN KEGIATAN</b></center>
								<br/>
								<br/>



								<table class="table table-responsive-lg" id="tabel_satu">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" rowspan="3">Jenis Upah</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

								</table>
								<br/>
								<br/>
								<br/>
								<b>Rekapitulasi Pekerja Minggu ke-</b>
								<table class="table table-responsive-lg" id="tabel_dua">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" rowspan="3">Jenis Upah</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

								</table>
							    <br/>
								<br/>
								<br/>



								<b>Rekapitulasi Penggunaan Bahan/Alat Minggu ke-</b>
								<table class="table table-responsive-lg" id="tabel_tiga">
									<tr>
										<th class="tg-nrix" rowspan="3">Jenis Bahan/Alat</th>
										<th class="tg-nrix" rowspan="3">Satuan</th>
										<th class="tg-nrix" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix">1</td>
										<td class="tg-nrix">2</td>
										<td class="tg-nrix">3</td>
										<td class="tg-nrix">4</td>
										<td class="tg-nrix">5</td>
										<td class="tg-nrix">6</td>
										<td class="tg-nrix">7</td>
									</tr>

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
<!--	Ambil data dan isikan kedalam tabel-->
let id_harian=$("#id_harian").val();
let id_perencanaan=$("#id_perencanaan").val();

// alert(id_harian);
// alert(id_perencanaan);
$.ajax({
    type: "POST",
    url: "http://localhost/pupr_new/view_harian/jenis_pekerjaan_baru",
    data: {"id_harian":id_harian,"id_perencanaan":id_perencanaan},
    dataType: "text",
    cache:false,
    success:
        function(data){
            // alert(data);  //as a debugging message.
			data=JSON.parse(data);
			console.log(data);
			let length=data.length;
			let i=0;

			while(i<length)
			{
			    if($("#"+data[i].jenis_pekerjaan+"_pekerjaan").length>0)
				{

				}
			    else
				{
                    $("#tabel_satu").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+data[i].jenis_pekerjaan+"_pekerjaan"+'">'+data[i].nama_jenis+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+data[i].jenis_pekerjaan+"_upah"+'">'+data[i].nama+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_1"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_2"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_3"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_4"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_5"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_6"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_7"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

                    $("#tabel_dua").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__pekerjaan"+'">'+data[i].nama_jenis+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__upah"+'">'+data[i].nama+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__1"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__2"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__3"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__4"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__5"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__6"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"__7"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

				}

			    //Baru warnai
                $("#"+data[i].jenis_pekerjaan+"_"+data[i].hari).css("background-color", "#3b5998");

                $("#"+data[i].jenis_pekerjaan+"__"+data[i].hari).text(data[i].total);



			    i++;
			}
        }
});
</script>








</body>

</html>
