
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
								<h6 class="m-0 font-weight-bold text-primary">Lampiran Per Tahap</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

                            <b>Bulan Pertama</b>


                             <select id="bulan_mulai" class="form form-control">

                             <option value="1">Januari</option>
                             <option value="2">Februari</option>
                             <option value="3">Maret</option>
                             <option value="4">April</option>
                             <option value="5">Mei</option>
                             <option value="6">Juni</option>
                             <option value="7">Juli</option>
                             <option value="8">Agustus</option>
                             <option value="9">September</option>
                             <option value="10">Oktober</option>
                             <option value="11">November</option>
                             <option value="12">Desember</option>
                             
                             </select>

                             <b>Bulan Akhir</b>


<select id="bulan_selesai" class="form form-control">

<option value="1">Januari</option>
<option value="2">Februari</option>
<option value="3">Maret</option>
<option value="4">April</option>
<option value="5">Mei</option>
<option value="6">Juni</option>
<option value="7">Juli</option>
<option value="8">Agustus</option>
<option value="9">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>

</select>

<b>Paket</b>

<select onchange="perencanaan()" id="paket" class="form form-control">

<option>--Pilih Paket--</option>

<?php


$data=$this->db->get("paket")->result();
$count=count($data);
$i=0;


while($i<$count)
{

    ?>

     <option value="<?php echo $data[$i]->id_paket; ?>"><?php echo $data[$i]->nama; ?></option>

    <?php
    $i++;
}


?>
</select>


<b>Laporan Perencanaan</b>

<select id="laporan_perencanaan" class="form form-control">


</select>

<br/>


<button class="btn btn-info" onclick="validasi()">Validasi</button>
<br/>
<br/>


<br/>


<div class="panel panel-danger" style="border:2px solid black;"> 
<div class="panel-head" style="border:2px solid black;"><b><h2><i>Tambah Lampiran</i></h2></b></div>
<div class="panel-body" style="height:300px; margin:10px;">


<b>Upload Gambar</b>
<br/>
<br/>

<?php echo form_open_multipart('upload/aksi_upload_lampiran');?>


<input type="hidden" class="form form-control" id="pertama1" name="pertama">
<input type="hidden" class="form form-control" id="terakhir1" name="terakhir">
<input type="hidden" class="form form-control" id="paket1" name="paket">
<input type="hidden" class="form form-control" id="perencanaan1" name="perencanaan">


<b>Jenis Pekerjaan</b>

<select class="form form-control" id="jenis_pekerjaan" name="jenis_pekerjaan">

</select>
<br/>




<div class="row">

<div class="col-sm-1"><b>0%:  </b></div>
<div class="col-sm-4"> <input type="file" name="berkas1" /></div>

</div>
<div class="row">

<div class="col-sm-1"><b>50%:  </b></div>
<div class="col-sm-4"> <input type="file" name="berkas2" /></div>

</div>

<div class="row">

<div class="col-sm-1"><b>100%:  </b></div>
<div class="col-sm-4"> <input type="file" name="berkas3" /></div>

</div>


<br/>

<input type="submit" value="upload" class="btn btn-info"/>

</form>


</div>
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
	function lihatData(data)
	{

	    window.location="http://localhost/pupr_new/user/lihat_paket/"+data;
	}



    function perencanaan()
    {

      let paket=$("#paket").val();

    //   Ajax Untuk mengambil semua data laporan perencanaan

    $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/lampiran_tahap/perencanaan", 
         data: {"id_paket":paket},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                $("#laporan_perencanaan").empty();

                data=JSON.parse(data);
                let length=data.length;
                let i=0;


                while(i<length)
                {
                    $("#laporan_perencanaan").append("<option value='"+data[i].id_lap_perencanaan+"'>"+data[i].keterangan+"</option>")
                    
                    i++;
                }
              }
          });


        // alert("test");
    }



    function validasi()
    {


        // alert("validasi");

        let bulan_mulai=$("#bulan_mulai").val();
        let bulan_selesai=$("#bulan_selesai").val();
        let id_paket=$("#paket").val();
        let laporan_perencanaan=$("#laporan_perencanaan").val();


        $("#pertama1").val(bulan_mulai);
        $("#terakhir1").val(bulan_selesai);
        $("#paket1").val(id_paket);
        $("#perencanaan1").val(laporan_perencanaan);

        // Sekarang cek apakah ada laporan untuk cartur wulan tersebut
        $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/lampiran_tahap/validasi", 
         data: {"bulan_mulai":bulan_mulai,"bulan_selesai":bulan_selesai,"id_paket":id_paket,"laporan_perencanaan":laporan_perencanaan},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.

                // console.log(data);

                $("#jenis_pekerjaan").empty();

                data=JSON.parse(data);
                let length=data.length;
                let i=0;


                while(i<length)
                {

                    $("#jenis_pekerjaan").append("<option value='"+data[i].id+"'>"+data[i].nama_jenis+"</option>")
                    
                    i++;  
                }
              }
          });
    }
</script>






</body>

</html>
