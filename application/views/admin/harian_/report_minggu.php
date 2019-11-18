
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
								<h6 class="m-0 font-weight-bold text-primary">Report Minggu</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

						        <div class="row">

									<div class="col-sm-4">
										<select class="form form-control" id="minggu" onchange="selectMinggu()">
											<option value="0">Silahkan Pilih Minggu</option>
											<?php
											$i=1;
											while($i<=4)
											{
												?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php


												$i++;
											}
											?>

										</select>
									</div>


								</div>

								<br/>

								<div class="row">
									<div class="col-sm-6">
										<div class="row">
											Nama Paket:
										</div>
										<div class="row">
											Jenis Pekerjaan:
										</div>
										<div class="row">
											Lokasi:
										</div>
										<div class="row">
											Pagu :
										</div>
									</div>

									<div class="col-sm-6" style="border:2px solid black;">
										<div class="row">Progres Pekerjaan:</div>
										<div class="row">Progres Fisik Periode Lalu:</div>
										<div class="row">Progres Fisik Minggu 1:</div>
										<div class="row">Progres Selanjutnya:</div>
										<div class="row">Progres Fisik Total:</div>
									</div>
								</div>
<!--								Tabel Disini-->
								<table class="tg table" id="tabel1" >
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-nrix" colspan="15">Tahap 1</th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="5" id="bulan1">Bulan X</td>
										<td class="tg-baqh" colspan="5" id="bulan2">Bulan X</td>
										<td class="tg-baqh" colspan="5" id="bulan3">Bulan X</td>
									</tr>
									<tr>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
										<td class="tg-0lax">1</td>
										<td class="tg-0lax">2</td>
										<td class="tg-0lax">3</td>
										<td class="tg-0lax">4</td>
										<td class="tg-0lax">5</td>
									</tr>

								</table>

								<b>Rekapilutasi Pekerja Minggu 1</b>
								<table class="tg table">
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-cly1" colspan="7"></th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">(Bulan) Minggu Ke X</td>
									</tr>
									<tr>
										<td class="tg-cly1">Hari 1</td>
										<td class="tg-cly1">Hari 2</td>
										<td class="tg-cly1">Hari 3</td>
										<td class="tg-cly1">Hari 4</td>
										<td class="tg-cly1">Hari 5</td>
										<td class="tg-cly1">Hari 6</td>
										<td class="tg-cly1">Hari 7</td>
									</tr>
									<tr>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
									</tr>
								</table>
								<b>Rekapitulasi Penggunaan Bahan/Alat Minggu Ke X</b>
								<table class="tg table">
									<tr>
										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
										<th class="tg-baqh" rowspan="3">Satuan</th>
										<th class="tg-cly1" colspan="7"></th>
									</tr>
									<tr>
										<td class="tg-nrix" colspan="7">(Bulan) Minggu Ke X</td>
									</tr>
									<tr>
										<td class="tg-cly1">Hari 1</td>
										<td class="tg-cly1">Hari 2</td>
										<td class="tg-cly1">Hari 3</td>
										<td class="tg-cly1">Hari 4</td>
										<td class="tg-cly1">Hari 5</td>
										<td class="tg-cly1">Hari 6</td>
										<td class="tg-cly1">Hari 7</td>
									</tr>
									<tr>
										<td class="tg-cly1"></td>
										<td class="tg-0lax"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
										<td class="tg-cly1"></td>
									</tr>
								</table>

								<div class="row">
									<div class="col-sm-2"></div>
									<div class="col-sm-2"><b>Dibuat Oleh</b></div>
									<div class="col-sm-2"></div>
									<div class="col-sm-2"></div>
									<div class="col-sm-2"><b>Di Tandatangani Oleh</b></div>
									<div class="col-sm-2"></div>
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

	function selectMinggu()
	{
	    remove_row();
	    let data=$("#minggu").val();
	    // alert(data);

	//    Check Minggu Keberapa
        alert("Test");


        if(data==1)
		{
          let bulan1=$("#bulan1").text("Januari");
          let bulan2=$("#bulan2").text("Februari");
          let bulan3=$("#bulan3").text("Maret");

        //  Select Pekerjaan
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/mingguan/jenis_pekerjaan",
                data: {"id": "id"},
                dataType: "text",
				async:false,
                cache:false,
                success:
                    function(data){

                    data=JSON.parse(data);
                    console.log("$$$$$$$$$$$$");
                    console.log(data);
                    console.log("$$$$$$$$$$$$");

					let length=data.length;


					let i=0;
					while(i<length)
					{
					    console.log(data[i].id);
                        $("#tabel1").append("\t<tr>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+data[i].nama_jenis+"</td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='1_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='2_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='3_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='4_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='5_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='6_+"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='7_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='8_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='9_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='10_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='11_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='12_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='13_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='14_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='15_"+data[i].id+"'></td>\n" +
                            "\t\t\t\t\t\t\t\t\t</tr>");
					    i++;
					}
                    //Adding Row

                        //    Pilih Total Dalam Minggu Tersebut

                        //	Pilih tanggal laporan harian
                        let x=1;
                        while (x<=15)
                        {
                            let minggu_saja=getDateRangeOfWeek(x);
                            //Ambil semua data laporan harian mingguan
                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/mingguan/all_harian",
                                data: {"id": "id"},
                                dataType: "text",
                                cache:false,
                                async:false,
                                success:
                                    function(data){
                                        data_=JSON.parse(data);

                                        minggu_saja=minggu_saja.split(" to ");
                                        let start=new Date(minggu_saja[0]);
                                        let end=new Date(minggu_saja[1]);

                                        let length=data_.length;
                                        let j=0;
                                        let total=0;
                                        while(j<length)
                                        {
                                            //Uji apakah berada di dalam atau tidak
                                            let between=new Date(data_[j].id_lap_harian_mingguan);
                                            //Tentukan jumlahnya
                                            if(start<=between && between<=end)
                                            {
                                              total=0;
												//Ajax Select Count Data Laporan
                                                $.ajax({
                                                    type: "POST",
                                                    url: "http://localhost/pupr_new/mingguan/count",
                                                    data: {"id":data_[j].id_lap_harian_mingguan},
                                                    dataType: "text",
													async:false,
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                        data=JSON.parse(data);
															//Disini -
                                                            $("#"+x+"_"+data_[j].id_lap_perencanaan).text(data[0].jumlah);
                                                            console.log("jesijesijesi");
                                                            console.log(x+"_"+data_[j].id_lap_perencanaan);
                                                            console.log("jesijesijesi");
                                                        }
                                                });// you have missed this bracket

                                            }

                                            j++;
                                        }



                                    }
                            });// you have missed this bracket


                            x++;
                        }


                    }
            });



		}
        else if(data==2){
            let bulan1=$("#bulan1").text("April");
            let bulan2=$("#bulan2").text("Mei");
            let bulan3=$("#bulan3").text("Juni");

            //  Select Pekerjaan
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/mingguan/jenis_pekerjaan",
                data: {"id": "id"},
                dataType: "text",
                async:false,
                cache:false,
                success:
                    function(data){

                        data=JSON.parse(data);
                        console.log("$$$$$$$$$$$$");
                        console.log(data);
                        console.log("$$$$$$$$$$$$");

                        let length=data.length;


                        let i=0;
                        while(i<length)
                        {
                            console.log(data[i].id);
                            $("#tabel1").append("\t<tr>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+data[i].nama_jenis+"</td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='1_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='2_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='3_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='4_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='5_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='6_+"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='7_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='8_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='9_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='10_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='11_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='12_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='13_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='14_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='15_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t</tr>");
                            i++;
                        }
                        //Adding Row

                        //    Pilih Total Dalam Minggu Tersebut

                        //	Pilih tanggal laporan harian
                        let x=1;
                        while (x<=15)
                        {
                            let minggu_saja=getDateRangeOfWeek(x);
                            //Ambil semua data laporan harian mingguan
                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/mingguan/all_harian",
                                data: {"id": "id"},
                                dataType: "text",
                                cache:false,
                                async:false,
                                success:
                                    function(data){
                                        data_=JSON.parse(data);

                                        minggu_saja=minggu_saja.split(" to ");
                                        let start=new Date(minggu_saja[0]);
                                        let end=new Date(minggu_saja[1]);

                                        let length=data_.length;
                                        let j=0;
                                        let total=0;
                                        while(j<length)
                                        {
                                            //Uji apakah berada di dalam atau tidak
                                            let between=new Date(data_[j].id_lap_harian_mingguan);
                                            //Tentukan jumlahnya
                                            if(start<=between && between<=end)
                                            {
                                                total=0;
                                                //Ajax Select Count Data Laporan
                                                $.ajax({
                                                    type: "POST",
                                                    url: "http://localhost/pupr_new/mingguan/count",
                                                    data: {"id":data_[j].id_lap_harian_mingguan},
                                                    dataType: "text",
                                                    async:false,
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            //Disini -
                                                            $("#"+x+"_"+data_[j].id_lap_perencanaan).text(data[0].jumlah);
                                                            console.log("jesijesijesi");
                                                            console.log(x+"_"+data_[j].id_lap_perencanaan);
                                                            console.log("jesijesijesi");
                                                        }
                                                });// you have missed this bracket

                                            }

                                            j++;
                                        }



                                    }
                            });// you have missed this bracket


                            x++;
                        }


                    }
            });
		}
        else if(data==3)
		{

            let bulan1=$("#bulan1").text("Juli");
            let bulan2=$("#bulan2").text("Agustus");
            let bulan3=$("#bulan3").text("September");

            //  Select Pekerjaan
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/mingguan/jenis_pekerjaan",
                data: {"id": "id"},
                dataType: "text",
                async:false,
                cache:false,
                success:
                    function(data){

                        data=JSON.parse(data);
                        console.log("$$$$$$$$$$$$");
                        console.log(data);
                        console.log("$$$$$$$$$$$$");

                        let length=data.length;


                        let i=0;
                        while(i<length)
                        {
                            console.log(data[i].id);
                            $("#tabel1").append("\t<tr>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+data[i].nama_jenis+"</td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='1_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='2_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='3_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='4_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='5_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='6_+"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='7_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='8_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='9_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='10_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='11_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='12_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='13_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='14_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='15_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t</tr>");
                            i++;
                        }
                        //Adding Row

                        //    Pilih Total Dalam Minggu Tersebut

                        //	Pilih tanggal laporan harian
                        let x=1;
                        while (x<=15)
                        {
                            let minggu_saja=getDateRangeOfWeek(x);
                            //Ambil semua data laporan harian mingguan
                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/mingguan/all_harian",
                                data: {"id": "id"},
                                dataType: "text",
                                cache:false,
                                async:false,
                                success:
                                    function(data){
                                        data_=JSON.parse(data);

                                        minggu_saja=minggu_saja.split(" to ");
                                        let start=new Date(minggu_saja[0]);
                                        let end=new Date(minggu_saja[1]);

                                        let length=data_.length;
                                        let j=0;
                                        let total=0;
                                        while(j<length)
                                        {
                                            //Uji apakah berada di dalam atau tidak
                                            let between=new Date(data_[j].id_lap_harian_mingguan);
                                            //Tentukan jumlahnya
                                            if(start<=between && between<=end)
                                            {
                                                total=0;
                                                //Ajax Select Count Data Laporan
                                                $.ajax({
                                                    type: "POST",
                                                    url: "http://localhost/pupr_new/mingguan/count",
                                                    data: {"id":data_[j].id_lap_harian_mingguan},
                                                    dataType: "text",
                                                    async:false,
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            //Disini -
                                                            $("#"+x+"_"+data_[j].id_lap_perencanaan).text(data[0].jumlah);
                                                            console.log("jesijesijesi");
                                                            console.log(x+"_"+data_[j].id_lap_perencanaan);
                                                            console.log("jesijesijesi");
                                                        }
                                                });// you have missed this bracket

                                            }

                                            j++;
                                        }



                                    }
                            });// you have missed this bracket


                            x++;
                        }


                    }
            });

		}else
		{
            let bulan1=$("#bulan1").text("Oktober");
            let bulan2=$("#bulan2").text("November");
            let bulan3=$("#bulan3").text("Desember");

            //  Select Pekerjaan
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/mingguan/jenis_pekerjaan",
                data: {"id": "id"},
                dataType: "text",
                async:false,
                cache:false,
                success:
                    function(data){

                        data=JSON.parse(data);
                        console.log("$$$$$$$$$$$$");
                        console.log(data);
                        console.log("$$$$$$$$$$$$");

                        let length=data.length;


                        let i=0;
                        while(i<length)
                        {
                            console.log(data[i].id);
                            $("#tabel1").append("\t<tr>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+data[i].nama_jenis+"</td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='1_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='2_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='3_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='4_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='5_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='6_+"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='7_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='8_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='9_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='10_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='11_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='12_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='13_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='14_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\" id='15_"+data[i].id+"'></td>\n" +
                                "\t\t\t\t\t\t\t\t\t</tr>");
                            i++;
                        }
                        //Adding Row

                        //    Pilih Total Dalam Minggu Tersebut

                        //	Pilih tanggal laporan harian
                        let x=1;
                        while (x<=15)
                        {
                            let minggu_saja=getDateRangeOfWeek(x);
                            //Ambil semua data laporan harian mingguan
                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/mingguan/all_harian",
                                data: {"id": "id"},
                                dataType: "text",
                                cache:false,
                                async:false,
                                success:
                                    function(data){
                                        data_=JSON.parse(data);

                                        minggu_saja=minggu_saja.split(" to ");
                                        let start=new Date(minggu_saja[0]);
                                        let end=new Date(minggu_saja[1]);

                                        let length=data_.length;
                                        let j=0;
                                        let total=0;
                                        while(j<length)
                                        {
                                            //Uji apakah berada di dalam atau tidak
                                            let between=new Date(data_[j].id_lap_harian_mingguan);
                                            //Tentukan jumlahnya
                                            if(start<=between && between<=end)
                                            {
                                                total=0;
                                                //Ajax Select Count Data Laporan
                                                $.ajax({
                                                    type: "POST",
                                                    url: "http://localhost/pupr_new/mingguan/count",
                                                    data: {"id":data_[j].id_lap_harian_mingguan},
                                                    dataType: "text",
                                                    async:false,
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            //Disini -
                                                            $("#"+x+"_"+data_[j].id_lap_perencanaan).text(data[0].jumlah);
                                                            console.log("jesijesijesi");
                                                            console.log(x+"_"+data_[j].id_lap_perencanaan);
                                                            //Beri Warna Disini
                                                            $("#"+x+"_"+data_[j].id_lap_perencanaan).css("background-color", "yellow");

                                                            console.log("jesijesijesi");
                                                        }
                                                });// you have missed this bracket

                                            }

                                            j++;
                                        }



                                    }
                            });// you have missed this bracket


                            x++;
                        }


                    }
            });

		}



	}


	function remove_row()
	{
        $("#tabel1").empty();
        $("#tabel1").append("\t<tr>\n" +
            "\t\t\t\t\t\t\t\t\t\t<th class=\"tg-cly1\" rowspan=\"3\">Jenis Pekerjaan</th>\n" +
            "\t\t\t\t\t\t\t\t\t\t<th class=\"tg-nrix\" colspan=\"15\">Tahap 1</th>\n" +
            "\t\t\t\t\t\t\t\t\t</tr>\n" +
            "\t\t\t\t\t\t\t\t\t<tr>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-nrix\" colspan=\"5\" id=\"bulan1\">Bulan X</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-baqh\" colspan=\"5\" id=\"bulan2\">Bulan X</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-baqh\" colspan=\"5\" id=\"bulan3\">Bulan X</td>\n" +
            "\t\t\t\t\t\t\t\t\t</tr>\t<tr>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">1</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">2</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">3</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">4</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">5</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">1</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">2</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">3</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">4</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">5</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">1</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">2</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">3</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">4</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">5</td>\n" +
            "\t\t\t\t\t\t\t\t\t</tr>");
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

//	Generate Data



</script>






</body>

</html>
