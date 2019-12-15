
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
			border: 1px solid black;
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
								<h6 class="m-0 font-weight-bold text-primary">View Laporan Pengawasan</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<input type="hidden" id="minggu" value="<?php echo $this->uri->segment('5'); ?>">
							<input type="hidden" id="tanggal" value="<?php echo $this->uri->segment('3'); ?>">
							<input type="hidden" id="id_perencanaan" value="<?php echo $this->uri->segment('4'); ?>">
							<?php
//							Pilih paket
							$pil=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->Segment("4")))->result();
							$conunt=count($pil);
							$nama_paket="";
							$lokasi="";
							$periode="";
							$tanggal="";
							$tahun="";
							$nilai_paket="";

							$i=0;
							while($i<$conunt)
							{
								$data=$this->db->get_where("paket",array("id_paket"=>$pil[$i]->id_paket))->result();
								$count=count($data);
								$ii=0;
								while($ii<$count)
								{
									$nama_paket=$data[$ii]->nama;
									$lokasi=$data[$ii]->lokasi;
									$tahun=$data[$ii]->tahun;
									$nilai_paket=$data[$ii]->nilai_paket;

									$ii++;
								}
								$i++;
							}
							?>

							<!-- Card Body -->
							<div class="card-body">

                            <button class="btn btn-facebook" style="width:100%;" onclick="generatePDF()">Cetak PDF</button>
                            <div id="cetak">
							
							<center><b><h3>LAPORAN PENGAWASAN</h3></b></center>
								<center><b><h3>MINGGU KE-<b id="romawi"></b> (<b id="huruf"></b>)</h3></b></center>

							 <input type="hidden" id="nilai_paket" value="<?php echo $nilai_paket; ?>">
							 
							 <br/>
							 <br/>
							<div class="row">
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-4">Nama Paket</div>
										<div class="col-sm-1">:</div>
										<div class="col-sm-6"><?php echo $nama_paket; ?></div>
									</div>
									<div class="row">
										<div class="col-sm-4">Lokasi Pekerjaan</div>
										<div class="col-sm-1">:</div>
										<div class="col-sm-6"><?php echo $lokasi; ?></div>
									</div>
									<div class="row">
										<div class="col-sm-4">Periode Pengawasan</div>
										<div class="col-sm-1">:</div>
										<div class="col-sm-6" id="sampai"></div>
									</div>
									<div class="row">
										<div class="col-sm-4">Tanggal</div>
										<div class="col-sm-1">:</div>
										<div class="col-sm-6"><?php echo $this->uri->segment("3") ?></div>
									</div>
									<div class="row">
										<div class="col-sm-4">Tahun Anggaran</div>
										<div class="col-sm-1">:</div>
										<div class="col-sm-6"><?php echo $tahun; ?></div>
									</div>

								</div>
								<br/>
								<br/>

							</div>
								<br/>
								<br/>
								<b>Rekapitulasi Hasil Pengawasan</b>

								<table class="tg table" id="tabel_satu">
									<tr>
										<th class="tg-cly1" style="text-align:center;border:1px solid black;">Jenis Pekerjaan</th>
										<th class="tg-cly1" style="text-align:center;border:1px solid black;">Jenis Pekerja</th>
										<th class="tg-cly1" style="text-align:center;border:1px solid black;">Jumlah</th>
										<th class="tg-0lax" style="text-align:center;border:1px solid black;">Progress Pekerjaan %</th>
									</tr>

								</table>

								

								<br/>
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



								<div class="row" style="text-align:center;">
								
								<div class="col-sm-1"></div>
								<div class="col-sm-3">Diperiksa Oleh,
								<div id="jabatan"></div>
								<br/><br/>
								<u id="nama"></u>
								<div id="nip"></div>
								</div>
								
								<div class="col-sm-4"></div>
							
								<div class="col-sm-3">Jambi, <?php echo tgl_indo($this->uri->segment("3")); ?><br>Dibuat Oleh<br/><br/><br/>
								<u id="nama1"></u>
								<div id="nip1"></div>
								</div>
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
    function romanize (num) {
        if (isNaN(num))
            return NaN;
        var digits = String(+num).split(""),
            key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
                "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
                "","I","II","III","IV","V","VI","VII","VIII","IX"],
            roman = "",
            i = 3;
        while (i--)
            roman = (key[+digits.pop() + (i * 10)] || "") + roman;
        return Array(+digits.join("") + 1).join("M") + roman;
    }

	let minggu=$("#minggu").val();
    let romawi=romanize(minggu);
    // alert(romawi);
	$("#romawi").text(romawi);

