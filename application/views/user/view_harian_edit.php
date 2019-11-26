
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
<!--							<button onclick="generatePDF()" class="btn btn-info">Generate PDF</button>-->
							<div class="card-body" id="cetak_pdf">



								<input type="hidden" value="<?php echo $lapar['lapar'][0]->id_paket?>" id="id_paket_asli">
								<input type="hidden" id="id_harian_asli" value="<?php echo $this->uri->segment('3'); ?>">
								<input type="hidden" id="id_perencanaan_asli" value="<?php echo $this->uri->segment('4'); ?>">




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

									<div class="col-sm-4" id="nama_paket">



									</div>






								</div>

								<div class="row">
									<div class="col-sm-2">
										Lokasi
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4" id="lokasi">
										<?php
										$get_waw=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment('4')))->result();
										$count=count($get_waw);
										$i=0;

										while($i<$count)
										{
											echo $get_waw[$i]->lokasi;
											$i++;
										}
										?>
									</div>
								</div>

								<div class="row">

									<div class="col-sm-2">
										Hari/Tanggal
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4" id="hari_tanggal">
										<?php echo $this->uri->segment("3"); ?>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-2">
										Keterangan Pekerja/Bahan
									</div>
									<div class="col-sm-1">
										:
									</div>

									<div class="col-sm-4" id="keterangan">

									</div>
								</div>
								<br/>
								Lap Perencanaan:
								<input type="text" id="id_lap_perencanaanbn" class="form form-control" value="<?php

								$ambil=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment('4')))->result();

								$count=count($ambil);
								$i=0;

								while($i<$count)
								{
									echo $ambil[$i]->keterangan;

									$i++;
								}
								?>" disabled>
								<input type="hidden" id="id_lap_perencanaan" class="form form-control" value="<?php echo $this->uri->segment('4') ?>">
								Tanggal:
								<input type="text" id="hari_tanggal_" class="form form-control" value="<?php echo $this->uri->segment('3') ?>" disabled>
								Id Paket:
								<input type="text" id="paket" class="form form-control" value="<?php echo $lapar['lapar'][0]->id_paket?>" disabled>
								<button class="btn btn-info" onclick="addRow()">+</button>
								<b>*Klik Column untuk Update Data</b>


								<br/>


								<b>Tabel Informasi</b>


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

								<b>Tabel Tukang</b>

								<table class="table" id="tabel_tukang">

									<tr>
										<th>Pekerja</th>
										<th>Jumlah Tukang</th>
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
										<td class="tg-cly1 edit"  id="mJenis" ></td>
										<td class="tg-cly1 " id="mSket"  ></td>
										<td class="tg-cly1 edit"  id="mLokasi"></td>
										<td class="tg-cly1 edit" id="mPanjang"></td>
										<td class="tg-cly1 edit" id="mDimensi"></td>
									</tr>


								</table>

								<br/>

								<br/>
								<b>Diperiksa Oleh</b> <br/>
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


								<br/>

								<button class="btn btn-success" onclick="update()">Update</button>
								<input type="hidden" id="j">




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



