
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
		td{
			border:2px solid black;
		}

		tr{
			border:2px solid black;
		}

		th{
			border:2px solid black;
		}

		table{
			border:2px solid black;
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
								<h6 class="m-0 font-weight-bold text-primary">Laporan Harian</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<button onclick="generatePDF()" class="btn btn-info">Generate PDF</button>
							<div class="card-body" id="cetak_pdf">

								<b>*Pilih Paket dan Lapoan Perencanaan Terlebih Dahulu</b> <br/>
								<label>Paket:</label>
								<input type="text" class="form form-control" value="<?php
//																echo $this->uri->segment('3');
																$data=$this->db->get_where("paket",array("id_paket"=>$this->uri->segment('3')))->result();
																$count=count($data);
																$i=0;

																while($i<$count)
																{
																	echo $data[$i]->nama;

																	$i++;
																}
								?>" disabled>

							    <input type="hidden" class="form form-control" id="paket" value="<?php echo $this->uri->segment('3');
//								echo $this->uri->segment('3');
//								$data=$this->db->get_where("paket",array("id_paket"=>$this->uri->segment('3')))->result();
//								$count=count($data);
//								$i=0;
//
//								while($i<$count)
//								{
//									echo $data[$i]->nama;
//
//									$i++;
//								}
								?>" >
								Laporan Perencanaan:

								<select onchange="changeDate()" class="form form-control" id="lap_perencanaan">
<!--									Hanya bisa memilih laporan perencanaan dia saja-->
									<?php
									$data=$this->db->get_where("lap_perencanaan",array("id_paket"=>$this->uri->segment("3")))->result();
									$panjang=count($data);

									$i=0;

									while($i<$panjang)
									{
										?>
										<option value="<?php echo $data[$i]->id_lap_perencanaan; ?>"><?php echo $data[$i]->keterangan; ?></option>
									<?php


										$i++;
									}
									?>
								</select>

								<!--								Tabel Pertama-->
								<br/>



								<br/>

								<div class="row">
									<div class="col-sm-2">
										Nama Paket
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4">

										<input type="text" class="form form-control" id="nama_paket">

									</div>






								</div>

								<div class="row">
									<div class="col-sm-2">
										Lokasi
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4">
										<input type="text" class="form form-control" id="lokasi">
									</div>
								</div>

								<div class="row">

									<div class="col-sm-2">
										Hari/Tanggal
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4">
										<input type="date" class="form form-control" id="hari_tanggal">
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2">
										Keterangan Pekerja/Bahan
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4">
										<input type="text" class="form form-control" id="keterangan">
									</div>
								</div>

								<br/>

                                <button class="btn btn-info" onclick="tambahRow()">+</button>
								<b>*Klik Pada Kolom untuk menambahkan</b>
								<table class="table" id="tabel_harian">
									<tr>
										<th class="tg-cly1" colspan="2">Pekerja</th>
										<th class="tg-0lax" colspan="3">Bahan</th>
									</tr>
									<tr>
										<td class="tg-0lax">Jenis</td>
										<td class="tg-0lax">Jumlah</td>
										<td class="tg-0lax">Jenis</td>
										<td class="tg-0lax">Satuan</td>
										<td class="tg-0lax">Jumlah</td>
									</tr>


								</table>

								<br/>

								<br/>

								<b>Gambar Sket/Kerja</b>

								<table class="table">
									<tr>
										<th class="tg-cly1">Jenis Pekerjaan</th>
										<th class="tg-cly1">Sket Kerja</th>
										<th class="tg-cly1">Lokasi</th>
										<th class="tg-cly1">Panjang Penanganan</th>
										<th class="tg-cly1">Keterangan Dimensi</th>
									</tr>
									<tr>
										<td class="tg-cly1"  ><button class="btn btn-info" onclick="mJenis()">+</button></td>
										<td class="tg-cly1"  ></td>
										<td class="tg-cly1" ><button class="btn btn-info" onclick="mLokasi()">+</button></td>
										<td class="tg-cly1" ><button class="btn btn-info" onclick="mPenanganan()">+</button></td>
										<td class="tg-cly1" ><button class="btn btn-info" onclick="mDimensi()">+</button></td>
									</tr>

									<tr style="height: 200px;">
										<td class="tg-cly1"  id="mJenis"></td>
										<td class="tg-cly1"  id="mKerja">
<!--											Upload Image Disini-->

										</td>
										<td class="tg-cly1" id="mLokasi"></td>
										<td class="tg-cly1" id="mPenanganan"></td>
										<td class="tg-cly1" id="mDimensi"></td>
									</tr>
								</table>

								<br/>

								<br/>

								<button class="btn btn-success" onclick="saveHarian()">Save</button>
								<button class="btn btn-danger">Cancel</button>

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
    function perencanaan()
    {
        let paket=$("#paket").val();

        $.ajax({
            type : "POST",
            url : "http://localhost/pupr_new/laporan_harian/perencanaan",
            cache:false,
            async:false,
            dataType : "text",
            data : {"id" : paket},
            success : function(data) {

                //    Getting Laporan Perencanaan
                data=JSON.parse(data);
                console.log(data);

                let data_length=data.length;
                let i=0;
                while (i<data_length)
                {
                    $('#lap_perencanaan').append(`<option value="${data[i].id_lap_perencanaan}">
                                       ${data[i].id_lap_perencanaan}
                                  </option>`);


                    i++;
                }

            }
        });
    }

    function addRow()
    {
        // alert("test");
        $("#laporan_harian").modal('show');
    }

    let row_table=1;

    function tambahRow()
	{


      $("#tabel_harian").append('\t\t<tr>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_jenis1 data_jesi" id="'+row_table+'_1"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian data_jesi" id="'+row_table+'_2"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_jenis data_jesi" id="'+row_table+'_3"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_satuan data_jesi" id="'+row_table+'_4"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian data_jesi" id="'+row_table+'_5"></td>\n' +
          '\t\t\t\t\t\t\t\t\t</tr>');

      row_table=row_table+1;

        //	Event Listener
        var classname = document.getElementsByClassName("klik_harian");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_column").val(attribute);
            $("#myModal").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

    //    Event Listener Untuk Satuan
        var classname = document.getElementsByClassName("klik_satuan");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_satuan").val(attribute);
            $("#myModalSatuan").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }


        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("klik_jenis");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jenis_bahan").val(attribute);
            $("#myModalJenis").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("klik_jenis1");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jenis_bahan1").val(attribute);
            $("#myModalJenis1").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

	}

	function dataRow()
	{
	    isi_row=$("#data_column").val();
	    id_row=$("#id_column").val();

	//    Masukkan data ke tabel
		$("#"+id_row).text(isi_row);
        $("#myModal").modal("hide");
	}


	function mJenis()
	{
      $("#modalJenis").modal("show");
	}

	function dataJenis()
	{
     let data_jenis=$("#data_jenis").val();

		$("#modalJenis").modal("hide");


		$("#mJenis").text(data_jenis);
	}

	function mKerja()
	{
	    $("#modalKerja").modal("show");
	}

	function dataKerja()
	{

	}

	function mLokasi() {
        $("#modalLokasi").modal("show");
    }

    function dataLokasi()
	{
	//    Admbil data Modal
		data_lokasi=$("#data_lokasi").val();
		$("#mLokasi").text(data_lokasi);
		$("#modalLokasi").modal("hide");
	}

    function mPenanganan()
	{
     $("#modalPenanganan").modal("show");
	}

	function dataPenanganan()
	{
	    data_penanganan=$("#data_penanganan").val();
	    $("#mPenanganan").text(data_penanganan);
	    $("#modalPenanganan").modal("hide");
	}

	function dataDimensi()
	{
	    panjang=$("#panjang").val();
	    lebar=$("#lebar").val();
	    volume=$("#volume").val();

	    $("#mDimensi").text("p:"+panjang+","+"l:"+lebar+","+"v:"+volume+",");
	    $("#modalDimensi").modal("hide");
	}

	function mDimensi()
	{
        $("#modalDimensi").modal("show");
	}


