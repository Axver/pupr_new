
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
							<button onclick="generatePDF()" class="btn btn-info">Generate PDF</button>
							<div class="card-body" id="cetak_pdf">
								<center><h2>LAPORAN HARIAN</h2></center>



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
										<td class="tg-cly1" id="mJenis" ></td>
										<td class="tg-cly1" id="mSket"  ></td>
										<td class="tg-cly1"  id="mLokasi"></td>
										<td class="tg-cly1" id="mPanjang" ></td>
										<td class="tg-cly1" id="mDimensi" ></td>
									</tr>


								</table>

								<br/>

								<br/>



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
            $("#lokasi").text(data[0].lokasi);
        }
});

//Kemudian Load Data Untuk Tabelnya
let id_harian_asli=$("#id_harian_asli").val();
let id_paket_asli1=$("#id_paket_asli").val();
console.log("test");
// alert(id_paket_asli);

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

			    $("#tabel_harian").append('\t\t<tr>\n' +
                    '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[i].nama_jenis+'</td>\n' +
                    '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[i].jumlah_pekerja+'</td>\n' +
                    '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[i].jenis_bahan_alat+'</td>\n' +
                    '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[i].satuan+'</td>\n' +
                    '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax">'+data[i].jumlah_bahan+'</td>\n' +
                    '\t\t\t\t\t\t\t\t\t</tr>');

			    i++;
			}

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
// alert(id_perencanaan_asli);

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
            let length=data.length;
            let i=0;

            while(i<length)
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














</body>

</html>