<script>
    <!--	Ajax untuk mengisi data paket-->

    let id_paket_asli=$("#id_paket_asli").val();

    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/view_harian/get_paket",
        data: {"id_paket":id_paket_asli},
        dataType: "text",
        async:false,
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log(data);

                $("#nama_paket").text(data[0].nama);
                // $("#lokasi").text(data[0].lokasi);
            }
    });

    //Kemudian Load Data Untuk Tabelnya
    let id_harian_asli=$("#id_harian_asli").val();
    let id_paket_asli1=$("#id_paket_asli").val();

    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/view_harian/data_tabel",
        data: {"id_harian":id_harian_asli,"id_paket":id_paket_asli1},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log("-----");
                console.log(data);
                console.log("------");
                length=data.length;

                let i=0;
                while(i<length)
                {
                    console.log("waha");
					let j=i+1;
                    $("#tabel_harian").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jenis_pekerja" id="'+j+'_1">'+data[i].jenis_pekerja+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jumlah_pekerja" id="'+j+'_2">'+data[i].jumlah_pekerja+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jenis_bahan" id="'+j+'_3">'+data[i].id_jenis_bahan_alat+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi satuan_bahan" id="'+j+'_4">'+data[i].id_satuan+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jumlah_bahan" id="'+j+'_5">'+data[i].jumlah_bahan+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t</tr>');

                    $("#tabel_tukang").append('\t\t<tr>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi_ jenis_pekerja" id="'+j+'__1">'+data[i].jenis_pekerja+'</td>\n' +
                        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi_ jumlah_pekerja" id="'+j+'__2">'+data[i].jumlah_tukang+'</td>\n' +

                        '\t\t\t\t\t\t\t\t\t</tr>');

                    $("#j").val(j);

                    i++;
                }

            //    Panggil event listener

				listener();


            }
    });

    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak_pdf");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       0,
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' }
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();
        // html2pdf().from(element).save();
    }

    let id_perencanaan_asli=$("#id_perencanaan_asli").val();

    //Ajax Untuk Mendapatkan Gambar
    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/view_harian/get_gambar",
        data: {"id_harian":id_harian_asli,"id_perencanaan":id_perencanaan_asli},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log(data);
                let data_length=data.length;
                let i=0;
                while(i<data_length)
				{
                    $("#mSket").append('<img style="width:200px;" src="http://localhost/pupr_new/gambar/'+data[i].gambar+'">');
				    i++;
				}


            }
    });

    //Ajax untuk menampilkan tabel bawah

    //Ajax Untuk Mendapatkan Gambar
    $.ajax({
        type: "POST",
        url: "http://localhost/pupr_new/view_harian/get_bawah",
        data: {"id_harian":id_harian_asli,"id_perencanaan":id_perencanaan_asli},
        dataType: "text",
        cache:false,
        success:
            function(data){
                data=JSON.parse(data);
                console.log("hmmmmm");
                console.log(data);

                let length=data.length;
                let i=0;
                while(i<length)
                {
                    $("#mDimensi").text(data[i].dimensi);
                    $("#mLokasi").text(data[i].lokasi);
                    $("#mPanjang").text(data[i].panjang_penanganan);
                    $("#mJenis").text(data[i].jenis_pekerjaan);

                    i++;
                }
            }
    });



</script>

<?php $this->load->view("modal/modalEditHarian"); ?>

<script>
function listener()
{
    <!--	Event Listener-->
//	Event Listener
    var classname = document.getElementsByClassName("jenis_pekerja");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column").val(attribute);
        $("#mJenisPekerja").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }

    var classname = document.getElementsByClassName("jumlah_pekerja");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column_jumlah_pekerja").val(attribute);
        $("#mJumlahPekerja").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }

    var classname = document.getElementsByClassName("jenis_bahan");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column_jenis_bahan").val(attribute);
        $("#mJenisBahan").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }

    var classname = document.getElementsByClassName("satuan_bahan");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column_satuan_bahan").val(attribute);
        $("#mSatuanBahan").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }

    var classname = document.getElementsByClassName("jumlah_bahan");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column_jumlah_bahan").val(attribute);
        $("#mJumlahBahan").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }


    var classname = document.getElementsByClassName("edit");

    var myFunction = function() {
        var attribute = this.id;
        console.log(attribute);
        $("#id_column_edit").val(attribute);
        $("#mEdit").modal("show");

    };

    for (var i = 0; i < classname.length; i++) {
        classname[i].addEventListener('click', myFunction, false);
        console.log("wuha");
    }
}


function edit_jenis_pekerjaan()
{

    let id_column=$("#id_column").val();
    let text_=$("#jenis_pekerja_value").val();



    $("#"+id_column).text(text_);
    $("#mJenisPekerja").modal("hide");
}

function edit_jumlah_pekerjaan()
{

    let id_column=$("#id_column_jumlah_pekerja").val();
    let text_=$("#jumlah_pekerja_value").val();



    $("#"+id_column).text(text_);
    $("#mJumlahPekerja").modal("hide");
}

function edit_jenis_bahan()
{

    let id_column=$("#id_column_jenis_bahan").val();
    let text_=$("#jenis_bahan_value").val();



    $("#"+id_column).text(text_);
    $("#mJenisBahan").modal("hide");
}


function edit_satuan_bahan()
{

    let id_column=$("#id_column_satuan_bahan").val();
    let text_=$("#satuan").val();



    $("#"+id_column).text(text_);
    $("#mSatuanBahan").modal("hide");
}

function edit_jumlah_bahan()
{

    let id_column=$("#id_column_jumlah_bahan").val();
    let text_=$("#jumlah_bahan_value").val();



    $("#"+id_column).text(text_);
    $("#mJumlahBahan").modal("hide");
}


let nilai_save="1_";
let m=0;




function addRow() {



    $("#tabel_harian").append('\t\t<tr>\n' +
        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jenis_pekerja" id="'+nilai_save+m+'_1"></td>\n' +
        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jumlah_pekerja" id="'+nilai_save+m+'_2"></td>\n' +
        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jenis_bahan" id="'+nilai_save+m+'_3"></td>\n' +
        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi satuan_bahan" id="'+nilai_save+m+'_4"></td>\n' +
        '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax data_jesi jumlah_bahan" id="'+nilai_save+m+'_5"></td>\n' +
        '\t\t\t\t\t\t\t\t\t</tr>');

    m++;

    listener();

}


