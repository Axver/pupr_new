
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
    th,td,table{
        color:black;
        border:2px solid black;
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
				<?php $this->load->view('admin_content/card_list_user');?>

				<!-- Content Row -->

				<div class="row">

					<!-- Area Chart -->
					<div class="col-xl-12 col-lg-12">
						<div class="card shadow mb-12">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Generate Laporan Per Tahap</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">
                            <!-- Pilih Datanya Dulu -->
                         

                            <?php echo form_open_multipart('upload/aksi_upload_tahap');?>
                            <b>Pilih Paket</b>
                            <select onchange="listPerencanaan()" id="id_paket" name="id_paket" class="form form-control">
                            <option>--Pilih Paket--</option>
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

                            <input type="hidden" id="tahun" name="tahun">
                            <br/>
                            <b>Pilih Perencanaan</b>
                            <select class="form form-control" id="id_perencanaan" name="id_perencanaan">
                            <option>--Pilih Perencanaan--</option>
                            </select>

                            <br/>
                <br/>

                <br/>
                <b>Pilih Bulan</b>


<select name="bulan" class="form form-control" id="bulan">
<option value="">--Pilih Bulan--</option>
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
<br/>

<b>*Generate dahulu sebelum upload gambar</b>
                <select class="form form-control" name="jenis_pekerjaan"> 
                <?php

                 $jp=$this->db->get("jenis_pekerjaan")->result();

                 $count=count($jp);
                 $i=0;

                 while($i<$count)
                 {

                  ?>
                  <option value="<?php echo $jp[$i]->id; ?>"><?php echo $jp[$i]->nama_jenis; ?></option>
                  <?php
                  $i++;
                 }
                ?>
                
                </select>

                <br/>

								<input type="file" name="berkas" class="btn btn-info"/>

   



              

								<input type="submit" value="upload" class="btn btn-info"/>

								</form>
                           
                            <br/>
                            <br/>
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

                            <button class="btn btn-facebook" onclick="generate()">Generate</button>


                            <br/>

                            <br/>

                            <b>Gambar Untuk Pekerjaan</b>
                            <br/>
                            <br/>

                            <br/>
                           


							
							



                            <br/>

                            <br/>
                            <br/>
                            <button class="btn btn-facebook" style="width:100%;" onclick="generatePDF()">Cetak PDF</button>

                            <div id="cetak">
                            <center><b><h3>LAPORAN PER TAHAP</h3></b></center>
                            <center><b><h3>PELAKSANAAN KEGIATAN</h3></b></center>

                            <br/>
                            <br/>

                            <div class="row">
                            
                            <div class="col-sm-3">Nama Paket</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>

                            
                            <div class="row">
                            
                            <div class="col-sm-3">Nilai Paket</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>


                            
                            <div class="row">
                            
                            <div class="col-sm-3">Priode</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>

                            
                            <div class="row">
                            
                            <div class="col-sm-3">Jenis Pekerjaan</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>


                            
                            <div class="row">
                            
                            <div class="col-sm-3">Lokasi</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>


                            
                            <div class="row">
                            
                            <div class="col-sm-3">Tahun Anggaran</div>
                            <div class="col-sm-1">:</div>
                            <div class="col-sm-3"></div>
                            </div>


                            <br/>
                            <br/>
                            <br/>

                            <b>Jadwal Rencana Pelaksanaan Kegiatan</b>
                            <table class="tg table" id="tabel_satu">


</table>

<div class="break"></div>

<b>Perencanaan Penggunaan Jumlah Pekerja</b>


<table class="tg table" id="tabel_dua">


 
</table>
<div class="break"></div>

<b>Perencanaan Penggunaan Bahan/Alat</b>
<table class="tg table" id="tabel_tiga">

</table>


<br/>
<br/>

<b>Sketsa Kerja Rencana</b>

<table class="tg table" id="tabel_empat">

  <!-- <tr>
    <td class="tg-cly1"></td>
    <td class="tg-cly1"></td>
    <td class="tg-0lax"></td>
  </tr> -->
</table>

<br/>
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
										 <div class="col-sm-3"><center><b>Diperiksa Oleh</b><br/><b><div id="testsaja"></div></b></center></div>
										 <div class="col-sm-4"></div>
										 <div class="col-sm-3"><center><b>Jambi,<?php echo tgl_indo(date('Y-m-d')); ?></b><br/><b>Dibuat Oleh</b></center></div>
										 <div class="col-sm-1"></div>
									 </div>

									 <br/>
									 <br/>
									 <br/>
									 <div class="row">
										 <div class="col-sm-1"></div>
										 <div class="col-sm-3"><center><u><b id="diperiksa"> </b></u><br/><b id="nip_dip"></b><br/><br/></center></div>
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
    function listPerencanaan()
    {
        $("#id_perencanaan").empty();
        let id_paket=$("#id_paket").val();
        // Ajax untuk mengambil data laporan perencanaan
        $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/generate_bulan_baru/perencanaan", 
         data: {"id_paket":id_paket},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                data=JSON.parse(data);
                console.log(data);

                let length=data.length;
                let i=0;

                $("#id_perencanaan").append("<option >"+"--Pilih--"+"</option>")





                while(i<length)
                {      $("#tahun").val(data[i].tahun);
                       $("#id_perencanaan").append("<option value='"+data[i].id_lap_perencanaan+"'>"+data[i].id_lap_perencanaan+"</option>")

                    i++;
                }
              }
          });
    }
