
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
			border:1px solid black;
			color:black;
		}
		body{
			color:black;
		}

		.tg-cly1{
			text-align:center;
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
							<button class="btn btn-facebook" style="width:100%;" onclick="generatePDF()">Cetak PDF</button>
							  <div id="cetak">
							  
							  <center><b>LAPORAN HARIAN MINGGUAN</b></center>
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
									<div class="col-sm-7">
										<div class="row">
											<div class="col-sm-3">Nama Paket</div>
											<div class="col-sm-8" id="nama_paket">:  <?php echo "  ".$nama_paket ?></div>
										</div>
										<div class="row">
											<div class="col-sm-3" >Jenis Pekerjaan</div>
											<div class="col-sm-8" id="jenis_pekerjaan">:  </div>
										</div>
										<div class="row">
											<div class="col-sm-3">Lokasi</div>
											<div class="col-sm-8" id="lokasi">:  <?php echo "  ".$lokasi ?></div>
										</div>
										<div class="row">
											<div class="col-sm-3">Pagu</div>
											<div class="col-sm-8" id="pagu">:  <?php echo $nilai_paket; ?></div>
											<input type="hidden" id="nilai_paket" value="<?php echo "  ".$nilai_paket; ?>">
										</div>
									</div>
									<div class="col-sm-3" style="border: 1px solid black;">
										<div class="row">
											<div class="col-sm-6">Progress Pekerjaan</div>
											<div class="col-sm-6" id="progres_sekarang">:</div>
										</div>

										<div class="row">
											<div class="col-sm-6">Progress Fisik Periode Lalu</div>
											<div class="col-sm-6" id="periode_lalu" >:</div>
										</div>

										<div class="row">
											<div class="col-sm-6" id="add_gan">Progress Fisik Minggu Ke-</div>
											<div class="col-sm-6" id="minggu_ke">:</div>
										</div>
										<div class="row">
											<div class="col-sm-6">Progress Fisik Selanjutnya</div>
											<div class="col-sm-6" >:
											<?php

											$id_laporan=$this->uri->segment("3");
											$perencanaan=$this->uri->segment("4");

											// Ambil data
											$ambil=$this->db->get_where("lap_harian_mingguan",array("id_lap_harian_mingguan"=>$id_laporan,"id_lap_perencanaan"=>$perencanaan))->result();
											$count=count($ambil);
											$i=0;

											while($i<$count)
											{
 
												echo $ambil[$i]->progres_selanjutnya."%";

												$i++;
											}

                                            ?>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">Progress Fisik Total</div>
											<div class="col-sm-6" id="progress_total" >:</div>
										</div>
									</div>
								</div>
								<br/>
								<br/>
								<br/>



								<table class="table table-responsive-lg" id="tabel_satu">
									<tr>
										<th class="tg-nrix" style="text-align:center;vertical-align: middle; border:1px solid black;" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" style="text-align:center;vertical-align: middle; border:1px solid black;" rowspan="3">Jenis Upah</th>
										<th class="tg-nrix bulan_jesi" style="text-align:center;vertical-align: middle; border:1px solid black;" colspan="7">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix minggu_hai" colspan="7"  style="text-align:center;vertical-align: middle;border:1px solid black;">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix 1" style="text-align:center;vertical-align: middle">1</td>
										<td class="tg-nrix 2" style="text-align:center;vertical-align: middle">2</td>
										<td class="tg-nrix 3" style="text-align:center;vertical-align: middle">3</td>
										<td class="tg-nrix 4" style="text-align:center;vertical-align: middle">4</td>
										<td class="tg-nrix 5" style="text-align:center;vertical-align: middle">5</td>
										<td class="tg-nrix 6" style="text-align:center;vertical-align: middle">6</td>
										<td class="tg-nrix 7" style="text-align:center;vertical-align: middle">7</td>
									</tr>

								</table>
								<div class="break"></div>
								<br/>
								<br/>
								<br/>
								<b>Rekapitulasi Pekerja Minggu ke-<span class="mingguke"></span></b>
								<table class="table table-responsive-lg" id="tabel_dua">
									<tr>
										<th class="tg-nrix" rowspan="3" style="text-align:center;vertical-align: middle;border:1px solid black;">Jenis Pekerjaan</th>
										<th class="tg-nrix" rowspan="3" style="text-align:center;vertical-align: middle;border:1px solid black;">Jenis Upah</th>
										<th class="tg-nrix bulan_jesi" colspan="7" style="text-align:center;vertical-align: middle;border:1px solid black;">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix minggu_hai" colspan="7"  style="text-align:center;vertical-align: middle;border:1px solid black;">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix 1" style="text-align:center;vertical-align: middle">1</td>
										<td class="tg-nrix 2" style="text-align:center;vertical-align: middle">2</td>
										<td class="tg-nrix 3" style="text-align:center;vertical-align: middle">3</td>
										<td class="tg-nrix 4" style="text-align:center;vertical-align: middle">4</td>
										<td class="tg-nrix 5" style="text-align:center;vertical-align: middle">5</td>
										<td class="tg-nrix 6" style="text-align:center;vertical-align: middle">6</td>
										<td class="tg-nrix 7" style="text-align:center;vertical-align: middle">7</td>
									</tr>

								</table>
								
							    <br/>
								<br/>
								<br/>
								<div class="break"></div>



								<b>Rekapitulasi Penggunaan Bahan/Alat Minggu ke- <span class="mingguke"></span></b>
							
								<table class="table table-responsive-lg" id="tabel_tiga">
									<tr>
										<th class="tg-nrix" rowspan="3" style="text-align:center;vertical-align: middle;border:1px solid black;">Jenis Bahan/Alat</th>
										<th class="tg-nrix" rowspan="3" style="text-align:center;vertical-align: middle;border:1px solid black;">Satuan</th>
										<th class="tg-nrix bulan_jesi" colspan="7" style="text-align:center;vertical-align: middle;border:1px solid black;">Bulan</th>
									</tr>
									<tr>
										<td class="tg-nrix minggu_hai" colspan="7"  style="text-align:center;vertical-align: middle;border:1px solid black;">Minggu</td>
									</tr>
									<tr>
										<td class="tg-nrix 1" style="text-align:center;vertical-align: middle">1</td>
										<td class="tg-nrix 2" style="text-align:center;vertical-align: middle">2</td>
										<td class="tg-nrix 3" style="text-align:center;vertical-align: middle">3</td>
										<td class="tg-nrix 4" style="text-align:center;vertical-align: middle">4</td>
										<td class="tg-nrix 5" style="text-align:center;vertical-align: middle">5</td>
										<td class="tg-nrix 6" style="text-align:center;vertical-align: middle">6</td>
										<td class="tg-nrix 7" style="text-align:center;vertical-align: middle">7</td>
									</tr>

								</table>


								<br/>
								<br/>
								

								<?php
								function tgl_indo($tanggal){
									$bulan = array (
										1 =>   'Januari',
										'Februari',
										'Maret',
										'April',
										'Mei',
										'Juni',
										'Juli',
										'Agustus',
										'September',
										'Oktober',
										'November',
										'Desember'
									);
									$pecahkan = explode('-', $tanggal);
									
									// variabel pecahkan 0 = tanggal
									// variabel pecahkan 1 = bulan
									// variabel pecahkan 2 = tahun
								 
									return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
								}
								 

								?>

								<div class="row" style="text-align:center;">
								
								<div class="col-sm-1"></div>
								<div class="col-sm-3">Diperiksa Oleh,
								<div id="jabatan"></div>
								<br/><br/>
								<u id="nama"></u>
								<div id="nip"></div>
								</div>
								
								<div class="col-sm-4"></div>
							
								<div class="col-sm-3">Jambi, <?php echo tgl_indo($this->uri->segment("3")); ?><br>Dibuat Oleh<br/><br/><br/>
								<u id="nama1"></u>
								<div id="nip1"></div>
								</div>
								<div class="col-sm-1"></div>

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
				    $("#jenis_pekerjaan").append("<br/>&nbsp&nbsp"+data[i].nama_jenis);
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
						$("#minggu_ke").append(progres_sekarang+"%");

                        





                    }
            });



        }
});





   





