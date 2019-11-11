
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
							<div class="card-body">

								<b>*Pilih Paket dan Lapoan Perencanaan Terlebih Dahulu</b> <br/>
								<label>Paket:</label>

							    <input type="text" class="form form-control" id="paket" value="<?php echo $this->uri->segment('3'); ?>" disabled>
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
										<option value="<?php echo $data[$i]->id_lap_perencanaan; ?>"><?php echo $data[$i]->id_lap_perencanaan; ?></option>
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
										<input type="text" class="form form-control" id="hari_tanggal">
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
											<form runat="server">
												<input type='file' id="imgInp" />
												<img id="blah" src="#" style="width:400px;" alt="your image" />
											</form>
										</td>
										<td class="tg-cly1" id="mLokasi"></td>
										<td class="tg-cly1" id="mPenanganan"></td>
										<td class="tg-cly1" id="mDimensi"></td>
									</tr>
								</table>

								<br/>

								<br/>

								<button class="btn btn-success">Save</button>
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
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian" id="'+row_table+'_1"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian" id="'+row_table+'_2"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian" id="'+row_table+'_3"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian" id="'+row_table+'_4"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax klik_harian" id="'+row_table+'_5"></td>\n' +
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

				<input type="text" id="data_jenis" class="form form-control">

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





</body>

</html>