</script>



<script>
<!--	Ubah angka ke huruf-->
var daftarAngka=new Array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
function terbilang(nilai){
    var temp='';
    var hasilBagi,sisaBagi;
//batas untuk ribuan
    var batas=3;
//untuk menentukan ukuran array, jumlahnya sesuaikan dengan jumlah anggota dari array gradeNilai[]
    var maxBagian = 5;
    var gradeNilai=new Array("","ribu","juta","milyar","triliun");
//cek apakah ada angka 0 didepan ==> 00098, harus diubah menjadi 98
    nilai = this.hapusNolDiDepan(nilai);
    var nilaiTemp = ubahStringKeArray(batas, maxBagian, nilai);
//ubah menjadi bentuk terbilang
    var j = nilai.length;
//menentukan batas array
    var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
    var h=0;
    for(var i = banyakBagian - 1; i >=0; i-- ){
        var nilaiSementara = parseInt(nilaiTemp[h]);
        if (nilaiSementara == 1 && i == 1){
            temp +="seribu ";
        }
        else {
            temp +=this.ubahRatusanKeHuruf(nilaiTemp[h])+" ";
// cek apakah string bernilai 000, maka jangan tambahkan gradeNilai[i]
            if(nilaiTemp[h] != "000"){
                temp += gradeNilai[i]+" ";
            }
        }
        h++;
    }
    return temp;
}
function ubahStringKeArray(batas, maxBagian,kata){
// maksimal 999 milyar
    var temp= new Array(maxBagian);
    var j = kata.length;
//menentukan batas array
    var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
    for(var i = banyakBagian - 1; i >= 0 ; i--){
        var k = j - batas;
        if(k < 0) k = 0;
        temp[i]=kata.substring(k,j);
        j = k ;
        if (j == 0)
            break;
    }
    return temp;
}

function ubahRatusanKeHuruf(nilai){
//maksimal 3 karakter
    var batas = 2;
//membagi string menjadi 2 bagian, misal 123 ==> 1 dan 23
    var maxBagian = 2;
    var temp = this.ubahStringKeArray(batas, maxBagian, nilai);
    var j = nilai.length;
    var hasil="";
//menentukan batas array
    var banyakBagian = (j % batas) == 0 ? (j / batas) : Math.round(j / batas + 0.5);
    for(var i = 0; i < banyakBagian ;i++){
//cek string yang memiliki panjang lebih dari satu ==> belasan atau puluhan
        if(temp[i].length > 1){
//cek untuk yang bernilai belasan ==> angka pertama 1 dan angka kedua 0 - 9, seperti 11,16 dst
            if(temp[i].charAt(0) == '1'){
                if(temp[i].charAt(1) == '1') {
                    hasil += "sebelas";
                }
                else if(temp[i].charAt(1) == '0') {
                    hasil += "sepuluh";
                }
                else hasil += daftarAngka[temp[i].charAt(1) - '0']+ " belas ";
            }
            //cek untuk string dengan format angka  pertama 0 ==> 09,05 dst
            else if(temp[i].charAt(0) == '0'){
                hasil += daftarAngka[temp[i].charAt(1) - '0'] ;
            }
            //cek string dengan format selain angka pertama 0 atau 1
            else
                hasil += daftarAngka[temp[i].charAt(0) - '0']+ " puluh " +daftarAngka[temp[i].charAt(1) - '0'] ;
        }
        else {
//cek string yang memiliki panjang = 1 dan berada pada posisi ratusan
            if(i == 0 && banyakBagian !=1){
                if (temp[i].charAt(0) == '1')
                    hasil+=" seratus ";
                else if (temp[i].charAt(0) == '0')
                    hasil+=" ";
                else hasil+= daftarAngka[parseInt(temp[i])]+" ratus ";
            }
//string dengan panjang satu dan tidak berada pada posisi ratusan ==> satuan
            else hasil+= daftarAngka[parseInt(temp[i])];
        }
    }
    return hasil;
}
function hapusNolDiDepan(nilai){
    while(nilai.indexOf("0") == 0){
        nilai = nilai.substring(1, nilai.length);
    }
    return nilai;
}


