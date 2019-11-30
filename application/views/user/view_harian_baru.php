
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

<!--								Disini Informasi Paket-->
								<?php
								$paket=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("4")))->result();
                                $nama_paket="-";
                                $nilai_paket="-";
                                $lokasi="-";
								$count=count($paket);
								$i=0;

								while($i<$count)
								{
									$paket_info=$this->db->get_where("paket",array("id_paket"=>$paket[$i]->id_paket))->result();
									$count1=count($paket_info);

									$ii=0;

									while($ii<$count1)
									{
										$nama_paket=$paket_info[$ii]->nama;
										$nilai_paket=$paket_info[$ii]->nilai_paket;
										$lokasi=$paket_info[$ii]->lokasi;

										$ii++;
									}

									$i++;
								}

								?>
								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-6">Nama Paket</div>
											<div class="col-sm-6" id="nama_paket">:<?php echo $nama_paket ?></div>
										</div>
										<div class="row">
											<div class="col-sm-6">Jenis Pekerjaan</div>
											<div class="col-sm-6" id="jenis_pekerjaan">:</div>
										</div>
										<div class="row">
											<div class="col-sm-6">Lokasi</div>
											<div class="col-sm-6" id="lokasi">:<?php echo $lokasi ?></div>
										</div>
										<div class="row">
											<div class="col-sm-6">Pagu</div>
											<div class="col-sm-6" id="pagu">:<?php echo $nilai_paket; ?></div>
											<input type="hidden" id="nilai_paket" value="<?php echo $nilai_paket; ?>">
										</div>
									</div>
									<div class="col-sm-5" style="border: 2px solid black;">
										<div class="row">
											<div class="col-sm-6">Progress Pekerjaan</div>
											<div class="col-sm-6" id="progres_sekarang">:</div>
										</div>

										<div class="row">
											<div class="col-sm-6">Progress Fisik Periode Lalu</div>
											<div class="col-sm-6" >:</div>
										</div>

										<div class="row">
											<div class="col-sm-6">Progress Fisik Minggu Ke-</div>
											<div class="col-sm-6" >:</div>
										</div>
										<div class="row">
											<div class="col-sm-6">Progress Fisik Selanjutnya</div>
											<div class="col-sm-6" >:</div>
										</div>
										<div class="row">
											<div class="col-sm-6">Progress Fisik Total</div>
											<div class="col-sm-6" >:</div>
										</div>
									</div>
								</div>
								<br/>
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
			    if($("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_pekerjaan").length>0)
				{

				}
			    else
				{
				    $("#jenis_pekerjaan").append("<br/>"+"-"+data[i].nama_jenis);
                    $("#tabel_satu").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 " id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_pekerjaan"+'">'+data[i].nama_jenis+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jenis_upah_klik" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_upah"+'">'+data[i].nama+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_1"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_2"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_3"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_4"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_5"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_6"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai nonActive" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_7"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

                    $("#tabel_dua").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__pekerjaan"+'">'+data[i].nama_jenis+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__upah"+'">'+data[i].nama+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__1"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__2"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__3"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__4"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__5"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__6"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 nonActive1" id="'+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__7"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

				}

			    //Baru warnai
                $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+data[i].hari).css("background-color", "#3b5998");

                $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"__"+data[i].hari).text(data[i].total);



			    i++;
			}
        }
});


$.ajax({
    type: "POST",
    url: "http://localhost/pupr_new/view_harian/jenis_alat_baru",
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
			    if($("#"+data[i].id_jenis_bahan_alat+"___alat").length>0)
				{

				}
			    else
				{
                    $("#tabel_tiga").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+data[i].id_jenis_bahan_alat+"___alat"+'">'+data[i].jenis_bahan_alat+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 satuan" id="'+data[i].id_jenis_bahan_alat+"___satuan"+'">'+data[i].satuan+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___1"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___2"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___3"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___4"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___5"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___6"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 warnai1" id="'+data[i].id_jenis_bahan_alat+"___7"+'"></td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

				}

                $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].hari).text(data[i].jumlah);



			    i++;
			}

        }
});
</script>


<script>
<!--	Script untuk mencari Progress-->

$.ajax({
    type: "POST",
    url: "http://localhost/pupr_new/view_harian/jenis_pekerjaan_baru_sum",
    data: {"id_harian":id_harian,"id_perencanaan":id_perencanaan},
	async:false,
    dataType: "text",
    cache:false,
    success:
        function(data){
            // alert(data);  //as a debugging message.
            data=JSON.parse(data);
            console.log(data);
            let length=data.length;
            let i=0;
            console.log("hmmm");

            let total_pekerja=0;

            while(i<length)
			{
               total_pekerja=total_pekerja+(parseInt(data[i].total)*parseInt(data[i].harga));

			    i++;
			}

            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/view_harian/jenis_alat_baru_sum",
                data: {"id_harian":id_harian,"id_perencanaan":id_perencanaan},
                async:false,
                dataType: "text",
                cache:false,
                success:
                    function(data){
                        // alert(data);  //as a debugging message.
                        data=JSON.parse(data);
                        console.log(data);
                        let length=data.length;
                        let i=0;
                        console.log("hmmm");

                        let total_alat=0;

                        while(i<length)
                        {
                            total_alat=total_alat+(parseInt(data[i].total)*parseInt(data[i].harga));

                            i++;
                        }

                        console.log(total_pekerja);
                        console.log(total_alat);
                        let nilai_paket=0;
                        nilai_paket=$("#nilai_paket").val();
                        nilai_paket=parseInt(nilai_paket);

                    //    Progres sekarang
						let progres_sekarang=total_alat+total_pekerja;
                        progres_sekarang=progres_sekarang/nilai_paket;
                        progres_sekarang=progres_sekarang*100;

                        // alert(progres_sekarang);
						progres_sekarang=progres_sekarang.toFixed(2);

                        $("#progres_sekarang").append(progres_sekarang+"%");





                    }
            });



        }
});



//Cari Progress Fisik Peiode Sebelumnya


</script>








</body>

</html>