// Tandatangan
	// Isikan ttd nya
	                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/view_harian/ttd_view", 
                                data: {"id_harian":id_harian,"id_perencanaan":id_perencanaan},
                                dataType: "text",  
                                cache:false,
                                success: 
                                function(data){
                                // alert(data);  //as a debugging message.
								data=JSON.parse(data);
								let length=data.length;
								let i=0;

								console.log(data);


								while(i<length)
								{


									$("#jabatan").text(data[i].jabatan);
									$("#nama").text(data[i].konfigurasi_nama);
									$("#nip").text("NIP."+data[i].konfigurasi_nip);
									$("#nama1").text(data[i].account_nama);
									$("#nip1").text("NRP."+data[i].account_nip);


									i++;
								}
                                }
                                });



								// Ganti Bulan yang ada dengan bulan pada tanggal

								let bulan=id_harian.split("-");
								bulan=bulan[1];

								if(bulan==1)
								{
									bulan="Januari";
								}
								else if(bulan==2)
								{
									bulan="Februari";
								}
								else if(bulan==3)
								{
									bulan="Maret";
								}else if(bulan==4)
								{
									bulan="April";
								}else if(bulan==5)
								{
									bulan="Mei";
								}else if(bulan==6)
								{
									bulan="Juni";
								}else if(bulan==7)
								{
									bulan="Juli";
								}else if(bulan==8)
								{
									bulan="Agustus";
								}else if(bulan==9)
								{
									bulan="September";
								}else if(bulan==10)
								{
									bulan="Oktober";
								}else if(bulan==11)
								{
									bulan="November";
								}
								else if(bulan==12)
								{
									bulan="Desember";
								}

								$(".bulan_jesi").text(bulan);



								



