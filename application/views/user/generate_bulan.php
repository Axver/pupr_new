
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
								<h6 class="m-0 font-weight-bold text-primary">Generate Minggu</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<!--								Pilih Paket-->
								<b>Pilih Paket</b>
								<select onchange="addPerencanaan()" class="form form-control" id="id_paket">
									<option value="">---Pilih Paket---</option>
									<?php
									$paket=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
									$count=count($paket);

									$i=0;
									while($i<$count)
									{
										?>
										<option value="<?php echo $paket[$i]->id_paket; ?>"><?php echo $paket[$i]->id_paket; ?></option>
										<?php

										$i++;
									}
									?>
								</select>
								<b>Laporan Perencanaan</b>
								<select class="form form-control" id="id_lap_perencanaan"></select>
								<input type="hidden" id="tahun_hidden">

								<b>Pilih Bulan Diinginkan</b>
								<select class="form form-control" id="bulan_diinginkan">
									<?php
									$i=1;
									while($i<=12)
									{
										?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php

										$i++;
									}
									?>
								</select>


								<b>Nama Tahap</b>
								<input type="text" class="form form-control" id="nama_tahap">
								<br/>

								<button onclick="generateTabel()" class="btn btn-info">Generate</button>
<!--								<button onclick="testJesi()" class="btn btn-info">Generate Data</button>-->
								<br/>
								<br/>
								<b>Diperiksa Oleh</b>
								<select class="form form-control" id="diperiksa_oleh">
									<?php
									$diperiksa=$this->db->get("konfigurasi")->result();
									$count=count($diperiksa);
									$i=0;


									while($i<$count)
									{
										?>
										<option value="<?php echo $diperiksa[$i]->nama; ?>"><?php echo $diperiksa[$i]->nama; ?></option>
										<?php

										$i++;
									}
									?>
								</select>
								<br/>
								<br/>

								<button class="btn btn-success" onclick="generatePDF()" style="width:100%;">Generate PDF</button>
								<!--								Disini Posisi Tabelnya-->
								<div id="cetak_tabel">
									<br/>
									<center><b><h3>LAPORAN BULANAN</h3></b></center>
									<br/>
									<br/>

									<!--									Tabelnya-->
									<table class="tg table table-bordered" id="buat_tabel">


									</table>
									<div class="break"></div>

									<table class="tg table table-bordered" id="buat_pekerja">
									</table>
									<div class="break"></div>

									<table class="tg table table-bordered" id="buat_alat">
									</table>


									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3"><center><b>Diperiksa Oleh</b></center></div>
										<div class="col-sm-4"></div>
										<div class="col-sm-3"><center><b>Dibuat Oleh</b></center></div>
										<div class="col-sm-1"></div>
									</div>

									<br/>
									<br/>
									<br/>
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3"><center><b id="diperiksa"></b></center></div>
										<div class="col-sm-4"></div>
										<div class="col-sm-3"><center><b id="dibuat"><?php
													$data=$this->db->get_where("account",array("nip"=>$this->session->userdata("nip")))->result();
													$count=count($data);
													$i=0;

													while($i<$count)
													{
														echo $data[$i]->nama;

														$i++;
													}
													?></b></center></div>
										<div class="col-sm-1"></div>
									</div>

								</div>



							</div>


						</div>
					</div>


				</div>

				<script>

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

				</script>



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
    function addPerencanaan()
    {
        $data=$("#id_paket").val();
        // alert($data);
        //Isi Select Laporan Perencanaan
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/generate_bulan/laporan_perencanaan",
            data: {"id_paket":$data},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    length=data.length;
                    let i=0;
                    while(i<length)
                    {
                        //Append Option ke Select
                        $("#id_lap_perencanaan").append('<option value="'+data[i].id_lap_perencanaan+'">'+data[i].id_lap_perencanaan+'</option>');
                        $("#tahun_hidden").val(data[i].tahun);
                        i++;
                    }
                }
        });
    }

   function generateTabel()
   {
       let diperiksa=$("#diperiksa_oleh").val();
       $("#diperiksa").text(diperiksa);
       //Hapus tabel yang ada dulu
	   hapusTabel();
       var dt = new Date();
       // alert(dt.getFullYear());
       let tahun=dt.getFullYear();
       let id_paket=$("#id_paket").val();
       let id_perencanaan=$("#id_lap_perencanaan").val();
       let bulan=$("#bulan_diinginkan").val();
       let tahap=$("#nama_tahap").val();
       // alert("Generate Table");
	//   Generate Tabel 1
	   $("#buat_tabel").append('<tr>\n' +
           '    <th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
           '    <th class="tg-nrix" colspan="5">'+tahap+'</th>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-nrix" colspan="5">Bulan</td>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-cly1">1</td>\n' +
           '    <td class="tg-cly1">2</td>\n' +
           '    <td class="tg-cly1">3</td>\n' +
           '    <td class="tg-cly1">4</td>\n' +
           '    <td class="tg-cly1">5</td>\n' +
           '  </tr>');
	//   Generate Tabel 2
       $("#buat_pekerja").append('<tr>\n' +
           '    <th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
           '    <th class="tg-nrix" colspan="5">'+tahap+'</th>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-nrix" colspan="5">Bulan</td>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-cly1">1</td>\n' +
           '    <td class="tg-cly1">2</td>\n' +
           '    <td class="tg-cly1">3</td>\n' +
           '    <td class="tg-cly1">4</td>\n' +
           '    <td class="tg-cly1">5</td>\n' +
           '  </tr>');

       $("#buat_alat").append('<tr>\n' +
           '    <th class="tg-cly1" rowspan="3">Jenis Alat</th>\n' +
           '    <th class="tg-cly1" rowspan="3">Satuan</th>\n' +
           '    <th class="tg-nrix" colspan="5">'+tahap+'</th>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-nrix" colspan="5">Bulan</td>\n' +
           '  </tr>\n' +
           '  <tr>\n' +
           '    <td class="tg-cly1">1</td>\n' +
           '    <td class="tg-cly1">2</td>\n' +
           '    <td class="tg-cly1">3</td>\n' +
           '    <td class="tg-cly1">4</td>\n' +
           '    <td class="tg-cly1">5</td>\n' +
           '  </tr>');


       //   Ajax Untuk Mendapatkan Data

       $.ajax({
           type: "POST",
           url: "http://localhost/pupr_new/generate_bulan/data",
           data: {"tahun":tahun,"bulan":bulan,"id_perencanaan":id_perencanaan},
           dataType: "text",
		   async:false,
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
				       $("#buat_tabel").append('  <tr>\n' +
                           '    <td class="tg-cly1">'+data[i].nama_jenis+'</td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'_1"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'_2"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'_3"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'_4"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'_5"></td>\n' +
                           '  </tr>');
                       $("#buat_pekerja").append('  <tr>\n' +
                           '    <td class="tg-cly1">'+data[i].nama_jenis+'</td>\n' +
                           '    <td class="tg-cly1" ></td>\n' +
                           '    <td class="tg-cly1" ></td>\n' +
                           '    <td class="tg-cly1" ></td>\n' +
                           '    <td class="tg-cly1" ></td>\n' +
                           '    <td class="tg-cly1" ></td>\n' +
                           '  </tr>');
                       $("#buat_pekerja").append('  <tr>\n' +
                           '    <td class="tg-cly1"><center>Pekerja</center></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'__1"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'__2"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'__3"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'__4"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'__5"></td>\n' +
                           '  </tr>');




				       i++;
				   }
               }
       });


       //   Ajax Untuk Mendapatkan Data Alat

       $.ajax({
           type: "POST",
           url: "http://localhost/pupr_new/generate_bulan/data_alat",
           data: {"tahun":tahun,"bulan":bulan,"id_perencanaan":id_perencanaan},
           dataType: "text",
           async:false,
           cache:false,
           success:
               function(data){
                   // alert(data);  //as a debugging message.
                   data=JSON.parse(data);
                   console.log("Data Saya");
                   console.log(data);
                   console.log("Data Saya");

                   let length=data.length;
                   let i=0;

                   while(i<length)
                   {


                       $("#buat_alat").append('  <tr>\n' +
                           '    <td class="tg-cly1">'+data[i].nama_jenis+'</td>\n' +
                           '    <td class="tg-cly1">'+data[i].satuan+'</td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'___1"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'___2"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'___3"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'___4"></td>\n' +
                           '    <td class="tg-cly1" id="'+data[i].jenis_pekerja+'___5"></td>\n' +
                           '  </tr>');


                       i++;
                   }
               }
       });

   //    Isi Tabel sekarang

       $.ajax({
           type: "POST",
           url: "http://localhost/pupr_new/generate_bulan/isi_data",
           data: {"tahun":tahun,"bulan":bulan,"id_perencanaan":id_perencanaan},
           dataType: "text",
           async:false,
           cache:false,
           success:
               function(data){
                   // alert(data);  //as a debugging message.
                   data=JSON.parse(data);

                   console.log("data_isi");
                   console.log(data);
                   console.log("data_isi");

                   // console.log(getWeeksInMonth(bulan, tahun));
                   // console.log(getDateRangeOfWeek(12));

                   let length=data.length;
                   let i=0;
                   let minggu_get;

                   while(i<length)
				   {
				       let z=1;
				       while(z<=54)
					   {

                           week=getDateRangeOfWeek(z);
                           week=week.split(" to ")
						   // console.log(week);
                           // console.log(week[0].toDateString());
                           tanggal_start=stringToDate(week[0],"MM/dd/yyyy","/");
                           tanggal_end=stringToDate(week[1],"MM/dd/yyyy","/");
                           tanggal_pilihan=new Date(data[i].id_lap_harian_mingguan);
                           // console.log(tanggal_start);
                           // console.log(tanggal_end);
                           // console.log(tanggal_pilihan);
                           if(tanggal_start<tanggal_pilihan && tanggal_pilihan<tanggal_end)
						   {
						       minggu_get=z;
						       console.log(minggu_get);
						   }

					       z++;
					   }

					   //Setelah minggu didapatkan, cari tahu minggu tersebut berada pada minggu keberapa dalam bulan tertentu

					   let y=1;
				       let $hasil=0;
                       let batas=parseInt(bulan)+1;

				       while(y<batas)
					   {
                           $data=getWeeksInMonth(y, tahun);
                           $hasil=parseInt($hasil)+parseInt($data);




					       y++;
					   }

					   console.log($hasil);

				       //Kurangi data yang dimiliki dengan total minggunya
					   $hasil_akhir=parseInt($hasil)-parseInt(minggu_get);
					   console.log($hasil_akhir);
					   //Masukkan semuanya ke tabel (warnai tabel dulu)
					   // $("#"+data[i].jenis_pekerja+"_"+$hasil_akhir).text("Coba Dulu");
                       $("#"+data[i].jenis_pekerja+"_"+$hasil_akhir).css("background-color","yellow");
                       $("#"+data[i].jenis_pekerja+"__"+$hasil_akhir).text(data[i].jumlah_pekerja);

				       i++;
				   }

               }
       });


       //    Isi Tabel Alat sekarang

       $.ajax({
           type: "POST",
           url: "http://localhost/pupr_new/generate_bulan/isi_data1",
           data: {"tahun":tahun,"bulan":bulan,"id_perencanaan":id_perencanaan},
           dataType: "text",
           async:false,
           cache:false,
           success:
               function(data){
                   // alert(data);  //as a debugging message.
                   data=JSON.parse(data);

                   console.log("data_isi");
                   console.log(data);
                   console.log("data_isi");

                   // console.log(getWeeksInMonth(bulan, tahun));
                   // console.log(getDateRangeOfWeek(12));

                   let length=data.length;
                   let i=0;
                   let minggu_get;

                   while(i<length)
                   {
                       let z=1;
                       while(z<=54)
                       {

                           week=getDateRangeOfWeek(z);
                           week=week.split(" to ")
                           // console.log(week);
                           // console.log(week[0].toDateString());
                           tanggal_start=stringToDate(week[0],"MM/dd/yyyy","/");
                           tanggal_end=stringToDate(week[1],"MM/dd/yyyy","/");
                           tanggal_pilihan=new Date(data[i].id_lap_harian_mingguan);
                           // console.log(tanggal_start);
                           // console.log(tanggal_end);
                           // console.log(tanggal_pilihan);
                           if(tanggal_start<tanggal_pilihan && tanggal_pilihan<tanggal_end)
                           {
                               minggu_get=z;
                               console.log(minggu_get);
                           }

                           z++;
                       }

                       //Setelah minggu didapatkan, cari tahu minggu tersebut berada pada minggu keberapa dalam bulan tertentu

                       let y=1;
                       let $hasil=0;
                       let batas=parseInt(bulan)+1;

                       while(y<batas)
                       {
                           $data=getWeeksInMonth(y, tahun);
                           $hasil=parseInt($hasil)+parseInt($data);




                           y++;
                       }

                       console.log($hasil);

                       //Kurangi data yang dimiliki dengan total minggunya
                       $hasil_akhir=parseInt($hasil)-parseInt(minggu_get);
                       console.log($hasil_akhir);
                       //Masukkan semuanya ke tabel (warnai tabel dulu)
                       // $("#"+data[i].jenis_pekerja+"_"+$hasil_akhir).text("Coba Dulu");

                       $("#"+data[i].jenis_pekerja+"___"+$hasil_akhir).text(data[i].jumlah_bahan);

                       i++;
                   }

               }
       });


   }

   //Query Untuk Jumlah Pekerja
	//SELECT *,COUNT(jumlah_pekerja) FROM detail_bahan_alat_harian WHERE YEAR(id_lap_harian_mingguan) = 2019 AND MONTH(id_lap_harian_mingguan) = 11 AND id_lap_perencanaan='1' GROUP BY jenis_pekerja

    // 77

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

   function testJesi()
   {
       alert("Generate Data");
   }



    function getDates(startDate, stopDate) {
        var dateArray = new Array();
        var currentDate = startDate;
        while (currentDate <= stopDate) {
            dateArray.push(new Date (currentDate));
            currentDate = currentDate.addDays(1);
        }
        return dateArray;
    }









    //	Mencari rentang tanggal minggu tertentu
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


    function hapusTabel()
    {
        $("#buat_tabel").empty();
        $("#buat_pekerja").empty();
        $("#buat_alat").empty();

    }

    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak_tabel");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' },
            pagebreak: { before: '.break'}
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();
    }
</script>






</body>

</html>
