
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
		body{
			color:black;
		}

		th,td,table{
			border: 2px solid black;
			color: black;
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
								<h6 class="m-0 font-weight-bold text-primary">User Pengawasan Baru</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<center>
									<b><h3>Laporan Pengawasan</h3></b>
								</center>

								<center>
									<b><h3>Minggu Ke - X</h3></b>
								</center>
								<br/>
								<br/>
								<b>Id Paket</b>
								<input type="text" class="form form-control" id="id_paket" value="<?php echo $this->uri->segment('3') ?>" disabled>
								<b>Id Laporan Perencanaan</b>
								<select class="form form-control" id="id_perencanaan" onchange="ubahPekerjaan()">
									<option>--PILIH--</option>
									<?php

									$data=$this->db->get_where("lap_perencanaan",array("id_paket"=>$this->uri->segment("3")))->result();
									$count=count($data);

									$i=0;


									while($i<$count)
									{
										?>
									<option value="<?php echo $data[$i]->id_lap_perencanaan; ?>"><?php echo $data[$i]->id_lap_perencanaan; ?></option>
									<?php

										$i++;
									}
//
									?>
								</select>
								<br/>
								<b>Tanggal</b>
								<input type="date" class="form form-control" id="hari_tanggal">
								<br/>

								<div class="row">
									<div class="col-sm-1"><button class="btn btn-facebook" onclick="tambahRow()">+</button></div>
									<div class="col-sm-5">
										<select class="form form-control" id="jenis_pekerjaan">

										</select></div>
								</div>


								<b>Rekapitulasi Hasil Pengawasan</b>

								<table class="tg table" id="tabel_satu">
									<tr>
										<th class="tg-cly1">Jenis Pekerjaan</th>
										<th class="tg-cly1">Jenis Pekerja</th>
										<th class="tg-cly1">Jumlah</th>
										<th class="tg-0lax">Progress Pekerjaan %</th>
									</tr>

								</table>
								
								<button class="btn btn-facebook" onclick="save()">Save</button>



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

	function ubahPekerjaan()
	{
	    $("#jenis_pekerjaan").empty();
	    let id_perencanaan=$("#id_perencanaan").val();

	    // alert("test");
	//	Select Semua Jenis Pekerjaan Laporan Tersebut
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/list_pekerjaan",
            data: {"id_perencanaan":id_perencanaan},
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

					    $("#jenis_pekerjaan").append('<option value="'+data[i].id+'">'+data[i].nama_jenis+'</option>');
					    i++;
					}
                }
        });
	}

	let kuy=0;


	function tambahRow()
	{
	    let jenis_pekerjaan=$("#jenis_pekerjaan").val();
	    let jenis_pekerjaan_text=$("#jenis_pekerjaan option:selected").text();
      $("#tabel_satu").append('\t\t<tr>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerjaan" id="'+jenis_pekerjaan+"_pekerjaan_"+kuy+'">'+jenis_pekerjaan_text+'</td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerja nonActive" id="'+jenis_pekerjaan+"_pekerja_"+kuy+'"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jumlah" id="'+jenis_pekerjaan+"_jumlah_"+kuy+'"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" style="background-color:#3b5998;color:white;"><center>Tidak Diisi</center></td>\n' +
          '\t\t\t\t\t\t\t\t\t</tr>');

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("pekerja");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#"+attribute).text("");
            $("#"+attribute).removeClass("Active");
            $("#"+attribute).addClass("nonActive");
            $("#id_warnai").val(attribute);
            $("#wPekerja").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        var classname = document.getElementsByClassName("jumlah");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jumlah").val(attribute);
            $("#wJumlah").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

      kuy++;
	}


	function jenisPekerja()
	{
	    $("#wPekerja").modal("hide");
	    let id=$("#id_warnai").val();
	    let jenis_pekerja=$("#jenis_pekerja").val();
	    let jenis_pekerja_text=$("#jenis_pekerja option:selected").text();

        $("#"+id).removeClass("nonActive");
        $("#"+id).addClass("Active");
	    // alert("hai");
		$("#"+id).text(jenis_pekerja+"_"+jenis_pekerja_text);
	}

	function jumlah()
	{
	    let id=$("#id_jumlah").val();
	    let jumlah=$("#jumlah").val();
	    $("#wJumlah").modal("hide");

	    $("#"+id).text(jumlah);
	}

	function save()
	{
        let i=0;

        let dataArray=new Array();

        $(".Active").each(function (index, element) {
            dataArray[i]=$(this).attr("id");
            i++;
        });

		console.log(dataArray);
	}
</script>



<!--Modal-->

<!-- Modal -->
<div class="modal fade" id="wPekerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_warnai" class="form form-control" disabled>
				<b>Pilih Jenis Pekerja</b>
				<select class="form form-control" id="jenis_pekerja">
					<?php
					$data=$this->db->get("jenis_upah")->result();
					$count=count($data);

					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $data[$i]->id_jenis_upah ?>"><?php echo $data[$i]->nama ?></option>
					<?php

						$i++;
					}
					?>

				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="jenisPekerja()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="wJumlah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_jumlah" class="form form-control" disabled>
				<b>Masukkan Jumlah</b>
	             <input type="text" class="form form-control" id="jumlah">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="jumlah()">Save changes</button>
			</div>
		</div>
	</div>
</div>






</body>

</html>