</script>



<script>
// Secret Code

function getWeeksInMonth(month_number, year) {
                        // console.log("year - "+year+" month - "+month_number+1);

                        var day = 0;
                        var firstOfMonth = new Date(year, month_number, 1);
                        var lastOfMonth = new Date(year, parseInt(month_number)+1, 0);

                        if (firstOfMonth.getDay() == 0) {
                            day = 2;
                            firstOfMonth = firstOfMonth.setDate(day);
                            firstOfMonth = new Date(firstOfMonth);
                        } else if (firstOfMonth.getDay() != 1) {
                            day = 9-(firstOfMonth.getDay());
                            firstOfMonth = firstOfMonth.setDate(day);
                            firstOfMonth = new Date(firstOfMonth);
                        }

                        var days = (lastOfMonth.getDate() - firstOfMonth.getDate())+1
                        return Math.ceil( days / 7);
                    }

Date.prototype.getWeek = function () {
        var target  = new Date(this.valueOf());
        var dayNr   = (this.getDay() + 6) % 7;
        target.setDate(target.getDate() - dayNr + 3);
        var firstThursday = target.valueOf();
        target.setMonth(0, 1);
        if (target.getDay() != 4) {
            target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
        }
        return 1 + Math.ceil((firstThursday - target) / 604800000);
    }

    function getDateRangeOfWeek(weekNo){
        var d1 = new Date();
        numOfdaysPastSinceLastMonday = eval(d1.getDay()- 1);
        d1.setDate(d1.getDate() - numOfdaysPastSinceLastMonday);
        var weekNoToday = d1.getWeek();
        var weeksInTheFuture = eval( weekNo - weekNoToday );
        d1.setDate(d1.getDate() + eval( 7 * weeksInTheFuture ));
        var rangeIsFrom = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear();
        d1.setDate(d1.getDate() + 6);
        var rangeIsTo = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear() ;
        return rangeIsFrom + " to "+rangeIsTo;
    };


	// Mengganti tulisan tanggal engan tanggal sesungguhnya
	// Coba disini

	//Cari Progress Fisik Peiode Sebelumnya
let z=1;
				       while(z<=54)
					   {

                           week=getDateRangeOfWeek(z);
                           week=week.split(" to ")
						   // console.log(week);
                           // console.log(week[0].toDateString());
                           tanggal_start=stringToDate(week[0],"MM/dd/yyyy","/");
                           tanggal_end=stringToDate(week[1],"MM/dd/yyyy","/");
                           tanggal_pilihan=new Date(id_harian);
                           // console.log(tanggal_start);
                           // console.log(tanggal_end);
                           // console.log(tanggal_pilihan);
                           if(tanggal_start<tanggal_pilihan && tanggal_pilihan<tanggal_end)
						   {
						       minggu_get=z;
						       console.log(minggu_get);
							//    
						
							// alert(minggu_get);

							// Ambil jumlah minggu dalam satu bulan
							let y=1;
							let total=0;
							let id_harian=$("#id_harian").val();
								id_harian=id_harian.split("-");
								let minggu_bulan=0;
							while(y<id_harian[1])
							{

								

								minggu_bulan=parseInt(minggu_bulan)+parseInt(getWeeksInMonth(y,id_harian[0]));
                              
							  

              
								y++;
							}
							// alert(minggu_bulan);
							total=parseInt(minggu_get)-parseInt(minggu_bulan);
							// alert(total);
							$(".minggu_hai").text("Minggu "+total);
							$(".mingguke").text(" "+total);
						   }

						  

					       z++;
					   }

// alert(minggu_get);

$("#add_gan").append(minggu_get);