function update()
{
    // alert("update");

        let id_paket_=$("#paket").val();
        let id_laper=$("#id_lap_perencanaan").val();
        let hari_tanggal=$("#hari_tanggal_").val();

        // alert(hari_tanggal);

                    let xo=0;
                    let dataArray=[];
                    //    Ekstrak data dari Tabel dahulu
                    $(".data_jesi").each(function() {
                        dataArray[xo]=$(this).text();
                        xo++;

                    });

                    console.log("HMMMMMM");
                    console.log(dataArray);
                    console.log("Hmmmmmmm");

                    //Setelah Laporan Harian Disimpan Maka Masukkan Detailnya
                    $.ajax({
                        type: "POST",
                        async:false,
                        url: "http://localhost/pupr_new/view_harian/detail_harian",
                        data: {"data":dataArray,"id_lap_perencanaan":id_laper,"id_paket":id_paket_,"id_lapharmin":hari_tanggal},
                        dataType: "text",
                        cache:false,
                        success:
                            function(data){
                                console.log(data);
                            }
                    });

    let dataArray1=[];
    let no=0;
    $(".data_jesi_").each(function() {
        dataArray1[no]=$(this).text();
        no++;

    });

    console.log("UjiCOba");
    console.log(dataArray1);
    console.log("UjiCOba");

    //Setelah Laporan Harian Disimpan Maka Masukkan Detailnya
    $.ajax({
        type: "POST",
        async:false,
        url: "http://localhost/pupr_new/view_harian/detail_harian1",
        data: {"data":dataArray1,"id_lap_perencanaan":id_laper,"id_paket":id_paket_,"id_lapharmin":hari_tanggal},
        dataType: "text",
        cache:false,
        success:
            function(data){
                console.log(data);
            }
    });


        //    Simpan Yang Bawah Juga

    //    Simpan Yang Bawah Juga

    let mJenisSave=$("#mJenis").text();
    let mLokasiSave=$("#mLokasi").text();
    let mPenangananSave=$("#mPanjang").text();
    let mDimensiSave=$("#mDimensi").text();

    //    Ajax Jquery POST

    $.ajax({
        type: "POST",
        async:false,
        url: "http://localhost/pupr_new/user/save_bawah1",
        data: {"id_paket":id_paket_,"id_lap_perencanaan":id_laper,"hari_tanggal":hari_tanggal,"mJenis":mJenisSave,"mLokasi":mLokasiSave,"mPenanganan":mPenangananSave,"mDimensi":mDimensiSave},
        dataType: "text",
        cache:false,
        success:
            function(data){
                // alert(data);  //as a debugging message.

				// alert("SUKSES!");
            }
    });

    let id_diperiksa=$("#diperiksa_oleh").val();

    //Update Juga TTD Nya
    $.ajax({
        type: "POST",
		async:false,
        url: "http://localhost/pupr_new/view_harian/ttd",
        data: {"id_diperiksa":id_diperiksa,"id_laper":id_laper,"id_harian":hari_tanggal},
        dataType: "text",
        cache:false,
        success:
            function(data){
                // alert(data);  //as a debugging message.
            }
    });


    swal("Data Sukses DI Update!");




}

</script>





<!-- Modal -->
<div class="modal fade" id="mEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column_edit" class="form form-control" disabled>
				<input type="text" class="form form-control" id="data_nya">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="save_datanya()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	function save_datanya()
	{
	    let id=$("#id_column_edit").val();
	    let data=$("#data_nya").val();

	    $("#"+id).text(data);

	    $("#mEdit").modal("hide");
	}
</script>


<script>
<!--	Isi data pada kolom diperiksa oleh-->
let id_laper=$("#id_lap_perencanaan").val();
let hari_tanggal=$("#hari_tanggal_").val();

$.ajax({
    type: "POST",
	async:false,
    url: "http://localhost/pupr_new/view_harian/get_ttd",
    data: {"id_laper":id_laper,"hari_tanggal":hari_tanggal},
    dataType: "text",
    cache:false,
    success:
        function(data){
            // alert(data);  //as a debugging message.
			data=JSON.parse(data);
			let i=0;
			let length=data.length;

			while(i<length)
			{
                $("select#diperiksa_oleh").val(data[i].id_diperiksa);

			    i++;
			}
            // $("select#disetujui_oleh").val(data[i].id_disetujui);
        }
});

</script>








</body>

</html>