//	Upload Image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });




//    Save Laporan Harian

	function saveHarian()
	{
	    let id_paket_=$("#paket").val();
	    let id_laper=$("#lap_perencanaan").val();
	    let hari_tanggal=$("#hari_tanggal").val();

        $.ajax({
            type: "POST",
			async:false,
            url: "http://localhost/pupr_new/user/save_harian",
            data: {"id_paket":id_paket_,"id_lap_perencanaan":id_laper,"hari_tanggal":hari_tanggal},
            dataType: "text",
            cache:false,
            success:
                function(data){
                console.log("lihatbalikanawal");
                console.log(data);
                console.log("lihatbalikanawal");
                    hasil=data;
                    let xo=0;
                    let dataArray=[];
                    //    Ekstrak data dari Tabel dahulu
                    $(".data_jesi").each(function() {
                        // alert($(this).text());
                        //    Fokus di Save
                        //    Lakukan perulangan Per 5 Kali

                        dataArray[xo]=$(this).text();
                        xo++;


                    });

                    //Setelah Laporan Harian Disimpan Maka Masukkan Detailnya
                    $.ajax({
                        type: "POST",
                        async:false,
                        url: "http://localhost/pupr_new/user/detail_harian",
                        data: {"data":dataArray,"id_lap_perencanaan":id_laper,"id_paket":id_paket_,"id_lapharmin":hasil},
                        dataType: "text",
                        cache:false,
                        success:
                            function(data){

                                console.log(data);
                            }
                    });
                }
        });


    //    Simpan Yang Bawah Juga

		let mJenisSave=$("#mJenis").text();
        let mLokasiSave=$("#mLokasi").text();
        let mPenangananSave=$("#mPenanganan").text();
        let mDimensiSave=$("#mDimensi").text();

    //    Ajax Jquery POST

        $.ajax({
            type: "POST",
			async:false,
            url: "http://localhost/pupr_new/user/save_bawah",
            data: {"id_paket":id_paket_,"id_lap_perencanaan":id_laper,"hari_tanggal":hari_tanggal,"mJenis":mJenisSave,"mLokasi":mLokasiSave,"mPenanganan":mPenangananSave,"mDimensi":mDimensiSave},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    // alert(data);  //as a debugging message.
                }
        });


        swal("Data Sukses Ditambahkan!");





	}