</script>




<script>
    function generate()
    {

      let diperiksa_=$("#diperiksa_oleh").val();

        // alert(diperiksa_);
        // alert(diperiksa_);
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

                    console.log("Hmmmmmm");
                    console.log(data);
                    console.log("Hmmmmmm");
                    // alert(data);

                    while(i<length)
                    {
                        $("#testsaja").text(data[i].jabatan);
                        $("#diperiksa").text(data[i].nama);
                        $("#nip_dip").text("NIP:"+data[i].nip);

                        i++;
                    }
                }
        });

      hapus();
      $("#tabel_satu").append('    <tr>'+
    '<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>'+
    '<th class="tg-cly1" rowspan="3">Jenis Upah</th>'+
    '<th class="tg-cly1" colspan="20">Tahap</th>'+
  '</tr><tr>'+
    '<td class="tg-cly1" colspan="5">Bulan 1</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 2</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 3</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 4</td>'+
  '</tr>'+
  '<tr>'+
   '<td class="tg-cly1">1</td>'+
    '<td class="tg-cly1">2</td>'+
    '<td class="tg-cly1">3</td>'+
    '<td class="tg-cly1">4</td>'+
    '<td class="tg-cly1">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
  '</tr>');

  $("#tabel_dua").append('    <tr>'+
    '<th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>'+
    '<th class="tg-cly1" rowspan="3">Jenis Upah</th>'+
    '<th class="tg-cly1" colspan="20">Tahap</th>'+
  '</tr><tr>'+
    '<td class="tg-cly1" colspan="5">Bulan 1</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 2</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 3</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 4</td>'+
  '</tr>'+
  '<tr>'+
   '<td class="tg-cly1">1</td>'+
    '<td class="tg-cly1">2</td>'+
    '<td class="tg-cly1">3</td>'+
    '<td class="tg-cly1">4</td>'+
    '<td class="tg-cly1">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    '<td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
  '</tr>');

  $("#tabel_tiga").append('<tr>'+
    '<th class="tg-cly1" rowspan="3">Bahan/Alat</th>'+
    '<th class="tg-cly1" rowspan="3">Satuan</th>'+
    '<th class="tg-cly1" colspan="20">Tahap</th>'+
  '</tr>'+
  '<tr>'+
    '<td class="tg-cly1" colspan="5">Bulan 1</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 2</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 3</td>'+
    '<td class="tg-0lax" colspan="5">Bulan 4</td>'+
  '</tr>'+
 
  '<tr>'+
   ' <td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    ' <td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    ' <td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
    ' <td class="tg-0lax">1</td>'+
    '<td class="tg-0lax">2</td>'+
    '<td class="tg-0lax">3</td>'+
    '<td class="tg-0lax">4</td>'+
    '<td class="tg-0lax">5</td>'+
  '</tr>');


 

        let id_paket=$("#id_paket").val();
        let id_perencanaan=$("#id_perencanaan").val();
        let bulan=$("#bulan").val();

        

        // Tahun yang dipaket, bukan tahun sekarang
        let tahun;
        tahun=$("#tahun").val();

		// Buat dulu row tabelnya sesuai dengan jumlah yang ada di db
		$.ajax({
         type: "POST",
		 async:false,
         url: "http://localhost/pupr_new/generate_bulan_baru/row1", 
         data: {"id_paket":id_paket,"id_perencanaan":id_perencanaan,"bulan":bulan,"tahun":tahun},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                data=JSON.parse(data);
			

				let length=data.length;
				// Buat Row sebanyak data length tersebut
				// Jangan lupa id row didasarkan pada id Pekerjaan dan id jenis upah, serta untuk minggu ditambahkan urutan

	             let i=0;

				 while(i<length)
				 {

           

					$("#tabel_satu").append("<tr>"+
                      "<td class='tg-0lax'>"+data[i].nama_jenis+"</td>"+
                      "<td class='tg-0lax'>"+data[i].nama+"</td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_1"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_2"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_3"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_4"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_5"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_6"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_7"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_8"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_9"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_10"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_11"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_12"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_13"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_14"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_15"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_16"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_17"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_18"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_19"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_20"+"'></td >"+
                       "</tr>");

                       $("#tabel_dua").append("<tr>"+
                      "<td class='tg-0lax'>"+data[i].nama_jenis+"</td>"+
                      "<td class='tg-0lax'>"+data[i].nama+"</td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__1"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__2"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__3"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__4"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__5"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__6"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__7"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__8"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__9"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__10"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__11"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__12"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__13"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__14"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__15"+"'></td >"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__16"+"' ></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__17"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__18"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__19"+"'></td>"+
                       "<td class='tg-0lax' id='"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__20"+"'></td >"+
                       "</tr>");


					 i++;
				 }
              }
          });


          // Ajax untuk mengenerate tabel alat_bahan
          
          $.ajax({
               type: "POST",
		           async:false,
               url: "http://localhost/pupr_new/generate_bulan_baru/generate_alat1", 
               data: {"id_paket":id_paket,"id_perencanaan":id_perencanaan,"bulan":bulan,"tahun":tahun},
               dataType: "text",  
               cache:false,
               success: 
              function(data){
                 data=JSON.parse(data);
				     
				         let length=data.length;
	               let i=0;

                 
                 while(i<length)
                 {
                    
                  $("#tabel_tiga").append(" <tr>"+
                     "<td class='tg-0lax'>"+data[i].jenis_bahan_alat+"</td>"+
                     "<td class='tg-0lax'>"+data[i].satuan+"</td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___1"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___2"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___3"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___4"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___5"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___6"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___7"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___8"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___9"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___10"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___11"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___12"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___13"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___14"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___15"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___16"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___17"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___18"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___19"+"'></td>"+
                     "<td class='tg-0lax' id='"+data[i].id_jenis_bahan_alat+"___20"+"'></td>"+
                     "</tr>");


                   i++;
                 }
              }
          });




    //    Perulangan 4 kali
    let m=0;

    while(m<4)
    {
        let bulan=$("#bulan").val();
        if(m==0)
        {
            bulan=bulan;
        }
        else if(m==1)
        {
            bulan=parseInt(bulan)+1;
        }
        else if(m==2)
        {
            bulan=parseInt(bulan)+2;
        }
        else if(m==3)
        {
            bulan=parseInt(bulan)+3;
        }
              // Selenjutnya ambil data yang sesuai dengan kriteria diatas
        // Select Sum Kan masing-masing per minggu

        let jumlah=getWeeksInMonth(bulan, tahun);

        console.log("hmmm");
        console.log(jumlah);
        console.log(bulan);
        console.log("hmmm");

        // alert(jumlah);
        let x=1;

        while(x<=jumlah)
        {
            // Cari tanggal mulai dan tanggal selesai dari masing-masing minggu didalam bulan tersebut
            $.ajax({
               type: "POST",
		           async:false,
               url: "http://localhost/pupr_new/generate_bulan_baru/minggu", 
               data: {"id_paket":id_paket,"id_perencanaan":id_perencanaan,"bulan":bulan,"tahun":tahun,"minggu":x},
               dataType: "text",  
               cache:false,
               success: 
              function(data){
                 data=JSON.parse(data);
				       
				let length=data.length;
	               let i=0;


                 while(i<length)
                 {
                     if(m==1)
                     {
                         let sup=parseInt(x)+5;

                    $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+sup).css("background-color","#3b5998");
                    $("#"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__"+sup).text(data[i].sum);

                     }
                     else if(m==2)
                     {
                        let sup=parseInt(x)+10;
                        $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+sup).css("background-color","#3b5998");
                    $("#"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__"+sup).text(data[i].sum);
                         
                     }
                     else if(m==3)
                     {
                        let sup=parseInt(x)+15;

$("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+sup).css("background-color","#3b5998");
$("#"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__"+sup).text(data[i].sum);

                     }
                     else
                     {
                        $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+x).css("background-color","#3b5998");
                    $("#"+data[i].jenis_pekerjaan+"__"+data[i].id_jenis_upah+"__"+x).text(data[i].sum);
                     }

                   
                    
                  

                   i++;
                 }
              }
          });

           // Select semua bahan alat yang digunakan dalam bulan tersebut

           $.ajax({
               type: "POST",
		           async:false,
               url: "http://localhost/pupr_new/generate_bulan_baru/alat_minggu", 
               data: {"id_paket":id_paket,"id_perencanaan":id_perencanaan,"bulan":bulan,"tahun":tahun,"minggu":x},
               dataType: "text",  
               cache:false,
               success: 
              function(data){
                 data=JSON.parse(data);
				      
				         let length=data.length;
	               let i=0;


                 while(i<length)
                 {
                    
                    // $("#"+data[i].jenis_pekerjaan+"_"+data[i].id_jenis_upah+"_"+x).css("background-color","#3b5998");
                   


                    if(m==1)
                     {
                         let sup=parseInt(x)+5;

                         $("#"+data[i].id_jenis_bahan_alat+"___"+sup).text(data[i].sum);

                     }
                     else if(m==2)
                     {
                        let sup=parseInt(x)+10;
                        $("#"+data[i].id_jenis_bahan_alat+"___"+sup).text(data[i].sum);
                         
                     }
                     else if(m==3)
                     {
                        let sup=parseInt(x)+15;

                        $("#"+data[i].id_jenis_bahan_alat+"___"+sup).text(data[i].sum);

                     }
                     else
                     {
                      $("#"+data[i].id_jenis_bahan_alat+"___"+sup).text(data[i].sum);
                     }

                   i++;
                 }
              }
          });

            x++;
        }

        m++;
       
    }



    // Tabel paling bawah yang berisi foto dan ditambahkan secara otomatis
    $("#tabel_empat").empty();

    $("#tabel_empat").append('<tr><th class="tg-cly1">Jenis Pekerjaan</th><th class="tg-cly1">Sketsa</th><th class="tg-0lax">Keterangan</th></tr>');

    // Pilih semua sketsa dari dalam tabel
    let id_paket_j=$("#id_paket").val();
    let id_perencanaan_j=$("#id_perencanaan").val();
    let bulan_j=$("#bulan").val();
    $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/catur_wulan_baru/sketsa", 
         data: {"id_paket":id_paket_j,"id_perencanaan":id_perencanaan_j,"bulan":bulan_j},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                data=JSON.parse(data);
                console.log("gambar");
                console.log(data);

                let length=data.length;
                let i=0;

                while(i<length)
                {

                    $("#tabel_empat").append('<tr><td class="tg-cly1">'+data[i].nama_jenis+'</td>'+
                    '<td class="tg-cly1">'+'<img style="width:200px" src="http://localhost/pupr_new/gambar/'+data[i].gambar+'">'+'</td>'+
                    '<td class="tg-0lax"></td></tr> ');
                  i++;
                }
              }
          });

       



       


    }


    function hapus()
    {
      $("#tabel_satu").empty();
      $("#tabel_dua").empty();
      $("#tabel_tiga").empty();
      $("#tabel_empat").empty();
    }
</script>


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



                    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' },
            pagebreak: { before: '.break'}
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();

        swal("PDF Digenerate!!");
    }

</script>









</body>

</html>
