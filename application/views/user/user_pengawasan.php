
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
								<h6 class="m-0 font-weight-bold text-primary">Laporan Pengawasan Anda</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">
                                 <b>Id Paket</b>
								<input type="hidden" class="form form-control" id="id_paket" value="<?php
																echo $this->uri->segment('3');
//								$data=$this->db->get_where("paket",array("id_paket"=> $this->uri->segment('3')))->result();
//								$count=count($data);
//								$i=0;
//
//								while($i<$count)
//								{
//
//									echo $data[$i]->nama;
//
//									$i++;
//								}
								?>" >
								<input type="text" class="form form-control" id="id_paketx" value="<?php
//								echo $this->uri->segment('3');
								$data=$this->db->get_where("paket",array("id_paket"=> $this->uri->segment('3')))->result();
								$count=count($data);
								$i=0;

								while($i<$count)
								{

									echo $data[$i]->nama;

									$i++;
								}
								?>" disabled>
								<b>Pilih Minggu</b>
								<select id="minggu" class="form form-control">
									<?php
									$i=1;
									while($i<=53)
									{
										?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
									<?php

										$i++;
									}
									?>
								</select>
								<b>Pilih Laporan Perencanaan</b>
								<select id="id_lap_perencanaan" class="form form-control">
									<?php
									$data=$this->db->get_where("lap_perencanaan",array("id_paket"=>$this->uri->segment("3")))->result();
									$count=count($data);

									$i=0;

									while($i<$count)
									{
										?>
										<option value="<?php echo $data[$i]->id_lap_perencanaan; ?>"><?php echo $data[$i]->keterangan; ?></option>
									<?php

										$i++;
									}
									?>
								</select>

								<h4><b>Isi Tabel Berikut:</b></h4>
								<button class="btn btn-info" onclick="tambahRow()">+</button>
								<b>*Klik Kolom Untuk Menambahkan Data</b>
								<table class="tg table table-bordered" id="tabel_pengawasan">
									<tr>
										<th class="tg-cly1" rowspan="2">Jenis Pekerjaan</th>
										<th class="tg-cly1" rowspan="2">Jumlah Pekerja</th>
										<th class="tg-cly1" colspan="3">Jumlah Satuan</th>
										<th class="tg-cly1" rowspan="2">Progress Pekerjaan (%)</th>
									</tr>
									<tr>
										<td class="tg-cly1">Jenis</td>
										<td class="tg-cly1">Satuan</td>
										<td class="tg-cly1">Jumlah</td>
									</tr>

								</table>

								<button class="btn btn-info" onclick="saveData()">Save Data</button>




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

<!--Modal Jenis Pekerjaan-->
<!-- Modal -->
<div class="modal fade" id="jenisPekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="jenis_pekerjaan_row" class="form form-control" disabled>

				<select class="form form-control" id="jenis_pekerjaan_text">
					<?php
					$jp=$this->db->get("jenis_pekerjaan")->result();
					$count=count($jp);

					$i=0;
					while($i<$count)
					{
						?>
						<option value="<?php echo $jp[$i]->nama_jenis; ?>"><?php echo $jp[$i]->nama_jenis; ?></option>
					<?php

						$i++;
					}

					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="savePekerjaan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!--Modal Jenis Pekerjaan-->
<!-- Modal -->
<div class="modal fade" id="jumlahPekerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="jumlah_pekerja_row" class="form form-control" disabled>
				<input type="text" id="jumlah_pekerja_text" class="form form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="savePekerja()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!--Modal Jenis Pekerjaan-->
<!-- Modal -->
<div class="modal fade" id="jenisSatuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="jenis_satuan_row" class="form form-control" disabled>

				<select class="form form-control" id="jenis_satuan_text" >
					<?php
					$data=$this->db->get("jenis_bahan_alat")->result();
					$count=count($data);
					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $data[$i]->jenis_bahan_alat; ?>"><?php echo $data[$i]->jenis_bahan_alat; ?></option>
					<?php

						$i++;
					}
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveJenisSatuan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!--Modal Jenis Pekerjaan-->
<!-- Modal -->
<div class="modal fade" id="satuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="satuan_row" class="form form-control" disabled>

				<select class="form form-control" id="satuan_text">
					<?php
					$data=$this->db->get("satuan")->result();
					$count=count($data);
					$i=0;
					while($i<$count)
					{
						?>
						<option value="<?php echo $data[$i]->satuan; ?>"><?php echo $data[$i]->satuan; ?></option>
					<?php

						$i++;
					}
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveSatuan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="jumlahSatuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="jumlah_satuan_row" class="form form-control" disabled>
				<input type="text" id="jumlah_satuan_text" class="form form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveJumlahSatuan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="progres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="progres_row" class="form form-control" disabled>
				<input type="text" id="progres_text" class="form form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveProgres()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<script>
    function savePekerjaan() {
        let jenis_pekerjaan_row=$("#jenis_pekerjaan_row").val();
        let jenis_pekerjaan_text=$("#jenis_pekerjaan_text").val();

        $("#"+jenis_pekerjaan_row).text(jenis_pekerjaan_text);
        $("#jenisPekerjaan").modal("hide");

    }

    function savePekerja() {
        let jumlah_pekerja_row=$("#jumlah_pekerja_row").val();
        let jumlah_pekerja_text=$("#jumlah_pekerja_text").val();

        $("#"+jumlah_pekerja_row).text(jumlah_pekerja_text);
        $("#jumlahPekerja").modal("hide");

    }

    function saveJenisSatuan() {
        let jenis_satuan_row=$("#jenis_satuan_row").val();
        let jenis_satuan_text=$("#jenis_satuan_text").val();

        $("#"+jenis_satuan_row).text(jenis_satuan_text);
        $("#jenisSatuan").modal("hide");

    }

    function saveSatuan() {
        let satuan_row=$("#satuan_row").val();
        let satuan_text=$("#satuan_text").val();

        $("#"+satuan_row).text(satuan_text);
        $("#satuan").modal("hide");

    }


    function saveJumlahSatuan() {
        let jumlah_satuan_row=$("#jumlah_satuan_row").val();
        let jumlah_satuan_text=$("#jumlah_satuan_text").val();

        $("#"+jumlah_satuan_row).text(jumlah_satuan_text);
        $("#jumlahSatuan").modal("hide");

    }

    function saveProgres() {
        let progres_row=$("#progres_row").val();
        let progres_text=$("#progres_text").val();

        $("#"+progres_row).text(progres_text);
        $("#progres").modal("hide");

    }
