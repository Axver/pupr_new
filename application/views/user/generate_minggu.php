
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
		td,th,table{
			border: 2px solid black;
			color:black;
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
									$this->db->select('*');
									$this->db->from('detail_paket');
									$this->db->join('paket', 'detail_paket.id_paket = paket.id_paket');
									$this->db->where("nip",$this->session->userdata("nip"));
//									$paket=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
									$paket=$this->db->get()->result();
									$count=count($paket);

									$i=0;
									while($i<$count)
									{
										?>
										<option value="<?php echo $paket[$i]->id_paket; ?>"><?php echo $paket[$i]->nama; ?></option>
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
								<button onclick="progress_now()" class="btn btn-info" id="generateData">Fill Progress</button>

								<script>
                                    $("#generateData").attr("disabled", true);
								</script>
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
										<option value="<?php echo $diperiksa[$i]->id_konfigurasi; ?>"><?php echo $diperiksa[$i]->nama; ?></option>
										<?php

										$i++;
									}
									?>
								</select>
								<br/>
								<b>Progres Selanjutnya:</b>
								<input type="text" class="form form-control" id="progres_selanjutnya">
								<br/>
								<b>Pagu</b>
								<input type="text" class="form form-control" id="pagu">
								<br/>


                                 <button class="btn btn-success" onclick="generatePDF()" style="width:100%;">Generate PDF</button>
<!--								Disini Posisi Tabelnya-->
								<div id="cetak_tabel">
									<br/>
									<center><b><h3>LAPORAN MINGGUAN PELAKSANAAN KEGIATAN</h3></b></center>
									<br/>
									<br/>

					                <div class="row">

										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-3">Nama Paket</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-3" id="nama_paket_1"></div>
											</div>

											<div class="row">
												<div class="col-sm-3">Jenis Pekerjaan</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-3" id="jp_jesi"></div>
											</div>

											<div class="row">
												<div class="col-sm-3">Lokasi</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-3" id="lokasi_jesi"></div>
											</div>

											<div class="row">
												<div class="col-sm-3">Pagu</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-3" id="pagu_isi"></div>
											</div>
										</div>
										<div class="col-sm-4" style="border:1px solid black;">
											<div class="row">
												<div class="col-sm-7">Progress Pekerjaan</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-4" id="progress-pekerjaan"></div>
											</div>
											<div class="row">
												<div class="col-sm-7">Progress Fisik Periode Lalu</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-4" id="progress-fisik-lalu"></div>
											</div>

											<div class="row">
												<div class="col-sm-7">Progress Fisik Selanjutnya</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-4" id="progress-fisik-next"></div>
											</div>
											<div class="row">
												<div class="col-sm-7">Progress Fisik Total</div>
												<div class="col-sm-1">:</div>
												<div class="col-sm-4" id="progress-fisik-total"></div>
											</div>
										</div>

									</div>

									<br/>

<!--									Tabelnya-->
									<table class="tg table" id="buat_tabel" >

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
									<div class="break"></div>

									<b>Rekapituasi Pekerja Minggu : </b><b class="uhuy"></b>

									<table class="tg table " id="buat_pekerja">
									</table>
									<div class="break"></div>

									<b>Rekapituasi Penggunaan Bahan/Alat Minggu : </b><b class="uhuy"></b>

									<table class="tg table" id="buat_alat">

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

									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3"><center><b>Diperiksa Oleh</b><br/><b id="konf_kerja"></b></center></div>
										<div class="col-sm-4"></div>
										<div class="col-sm-3"><center>
												<b>Jambi, <?php

													echo tgl_indo(date('Y-m-d'));  ?></b>
												<br/><b>Dibuat Oleh</b></center></div>
										<div class="col-sm-1"></div>
									</div>

									<br/>
									<br/>
									<br/>
									<div class="row">
										<div class="col-sm-1"></div>
										<div class="col-sm-3"><center><u><b id="diperiksa"> </b></u><br/><b id="nip_dip"></b></center></div>
										<div class="col-sm-4"></div>
										<div class="col-sm-3"><center><b id="dibuat"><?php
													$data=$this->db->get_where("account",array("nip"=>$this->session->userdata("nip")))->result();
													$count=count($data);
													$i=0;

													while($i<$count)
													{
														echo "<u>".$data[$i]->nama."</u>";
														echo "<br/>";
														echo "NIP:".$data[$i]->nip;

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
	{   $("#id_lap_perencanaan").empty();
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
						$("#id_lap_perencanaan").append('<option value="'+data[i].id_lap_perencanaan+'">'+data[i].keterangan+'</option>');
                        $("#tahun_hidden").val(data[i].tahun);
					    i++;
					}
                }
        });
	}


	function generateTabel()
	{
        let pagu_isi=$("#pagu").val();
        $("#pagu_isi").append(pagu_isi);
	    //Bulan minggu

	    let nama_paket=$("#id_paket option:selected").text();
	    // alert(nama_paket);
	    $("#nama_paket_1").text(nama_paket);

	    let diperiksa=$("#diperiksa_oleh option:selected").text();
	    $("#diperiksa").text(diperiksa);

	    let diperiksa_=$("#diperiksa_oleh").val();
	    // alert(diperiksa_);
	    //konf_kerja data
        $.ajax({
            type: "POST",
			async:false,
            url: "http://localhost/pupr_new/generate_minggu/bidang",
            data: {"id_konfigurasi":diperiksa_},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    let length=data.length;
                    let i=0;
                    // alert(data);

                    while(i<length)
					{
					    $("#konf_kerja").text(data[i].jabatan);
                        $("#nip_dip").text("NIP:"+data[i].nip);

					    i++;
					}
                }
        });



        $("#generateData").attr("disabled", false);
	    hapusTabel();
        buatAlat();
	    // alert("Generate Tabelnya!!");
	    let minggu=$("#id_minggu").val();
	    $(".uhuy").text(minggu);
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
						$("#jp_jesi").append('<br/>'+data[z].nama_jenis);

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

        $bulin=$("#bulan_diinginkan").val();
        $mingin=$("#id_minggu").val();
        // alert($mingin);
        // $("#bulan_minggu").text($bulin+"("+$mingin+")");

		if($bulin=="1")
		{
		    $bulin="Januari";
		}
		else if($bulin=="2")
        {
            $bulin="Februari";
        }
        if($bulin=="3")
        {
            $bulin="Maret";
        }
        if($bulin=="4")
        {
            $bulin="April";
        }
        if($bulin=="5")
        {
            $bulin="Mei";
        }
        if($bulin=="6")
        {
            $bulin="Juni";
        }
        if($bulin=="7")
        {
            $bulin="Juli";
        }
        if($bulin=="8")
        {
            $bulin="Agustus";
        }
        if($bulin=="9")
        {
            $bulin="September";
        }
        if($bulin=="10")
        {
            $bulin="Oktober";
        }
        if($bulin=="11")
        {
            $bulin="November";
        }
        if($bulin=="12")
        {
            $bulin="Desember";
        }


    //    Generate Tabel Detail Pekerja
		$("#buat_pekerja").append('<tr>\n' +
            '\t<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
            '\t<th class="tg-cly1" colspan="7">'+nama_tahap+'</th>\n' +
            '</tr>\n' +
            '<tr>\n' +
            '\t<td class="tg-cly1" colspan="7" id="bulam_minggu">'+$bulin+' Minggu ke-('+$mingin+')'+'</td>\n' +
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

        //Berikan Informasi Bagian Header Laporan Mingguan

		//Ambil informasi dari laporan perencanaan
		let laper_info=$("#id_lap_perencanaan").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/generate_minggu/info",
            data: {"id_laper":laper_info},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    let length=data.length;
                    let i=0;

                    while(i<length)
					{
					    $("#lokasi_jesi").text(data[i].lokasi);
					    i++;
					}
                }
        });








        swal("Tabel Digenerate!!");

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

                //Tukang Tanggal
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
                                $("#"+data[i].jenis_pekerja+"_"+batas_tabel+"_tukang").append(data[i].jumlah_tukang);

                                i++;
                            }

                        }
                });

                var newDate = start.setDate(start.getDate() + 1);

                batas_tabel++;
            }

        }
        generate_progress();
        generate_progress_sebelumnya();
        progress_now();
        //Progres fisik
        let selanjutnya=$("#progres_selanjutnya").val();
        $("#progress-fisik-next").text(selanjutnya+"%");

        //Progress Total


        swal("Data Digenerate!!");


    //    Generate data progress

    }


    function generate_progress()
	{

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

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);


            //    Dapatkan Start dan ENd Dari Tanggal Tersebut
            rentang_hari = rentang_hari.split(" to ");

            let id_lap_perencanaan_baru = $("#id_lap_perencanaan").val();
			//Sum Jumlah Pekerja
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/generate_minggu/between_pekerja",
                data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                async: false,
                dataType: "text",
                cache: false,
                success:
                    function (data) {
                        data = JSON.parse(data);

                        let jumlah_pekerja_total;
                        let length=data.length;
                        let i=0;
                        while(i<length)
						{
						    jumlah_pekerja_total=data[i].sum;
						    i++;
						}


                        //Sum Jumlah Tukang
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/pupr_new/generate_minggu/between_tukang",
                            data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                            async: false,
                            dataType: "text",
                            cache: false,
                            success:
                                function (data) {
                                    data = JSON.parse(data);

                                    let jumlah_tukang_total=0;
                                    let length=data.length;
                                    let i=0;
                                    while(i<length)
                                    {
                                        jumlah_tukang_total=data[i].sum;
                                        i++;
                                    }


                                //    Ambil Bahan Alat
                                    let id_lap_perencanaan_jesi=$("#id_lap_perencanaan").val();

                                    //    Ajax Jenis Alat
                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost/pupr_new/generate_minggu/jenis_alat1",
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
                                                let length=data.length;
                                                let z=0;
                                                let jumlah_alat_total=0;

                                                while(z<length)
												{
												    jumlah_alat_total=parseInt(jumlah_alat_total)+(parseInt(data[z].sum)*parseInt(data[z].harga));

												    z++;
												}

												console.log("jumlahalattotal");
                                                console.log(jumlah_alat_total);
                                                console.log("jumlahalattotal");

                                                let total_all=parseInt(jumlah_pekerja_total)+parseInt(jumlah_tukang_total)+parseInt(jumlah_alat_total);

                                            //    Ambil nilai paket
												let id_paket_hmm=$("#id_paket").val();
                                                $.ajax({
                                                    type: "POST",
													async:false,
                                                    url: "http://localhost/pupr_new/generate_minggu/nilai_paket",
                                                    data: {"id_paket":id_paket_hmm},
                                                    dataType: "text",
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            let length=data.length;
                                                            let i=0;
                                                            let nilai_paket=0;
                                                            while(i<length)
															{
															    nilai_paket=data[i].nilai_paket;

															    i++;
															}

                                                            nilai_paket=parseInt(nilai_paket);

                                                            let hasil_akhir=total_all/nilai_paket;
															// console.log(total_all);

                                                            hasil_akhir=parseFloat(hasil_akhir);
                                                            hasil_akhir=hasil_akhir.toFixed(2);
                                                            hasil_akhir=hasil_akhir*100;

                                                        //    Append kan datanya gan
															if(Number.isNaN(hasil_akhir))
															{
                                                                $("#progress-pekerjaan").text("0"+"%");
															}
                                                            else
															{
                                                                $("#progress-pekerjaan").text(hasil_akhir+"%");
															}


                                                        }
                                                });


                                            }
                                    });



                                }
                        });



                    }
            });
        }

	}


    function generate_progress_sebelumnya()
    {

        let id_minggu = $("#id_minggu").val();
        let bulan_diinginkan = $("#bulan_diinginkan").val();
        let tahun_hidden = $("#tahun_hidden").val();

        if(id_minggu==1)
		{
		    id_minggu=5;
		    bulan_diinginkan=parseInt(bulan_diinginkan)-1;
		}
        else
		{

		}

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

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);


            //    Dapatkan Start dan ENd Dari Tanggal Tersebut
            rentang_hari = rentang_hari.split(" to ");

            let id_lap_perencanaan_baru = $("#id_lap_perencanaan").val();
            //Sum Jumlah Pekerja
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/generate_minggu/between_pekerja",
                data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                async: false,
                dataType: "text",
                cache: false,
                success:
                    function (data) {
                        data = JSON.parse(data);

                        let jumlah_pekerja_total=0;
                        let length=data.length;
                        let i=0;
                        while(i<length)
                        {
                            jumlah_pekerja_total=data[i].sum;
                            i++;
                        }

                        console.log("jumlah_pekerja_total:"+jumlah_pekerja_total);


                        //Sum Jumlah Tukang
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/pupr_new/generate_minggu/between_tukang",
                            data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                            async: false,
                            dataType: "text",
                            cache: false,
                            success:
                                function (data) {
                                    data = JSON.parse(data);

                                    let jumlah_tukang_total=0;
                                    let length=data.length;
                                    let i=0;
                                    while(i<length)
                                    {
                                        jumlah_tukang_total=data[i].sum;
                                        i++;
                                    }

                                    console.log("jumlah_tukang_total:"+jumlah_tukang_total);


                                    //    Ambil Bahan Alat
                                    let id_lap_perencanaan_jesi=$("#id_lap_perencanaan").val();

                                    //    Ajax Jenis Alat
                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost/pupr_new/generate_minggu/jenis_alat1",
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
                                                let length=data.length;
                                                let z=0;
                                                let jumlah_alat_total=0;

                                                while(z<length)
                                                {
                                                    jumlah_alat_total=parseInt(jumlah_alat_total)+(parseInt(data[z].sum)*parseInt(data[z].harga));

                                                    z++;
                                                }
                                                console.log("jumlah_alat_total:"+jumlah_alat_total);

                                                let total_all=parseInt(jumlah_pekerja_total)+parseInt(jumlah_tukang_total)+parseInt(jumlah_alat_total);

                                                //    Ambil nilai paket
                                                let id_paket_hmm=$("#id_paket").val();
                                                $.ajax({
                                                    type: "POST",
                                                    async:false,
                                                    url: "http://localhost/pupr_new/generate_minggu/nilai_paket",
                                                    data: {"id_paket":id_paket_hmm},
                                                    dataType: "text",
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            let length=data.length;
                                                            let i=0;
                                                            let nilai_paket=0;
                                                            while(i<length)
                                                            {
                                                                nilai_paket=data[i].nilai_paket;

                                                                i++;
                                                            }
                                                            console.log("Nilai Paket Total:"+nilai_paket);

                                                            nilai_paket=parseInt(nilai_paket);

                                                            let hasil_akhir=total_all/nilai_paket;
                                                            // console.log(total_all);

                                                            hasil_akhir=parseFloat(hasil_akhir);
                                                            console.log(hasil_akhir);
                                                            hasil_akhir=hasil_akhir.toFixed(2);
                                                            hasil_akhir=parseFloat(hasil_akhir)*100;

                                                            //    Append kan datanya gan
                                                            if(Number.isNaN(hasil_akhir))
                                                            {
                                                                $("#progress-fisik-lalu").text("0"+"%");
                                                            }
                                                            else
                                                            {
                                                                $("#progress-fisik-lalu").text(hasil_akhir+"%");
                                                            }
                                                        }
                                                });


                                            }
                                    });



                                }
                        });



                    }
            });
        }
        else
		{
            id_minggu=4;
            //    Jika minggunya ada sekarang check tanggak berapa di minggu tersebut
            let y = 1;
            let total_minggu = 0;

            while (y <= bulan_diinginkan) {
                total_minggu = total_minggu + getWeeksInMonth(y, tahun_hidden)
                //hitung jumlah minggu yang ada

                y++;
            }

            total_minggu = parseInt(total_minggu) - parseInt(check) + parseInt(id_minggu);

            //    Selanjutnya cari tahu tanggal berapa di minggu tersebut

            let rentang_hari = getDateRangeOfWeek(total_minggu);


            //    Dapatkan Start dan ENd Dari Tanggal Tersebut
            rentang_hari = rentang_hari.split(" to ");

            let id_lap_perencanaan_baru = $("#id_lap_perencanaan").val();
            //Sum Jumlah Pekerja
            $.ajax({
                type: "POST",
                url: "http://localhost/pupr_new/generate_minggu/between_pekerja",
                data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                async: false,
                dataType: "text",
                cache: false,
                success:
                    function (data) {
                        data = JSON.parse(data);

                        let jumlah_pekerja_total=0;
                        let length=data.length;
                        let i=0;
                        while(i<length)
                        {
                            jumlah_pekerja_total=data[i].sum;
                            i++;
                        }
                        // if(jumlah_pekerja_total==null)
						// {
						//     jumlah_pekerja_total=0;
						// }
                        console.log("jumlah_pekerja_total:"+jumlah_pekerja_total);


                        //Sum Jumlah Tukang
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/pupr_new/generate_minggu/between_tukang",
                            data: {"start": rentang_hari[0], "end": rentang_hari[1],"id_lap_perencanaan":id_lap_perencanaan_baru},
                            async: false,
                            dataType: "text",
                            cache: false,
                            success:
                                function (data) {
                                    data = JSON.parse(data);

                                    let jumlah_tukang_total=0;
                                    let length=data.length;
                                    let i=0;
                                    while(i<length)
                                    {
                                        jumlah_tukang_total=data[i].sum;
                                        i++;
                                    }

                                    console.log("jumlah_tukang_total:"+jumlah_tukang_total);

                                    // if(jumlah_tukang_total==null)
									// {
									//     jumlah_tukang_total=0;
									// }


                                    //    Ambil Bahan Alat
                                    let id_lap_perencanaan_jesi=$("#id_lap_perencanaan").val();

                                    //    Ajax Jenis Alat
                                    $.ajax({
                                        type: "POST",
                                        url: "http://localhost/pupr_new/generate_minggu/jenis_alat1",
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
                                                let length=data.length;
                                                let z=0;
                                                let jumlah_alat_total=0;

                                                while(z<length)
                                                {
                                                    jumlah_alat_total=parseInt(jumlah_alat_total)+(parseInt(data[z].sum)*parseInt(data[z].harga));

                                                    z++;
                                                }
                                                console.log("jumlah_alat_total:"+jumlah_alat_total);

                                                let total_all=parseInt(jumlah_pekerja_total)+parseInt(jumlah_tukang_total)+parseInt(jumlah_alat_total);

                                                //    Ambil nilai paket
                                                let id_paket_hmm=$("#id_paket").val();
                                                $.ajax({
                                                    type: "POST",
                                                    async:false,
                                                    url: "http://localhost/pupr_new/generate_minggu/nilai_paket",
                                                    data: {"id_paket":id_paket_hmm},
                                                    dataType: "text",
                                                    cache:false,
                                                    success:
                                                        function(data){
                                                            data=JSON.parse(data);
                                                            let length=data.length;
                                                            let i=0;
                                                            let nilai_paket=0;
                                                            while(i<length)
                                                            {
                                                                nilai_paket=data[i].nilai_paket;

                                                                i++;
                                                            }

                                                            console.log("Nilai:"+nilai_paket);

                                                            nilai_paket=parseInt(nilai_paket);

                                                            let hasil_akhir=total_all/nilai_paket;

                                                            console.log(hasil_akhir);
                                                            // console.log(total_all);

                                                            hasil_akhir=parseFloat(hasil_akhir);
                                                            hasil_akhir=hasil_akhir.toFixed(2);
                                                            hasil_akhir=parseFloat(hasil_akhir)*100;

                                                            //    Append kan datanya gan
															if(Number.isNaN(hasil_akhir))
															{
                                                                $("#progress-fisik-lalu").text("0"+"%");
															}
															else
															{
                                                                $("#progress-fisik-lalu").text(hasil_akhir+"%");
															}

                                                        }
                                                });


                                            }
                                    });



                                }
                        });



                    }
            });

        }

    }


    function progress_now()
	{
        let now=$("#progress-pekerjaan").text();
        let then=$("#progress-fisik-lalu").text();

        now=now.substring(0, now.length - 1);
        then=then.substring(0, then.length - 1);


        if(now=="NaN")
		{
		    now=0;
		}

        if(then=="NaN")
		{
		    then=0;
		}

        //Jumlahkan
		let fixed=parseFloat(now)+parseFloat(then);
        $("#progress-fisik-total").text(fixed+"%");



        console.log("hmmmm");
        console.log(now);
        console.log("hmmmm");
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
            pagebreak: { before: '.break' }
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();
    }


    function buatAlat()
	{
        let nama_tahap=$("#nama_tahap").val();
        $bulin=$("#bulan_diinginkan").val();
        $mingin=$("#id_minggu").val();
        // alert($mingin);
        // $("#bulan_minggu").text($bulin+"("+$mingin+")");

        if($bulin=="1")
        {
            $bulin="Januari";
        }
        else if($bulin=="2")
        {
            $bulin="Februari";
        }
        if($bulin=="3")
        {
            $bulin="Maret";
        }
        if($bulin=="4")
        {
            $bulin="April";
        }
        if($bulin=="5")
        {
            $bulin="Mei";
        }
        if($bulin=="6")
        {
            $bulin="Juni";
        }
        if($bulin=="7")
        {
            $bulin="Juli";
        }
        if($bulin=="8")
        {
            $bulin="Agustus";
        }
        if($bulin=="9")
        {
            $bulin="September";
        }
        if($bulin=="10")
        {
            $bulin="Oktober";
        }
        if($bulin=="11")
        {
            $bulin="November";
        }
        if($bulin=="12")
        {
            $bulin="Desember";
        }
	    $("#buat_alat").append('\t<tr >\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-nrix" rowspan="3">Jenis Bahan Alat</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-nrix" rowspan="3">Satuan</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<th class="tg-cly1" colspan="7">'+nama_tahap+'</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t</tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t\t<td class="tg-nrix" colspan="7">'+$bulin+' Minggu ke-('+$mingin+')'+'</td>\n' +
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
