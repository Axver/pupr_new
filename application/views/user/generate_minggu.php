
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
								<b>Pilih Minggu:</b>
								<select class="form form-control" id="id_minggu">
									<?php
									$i=1;
									while($i<=5)
									{
										?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php

										$i++;
									}
									?>
								</select>
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
								<b>Bulan Pertama</b>
								<select id="bulan_pertama" class="form form-control">
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
								<b>Bulan Terakhir</b>
								<select id="bulan_terakhir" class="form form-control">
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
								<button onclick="testJesi()" class="btn btn-info" id="generateData">Generate Data</button>

								<script>
                                    $("#generateData").attr("disabled", true);
								</script>
								<br/>
								<br/>

                                 <button class="btn btn-success" onclick="generatePDF()" style="width:100%;">Generate PDF</button>
<!--								Disini Posisi Tabelnya-->
								<div id="cetak_tabel">
									<br/>
									<center><b><h3>LAPORAN MINGGUAN PELAKSANAAN KEGIATAN</h3></b></center>
									<br/>
									<br/>

<!--									Tabelnya-->
									<table class="tg table table-bordered" id="buat_tabel">

<!--
<!--										<tr>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-cly1"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--										</tr>-->
									</table>

									<table class="tg table table-bordered" id="buat_pekerja">
									</table>

									<table class="tg table table-bordered" id="buat_alat">

