
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
								<h6 class="m-0 font-weight-bold text-primary">Buat Caturwulan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">
								<b>Id Paket</b>
								<select id="id_paket" class="form form-control" onchange="perencanaan()">
									<option>-Pilih Paket-</option>
									<?php
									$per=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
									$count=count($per);
									$i=0;

									while($i<$count)
									{
										?>
										<option value="<?php echo $per[$i]->id_paket; ?>"><?php echo $per[$i]->id_paket; ?></option>
									<?php

										$i++;
									}
									?>
								</select>
								<b>Laporan Perencanaan</b>
								<select id="lap_perencanaan" class="form form-control"></select>
								<b>Pilih Bulan Mulai</b>
								<select id="bulan_mulai" class="form form-control">
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

								<button class="btn btn-info" onclick="buatTabel()">Generate</button>

<!--								<button class="btn btn-info" onclick="addRow()">Add Row</button>-->



								<br/>
								<br/>
<!--								Ini adalah tabelnya-->
<!--								<table class="tg table table-bordered" id="caturwulan" >-->
<!--									<tr>-->
<!--										<th class="tg-cly1" rowspan="3">No</th>-->
<!--										<th class="tg-cly1" rowspan="3">Bahan</th>-->
<!--										<th class="tg-cly1" rowspan="3">Jumlah</th>-->
<!--										<th class="tg-cly1" rowspan="3">Satuan</th>-->
<!--										<th class="tg-cly1" colspan="21"><center>Tahap</center></th>-->
<!--									</tr>-->
<!---->
<!---->
<!--								</table>-->

<!--								Tabelnya-->
								<table class="tg table table-bordered" id="tabel_satu">