//	Ajax POSTs Untuk Mengisi Column Kosong
	let send_data=$("#paket").val();
    $.ajax({
        type: "POST",
		async:false,
        url: "http://localhost/pupr_new/user/paket_info_harian",
        data: {"send_data":send_data},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log(data);
                $("#nama_paket").val(data[0].nama);
                $("#lokasi").val(data[0].lokasi);
            }
    });


</script>

<script>
    //Global Variable Declaration
    var base64Img = null;
    margins = {
        top: 70,
        bottom: 40,
        left: 30,
        width: 550
    };

    /* append other function below: */

</script>

<script>
    // generate = function()
    // {
    //     var pdf = new jsPDF('p', 'pt', 'a4');
    //     pdf.setFontSize(18);
    //     pdf.fromHTML(document.getElementById('cetak_pdf'),
    //         margins.left, // x coord
    //         margins.top,
    //         {
    //             // y coord
    //             width: margins.width// max width of content on PDF
    //         },function(dispose) {
    //             headerFooterFormatting(pdf)
    //         },
    //         margins);
	//
    //     var iframe = document.createElement('iframe');
    //     iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
    //     document.body.appendChild(iframe);
	//
    //     iframe.src = pdf.output('datauristring');
    // };


</script>

<script>
    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak_pdf");
        // Choose the element and save the PDF for our user.
        html2pdf().from(element).save();
    }

    //Tambah data satuan
    function dataSatuan()
	{
	    id_column=$("#id_satuan").val();
	    informasi=$("#data_satuan").val();

	//    Tambahkan data ke column
		$("#"+id_column).text(informasi);
	}


	function dataJenisBahan()
	{

	    id_jenis=$("#id_jenis_bahan").val();
	    // alert(id_jenis);
	    // alert($("#data_jenis_bahan").val());
        $("#"+id_jenis).text($("#data_jenis_bahan").val());
	}

    function dataJenisBahan1()
    {

        id_jenis=$("#id_jenis_bahan1").val();

        // alert(id_jenis);
        // alert(id_jenis);
        // alert($("#data_jenis_bahan").val());
        $("#"+id_jenis).text($("#data_jenis_bahan1").val());
    }
