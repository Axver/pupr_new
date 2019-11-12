
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
								<b>Pilih Minggu:</b>
								<select class="form form-control" id="id_minggu">
									<?php
									$i=1;
									while($i<=54)
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
								<br/>
								<br/>

                                 <button class="btn btn-success" style="width:100%;">Generate PDF</button>
<!--								Disini Posisi Tabelnya-->
								<div id="cetak_tabel">
									<center><b>Cetak Tabel</b></center>

<!--									Tabelnya-->
									<table class="tg table table-bordered" id="buat_tabel">

<!--										<tr>-->
<!--											<td class="tg-cly1" colspan="5">Bulan</td>-->
<!--											<td class="tg-cly1" colspan="5">Bulan</td>-->
<!--											<td class="tg-0lax" colspan="5">Bulan</td>-->
<!--										</tr>-->
<!--										<tr>-->
<!--											<td class="tg-cly1">1</td>-->
<!--											<td class="tg-cly1">2</td>-->
<!--											<td class="tg-cly1">3</td>-->
<!--											<td class="tg-cly1">4</td>-->
<!--											<td class="tg-cly1">5</td>-->
<!--											<td class="tg-cly1">1</td>-->
<!--											<td class="tg-cly1">2</td>-->
<!--											<td class="tg-cly1">3</td>-->
<!--											<td class="tg-0lax">4</td>-->
<!--											<td class="tg-0lax">5</td>-->
<!--											<td class="tg-0lax">1</td>-->
<!--											<td class="tg-0lax">2</td>-->
<!--											<td class="tg-0lax">3</td>-->
<!--											<td class="tg-0lax">4</td>-->
<!--											<td class="tg-0lax">5</td>-->
<!--										</tr>-->
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
	function addPerencanaan()
	{
	    $data=$("#id_paket").val();
	    alert($data);
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

					    i++;
					}
                }
        });
	}


	function generateTabel()
	{
	    alert("Generate Tabelnya!!");
	    let minggu=$("#id_minggu").val();
	    let bulan_pertama=$("#bulan_pertama").val();
	    let bulan_terakhir=$("#bulan_terakhir").val();
	    let nama_tahap=$("#nama_tahap").val();

	    let rentang=bulan_terakhir-bulan_pertama+1;
	    let colspan1=rentang*5;

	    $("#buat_tabel").append('<tr>\n' +
            '\t<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
            '\t<th class="tg-nrix" colspan="'+colspan1+'">Tahap</th>\n' +
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

	    alert(rentang);
	}
</script>










</body>

</html>