<!--									<tr>-->
<!--										<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>-->
<!--										<th class="tg-nrix" colspan="15">Tahap/Bulan/Minggu</th>-->
<!--									</tr>-->
<!--									<tr>-->
<!--										<td class="tg-nrix" colspan="5">Bulan 1</td>-->
<!--										<td class="tg-baqh" colspan="5">Bulan 2</td>-->
<!--										<td class="tg-baqh" colspan="5">Bulan 3</td>-->
<!--									</tr>-->
<!--									<tr>-->
<!--										<td class="tg-cly1">1</td>-->
<!--										<td class="tg-cly1">2</td>-->
<!--										<td class="tg-cly1">3</td>-->
<!--										<td class="tg-cly1">4</td>-->
<!--										<td class="tg-cly1">5</td>-->
<!--										<td class="tg-0lax">6</td>-->
<!--										<td class="tg-0lax">7</td>-->
<!--										<td class="tg-0lax">8</td>-->
<!--										<td class="tg-0lax">9</td>-->
<!--										<td class="tg-0lax">10</td>-->
<!--										<td class="tg-0lax">11</td>-->
<!--										<td class="tg-0lax">12</td>-->
<!--										<td class="tg-0lax">13</td>-->
<!--										<td class="tg-0lax">14</td>-->
<!--										<td class="tg-0lax">15</td>-->
<!--									</tr>-->
<!--									<tr>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-cly1"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--										<td class="tg-0lax"></td>-->
<!--									</tr>-->
								</table>





								<script>

									function generateTable()
									{
									    // alert("test");
									    $("#caturwulan").append('<tr id="bulan">\n' +
                                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" colspan="21"><center>Bulan</center></td>\n' +
                                            '\t\t\t\t\t\t\t\t\t</tr>');
									    $("#bulan").append('<td class="tg-cly1" colspan="21"><center>Bulan</center></td>');
                                        $("#bulan").append('<td class="tg-cly1" colspan="21"><center>Bulan</center></td>');

									    $("#caturwulan").append("<tr id='tanggal'></tr>");

									    let i=1;
									    while(i<=21)
										{
                                            $("#tanggal").append('    <td class="tg-cly1">1</td>\n' +
                                                '                                    <td class="tg-cly1">2</td>\n' +
                                                '                                    <td class="tg-0lax">3</td>\n' +
                                                '                                    <td class="tg-0lax">4</td>\n' +
                                                '                                    <td class="tg-0lax">5</td>\n' +
                                                '                                    <td class="tg-0lax">6</td>\n' +
                                                '                                    <td class="tg-0lax">7</td>');

										    i++;
										}







									}

									let hex=0;


									function addRow()
									{


									    let stringBuilder="";
                                        let i=0;

                                        stringAwal='  <td class="tg-0lax how"></td>\n' +
                                            '    <td class="tg-0lax how"></td>\n' +
                                            '    <td class="tg-0lax how"></td>\n' +
                                            '    <td class="tg-0lax how"></td>';
									    while(i<147)
										{
                                            stringBuilder=stringBuilder+'<td id="'+hex+'_'+i+'" class="nonActive tg-0lax datanya"></td>';
										    i++;
										}
                                        hex++;

										finalString='<tr>'+stringAwal+stringBuilder+'</tr>';

                                        $("#caturwulan").append(finalString);

									    // alert("test");

                                        var classname = document.getElementsByClassName("datanya");

                                        var myFunction = function() {
                                            // var attribute = this.getAttribute("data-myattribute");
                                            // alert(attribute);
                                            var data=this.id;
                                            var cls=$('#'+data).attr('class');     ;
                                            console.log(data);
                                            // $("#jesi_row").val(data);
                                            // $("#mJesi").modal("show");

										//	Ubah warna dan ganti class name nya
											console.log(cls);

											if($("#"+data).hasClass("nonActive") )
											{
											    console.log("bjjhghjgh");

                                                $("#"+data).removeClass("nonActive");
                                                $("#"+data).addClass("Active");
                                                $("#"+data).css("background-color","yellow");
											}
											else if($("#"+data).hasClass("Active") )
                                            {
                                                console.log("bjjhghjgh");

                                                $("#"+data).removeClass("Active");
                                                $("#"+data).addClass("nonActive");
                                                $("#"+data).css("background-color","white");
                                            }
                                        };

                                        for (var m = 0; m < classname.length; m++) {
                                            classname[m].addEventListener('click', myFunction, false);
                                        }


									}

								</script>



								<!-- Modal -->
								<div class="modal fade" id="mCatur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<input type="text" class="form form-control" disabled id="jesi_row">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
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
	function perencanaan()
	{
	    let id_paket=$("#id_paket").val();
	    // alert("test");
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/catur_wulan/perencanaan",
            data: {"id_paket":id_paket},
            dataType: "text",
            cache:false,
            success:
                function(data){
                   data=JSON.parse(data);
                   console.log(data);

                //   Tambahkan data ke dalam select perencanaan
					let length=data.length;
					let i=0;

					while(i<length)
					{
                        $("#lap_perencanaan").append('<option value="'+data[i].id_lap_perencanaan+'">'+data[i].id_lap_perencanaan+'<option>');
					    i++;
					}
                }
        });
	}


	function buatTabel()
	{
	    hapusTabel();
	    let bulan_mulai=$("#bulan_mulai").val();
	    let bulan2=parseInt(bulan_mulai)+parseInt(1);
        let bulan3=parseInt(bulan_mulai)+parseInt(2);
	    // alert("test");
		$("#tabel_satu").append('\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>\n' +
            '\t\t\t\t\t\t\t\t\t\t<th class="tg-nrix" colspan="15">Tahap/Bulan/Minggu</th>\n' +
            '\t\t\t\t\t\t\t\t\t</tr>\n' +
            '\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-nrix" colspan="5">'+'Bulan '+parseInt(bulan_mulai)+'</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-baqh" colspan="5">'+'Bulan '+parseInt(bulan2)+'</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-baqh" colspan="5">'+'Bulan '+parseInt(bulan3)+'</td>\n' +
            '\t\t\t\t\t\t\t\t\t</tr>\n' +
            '\t\t\t\t\t\t\t\t\t<tr>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">1</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">2</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">3</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">4</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">5</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">6</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">7</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">8</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">9</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">10</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">11</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">12</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">13</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">14</td>\n' +
            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">15</td>\n' +
            '\t\t\t\t\t\t\t\t\t</tr>');


	//	Ajax Untuk Mendapatkan Data
        //   Ajax Untuk Mendapatkan Data
        var dt = new Date();
        // alert(dt.getFullYear());
        let tahun=dt.getFullYear();
        let bulan=$("#bulan_mulai").val();
        let id_perencanaan=$("#lap_perencanaan").val();
        let batas=parseInt(bulan)+2;

        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/catur_wulan/data",
            data: {"tahun":tahun,"bulan":bulan,"id_perencanaan":id_perencanaan,"batas":batas},
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

                        $("#tabel_satu").append('\n' +
                            '\t\t\t\t\t\t\t\t\t<tr>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1">'+data[i].nama_jenis+'</td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+i+'_1"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+i+'_2"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+i+'_3"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+i+'_4"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1" id="'+i+'_5"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_6"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_7"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_8"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_9"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_10"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_11"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_12"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_13"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_14"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" id="'+i+'_15"></td>\n' +
                            '\t\t\t\t\t\t\t\t\t</tr>');




                        i++;
                    }
                }
        });
	}


	function hapusTabel()
	{

	    $("#tabel_satu").empty();
	}
</script>









</body>

</html>