<!--										<tr>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--											<td class="tg-0lax"></td>-->
<!--										</tr>-->
									</table>

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
            url: "http://localhost/pupr_new/generate_minggu/laporan_perencanaan",
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

        $("#generateData").attr("disabled", false);
	    hapusTabel();
        buatAlat();
	    // alert("Generate Tabelnya!!");
	    let minggu=$("#id_minggu").val();
	    let bulan_pertama=$("#bulan_pertama").val();
	    let bulan_terakhir=$("#bulan_terakhir").val();
	    let nama_tahap=$("#nama_tahap").val();

	    let rentang=bulan_terakhir-bulan_pertama+1;
	    let colspan1=rentang*5;



	    $("#buat_tabel").append('<tr>\n' +
            '\t<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
            '\t<th class="tg-nrix" colspan="'+colspan1+'">'+nama_tahap+'</th>\n' +
            '</tr>');
        let daftar_bulam=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
	    //append new row again
		$("#buat_tabel").append("<tr id='bulan'></tr>");
        let start_bulan=bulan_pertama;
	    let i=0;
	    while(i<rentang)
		{
		    $("#bulan").append('<td class="tg-cly1" colspan="5">'+daftar_bulam[start_bulan-1]+'</td>');
		    start_bulan++;

		    i++;
		}

		//Buat Perulangan Untuk Minggunya
		$("#buat_tabel").append("<tr id='minggu'></tr>");

	    //String Builder Untuk Minggunya
		let y=0;
		$stringBuilder="";
		while(y<rentang)
		{
           $stringBuilder=$stringBuilder+"<td class=\"tg-cly1\">1</td>\n" +
               "\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tg-cly1\">2</td>\n" +
               "\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tg-cly1\">3</td>\n" +
               "\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tg-cly1\">4</td>\n" +
               "\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"tg-cly1\">5</td>";
		    y++;
		}

		$("#minggu").append($stringBuilder);

		let id_lap_perencanaan=$("#id_lap_perencanaan").val();

		//Dapatkan Jenis Pekerjaan Pada Laporan Perencanaan Yang Dibuat sesuai dengan data pada Tabel Detail Bahan Alat
		// alert(id_lap_perencanaan);
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/generate_minggu/jenis_pekerjaan",
			asynd:false,
            data: {"id_lap_perencanaan":id_lap_perencanaan},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    // console.log(data);

                    let length=data.length;
                    let z=0;
                    while(z<length)
					{
					    $("#buat_tabel").append("<tr id='"+z+"'></tr>");

					    //String Builder
						let strNew='<td class="tg-cly1">'+data[z].nama_jenis+'</td>';
						// console.log(data);
						let v=0;
						while(v<colspan1)
						{
						    n=v+1;
                            strNew=strNew+'<td class="tg-cly1 warnaJesi" id="'+data[z].id+'_'+n+'"></td>';
						    v++;
						}
                        $("#"+z).append(strNew);
						// console.log(strNew);

					    z++;
					}
                }
        });


    //    Generate Tabel Detail Pekerja
		$("#buat_pekerja").append('<tr>\n' +
            '\t<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
            '\t<th class="tg-cly1" colspan="7"></th>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '\t<td class="tg-cly1" colspan="7">Bulan(Minggu X)</td>\n' +
            '</tr>');

	//	String Builder Untuk Tanggalnya
		$("#buat_pekerja").append("<tr id='hari_nya'></tr>")
		$pekerjaString="";

	//	Dapatkan tanggalnya cari minggu keberapa dia
        // alert(rentang);

        //	Dapatkan Jumlah Minggu masing-masing bulan
        //	Check apakah minggunya memang tersedia
        let id_minggu=$("#id_minggu").val();
        let bulan_diinginkan=$("#bulan_diinginkan").val();
        let tahun_hidden=$("#tahun_hidden").val();

        let check=getWeeksInMonth(bulan_diinginkan, tahun_hidden);
        // alert(check);

        if(id_minggu<=check) {
            //    Jika minggunya ada sekarang check tanggak berapa di minggu tersebut
            let y = 1;
            let total_minggu = 0;

            while (y <= bulan_diinginkan) {
                total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                //hitung jumlah minggu yang ada

                y++;
            }

            total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);
            // console.log("-------");
            // console.log(total_minggu);
            // console.log("--------");

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);
            rentang_hari=rentang_hari.split(" to ");
            // console.log(rentang_hari);
            let dataX=rentang_hari[0].split("/");
            let dataStart=dataX[1];
            let dateY=rentang_hari[1].split("/");
            let dataEnd=dateY[1];

            // let bm=0;
            // while(bm<7)
			// {
            //
			//     bm++;
			//     dataStart++;
			// }

		//	Append Data String ke Tr Sebelumnya


            //Ubah Format Date

            var start = new Date(rentang_hari[0]);
            var end = new Date(rentang_hari[1]);
            var newend = end.setDate(end.getDate()+1);
            var end = new Date(newend);
            while(start < end){
                // console.log(new Date(start).getTime() / 1000); // unix timestamp format
                // console.log(start); // ISO Date format
				day=start.toLocaleDateString();

				// console.log(day);
				//dapatkan day nya dan append gan
                $pekerjaString=$pekerjaString+'<td class="tg-cly1">'+day+'</td>';


                var newDate = start.setDate(start.getDate() + 1);




            }

            $("#hari_nya").append($pekerjaString);

        //    Append kan semua pekerjaan yang ada

            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/generate_minggu/jenis_pekerjaan",
                asynd:false,
                data: {"id_lap_perencanaan":id_lap_perencanaan},
                dataType: "text",
                cache:false,
                success:
                    function(data){
                        data=JSON.parse(data);
                        // console.log(data);

                        let length=data.length;
                        let z=0;
                        while(z<length)
                        {
                            $("#buat_pekerja").append("<tr id='"+z+'_'+"'></tr>");
                            $("#buat_pekerja").append("<tr id='"+z+'_tukang'+"'></tr>");
                            $("#buat_pekerja").append("<tr id='"+z+'_pekerja'+"'></tr>");

                            //String Builder
                            let strNew='<td class="tg-cly1">'+data[z].nama_jenis+'</td>';
                            let strTukang='<td class="tg-cly1"><center>Tukang</center></td>';
                            let strPekerja='<td class="tg-cly1"><center>Pekerja</center></td>';
                            // console.log(data);
                            let v=0;
                            while(v<7)
                            {
                                n=v+1;
                                strNew=strNew+'<td class="tg-cly1 warnaJesi" id="'+data[z].id+'_'+n+'_'+'"></td>';
                                strTukang=strTukang+'<td class="tg-cly1 warnaJesi" id="'+data[z].id+'_'+n+'_tukang'+'"></td>';
                                strPekerja=strPekerja+'<td class="tg-cly1 warnaJesi" id="'+data[z].id+'_'+n+'_pekerja'+'"></td>';
                                v++;
                            }
                            $("#"+z+'_').append(strNew);
                            $("#"+z+'_tukang').append(strTukang);
                            $("#"+z+'_pekerja').append(strPekerja);
                            // console.log(strNew);

                            z++;
                        }
                    }
            });
        }


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


	function testJesi() {
        // alert(rentang);
        $("#generateData").attr("disabled", true);

        //	Dapatkan Jumlah Minggu masing-masing bulan
        //	Check apakah minggunya memang tersedia
        let id_minggu = $("#id_minggu").val();
        let bulan_diinginkan = $("#bulan_diinginkan").val();
        let tahun_hidden = $("#tahun_hidden").val();

        let check = getWeeksInMonth(bulan_diinginkan, tahun_hidden);
        // alert(check);

        if (id_minggu <= check) {
            //    Jika minggunya ada sekarang check tanggak berapa di minggu tersebut
            let y = 1;
            let total_minggu = 0;

            while (y <= bulan_diinginkan) {
                total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                //hitung jumlah minggu yang ada

                y++;
            }

            total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);
            // console.log("-------");
            // console.log(total_minggu);
            // console.log("--------");

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);


            //    Dapatkan Start dan ENd Dari Tanggal Tersebut
            rentang_hari = rentang_hari.split(" to ");
            // console.log(rentang_hari);
            //    Select Beetwen Date From Database
            let id_lap_perencanaan_baru=$("#id_lap_perencanaan").val();

            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/generate_minggu/between_date",
                data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                async: false,
                dataType: "text",
                cache: false,
                success:
                    function (data) {
                        data = JSON.parse(data);
                        // console.log("&&&&&&&&");
                        // console.log(data);
                        // console.log("&&&&&&&&");

                        let length = data.length;
                        let i = 0;
                        //Tentukan di nomor berapa minggunya
                        let minggu = $("#id_minggu").val();
                        let bulan_diinginkan = $("#bulan_diinginkan").val();
                        let bulan_pertama = $("#bulan_pertama").val();
                        let bulan_terakhir = $("#bulan_terakhir").val();

                        bulan_diinginkan = parseInt(bulan_diinginkan);
                        bulan_pertama = parseInt(bulan_pertama);
                        bulan_terakhir = parseInt(bulan_terakhir);

                        while (i < length) {
                            //Cek apakah bulan diinginkan antara bulan pertama dan bulan terakhir

                            if (bulan_diinginkan >= bulan_pertama && bulan_diinginkan <= bulan_terakhir) {
                                //Periksa posisi ke berapa bulan diinginkan
                                let bulan_posisi = bulan_diinginkan - bulan_pertama;
                                let x = 0;
                                if (bulan_posisi == 0) {
                                    //    Jika bulannya cuma satu append langsung

                                    // $("#"+data[i].jenis_pekerja+"_"+minggu).text("Haha");

                                    // console.log("----");

                                    let jn = document.getElementById(data[i].jenis_pekerja + "_" + minggu);
                                    jn.style.backgroundColor = "lightblue";


                                    // console.log("-----");

                                } else {
                                    //    Kalau bulannya ada beberapa maka lakukan beberapa langkah berikut


                                    // console.log("hehehe");
                                    let bulan_n = bulan_posisi * 5;
                                    // console.log(bulan_n);
                                    bulan_n = parseInt(bulan_n) + parseInt(minggu);
                                    // console.log(bulan_n);
                                    // console.log("hehehe");

                                    let jn1 = document.getElementById(data[i].jenis_pekerja + "_" + bulan_n);
                                    jn1.style.backgroundColor = "lightblue";


                                }


                            }


                            i++;
                        }

                        //    Sekarang warnai Tabelnya
                    }
            });


        } else {
            alert("Bulan Dipilih Tidak Memiliki Minggu Dipilih");
        }


        //    Generate Data Untuk Pekerja dan Tukang

        //	Dapatkan tanggalnya cari minggu keberapa dia
        // alert(rentang);

        //	Dapatkan Jumlah Minggu masing-masing bulan
        //	Check apakah minggunya memang tersedia
        // let id_minggu=$("#id_minggu").val();
        // let bulan_diinginkan=$("#bulan_diinginkan").val();
        // let tahun_hidden=$("#tahun_hidden").val();
        //
        // let check=getWeeksInMonth(bulan_diinginkan, tahun_hidden);
        // alert(check);

        if (id_minggu <= check) {
            //    Jika minggunya ada sekarang check tanggak berapa di minggu tersebut
            let y = 1;
            let total_minggu = 0;

            while (y <= bulan_diinginkan) {
                total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                //hitung jumlah minggu yang ada

                y++;
            }

            total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);
            // console.log("-------");
            // console.log(total_minggu);
            // console.log("--------");

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);
            rentang_hari = rentang_hari.split(" to ");
            // console.log(rentang_hari);
            let dataX = rentang_hari[0].split("/");
            let dataStart = dataX[1];
            let dateY = rentang_hari[1].split("/");
            let dataEnd = dateY[1];

            // let bm=0;
            // while(bm<7)
            // {
            //
            //     bm++;
            //     dataStart++;
            // }

            //	Append Data String ke Tr Sebelumnya


            //Ubah Format Date

            var start = new Date(rentang_hari[0]);
            var end = new Date(rentang_hari[1]);
            var newend = end.setDate(end.getDate() + 1);
            var end = new Date(newend);
            let batas_tabel=1;
            while (start < end) {
                // console.log(new Date(start).getTime() / 1000); // unix timestamp format
                // console.log(start); // ISO Date format
                day = start.toLocaleDateString();

                // console.log("wihihihihi");
                // console.log(day);
                // console.log("wihihihihi");
                //dapatkan day nya dan append gan
                // $pekerjaString = $pekerjaString + '<td class="tg-cly1">' + day + '</td>';

				//Ajax Untuk Mencari Data tanggal tersebut
                let id_lap_perencanaan_baru=$("#id_lap_perencanaan").val();


                $.ajax({
                    type: "POST",
                    url: "http://localhost/pupr_new/generate_minggu/pekerjaan_tanggal",
                    data: {"tanggal":day,'id_lap_perencanaan':id_lap_perencanaan_baru},
					async:false,
                    dataType: "text",
                    cache:false,
                    success:
                        function(data){
                            data=JSON.parse(data);
                            // console.log("iniininin");
                            // console.log(data);
                            // console.log("inininiini");
                            let length=data.length;
                            let i=0;
                            while(i<length)
							{
							    data[i].jumlah_pekerja;
							    $("#"+data[i].jenis_pekerja+"_"+batas_tabel+"_pekerja").append(data[i].jumlah_pekerja);

							    i++;
							}

                        }
                });

                var newDate = start.setDate(start.getDate() + 1);

                batas_tabel++;
            }

        }
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
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' }
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();
    }


    function buatAlat()
	{
	    $("#buat_alat").append('\t<tr >\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-nrix" rowspan="3">Jenis Bahan Alat</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-nrix" rowspan="3">Satuan</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-cly1" colspan="7"></th>\n' +
            '\t\t\t\t\t\t\t\t\t\t</tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<td class="tg-nrix" colspan="7">Minggu Ke</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t</tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<tr id="hari_nya1">\n' +

            '\t\t\t\t\t\t\t\t\t\t</tr>');


        //	String Builder Untuk Tanggalnya
        // $("#buat_pekerja").append("<tr id='hari_nya'></tr>")
        $pekerjaString="";

        //	Dapatkan tanggalnya cari minggu keberapa dia
        // alert(rentang);

        //	Dapatkan Jumlah Minggu masing-masing bulan
        //	Check apakah minggunya memang tersedia
        let id_minggu=$("#id_minggu").val();
        let bulan_diinginkan=$("#bulan_diinginkan").val();
        let tahun_hidden=$("#tahun_hidden").val();

        let check=getWeeksInMonth(bulan_diinginkan, tahun_hidden);
        // alert(check);

        if(id_minggu<=check) {
            //    Jika minggunya ada sekarang check tanggak berapa di minggu tersebut
            let y = 1;
            let total_minggu = 0;

            while (y <= bulan_diinginkan) {
                total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                //hitung jumlah minggu yang ada

                y++;
            }

            total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);
            // console.log("-------");
            // console.log(total_minggu);
            // console.log("--------");

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);
            rentang_hari = rentang_hari.split(" to ");
            // console.log(rentang_hari);
            let dataX = rentang_hari[0].split("/");
            let dataStart = dataX[1];
            let dateY = rentang_hari[1].split("/");
            let dataEnd = dateY[1];

            // let bm=0;
            // while(bm<7)
            // {
            //
            //     bm++;
            //     dataStart++;
            // }

            //	Append Data String ke Tr Sebelumnya


            //Ubah Format Date

            var start = new Date(rentang_hari[0]);
            console.log(start);
            var end = new Date(rentang_hari[1]);
            var newend = end.setDate(end.getDate() + 1);
            var end = new Date(newend);
            while (start < end) {
                // console.log(new Date(start).getTime() / 1000); // unix timestamp format
                // console.log(start); // ISO Date format
                day = start.toLocaleDateString();

                // console.log(day);
                //dapatkan day nya dan append gan
                $pekerjaString = $pekerjaString + '<td class="tg-cly1">' + day + '</td>';


                var newDate = start.setDate(start.getDate() + 1);


            }
            console.log(start);

            $("#hari_nya1").append($pekerjaString);
        }

        let id_lap_perencanaan_jesi=$("#id_lap_perencanaan").val();

    //    Ajax Jenis Alat
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/generate_minggu/jenis_alat",
            asynd:false,
            data: {"id_lap_perencanaan":id_lap_perencanaan_jesi},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    // console.log("jesijesijesi");
                    // console.log(data);
                    // console.log("jesijesijesi");

					console.log(data);





                    let length=data.length;
                    let z=0;

                    while(z<length)
                    {
                        $pekerjaString1="";
                        let $strBuilder="";
                        $strBuilder=$strBuilder+'<td class="tg-0lax">'+data[z].jenis_bahan_alat+'</td>'+'\t\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[z].satuan+'</td>\n';

                        let y = 1;
                        let total_minggu = 0;

                        while (y <= bulan_diinginkan) {
                            total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                            //hitung jumlah minggu yang ada

                            y++;
                        }

                        total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);
                        // console.log("-------");
                        // console.log(total_minggu);
                        // console.log("--------");

                        //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

                        let rentang_hari = getDateRangeOfWeek(total_minggu);
                        rentang_hari = rentang_hari.split(" to ");
                        // console.log(rentang_hari);
                        let dataX = rentang_hari[0].split("/");
                        let dataStart = dataX[1];
                        let dateY = rentang_hari[1].split("/");
                        let dataEnd = dateY[1];
                        var start = new Date(rentang_hari[0]);
                        console.log(start);
                        var end = new Date(rentang_hari[1]);
                        var newend = end.setDate(end.getDate() + 1);
                        end = new Date(newend);
                        while (start < end) {
                            // console.log(new Date(start).getTime() / 1000); // unix timestamp format
                            // console.log(start); // ISO Date format
                            day = start.toLocaleDateString();

                            // console.log(day);
                            //dapatkan day nya dan append gan
							day=day.split("/");
                            $pekerjaString1 = $pekerjaString1 + '<td class="tg-cly1" id="'+ z+""+day[0] +'"></td>';


                            var newDate = start.setDate(start.getDate() + 1);


                        }

                        $strBuilder="<tr>"+$strBuilder+$pekerjaString1+"</tr>";

                        console.log($strBuilder);

                        $("#buat_alat").append($strBuilder);


                        //Isikan datanya ke dalam sekarang
						var isi=data[z].id_lap_harian_mingguan;
                        // newStr = isi.replace(/[^a-z0-9]/gi, '-');
                        var res = isi.split("-");

                        if(res[2].charAt(0)=='0')
						{
						    res[2]=res[2].replace('0','');
						}

                        // $strNew=res[2]+"/"+res[1]+"/"+res[0];

							// alert(newStr);
						$("#"+z+res[2]).text(data[z].jumlah_bahan);

						console.log("Hmmm");
						// console.log(z+"_"+$strNew);
						console.log("Hmmmm");



                        z++;
                    }
                }
        });
	}
</script>




<!--<tr>-->
<!--	<td class="tg-cly1">Tanggal 1</td>-->
<!--	<td class="tg-cly1">Tanggal 2</td>-->
<!--	<td class="tg-cly1">Tanggal 3</td>-->
<!--	<td class="tg-cly1">Tanggal 4</td>-->
<!--	<td class="tg-cly1">Tanggal 5</td>-->
<!--	<td class="tg-cly1">Tanggal 6</td>-->
<!--	<td class="tg-cly1">Tanggal 7</td>-->
<!--</tr>-->
<!--<tr>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--	<td class="tg-cly1"></td>-->
<!--</tr>-->
<!--<tr>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--</tr>-->
<!--<tr>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--	<td class="tg-0lax"></td>-->
<!--</tr>-->








</body>

</html>
