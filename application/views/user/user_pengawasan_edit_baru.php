
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
			border: 2px solid black;
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
								<h6 class="m-0 font-weight-bold text-primary">User Pengawasan Baru</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>

								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">

								<center>
									<b><h3>Laporan Pengawasan</h3></b>
								</center>

								<center>
									<!-- <b><h3>Minggu Ke - X</h3></b> -->
								</center>
								<br/>
								<br/>
								<b>Id Paket</b>

                                <?php

                                $data=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("4")))->result();
                                $count=count($data);
                                $id_paket="";


                                $i=0;

                                while($i<$count)
                                {

                                    $id_paket=$data[$i]->id_paket;

                                    
                                    $i++;
                                }

                                ?>
								<input type="text" class="form form-control" id="id_paket" value="<?php echo $id_paket ?>" disabled>
								<b>Id Laporan Perencanaan</b>
						        <input type="text" id="id_perencanaan" class='form form-control' value="<?php echo $this->uri->segment("4") ?>" disabled>  
								<br/>
								<b>Tanggal</b>
								<input type="text" class="form form-control" id="hari_tanggal" value="<?php echo $this->uri->segment("3") ?>" disabled>
                                <b>Minggu</b>
								<input type="text" class="form form-control" id="minggu" value="<?php echo $this->uri->segment("5") ?>" disabled>
								<br/>


								<div class="row">
									<div class="col-sm-1"><button class="btn btn-facebook" onclick="tambahRow()">+</button></div>
									<div class="col-sm-5">
										<select class="form form-control" id="jenis_pekerjaan">

										</select></div>
								</div>


								<b>Rekapitulasi Hasil Pengawasan</b>

								<table class="tg table" id="tabel_satu">
									<tr>
										<th class="tg-cly1">Jenis Pekerjaan</th>
										<th class="tg-cly1">Jenis Pekerja</th>
										<th class="tg-cly1">Jumlah</th>
										<th class="tg-0lax">Progress Pekerjaan %</th>
									</tr>

								</table>


								<br/>
								<b>Diperiksa Oleh:</b>
								<br/>


								<select id="diperiksa_oleh" class="form form-control">
								
								<?php
									 $data=$this->db->get("konfigurasi")->result();
									 $count=count($data);
									 $i=0;


									 while($i<$count)
									 {
                                        ?>

                                         <option value="<?php echo $data[$i]->id_konfigurasi ?>"><?php echo $data[$i]->nama ?></option>
										<?php
                                         
										$i++;
									 }
								?>
								</select>
								
								<button class="btn btn-facebook" onclick="save()">Save</button>



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


	    $("#jenis_pekerjaan").empty();
	    let id_perencanaan=$("#id_perencanaan").val();

	    // alert("test");
	//	Select Semua Jenis Pekerjaan Laporan Tersebut
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/list_pekerjaan",
            data: {"id_perencanaan":id_perencanaan},
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

					    $("#jenis_pekerjaan").append('<option value="'+data[i].id+'">'+data[i].nama_jenis+'</option>');
					    i++;
					}
                }
        });
	

	let kuy=0;


	function tambahRow()
	{
	    let jenis_pekerjaan=$("#jenis_pekerjaan").val();
	    let jenis_pekerjaan_text=$("#jenis_pekerjaan option:selected").text();
      $("#tabel_satu").append('\t\t<tr>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerjaan" id="'+jenis_pekerjaan+"_pekerjaan_"+kuy+'">'+jenis_pekerjaan_text+'</td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerja nonActive" id="'+jenis_pekerjaan+"_pekerja_"+kuy+'"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jumlah" id="'+jenis_pekerjaan+"_jumlah_"+kuy+'"></td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" style="background-color:#3b5998;color:white;"><center>Tidak Diisi</center></td>\n' +
          '\t\t\t\t\t\t\t\t\t</tr>');

        //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("pekerja");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#"+attribute).text("");
            $("#"+attribute).removeClass("Active");
            $("#"+attribute).addClass("nonActive");
            $("#id_warnai").val(attribute);
            $("#wPekerja").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

        var classname = document.getElementsByClassName("jumlah");

        var myFunction = function() {
            var attribute = this.id;
            console.log(attribute);
            $("#id_jumlah").val(attribute);
            $("#wJumlah").modal("show");
        };

        for (var i = 0; i < classname.length; i++) {
            classname[i].addEventListener('click', myFunction, false);
        }

      kuy++;
	}


	function jenisPekerja()
	{
	    $("#wPekerja").modal("hide");
	    let id=$("#id_warnai").val();
	    let jenis_pekerja=$("#jenis_pekerja").val();
	    let jenis_pekerja_text=$("#jenis_pekerja option:selected").text();

        $("#"+id).removeClass("nonActive");
        $("#"+id).addClass("Active");
	    // alert("hai");
		$("#"+id).text(jenis_pekerja+"_"+jenis_pekerja_text);
	}

	function jumlah()
	{
	    let id=$("#id_jumlah").val();
	    let jumlah=$("#jumlah").val();
	    $("#wJumlah").modal("hide");

	    $("#"+id).text(jumlah);
	}


	let id_paket1=$("#id_paket").val();
	    let id_perencanaan1=$("#id_perencanaan").val();
	    let tanggal1=$("#hari_tanggal").val();
	    let minggu1=$("#minggu").val();
	
	$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/user_pengawasan_data/ttd_edit_pengawasan1", 
         data: {"id_perencanaan":id_perencanaan1,"id_paket":id_paket1,"tanggal":tanggal1,"minggu":minggu1},
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
                    $('#diperiksa_oleh option[value="'+data[i].id_diperiksa+'"]').attr('selected','selected');
				
					// $('#diperiksa_oleh option[value="'+data[i].id_diperiksa+']"').attr('selected','selected');

					i++;
				}
              }
          });

		 


	function save()
	{

	    let id_paket=$("#id_paket").val();
	    let id_perencanaan=$("#id_perencanaan").val();
	    let tanggal=$("#hari_tanggal").val();
	    let minggu;

        let m=1;
        while(m<54)
        {
            let data1=getDateRangeOfWeek(m);
            data1=data1.split(" to ");
            let first=new Date(data1[0]);
            let middle= new Date(tanggal);
            let last= new Date(data1[1]);

            if(first<=middle && middle<=last)
			{
			    minggu=m;
			}
            m++;
        }
        let i=0;


        let dataArray=new Array();

        $(".Active").each(function (index, element) {
            dataArray[i]=$(this).attr("id");
            i++;
        });

		console.log(dataArray);

		let length=dataArray.length;
		let j=0;
		//Hapus data laporan pengawasan terlebih dahulu
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/save_pengawasan_baru1",
            data: {"id_perencanaan":id_perencanaan,"id_paket":id_paket,"tanggal":tanggal,"minggu":minggu},
            dataType: "text",
			async:false,
            cache:false,
            success:
                function(data){

                    //Untuk menyimpan detail laporan pengawasan

                    while(j<length)
                    {
                        let id_all=dataArray[j];
                        let jenis_pekerjaan=id_all.split("_");
                        jenis_pekerjaan=jenis_pekerjaan[0];
                        let jenis_pekerja=$("#"+id_all).text();
                        jenis_pekerja=jenis_pekerja.split("_");
                        jenis_pekerja=jenis_pekerja[0];
                        let jumlah=id_all.replace("pekerja","jumlah");
                        jumlah=$("#"+jumlah).text();

                        //Tambakan detail menggunakan ajax
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/pupr_new/user/pengawasan_detail_baru",
							async:false,
                            data: {"id_perencanaan":id_perencanaan,"id_paket":id_paket,"tanggal":tanggal,"minggu":minggu,"jenis_pekerja":jenis_pekerja,"jenis_pekerjaan":jenis_pekerjaan,"jumlah":jumlah},
                            dataType: "text",
                            cache:false,
                            success:
                                function(data){
                                    console.log(data);
                                }
                        });

                        console.log("jenis_pekerja:"+jenis_pekerja);
                        console.log("jenis_pekerjaan:"+jenis_pekerjaan);
                        console.log("jumlah:"+jumlah);
                        j++;
                    }

                }
        });


		// Save Tanggal


		let id_diperiksa=$("#diperiksa_oleh").val();

		$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/user_pengawasan_data/ttd_edit_pengawasan", 
         data: {"id_perencanaan":id_perencanaan,"id_paket":id_paket,"tanggal":tanggal,"minggu":minggu,"id_diperiksa":id_diperiksa},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
				alert("Success!!");
              }
          });



	}



    //	Mencari rentang tanggal minggu tertentu
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
</script>