// Progress fisik sebelumnya
minggu_get=parseInt(minggu_get)-1;

let sebelmunya=getDateRangeOfWeek(minggu_get);

// alert(sebelmunya);
let yamaha=sebelmunya.split(" to ");


let sebelmunya1=getDateRangeOfWeek(1);
let yamaha1=sebelmunya1.split(" to ");

// Ajax untuk mencarinya
$.ajax({
         type: "POST",
		 async:false,
         url: "http://localhost/pupr_new/view_harian/sebelumnya", 
         data: {"id_perencanaan":id_perencanaan,"start":yamaha1[0],"end":yamaha[1]},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
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
            console.log("yuhu");
			console.log(total_pekerja);
			console.log("yuhu");

             
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/view_harian/jenis_alat_baru_sum1",
                data: {"id_perencanaan":id_perencanaan,"start":yamaha1[0],"end":yamaha[1]},
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
						$("#periode_lalu").append(progres_sekarang+"%");
						

                        





                    }
            });


              }
});



let pp=$("#progres_sekarang").text();
pp=pp.slice(1,-1);
let pl=$("#periode_lalu").text();

pl=pl.slice(1,-1);

pp=parseFloat(pp);
pl=parseFloat(pl);

pt=pp+pl;

$("#progress_total").append(pt+"%");
// alert(pp);
// alert(pl);
// alert(pt);





	let dataM=id_harian;
	dataM=dataM.split("-");
	let minggu_=0;


	let v=1;

	while(v<dataM[1])
	{

		minggu_=parseInt(minggu_)+parseInt(getWeeksInMonth(v, dataM[0]));



		v++;
	}


	console.log("minggu bulan terakhirnya:"+minggu_);

	// Kemudian check 5 minggu sesudahnya

	let y=1;
	let range;

	while(y<=5)
	{
		hoho=parseInt(minggu_)+parseInt(y);

		range=getDateRangeOfWeek(hoho);
		range=range.split(" to ");

		tanggal_start=stringToDate(range[0],"MM/dd/yyyy","/");
        tanggal_end=stringToDate(range[1],"MM/dd/yyyy","/");
		tanggal_pilihan=new Date(id_harian);

		if(tanggal_start<tanggal_pilihan && tanggal_pilihan<tanggal_end)
	    {
			minggu_get=hoho;
		    console.log(minggu_get);

            console.log("Wahahaha");
			let m=1;
			let tanggal_ambil=tanggal_start;
			while(m<=7)
			{



                console.log(convert(tanggal_ambil));
				$("."+m).text(convert(tanggal_ambil));
				var tomorrow = new Date(tanggal_ambil);
                tomorrow.setDate(tomorrow.getDate() + 1);
				tanggal_ambil=tomorrow;

				
				
				m++;
			}
			

	    }


		console.log(range);

        
		y++;
	}



	function stringToDate(_date,_format,_delimiter)
    {
        var formatLowerCase=_format.toLowerCase();
        var formatItems=formatLowerCase.split(_delimiter);
        var dateItems=_date.split(_delimiter);
        var monthIndex=formatItems.indexOf("mm");
        var dayIndex=formatItems.indexOf("dd");
        var yearIndex=formatItems.indexOf("yyyy");
        var month=parseInt(dateItems[monthIndex]);
        month-=1;
        var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
        return formatedDate;
    }


	function convert(str) {
  var date = new Date(str),
    mnth = ((date.getMonth() + 1));
    day = (date.getDate());
	if(mnth==1)
	{
		mnth="Januari";
	}
	else if(mnth==2)
	{
		mnth="Februari";
	}
	else if(mnth==3)
	{
		mnth="Maret";
	}
	else if(mnth==4)
	{
		mnth="April";
	}
	else if(mnth==5)
	{
		mnth="Mei";
	}
	else if(mnth==6)
	{
		mnth="Juni";
	}
	else if(mnth==7)
	{
		mnth="Juli";
	}
	else if(mnth==8)
	{
		mnth="Agustus";
	}
	else if(mnth==9)
	{
		mnth="September";
	}
	else if(mnth==10)
	{
		mnth="Oktober";
	}
	else if(mnth==11)
	{
		mnth="November";
	}
	else if(mnth==12)
	{
		mnth="Desember";
	}
  return [ day,mnth, date.getFullYear()].join(" ");
}


let id_harian_akhi=$("#id_harian").val();


function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'Laporan Harian '+id_harian_akhi+'.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' },
            pagebreak: { before: '.break'}
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();

        swal("PDF Digenerate!!");
    }




</script>








</body>

</html>