console.log(terbilang(minggu));
$("#huruf").text(terbilang(minggu));
</script>

<script>
let id_perencanaan=$("#id_perencanaan").val();
let minggu1=$("#minggu").val();
let tanggal=$("#tanggal").val();
    $.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/user_pengawasan_data/data_view_baru", 
         data: {"tanggal":tanggal,"id_perencanaan":id_perencanaan,"minggu":minggu1},
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
					$("#tabel_satu").append('<tr>'+
					'<td>'+data[i].nama_jenis+'</td>'+
					'<td>'+data[i].nama+'</td>'+
					'<td>'+data[i].jumlah+'</td>'+
					'<td></td>'+
					'</tr>');

					i++;
				}

				$("#tabel_satu").append('<tr>'+
					'<td></td>'+
					'<td></td>'+
					'<td></td>'+
					'<td id="total_jes">Total:</td>'+
					'</tr>');

					hehe();
              }
          });


		  
function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'Laporan Pengawasan '+tanggal+'.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A3', orientation: 'landscape' },
            pagebreak: { before: '.break'}
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();

        swal("PDF Digenerate!!");
    }



let tanggal1=$("#tanggal").val();


	                           $.ajax({
                                type: "POST",
                                url: "http://localhost/pupr_new/user_pengawasan_data/ttd_view_pengawasan", 
                                data: {"id_pengawasan":tanggal,"id_perencanaan":id_perencanaan,"minggu":minggu},
                                dataType: "text",  
                                cache:false,
                                success: 
                                function(data){
                                // alert(data);  //as a debugging message.
								data=JSON.parse(data);
								let length=data.length;
								let i=0;

								console.log("Waha");
								console.log(data);
								console.log("Waha");


								while(i<length)
								{


									$("#jabatan").text(data[i].jabatan);
									$("#nama").text(data[i].konfigurasi_nama);
									$("#nip").text("NRP."+data[i].konfigurasi_nip);
									$("#nama1").text(data[i].account_nama);
									$("#nip1").text("NRP."+data[i].account_nip);


									i++;
								}
                                }
                                });





function hehe()
{

	// Dapatkan Total

$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/user_pengawasan_data/total_progress", 
         data: {"id_pengawasan":tanggal,"id_perencanaan":id_perencanaan,"minggu":minggu},
         dataType: "text",  
		 async:false,
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
				data=JSON.parse(data);
				// console.log(data);

				let length=data.length;
				let i=0;

				console.log("test");
				console.log(data);
				console.log("test");


				let total=0;


				while(i<length)
				{

					total=parseInt(total)+(parseInt(data[i].harga)*parseInt(data[i].sum));
				

                    
					i++;
				}


				$nilai_paket=$("#nilai_paket").val();


				console.log(total);

				total=parseInt(total)/parseInt($nilai_paket)*100;
				total=total.toFixed(2);

				// alert(total);

				$("#total_jes").append(total+"%");

				console.log(total);

				

              }
          });
}



Date.prototype.getWeek = function () {
    var target  = new Date(this.valueOf());
    var dayNr   = (this.getDay() + 6) % 7;
    target.setDate(target.getDate() - dayNr + 3);
    var firstThursday = target.valueOf();
    target.setMonth(0, 1);
    if (target.getDay() != 4) {
        target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
    }
    return 1 + Math.ceil((firstThursday - target) / 604800000);
}

function getDateRangeOfWeek(weekNo){
    var d1 = new Date();
    numOfdaysPastSinceLastMonday = eval(d1.getDay()- 1);
    d1.setDate(d1.getDate() - numOfdaysPastSinceLastMonday);
    var weekNoToday = d1.getWeek();
    var weeksInTheFuture = eval( weekNo - weekNoToday );
    d1.setDate(d1.getDate() + eval( 7 * weeksInTheFuture ));
    var rangeIsFrom = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear();
    d1.setDate(d1.getDate() + 6);
    var rangeIsTo = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear() ;
    return rangeIsFrom + " to "+rangeIsTo;
};

// alert(tanggal);
// alert(getDateRangeOfWeek(minggu));


let rentang=getDateRangeOfWeek(minggu);
rentang=rentang.replace(" to "," sampai ")
// alert(rentang);

$("#sampai").text(rentang);

</script>










</body>

</html>