</script>



<script>
	let rowCount=1;
	function  tambahRow() {
	//    Tambah Row Disini
	// 	alert("test");

		$("#tabel_pengawasan").append('\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 jenis_pekerjaan" id="'+rowCount+"_"+1+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 jumlah_pekerja" id="'+rowCount+"_"+2+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 jenis_satuan" id="'+rowCount+"_"+3+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 satuan" id="'+rowCount+"_"+4+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 jumlah_satuan" id="'+rowCount+"_"+5+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="row_jes tg-cly1 progres" id="'+rowCount+"_"+6+'"></td>\n' +
            '\t\t\t\t\t\t\t\t\t</tr>');

		rowCount++;

	//	Event Listener Disini
        var classname = document.getElementsByClassName("jenis_pekerjaan");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#jenis_pekerjaan_row").val(data);
            $("#jenisPekerjaan").modal("show");

        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }
        


        //	Event Listener Disini
        var classname = document.getElementsByClassName("jumlah_pekerja");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#jumlah_pekerja_row").val(data);
            $("#jumlahPekerja").modal("show");

        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //	Event Listener Disini
        var classname = document.getElementsByClassName("jenis_satuan");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#jenis_satuan_row").val(data);
            $("#jenisSatuan").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //	Event Listener Disini
        var classname = document.getElementsByClassName("satuan");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#satuan_row").val(data);
            $("#satuan").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //	Event Listener Disini
        var classname = document.getElementsByClassName("jumlah_satuan");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#jumlah_satuan_row").val(data);
            $("#jumlahSatuan").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //	Event Listener Disini
        var classname = document.getElementsByClassName("progres");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#progres_row").val(data);
            $("#progres").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }
    }


//    Save Data
	function saveData()
	{
	    let i=0;
	    let arrayJes=[];
	    let id_paket_asli=$("#id_paket").val();
	    let minggu=$("#minggu").val();
	    let lap_perencanaan=$("#id_lap_perencanaan").val();

	    //Ajax Untuk menyimpan data laporan pengawasan terlebih dahulu
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/save_pengawasan",
			async:false,
            data: {"id_paket":id_paket_asli,"minggu":minggu,"id_laper":lap_perencanaan},
            dataType: "text",
            cache:false,
            success:
                function(data){
                //   id laporan pengawasn didapatkan
				//	Input detail kemudian
					console.log("Hmmmmmm");
                    console.log(data);
                    console.log("Hmmmmmm");
                    $(".row_jes").each(function() {

                        if(i<6)
                        {

                            arrayJes[i]=$(this).text();

                            if(i==5)
                            {
                                let id_lap_perencanaan_fix=$("#id_lap_perencanaan").val();


                                //Ajax untuk menyimpan detail dari laporan pengawasan kemudian
                                $.ajax({
                                    type: "POST",
									async:false,
                                    url: "http://localhost/pupr_new/user/tambah_detail_pengawasan",
                                    data: {"dataArray":arrayJes,'id_pengawasan':data,'id_laper':id_lap_perencanaan_fix,"minggu":minggu},
                                    dataType: "text",
                                    cache:false,
                                    success:
                                        function(data){
                                            console.log("------");
                                            console.log(data);
                                            console.log("------");
                                        }
                                });
                                i=0;
                            }
                            else
                            {
                                i++;
                            }



                        }


                    });

                }
        });

      swal("Laporan Sukses Ditambahkan!");

    //  Redirect
		let id_paket_red=$("#id_paket").val();
		window.location="http://localhost/pupr_new/user/lihat_paket/"+id_paket_red;
	}

</script>




</body>

</html>
