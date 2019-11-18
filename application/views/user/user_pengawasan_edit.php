
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
								<h6 class="m-0 font-weight-bold text-primary">View User Pengawasan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<button class="btn btn-info" onclick="generatePDF()">Generate PDF</button>

							<div class="card-body" id="cetak_tabel">

								<button class="btn btn-info" onclick="addRow()">+</button>
								<b>*Klik Column Untuk Edit dan + untuk Menambah Rows</b>

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
									<?php
									$hitung=count($data);
									$i=0;
									while($i<$hitung)
									{
										?>
										<tr>
											<td class="jesi" id="<?php echo $i; ?>_1"><?php echo $data[$i]->jenis_pekerjaan; ?></td>
											<td class="jesi" id="<?php echo $i; ?>_2"><?php echo $data[$i]->jumlah_pekerja; ?></td>
											<td class="jesi" id="<?php echo $i; ?>_3"><?php echo $data[$i]->jenis_satuan; ?></td>
											<td class="jesi" id="<?php echo $i; ?>_4"><?php echo $data[$i]->satuan; ?></td>
											<td class="jesi" id="<?php echo $i; ?>_5"><?php echo $data[$i]->jumlah_satuan; ?></td>
											<td class="jesi" id="<?php echo $i; ?>_6"><?php echo $data[$i]->progres; ?></td>
										</tr>
										<?php

										$i++;
									}
									?>

									<input type="text" id="last_row" disabled class="form form-control" value="<?php echo $i; ?>">


								</table>


								<button class="btn btn-success">Update</button>






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

    var classname = document.getElementsByClassName("jesi");

    var myFunction = function() {
        // var attribute = this.getAttribute("data-myattribute");
        // alert(attribute);
        var data=this.id;
        console.log(data);
        $("#jesi_row").val(data);
        $("#mJesi").modal("show");
    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
    }
    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak_tabel");
        // Choose the element and save the PDF for our user.
        html2pdf().from(element).save();
    }

    let lastRow=$("#last_row").val();


    function addRow() {

        // alert("test");
        $("#tabel_pengawasan").append('<tr>\n' +
            '\t<td class="jesi" id="'+lastRow+'_1"></td>\n' +
            '\t<td class="jesi" id="'+lastRow+'_2"></td>\n' +
            '\t<td class="jesi" id="'+lastRow+'_3"></td>\n' +
            '\t<td class="jesi" id="'+lastRow+'_4"></td>\n' +
            '\t<td class="jesi" id="'+lastRow+'_5"></td>\n' +
            '\t<td class="jesi" id="'+lastRow+'_6"></td>\n' +
            '</tr>');

        //Buat semuanya bisa di klik
		//Event Listener Untuk Jesi
        //	Event Listener Disini
        var classname = document.getElementsByClassName("jesi");

        var myFunction = function() {
            // var attribute = this.getAttribute("data-myattribute");
            // alert(attribute);
            var data=this.id;
            console.log(data);
            $("#jesi_row").val(data);
            $("#mJesi").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        lastRow=lastRow+1;

    }


    function addText() {

		let row=$("#jesi_row").val();
		let text=$("#text_data").val();

		$("#"+row).text(text);

		$("#mJesi").modal("hide");
    }
</script>



<!--Modal Jesi-->
<div class="modal fade" id="mJesi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Text</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="jesi_row" disabled>
				<input type="text" class="form form-control" id="text_data">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addText()">Save changes</button>
			</div>
		</div>
	</div>
</div>











</body>

</html>