</script>




<!--Modal DIsini-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<input type="text" id="id_column" class="form form-control" disabled>
				<input type="text" id="data_column" class="form form-control">

				<button class="btn btn-info" onclick="dataRow()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!--Modal Jenis-->
<!-- Modal -->
<div id="modalJenis" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<select id="data_jenis" class="form form-control">
					<?php
					$satuan_db=$this->db->get("jenis_pekerjaan")->result();
					$count=count($satuan_db);
					$i=0;

					while($i<$count)
					{?>
						<option value="<?php echo $satuan_db[$i]->nama_jenis; ?>"><?php echo $satuan_db[$i]->nama_jenis; ?></option>
						<?php

						$i++;
					}
					?>
				</select>

<!--				<input type="text" id="" class="form form-control">-->

				<button class="btn btn-info" onclick="dataJenis()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!--Modal Lokasi-->
<!-- Modal -->
<div id="modalLokasi" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">

				<input type="text" id="data_lokasi" class="form form-control">

				<button class="btn btn-info" onclick="dataLokasi()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!--Modal Dimensi-->
<!-- Modal -->
<div id="modalDimensi" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
                P:
				<input type="text" id="panjang" class="form form-control">
				L:
				<input type="text" id="lebar" class="form form-control">
				V:
				<input type="text" id="volume" class="form form-control">

				<button class="btn btn-info" onclick="dataDimensi()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!--Modal Penanganan-->
<!-- Modal -->
<div id="modalPenanganan" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">

				<input type="text" id="data_penanganan" class="form form-control">


				<button class="btn btn-info" onclick="dataPenanganan()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!--Modal Penanganan-->
<!-- Modal -->
<div id="myModalSatuan" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">

				<b>Modal Satuan</b>
				<br/>
<!--				Data satuan Disini-->
				<input type="text" id="id_satuan" class="form form-control" disabled>

				<select id="data_satuan" class="form form-control">
					<?php
					$satuan_db=$this->db->get("satuan")->result();
					$count=count($satuan_db);
					$i=0;

					while($i<$count)
					{?>
					<option value="<?php echo $satuan_db[$i]->id_satuan; ?>"><?php echo $satuan_db[$i]->satuan; ?></option>
					<?php

						$i++;
					}
					?>
				</select>


				<button class="btn btn-info" onclick="dataSatuan()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!--Modal Jenis-->
<!-- Modal -->
<div id="myModalJenis" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">

				<b>Modal Jenis</b>
				<br/>
				<!--				Data satuan Disini-->
				<input type="text" id="id_jenis_bahan" class="form form-control" disabled>

				<select id="data_jenis_bahan" class="form form-control">
					<?php
					$satuan_db=$this->db->get("jenis_bahan_alat")->result();
					$count=count($satuan_db);
					$i=0;

					while($i<$count)
					{?>
						<option value="<?php echo $satuan_db[$i]->id_jenis_bahan_alat; ?>"><?php echo $satuan_db[$i]->jenis_bahan_alat; ?></option>
						<?php

						$i++;
					}
					?>
				</select>


				<button class="btn btn-info" onclick="dataJenisBahan()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!--Modal Jenis-->
<!-- Modal -->
<div id="myModalJenis1" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">

				<b>Modal Jenis</b>
				<br/>
				<!--				Data satuan Disini-->
				<input type="text" id="id_jenis_bahan1" class="form form-control" disabled>

				<select id="data_jenis_bahan1" class="form form-control">
					<?php
					$satuan_db=$this->db->get("jenis_pekerjaan")->result();
					$count=count($satuan_db);
					$i=0;

					while($i<$count)
					{?>
						<option value="<?php echo $satuan_db[$i]->id; ?>"><?php echo $satuan_db[$i]->nama_jenis; ?></option>
						<?php

						$i++;
					}
					?>
				</select>


				<button class="btn btn-info" onclick="dataJenisBahan1()">Tambah</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>




</body>

</html>