<script>

let id_paket=$("#id_paket").val();
	    // let id_perencanaan=$("#id_perencanaan").val();
	    let tanggal=$("#hari_tanggal").val();
	    let minggu;

        let m=1;
        while(m<54)
        {
            let data1=getDateRangeOfWeek(m);
            data1=data1.split(" to ");
            let first=new Date(data1[0]);
            let middle= new Date(tanggal);
            let last= new Date(data1[1]);

            if(first<=middle && middle<=last)
			{
			    minggu=m;
			}
            m++;
        }

// Select Data dari db lalu masukkan ke dalam tabel
$.ajax({
         type: "POST",
         url: "http://localhost/pupr_new/user_pengawasan_data/all_data", 
         data: {"id_perencanaan":id_perencanaan,"id_paket":id_paket,"tanggal":tanggal,"minggu":minggu},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                // alert(data);  //as a debugging message.
                data=JSON.parse(data);
                console.log(data);
                // console.log(data);

                let length=data.length;
                let i=0;

                while(i<length)
                {

                    $("#tabel_satu").append('\t\t<tr>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerjaan" id="'+data[i].jenis_pekerjaan+"_pekerjaan_"+kuy+'">'+data[i].nama_jenis+'</td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 pekerja nonActive" id="'+data[i].jenis_pekerjaan+"_pekerja_"+kuy+'">'+data[i].jenis_pekerja+"_"+data[i].nama+'</td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-cly1 jumlah" id="'+data[i].jenis_pekerjaan+"_jumlah_"+kuy+'">'+data[i].jumlah+'</td>\n' +
          '\t\t\t\t\t\t\t\t\t\t<td class="tg-0lax" style="background-color:#3b5998;color:white;"><center>Tidak Diisi</center></td>\n' +
          '\t\t\t\t\t\t\t\t\t</tr>');

          $("#"+data[i].jenis_pekerjaan+"_pekerja_"+kuy).removeClass("nonActive");
          $("#"+data[i].jenis_pekerjaan+"_pekerja_"+kuy).addClass("Active");


               //    Event Listener Untuk Jenis
        var classname = document.getElementsByClassName("pekerja");

var myFunction = function() {
    var attribute = this.id;
    console.log(attribute);
    $("#"+attribute).text("");
    $("#"+attribute).removeClass("Active");
    $("#"+attribute).addClass("nonActive");
    $("#id_warnai").val(attribute);
    $("#wPekerja").modal("show");
};

for (var v = 0; v < classname.length; v++) {
    classname[v].addEventListener('click', myFunction, false);
}

var classname = document.getElementsByClassName("jumlah");

var myFunction = function() {
    var attribute = this.id;
    console.log(attribute);
    $("#id_jumlah").val(attribute);
    $("#wJumlah").modal("show");
};

for (var v = 0; v < classname.length; v++) {
    classname[v].addEventListener('click', myFunction, false);
}

                     kuy++;

                    i++;
                }
              }
          });

</script>



<!--Modal-->

<!-- Modal -->
<div class="modal fade" id="wPekerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_warnai" class="form form-control" disabled>
				<b>Pilih Jenis Pekerja</b>
				<select class="form form-control" id="jenis_pekerja">
					<?php
					$data=$this->db->get("jenis_upah")->result();
					$count=count($data);

					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $data[$i]->id_jenis_upah ?>"><?php echo $data[$i]->nama ?></option>
					<?php

						$i++;
					}
					?>

				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="jenisPekerja()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="wJumlah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_jumlah" class="form form-control" disabled>
				<b>Masukkan Jumlah</b>
	             <input type="text" class="form form-control" id="jumlah">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="jumlah()">Save changes</button>
			</div>
		</div>
	</div>
</div>






</body>

</html>
