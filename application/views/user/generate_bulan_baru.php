
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
	td,th,table{
		border:2px solid black;
		color:black;
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
								<h6 class="m-0 font-weight-bold text-primary">Generate Laporan Bulanan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

                            <b>Pilih Paket</b>
                            <select onchange="listPerencanaan()" id="id_paket" class="form form-control">
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

                            <input type="hidden" id="tahun">
                            <br/>
                            <b>Pilih Perencanaan</b>
                            <select class="form form-control" id="id_perencanaan">
                            <option>--Pilih Perencanaan--</option>
                            </select>

                            <br/>
                            <b>Pilih Bulan</b>


                            <select class="form form-control" id="bulan">
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
                            <br/>

                            <button class="btn btn-facebook" onclick="generate()">Generate</button>

							<br/>
							<br/>

							<!-- Tabel Disini -->

							<table class="tg table" id="tabel_satu">
  <tr>
    <th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
    <th class="tg-cly1" rowspan="3">Jenis Upah</th>
    <th class="tg-cly1" colspan="5">Bulan</th>
  </tr>
  <tr>
    <td class="tg-cly1" colspan="5">Minggu</td>
  </tr>
  <tr>
    <td class="tg-0lax">1</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">3</td>
    <td class="tg-0lax">4</td>
    <td class="tg-0lax">5</td>
  </tr>
</table>


<br/>

<b>Rekapitulasi Pekerjaan Bulan X</b>

<br/>

<table class="tg table" id="tabel_dua">
  <tr>
    <th class="tg-cly1" rowspan="3">Jenis Pekerjaan</th>
    <th class="tg-cly1" rowspan="3">Jenis Upah</th>
    <th class="tg-cly1" colspan="5">Bulan</th>
  </tr>
  <tr>
    <td class="tg-cly1" colspan="5">Minggu</td>
  </tr>
  <tr>
    <td class="tg-0lax">1</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">3</td>
    <td class="tg-0lax">4</td>
    <td class="tg-0lax">5</td>
  </tr>
</table>

<br/>

<b>Rekapitulasi Penggunaan Bahan/Alat</b>

<br/>

<table class="tg table" id="tabel_tiga">
  <tr>
    <th class="tg-cly1" rowspan="3">Bahan/Alat</th>
    <th class="tg-cly1" rowspan="3">Satuan</th>
    <th class="tg-cly1" colspan="5">Bulan</th>
  </tr>
  <tr>
    <td class="tg-cly1" colspan="5">Minggu</td>
  </tr>
  <tr>
    <td class="tg-0lax">1</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">3</td>
    <td class="tg-0lax">4</td>
    <td class="tg-0lax">5</td>
  </tr>
</table>
		

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




    function generate()
    {
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
         url: "http://localhost/pupr_new/generate_bulan_baru/row", 
         data: {"id_paket":id_paket,"id_perencanaan":id_perencanaan,"bulan":bulan,"tahun":tahun},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                data=JSON.parse(data);
				console.log("jumlah row");
				console.log(data);

				let length=data.length;
				// Buat Row sebanyak data length tersebut
				// Jangan lupa id row didasarkan pada id Pekerjaan dan id jenis upah, serta untuk minggu ditambahkan urutan

	             let i=0;

				 while(i<length)
				 {

					$("#tabel_satu").append("<tr>"+
                      "<td class='tg-0lax'></td>"+
                      "<td class='tg-0lax'></td>"+
                       "<td class='tg-0lax'></td>"+
                       "<td class='tg-0lax'></td>"+
                       "<td class='tg-0lax'></td>"+
                       "<td class='tg-0lax'></td>"+
                       "<td class='tg-0lax'></td>"+"</tr>");

                    $("#tabel_dua").append(" <tr>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+
                     "<td class='tg-0lax'></td>"+ "</tr>");

					 i++;
				 }
              }
          });



        // Selenjutnya ambil data yang sesuai dengan kriteria diatas
        // Select Sum Kan masing-masing per minggu

        let jumlah=getWeeksInMonth(bulan, tahun);

        // alert(jumlah);
        let x=1;

        while(x<=jumlah)
        {
            // Cari tanggal mulai dan tanggal selesai dari masing-masing minggu didalam bulan tersebut

            x++;
        }


    }


</script>



<script>

// Untuk mendapatkan berapa jumlah minggu dalam satu bulan


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

</script>






</body>

</html>
