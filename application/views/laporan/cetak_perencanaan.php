
<?php

//	echo $this->session->userdata("nip");
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==1 || $this->session->userdata("privilage")==2)
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
<html lang="en" >

<head>



	<?php $this->load->view('component/header') ?>

	<style>

		* {
			font-size: 1em;
			font-family: Arial;
		}

		.table {
			width: 140%;
			-webkit-overflow-scrolling: touch;
			overflow-x: auto;
			display: block;

		}






		#gambar{
			border-style: solid;
			border-width: 5px;
		}

		#border{
			border-style: solid;
			border-width: 5px;
		}

		body{
			/*background-color:#add8e6;  */
			margin:50px;
			color: black;
		}
		.contain{
			margin-left:auto;
			margin-right:auto;
			margin-top:calc(calc(100vh - 405px)/2);
		}
		#form1{
			width:auto;
		}
		.alert{
			text-align:center;
		}
		.row_ttd{
			text-align:center;
		}

		#blah{
			max-height:256px;
			height:auto;
			width:auto;
			display:block;
			margin-left: auto;
			margin-right: auto;
			padding:5px;
		}
		#img_contain{
			border-radius:5px;
			/*  border:1px solid grey;*/
			margin-top:20px;
			width:auto;
		}

		.imgInp{
			width:150px;
			margin-top:10px;
			padding:10px;
			background-color:#d3d3d3;
		}
		.loading{
			animation:blinkingText ease 2.5s infinite;
		}
		@keyframes blinkingText{
			0%{     color: #000;    }
			50%{   color: #transparent; }
			99%{    color:transparent;  }
			100%{ color:#000; }
		}
		.custom-file-label{
			cursor:pointer;
		}

		/************CREDITS**************/
		.credit{
			font: 14px "Calibry";
			font-size:12px;
			color:#3d3d3d;
			text-align:left;
			margin-top:10px;
			margin-left:auto;
			margin-right:auto;
			text-align:center;
		}
		.credit a{
			color:black;
		}
		.credit a:hover{
			color:black;
		}
		.credit a:visited{
			color:MediumPurple;
		}


		td td {
			width: -2px;
			height: 100px;
			outline: 1px solid;
			float: left;

		}

		tr tr {
			width: -2px;
			height: 100px;
			outline: 1px solid;
			float: left;
		}
		th,td,tr {
			text-align:center;
		}











	</style>


</head>




<body >
<button class="btn btn-info" onclick="generatePDF()" style="width:100%">Cetak</button>
<div id="cetakini">



	<b>
		<center><h2>LAPORAN PELAKSANAAN KEGIATAN</h2></center>

	</b>
	<?php
	//	 Informasi Paket
	//	 Dapatkan id paket dahulu
	$id_paket_db=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();
	$count=count($id_paket_db);
	$i=0;

	$info_paket=0;
	//	 var_dump($id_paket_db);
	while($i<$count)
	{
		$info_paket=$this->db->get_where("paket",array("id_paket"=>$id_paket_db[$i]->id_paket))->result();

		$i++;
	}

	//	 var_dump($info_paket);


	if($info_paket!=0)
	{
		?>
		<div class="row" >
			<div class="col-sm-6">
				<div class="row" style="text-align: center">

				</div>
				<div class="row">
					<div class="col-sm-3">Nama Paket</div>
					<div>:</div>
					<div class="col-sm-8">
						<?php echo $info_paket[0]->nama ?>
					</div>

				</div>
				<div class="row">
					<div class="col-sm-3">Nilai Paket</div>
					<div >:</div>
					<div class="col-sm-8">  <?php echo $info_paket[0]->nilai_paket ?></div>


				</div>
				<div class="row">
					<div class="col-sm-3">Jumlah Tahap</div>
					<div>:</div>
					<div class="col-sm-8"> <?php echo $info_paket[0]->jumlah_tahap ?></div>


				</div>
				<div class="row">
					<div class="col-sm-3">Jenis Pekerjaan</div>
					<div >:</div>
					<div class="col-sm-8" id="jenis_pekerjaan_jesi"> </div>


				</div>
				<div class="row">
					<div class="col-sm-3">Masa Pelaksanaan</div>
					<div>:</div>
					<div class="col-sm-8"> <?php echo $info_paket[0]->masa_pelaksanaan ?></div>


				</div>
				<div class="row">
					<div class="col-sm-3">Lokasi</div>
					<div>:</div>
					<div class="col-sm-8"> <?php echo $info_paket[0]->lokasi ?></div>

				</div>
				<div class="row">
					<div class="col-sm-3">Tahun Anggaran</div>
					<div>:</div>
					<div class="col-sm-8"> <?php echo $info_paket[0]->tahun_anggaran ?></div>

				</div>

				<input type="hidden" value="<?php echo $this->uri->segment("2") ?>" id="id_perencanaan_hidden">
			</div>

		</div>
		<?php

	}
	?>

	<br/>

	<br>

	<br/>



	<div >
		<div class="panel panel-info">
			<div class="panel-body">

				<!--	Irregular Table-->
				<b>Jadwal Rencana Pelaksanaan Kegiatan</b>
				<table id="tabel_jadwal" width="400" class="table " style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" cellspacing="0" border="0">

					<tr>
						<td cellspacing="'0'" colspan="2" rowspan="4" height="80" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Jenis Pekerjaan</font></td>
						<td cellspacing="'0'"  colspan="60" ><font >Tahap/Bulan/Minggu</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'" colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap I</font></td>
						<td cellspacing="'0'" colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap II</font></td>
						<td cellspacing="'0'"  colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap III</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Januari</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Februari</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Maret</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >April</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Mei</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Juni</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Juli</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Agustus</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >September</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Oktober</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >November</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Desember</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'"  sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"  sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
					</tr>
					<tbody>



					</tbody>
				</table>
				<div class="break"></div>
				<b>Perencanaan Penggunaan Jumlah Pekerja </b>
				<table id="tabel_jumlah"  class="table table-responsive" cellspacing="0" border="0">

					<tr>
						<td cellspacing="'0'"  colspan="2" rowspan="4" height="80" align="center" valign="middle" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Jenis Pekerjaan</font></td>
						<td cellspacing="'0'"  colspan="60" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap/Bulan/Minggu</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'"  colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap I</font></td>
						<td cellspacing="'0'"  colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap II</font></td>
						<td cellspacing="'0'"  colspan="20" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Tahap III</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Januari</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Februari</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Maret</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >April</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Mei</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Juni</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Juli</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Agustus</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >September</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Oktober</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >November</font></td>
						<td cellspacing="'0'"  colspan="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >Desember</font></td>

					</tr>
					<tr>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'"   sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'"   sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
						<td cellspacing="'0'"   sdval="1" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >1</font></td>
						<td cellspacing="'0'"   sdval="2" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >2</font></td>
						<td cellspacing="'0'"   sdval="3" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >3</font></td>
						<td cellspacing="'0'" sdval="4" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >4</font></td>
						<td cellspacing="'0'" sdval="5" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><font >5</font></td>
					</tr>



					<tbody>



					</tbody>
				</table>

				<div class="break"></div>

				<b>Perencanaan Penggunaan Bahan/Alat </b>
				<br/>

				<br/>
				<table id="tabel_alat" class="table table-striped" cellspacing="0" border="0">

					<tr>
						<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" colspan="6" rowspan="4" height="80" align="center" valign="middle"><font face="Comic Sans MS" color="#000000">Jenis Bahan/Alat</font></td>
						<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="60" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap/Bulan/Minggu</font></td>

					</tr>
					<tr>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap I</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap II</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="20" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Tahap III</font></td>

					</tr>
					<tr>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Januari</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Februari<br>Maret</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Maret</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">April</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Mei</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juni</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Juli</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Agustus</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">September</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Oktober</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">November</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="5" align="center" valign="bottom"><font face="Comic Sans MS" color="#000000">Desember</font></td>

					</tr>
					<tr>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="1" sdnum="1033;"><font face="Comic Sans MS" color="#000000">1</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="2" sdnum="1033;"><font face="Comic Sans MS" color="#000000">2</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom" sdval="3" sdnum="1033;"><font face="Comic Sans MS" color="#000000">3</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000" align="center" valign="bottom" sdval="4" sdnum="1033;"><font face="Comic Sans MS" color="#000000">4</font></td>
						<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign="bottom" sdval="5" sdnum="1033;"><font face="Comic Sans MS" color="#000000">5</font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
						<td align="left" valign="bottom"><font face="Comic Sans MS" color="#000000"><br></font></td>
					</tr>



					<tbody>



					</tbody>
				</table>

				<div class="break"></div>



				<br/>
				<br/>

				<div class="row">
					<table class="table table-bordered">
						<thead style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sketsa Kerja</th>
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Lokasi</th>
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Jenis Pekerjaan</th>
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Panjang Penanganan</th>
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Keterangan Dimensi</th>
						<th style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Ket</th>
						</thead>
						<tbody>
						<tr style="height:300px;">
							<td cellspacing="'0'" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">
								<?php
								$getImage=$this->db->get_where("gambar_perencanaan",array("id_lap_perencanaan"=>$this->uri->Segment("2")))->result();
								//

								$count=count($getImage);
								$i=0;

								while($i<$count)
								{
									?>
									<img style="width:200px;" src="<?php echo base_url('gambar/'.$getImage[$i]->gambar) ?>" />
									<?php

									$i++;
								}
								?>

							</td>
							<?php
							//							 Dapatkan datanya
							$info_perencanaan=$this->db->get_where("lap_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();
							$count=count($info_perencanaan);
							$loaksiM="";
							$jenis_pekerjaanM="";
							$panjang_penangananM="";
							$keterangan_dimensiM="";
							$keteranganM="";

							if($count>0)
							{
								$loaksiM=$info_perencanaan[0]->lokasi;
//								$jenis_pekerjaanM=$info_perencanaan[0]->jenis_pekerjaan;
								$panjang_penangananM=$info_perencanaan[0]->panjang_penanganan;
								$keterangan_dimensiM=$info_perencanaan[0]->keterangan_dimensi;
								$keteranganM=$info_perencanaan[0]->keterangan;
							}
							?>
							<td cellspacing="'0'" width="20%" id="lokasiM" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?php echo $loaksiM ?></td>
							<td cellspacing="'0'" width="20%" id="jenis_pekerjaanM" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"></td>
							<td cellspacing="'0'" width="20%" id="panjang_penangananM" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?php echo $panjang_penangananM ?></td>
							<td cellspacing="'0'" width="20%" id="keterangan_dimensiM" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?php echo  $keterangan_dimensiM ?></td>
							<td cellspacing="'0'" width="20%" id="ketM" style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?php echo $keteranganM ?></td>
						</tr>
						</tbody>
					</table>
				</div>

				<!--				 Tanda Tangan-->
				<div class="row">
					<div class="col-sm-3 row_ttd" >
						<b> Disetujui Oleh</b>
						<br>
						<b>	 <?php
							$data=$this->db->get_where("ttd_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();

							$count=count($data);

							if($count>=1)
							{
//							 	echo $data[0]->id_disetujui;
//								 Ambil namanya lagi
								$ambil=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$data[0]->id_disetujui))->result();



								echo $ambil[0]->jabatan."</b>";
							}
							?></b>
						<br/>
						<br/>
						<br/>

						<?php
						$data=$this->db->get_where("ttd_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();

						$count=count($data);

						if($count>=1)
						{
//							 	echo $data[0]->id_disetujui;
//								 Ambil namanya lagi
							$ambil=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$data[0]->id_disetujui))->result();


							echo "<b><u>".$ambil[0]->nama."</u></b><br>";
							echo "<b>NIP. ".$ambil[0]->nip."</b>";
						}
						?>

					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-3 row_ttd">
						<b>Diperiksa Oleh</b>
						<br>
						<b>	 <?php
							$data=$this->db->get_where("ttd_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();

							$count=count($data);

							if($count>=1)
							{
//							 	echo $data[0]->id_disetujui;
//								 Ambil namanya lagi
								$ambil=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$data[0]->id_diperiksa))->result();


								echo $ambil[0]->jabatan;
							}
							?></b>
						<br/>
						<br/>
						<br/>
						<?php
						$data=$this->db->get_where("ttd_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();

						$count=count($data);

						if($count>=1)
						{
//							 	echo $data[0]->id_disetujui;
//								 Ambil namanya lagi
							$ambil=$this->db->get_where("konfigurasi",array("id_konfigurasi"=>$data[0]->id_diperiksa))->result();

							echo "<b><u>".$ambil[0]->nama."</u></b><br>";
							echo "<b>"."NIP:".$ambil[0]->nip."</b>";
						}
						?>
						<div class="row"></div>
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-3 row_ttd">
						<?php
						date_default_timezone_set('Asia/Jakarta');
						$date_d=date('d');
						$date_m=date('m');
						$date_y=date('Y');
						switch($date_m)
						{
							case 1:
								$date_mtext="Januari";
								break;
							case 2:
								$date_mtext="Februari";
								break;
							case 3:
								$date_mtext="Maret";
								break;
							case 4:
								$date_mtext="April";
								break;
							case 5:
								$date_mtext="Mai";
								break;
							case 6:
								$date_mtext="Juni";
								break;
							case 7:
								$date_mtext="Juli";
								break;
							case 8:
								$date_mtext="Agustus";
								break;
							case 9:
								$date_mtext="September";
								break;
							case 10:
								$date_mtext="Oktober";
								break;
							case 11:
								$date_mtext="November";
								break;
							case 12:
								$date_mtext="Desember";
								break;

						}
						?>
						<b>Jambi, <?php echo"$date_d $date_mtext $date_y"; ?> </b>
						<br>
						<b>Dibuat Oleh</b>
						<br/>
						<br/>
						<br/>
						<?php
						$data=$this->db->get_where("ttd_perencanaan",array("id_lap_perencanaan"=>$this->uri->segment("2")))->result();

						$count=count($data);

						if($count>=1)
						{
//							 	echo $data[0]->id_disetujui;
//								 Ambil namanya lagi
							$ambil=$this->db->get_where("account",array("nip"=>$data[0]->id_user))->result();

							echo "<b><u>".$ambil[0]->nama."</u></b><br>";
							echo "<b>"."NIP:".$ambil[0]->nip."</b>";
						}
						?>
						<div class="row"></div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<script>
        let save_pekerjaan= new Array();
        function tambahPekerjaan()
        {
            let pekerjaan_id=$("#pekerjaan").val();
            let pekerjaan_text=$("#pekerjaan option:selected").html();


            var newRow="\t<tr id='pekerjaan_id"+pekerjaan_id+"'>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0' height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0' align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0' align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0' align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0'  align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" cellspacing='0'  align=\"center\" valign=\"bottom\"></td>\n" +
                "\n" +
                "\n" +
                "\t\t\t\t\t\t\t\t\t</tr>";

            $("#tabel_jadwal").append(newRow);

            var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"align=\"center\" valign=\"bottom\"></td>\n" +
                "\n" +
                "\n" +
                "\t\t\t\t\t\t\t\t\t</tr>";
            $("#tabel_jumlah").append(newRow);

            let x=1;

            while(x<=60)
            {
                var data=pekerjaan_id+"_"+x;
                var data1=pekerjaan_id+"__"+x;
                data=data.toString();
                data1=data1.toString();
                console.log(data);
                var newCol="<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai('"+data+"')\" id='"+data+"' class='nonActive'></td>";
                var newCol1="<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai1('"+data1+"')\" id='"+data1+"' class='nonActive1'></td>";
                $("#pekerjaan_id"+pekerjaan_id).append(newCol);
                $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
                x++;
            }


            //    Add Row

        }

        function warnai(id)
        {
            let col_id=$("#"+id);
            let class_=col_id.attr('class');
            if(class_=="nonActive")
            {
                col_id.css("background-color","yellow");
                col_id.removeClass("nonActive");
                col_id.addClass("Active");
                $("#id_column").val(id);
                $('#modalWaktu').modal('show');


            }
            else
            {
                col_id.css("background-color","white");
                col_id.removeClass("Active");
                col_id.addClass("nonActive");
                removeValue(col_id);
            }

        }

        function addValue()
        {
            let id_col=$("#id_column").val();
            let tanggal_kerja=$("#tanggal_kerja").val();
            // alert(id_col);
            col_id=id_col.replace('_','__');
            // alert(col_id);
            let jumlah=$("#jumlah_kerja").val();
            $("#"+col_id).text(jumlah+"_"+tanggal_kerja);
            console.log(col_id);
            console.log($("#"+col_id).attr('class'));
            let data_class=$("#"+col_id).attr('class');

            if(data_class=="nonActive1")
            {
                $("#"+col_id).removeClass("nonActive1");
                $("#"+col_id).addClass("Active1");
            }
            else
            {
                $("#"+col_id).removeClass("Active1");
                $("#"+col_id).addClass("nonActive1");
            }


        }

        function removeValue(id)
        {
            let id_col=$("#id_column").val();
            alert(id_col);
            id_col=id_col.replace('_','__');

            $("#"+id_col).text("");
        }

        $("#inputGroupFile01").change(function(event) {
            RecurFadeIn();
            readURL(this);
        });
        $("#inputGroupFile01").on('click',function(event){
            RecurFadeIn();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputGroupFile01").val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    debugger;
                    $('#blah').attr('src', e.target.result);
                    $('#blah').hide();
                    $('#blah').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loading").hide();
        }
        function RecurFadeIn(){
            console.log('ran');
            FadeInAlert("Wait for it...");
        }
        function FadeInAlert(text){
            $(".alert").show();
            $(".alert").text(text).addClass("loading");
        }

        function addBahanAlat()
        {
            let alat_bahan=$("#alat_bahan").val();
            let alat_bahan_text=$("#alat_bahan option:selected").text();
            // alert(alat_bahan);
            // alert(alat_bahan_text);

            var newRowX="\t<tr id='pekerjaan_waktu_"+alat_bahan+"'>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+alat_bahan_text+"</td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"align=\"left\" valign=\"bottom\"></td>\n" +
                "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
                "\n" +
                "\n" +
                "\t\t\t\t\t\t\t\t\t</tr>";
            $("#tabel_alat").append(newRowX);
            let x=1;
            while(x<=60)
            {
                let data=alat_bahan+"___"+x;



                data=data.toString();

                console.log(data);
                var newColX="<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"tambahAngka('"+data+"')\" id='"+data+"' class='nonActive2'></td>";
                $("#pekerjaan_waktu_"+alat_bahan).append(newColX);
                x++;
            }
        }


        function tambahAngka(id)
        {
            // alert(id);
            let col_=id;
            console.log("------");
            console.log(col_);
            console.log("------");
            // alert(col_);
            $("#id_column_alat").val(col_);
            $('#modalAlat').modal('show');

        }

        function addValueAlat()
        {
            let col_=$("#id_column_alat").val();
            let valuenya=$("#jumlah_alat").val();
            alert("Sukses Ditambahkan!");
            $("#"+col_).text(valuenya);

            console.log(col_);
        }

        function savePerencanaan() {



            let i=0;
            let dataArray=new Array();
            let dataArray1=new Array();

            $(".Active").each(function (index, element) {
                // element == this
                // if ($(this).attr("src") == "style/EmptyStar.png") {
                //     return false;
                // }
                // else {
                //     score = score + 1;
                // };


                dataArray[i]=$(this).attr("id");
                i++;
            });

            let x=0;
            $(".Active1").each(function (index, element) {

                dataArray1[x]=$(this).text();
                x++;
            });


            let nama_paket=$("#nama_paket").val();
            let nilai_paket=$("#nilai_paket").val();
            let jumlah_tahap=$("#jumlah_tahap").val();
            let jenis_pekerjaan=$("#jenis_pelaksanaan").val();
            let masa_pelaksanaan=$("#masa_pelaksanaan").val();
            let lokasi=$("#lokasi").val();
            let tahun_anggaran=$("#tahun_anggaran").val();

            //Check jika kosong atau tidak
            console.log("a");
            if(nama_paket=="" || nilai_paket==""|| jumlah_tahap==""||jenis_pekerjaan==""||masa_pelaksanaan==""||lokasi==""||tahun_anggaran=="")
            {
                alert("Data Tidak Boleh Kosong!!");
            }
            else
            {
                console.log("b");
                //    Jika data berisi maka lanjut di proses
                //Tambahkan Laporan Perencanaan Ke Database
                $.ajax({
                    type : "POST",
                    url : "http://localhost/pupr_new/laporan_perencanaan/add_perencanaan",
                    cache:false,
                    async:false,
                    dataType : "text",
                    data : {"id_paket" : nama_paket, "tahun" : tahun_anggaran},
                    success : function(data) {

                        // console.log(data);
                        let max_id=data;

                        $.ajax({
                            type : "POST",
                            url : "http://localhost/pupr_new/laporan_perencanaan/add_jenis_pekerjaan",
                            cache:false,
                            async:false,
                            dataType : "text",
                            data : {"data" : dataArray,"data1":dataArray1,"id_paket":nama_paket,"tahun":tahun_anggaran,"id_lap_perencanaan":max_id},
                            success : function(data) {

                                alert(data);

                            }
                        });

                    }
                });
                //    Tambahkan Jenis Pekerjaan

            }



        }



	</script>

	<!--Ambil Data Yang Lama dari detil jenis pekerjaan-->
	<script>
        let id_laporan="<?php echo $id ?>";
        console.log(id_laporan);
        $.ajax({
            type : "POST",
            url : "http://localhost/pupr_new/index.php/edit/edit_perencanaan",
            cache:false,
            async:false,
            dataType : "text",
            data : {"id_lap_perencanaan" : id_laporan},
            success : function(data) {

                let data1=JSON.parse(data);
                console.log(data1);
                //    Getting data Length
                data_length=data1.length;
                let x=0;

                while(x<data_length)
                {

                    let pekerjaan_id=data1[x].id;
                    let pekerjaan_text=data1[x].nama_jenis;
                    console.log(pekerjaan_text);
                    if($("#" +data1[x].id+pekerjaan_id).length == 0) {
                        //it doesn't exist
                        $("#jenis_pekerjaan_jesi").append('<br/>'+pekerjaan_text);
                        $("#jenis_pekerjaanM").append("-"+pekerjaan_text+"<br/>");

                        var newRow="\t<tr  id='"+data1[x].id+pekerjaan_id+"'>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\">"+pekerjaan_text+"</td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"></td>\n" +
                            "\n" +
                            "\n" +
                            "\t\t\t\t\t\t\t\t\t</tr>";

                        $("#tabel_jadwal").append(newRow);

                        var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\">"+pekerjaan_text+"</td>\n" +
                            "\t\t\t\t\t\t\t\t\t\t<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"></td>\n" +
                            "\n" +
                            "\n" +
                            "\t\t\t\t\t\t\t\t\t</tr>";
                        $("#tabel_jumlah").append(newRow);
                    }







                    let y=1;

                    while(y<=60)
                    {
                        var data_=pekerjaan_id+"_"+y;
                        console.log(data_);
                        var data2=pekerjaan_id+"__"+y;
                        data_=data_.toString();
                        // data1=data1.toString();
                        // console.log(data);
                        let newCol="<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\"  onclick=\"warnai('"+data_+"')\" id='"+data_+"' class='nonActive'></td>";
                        var newCol1="<td cellspacing='0' style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" onclick=\"warnai1('"+data2+"')\" id='"+data2+"' class='nonActive1'></td>";
                        $("#"+data1[x].id+pekerjaan_id).append(newCol);
                        $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
                        // $("#pekerjaan_waktu"+pekerjaan_id).append(newCol1);
                        y++;
                    }


                    x++;
                }

                //	Berikan dia warna

                let z=0;
                while(z<data_length)
                {
                    let text_builder=data1[z].id+"_"+data1[z].minggu;
                    let text_builder1=data1[z].id+"__"+data1[z].minggu;
                    console.log(text_builder);

                    let selector=$("#"+text_builder).css("background-color","black");
                    let selector1=$("#"+text_builder1).text(data1[z].pekerja);

                    z++;
                }

            }
        });
	</script>


	<script>
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById("cetakini");

            var opt = {
                margin:       0.3,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'A2', orientation: 'landscape' },
                pagebreak: { before: '.break',  }
            };
            // Choose the element and save the PDF for our user.

            html2pdf().set(opt).from(element).save();
            // html2pdf().from(element).save();
        }


        //    Generate Tabel Bahan Alat
        <!--	Generate Tabel Bahan Alat-->
        let id_perencanaan_hidden=$("#id_perencanaan_hidden").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/edit_perencanaan_user/bahan_alat",
            data: {"id_perencanaan":id_perencanaan_hidden},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    data=JSON.parse(data);
                    console.log("jesi");
                    console.log(data);
                    console.log("jesi");

                    //    Generate table rows

                    let length= data.length;
                    let i=0;
                    while(i<length)
                    {
                        if($("#pekerjaan_waktu_" +data[i].id_jenis_bahan_alat).length == 0) {

                            var newRowX="\t<tr id='pekerjaan_waktu_"+data[i].id_jenis_bahan_alat+"'>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000; border-left: 2px solid #000000\" height=\"20\" align=\"left\" valign=\"bottom\">"+data[i].jenis_bahan_alat+"</td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"left\" valign=\"bottom\"></td>\n" +
                                "\t\t\t\t\t\t\t\t\t\t<td style=\"border-bottom: 2px solid #000000\" align=\"center\" valign=\"bottom\"></td>\n" +
                                "\n" +
                                "\n" +
                                "\t\t\t\t\t\t\t\t\t</tr>";
                            $("#tabel_alat").append(newRowX);
                            let x=1;
                            while(x<=60)
                            {
                                let data_=data[i].id_jenis_bahan_alat+"___"+x;



                                data_=data_.toString();


                                var newColX="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"tambahAngka('"+data_+"')\" id='"+data_+"' class='nonActive2'></td>";
                                $("#pekerjaan_waktu_"+data[i].id_jenis_bahan_alat).append(newColX);
                                x++;
                            }

                            // alert(data[i].id_jenis_bahan_alat+"___"+data[i].minggu);
                            $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).text(data[i].jumlah);
                            $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).removeClass( "nonActive2" );
                            $("#"+data[i].id_jenis_bahan_alat+"___"+data[i].minggu).addClass( "Active2" );


                        }


                        i++;
                    }
                }
        });
	</script>

</div>

</body>

</html>
