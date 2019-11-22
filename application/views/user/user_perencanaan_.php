
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
				<?php $this->load->view('admin_content/card_list_user');?>

				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Laporan Per Paket</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">




								<!--								Data Table Here-->
								<table id="example" class="display" style="width:100%">
									<thead>
									<tr>
										<th>No</th>
										<th>Nama Paket</th>
										<th>Laporan Perencanaan</th>
										<th>Laporan Harian</th>
										<th>Laporan Pengawasan</th>


									</tr>
									</thead>
									<tbody>

									<?php
									$nip=$this->session->userdata("nip");
									$data=$this->db->query("SELECT * FROM paket INNER JOIN detail_paket ON paket.id_paket=detail_paket.id_paket WHERE detail_paket.nip='$nip'")->result();
//									var_dump($data);

									$count=count($data);

									$i=0;

									while($i<$count)
									{
										?>
										<tr>
											<td><?php echo $i+1; ?></td>
											<td><?php echo $data[$i]->nama; ?></td>
											<td><button class="btn btn-info" onclick="perencanaan('<?php echo $data[$i]->id_paket; ?>')">Show</button></td>
											<td><button class="btn btn-info" onclick="harian('<?php echo $data[$i]->id_paket; ?>')">Show</button></td>
											<td><button class="btn btn-info" onclick="pelaksanaan('<?php echo $data[$i]->id_paket; ?>')">Show</button></td>
										</tr>

										<?php

										$i++;
									}
									?>



									</tbody>


								</table>

								<hr/>
								<hr/>

								<div id="generate_table">

								</div>


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
    function redEdit(data)
    {
        window.location="edit_perencanaan_user/data/"+data;




    }

    function redCetak(data)
    {
        alert(data);
    }

    function upload(id)
    {
        window.location="http://localhost/pupr_new/upload/perencanaan/"+id;
    }




//    funsginya
	function perencanaan(id_paket)
	{
	    // alert(id_paket);
	    hapus();
	    // alert("test");
        $("#generate_table").append("<table id=\"example1\" class=\"display\" style=\"width:100%\">\n" +
            "\t<thead>\n" +
            "\t<tr>\n" +
            "\t\t<th>Laporan</th>\n" +
            "\t\t<th>View</th>\n" +
            "\t\t<th>Image</th>\n" +
            "\t\n" +
            "\t</tr>\n" +
            "\t</thead>\n" +
            "\t<tbody id='bodynya'>\n" +
            "\t</tbody>\n" +
            "</table>");

        //Ambil data dari db dulu untuk diisikan kesana

        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user_perencanaan_/perencanaan",
            data: {"id_paket":id_paket},
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
                        $("#bodynya").append('<tr>\n' +
                            '\t<td>'+data[i].keterangan+'</td>\n' +
                            '\t<td><button class="btn btn-info" onclick="redEdit('+data[i].id_lap_perencanaan+')">Show</button></td>\n' +
                            '\t<td><button class="btn btn-info" onclick="upload('+data[i].id_lap_perencanaan+')">Add</button></td>\n' +
                            '</tr>\n');


					    i++;
					}
                }
        });


        makeJes();






	}

	function makeJes()
	{
        $('#example1').DataTable();
	}

	function harian(id_paket)
	{
	    // alert("test");
		hapus();

        $("#generate_table").append("<table id=\"example1\" class=\"display\" style=\"width:100%\">\n" +
            "\t<thead>\n" +
            "\t<tr>\n" +
            "\t\t<th>Harian</th>\n" +
            "\t\t<th>View</th>\n" +
            "\t\t<th>Edit</th>\n" +
            "\t\t<th>Image</th>\n" +
            "\t\n" +
            "\t</tr>\n" +
            "\t</thead>\n" +
            "\t<tbody id='bodynya'>\n" +
            "\t</tbody>\n" +
            "</table>");

        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user_perencanaan_/harian",
            data: {"id_paket":id_paket},
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
                        // var dateobj = new Date(data[i].id_lap_harian_mingguan);
                        // $data1=data[i].id_lap_harian_mingguan.toString();
                        var B = data[i].id_lap_harian_mingguan.toString();
                        var C=data[i].id_lap_perencanaan;
                        console.log(B);
                        console.log(data[i].id_lap_harian_mingguan);
                        // B=B.replace(/-/g, 'm' );

                        $("#bodynya").append('<tr>\n' +
                            '\t<td>'+data[i].id_lap_harian_mingguan+'</td>\n' +
                            '\t<td><button class="btn btn-info" onclick="view('+'\''+B+','+C+'\''+')">View</button></td>\n' +
                            '\t<td><button class="btn btn-info" onclick="edit('+'\''+B+','+C+'\''+')">Edit</button></td>\n' +
                            '\t<td><button class="btn btn-info" onclick="upload1('+'\''+B+','+C+'\''+')">Add</button></td>\n' +
                            '</tr>\n');


                        i++;
                    }
                }
        });
	}

	function pelaksanaan(id_paket) {
        // alert("test");
		hapus();

        $("#generate_table").append("<table id=\"example1\" class=\"display\" style=\"width:100%\">\n" +
            "\t<thead>\n" +
            "\t<tr>\n" +
            "\t\t<th>Pelaksanaan</th>\n" +
            "\t\t<th>View</th>\n" +
            "\t\t<th>Edit</th>\n" +

            "\t\n" +
            "\t</tr>\n" +
            "\t</thead>\n" +
            "\t<tbody id='bodynya'>\n" +
            "\t</tbody>\n" +
            "</table>");


        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user_perencanaan_/pengawasan",
            data: {"id_paket":id_paket},
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
                        // var dateobj = new Date(data[i].id_lap_harian_mingguan);
                        // $data1=data[i].id_lap_harian_mingguan.toString();
                        var B = data[i].id_lap_pengawasan;
                        var C=data[i].id_lap_perencanaan;
                        var D=data[i].minggu;

                        var E=B+"_"+C+"_"+D;
                        console.log(B);
                        console.log(data[i].id_lap_harian_mingguan);
                        // B=B.replace(/-/g, 'm' );

                        $("#bodynya").append('<tr>\n' +
                            '\t<td>'+data[i].id_lap_pengawasan+'</td>\n' +
                            '\t<td><button class="btn btn-info" onclick="view1('+'\''+E+'\''+')">View</button></td>\n' +
                            '\t<td><button class="btn btn-info" onclick="edit1('+'\''+E+'\''+')">Edit</button></td>\n' +

                            '</tr>\n');


                        i++;
                    }
                }
        });

    }


    function hapus()
	{
	    $("#generate_table").empty();
	}

    function view(id)
    {
        id=id.split(",");
        // alert(id);
		// console.log(id);
        window.location="view_harian/index/"+id[0]+"/"+id[1];
    }

    function edit(id)
    {
        id=id.split(",");
        // alert(id);
        // console.log(id);
        window.location="view_harian/edit/"+id[0]+"/"+id[1];
    }

    function upload1(id,per)
    {
        id=id.split(",");
        // alert(id);
        // console.log(id);
        window.location="http://localhost/pupr_new/upload/index/"+id[0]+"/"+id[1];
    }


    function view1(id)
    {
        id=id.split("_");
        // alert(id);
        // console.log(id);
        window.location="http://localhost/pupr_new/user_pengawasan_data/view/"+id[0]+"/"+id[1]+"/"+id[2];
    }

    function edit1(id)
    {
        id=id.split("_");
        // alert(id);
        // console.log(id);
        window.location="http://localhost/pupr_new/user_pengawasan_data/edit/"+id[0]+"/"+id[1]+"/"+id[2];
    }
</script>











</body>

</html>
