
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
<html lang="en" id="cetakini">

<head>



	<?php $this->load->view('component/header') ?>

	<style>

		* {
			font-size: 1em;
			font-family: Arial;
		}

		.table {
			width: 100%;
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
			font: 14px "Century Gothic", Futura, sans-serif;
			font-size:12px;
			color:#3d3d3d;
			text-align:left;
			margin-top:10px;
			margin-left:auto;
			margin-right:auto;
			text-align:center;
		}
		.credit a{
			color:gray;
		}
		.credit a:hover{
			color:black;
		}
		.credit a:visited{
			color:MediumPurple;
		}

		table
		{
			width: 100%;
			border-collapse: collapse;
		}




	</style>


</head>

<button class="btn btn-info" onclick="generatePDF()" style="width:100%">Cetak</button>


<body >




<div class="row" >
	<div class="col-sm-6">
		<div class="row" style="text-align: center">
			<b>
				<h4>LAPORAN PERENCANAAN
					<br/>
					PELAKSANAAN KEGIATAN</h4>

			</b>
		</div>
		<div class="row">
			<div class="col-sm-3">Nama Paket</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8">

			</div>

		</div>
		<div class="row">
			<div class="col-sm-3">Nilai Paket</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>


		</div>
		<div class="row">
			<div class="col-sm-3">Jumlah Tahap</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>


		</div>
		<div class="row">
			<div class="col-sm-3">Jenis Pekerjaan</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>


		</div>
		<div class="row">
			<div class="col-sm-3">Masa Pelaksanaan</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>


		</div>
		<div class="row">
			<div class="col-sm-3">Lokasi</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>

		</div>
		<div class="row">
			<div class="col-sm-3">Tahun Anggaran</div>
			<div class="col-sm-1">:</div>
			<div class="col-sm-8"></div>

		</div>
	</div>

</div>
<br/>

<br>

<br/>



<div >
	<div class="panel panel-info">
		<div class="panel-body">

			<!--	Irregular Table-->
			<b>Jadwal Rencana Pelaksanaan Kegiatan</b>
			<table id="tabel_jadwal" width="400" class="table table-responsive" cellspacing="0" border="0">

				<tr>
					<td colspan="6" rowspan="4" height="80" >Jenis Pekerjaan</font></td>
					<td  colspan="60" ><font >Tahap/Bulan/Minggu</font></td>

				</tr>
				<tr>
					<td colspan="20" ><font >Tahap I</font></td>
					<td colspan="20" ><font >Tahap II</font></td>
					<td  colspan="20" ><font >Tahap III</font></td>

				</tr>
				<tr>
					<td  colspan="5" ><font >Januari</font></td>
					<td  colspan="5" ><font >Februari<br>Maret</font></td>
					<td  colspan="5" ><font >Maret</font></td>
					<td  colspan="5" ><font >April</font></td>
					<td  colspan="5" ><font >Mei</font></td>
					<td  colspan="5" ><font >Juni</font></td>
					<td  colspan="5" ><font >Juli</font></td>
					<td  colspan="5" ><font >Agustus</font></td>
					<td  colspan="5" ><font >September</font></td>
					<td  colspan="5" ><font >Oktober</font></td>
					<td  colspan="5" ><font >November</font></td>
					<td  colspan="5" ><font >Desember</font></td>

				</tr>
				<tr>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td  sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
				</tr>



				<tbody>



				</tbody>
			</table>
			<b>Perencanaan Penggunaan Jumlah Pekerja </b>
			<table id="tabel_jumlah"  class="table table-responsive" cellspacing="0" border="0">

				<tr>
					<td  colspan="6" rowspan="4" height="80" align="center" valign="middle"><font >Jenis Pekerjaan</font></td>
					<td  colspan="60" ><font >Tahap/Bulan/Minggu</font></td>

				</tr>
				<tr>
					<td  colspan="20" ><font >Tahap I</font></td>
					<td  colspan="20" ><font >Tahap II</font></td>
					<td  colspan="20" ><font >Tahap III</font></td>

				</tr>
				<tr>
					<td  colspan="5" ><font >Januari</font></td>
					<td  colspan="5" ><font >Februari<br>Maret</font></td>
					<td  colspan="5" ><font >Maret</font></td>
					<td  colspan="5" ><font >April</font></td>
					<td  colspan="5" ><font >Mei</font></td>
					<td  colspan="5" ><font >Juni</font></td>
					<td  colspan="5" ><font >Juli</font></td>
					<td  colspan="5" ><font >Agustus</font></td>
					<td  colspan="5" ><font >September</font></td>
					<td  colspan="5" ><font >Oktober</font></td>
					<td  colspan="5" ><font >November</font></td>
					<td  colspan="5" ><font >Desember</font></td>

				</tr>
				<tr>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000"  sdval="4" ><font >4</font></td>
					<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000"  sdval="5" ><font >5</font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
				</tr>



				<tbody>



				</tbody>
			</table>
			<b>Perencanaan Penggunaan Bahan/Alat </b>
			<br/>
			<div class="row">



			</div>
			<br/>
			<table  id="tabel_alat" class="table table-responsive" cellspacing="0" border="0">

				<tr>
					<td  colspan="6" rowspan="4" height="80" align="center" valign="middle"><font >Jenis Bahan/Alat</font></td>
					<td colspan="60" ><font >Tahap/Bulan/Minggu</font></td>

				</tr>
				<tr>
					<td colspan="20" ><font >Tahap I</font></td>
					<td colspan="20" ><font >Tahap II</font></td>
					<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="20" ><font >Tahap III</font></td>

				</tr>
				<tr>
					<td colspan="5" ><font >Januari</font></td>
					<td colspan="5" ><font >Februari<br>Maret</font></td>
					<td  colspan="5" ><font >Maret</font></td>
					<td colspan="5" ><font >April</font></td>
					<td colspan="5" ><font >Mei</font></td>
					<td colspan="5" ><font >Juni</font></td>
					<td colspan="5" ><font >Juli</font></td>
					<td colspan="5" ><font >Agustus</font></td>
					<td colspan="5" ><font >September</font></td>
					<td colspan="5" ><font >Oktober</font></td>
					<td colspan="5" ><font >November</font></td>
					<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" colspan="5" ><font >Desember</font></td>

				</tr>
				<tr>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td  sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td   sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td   sdval="1" ><font >1</font></td>
					<td   sdval="2" ><font >2</font></td>
					<td   sdval="3" ><font >3</font></td>
					<td  sdval="4" ><font >4</font></td>
					<td   sdval="5" ><font >5</font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
					<td align="left" valign="bottom"><font ><br></font></td>
				</tr>



				<tbody>



				</tbody>
			</table>



			<br/>
			<br/>

			<div class="row">
				<table class="table table-dark">
					<thead>
					<th>Sketsa Kerja</th>
					<th>Lokasi</th>
					<th>Jenis Pekerjaan</th>
					<th>Panjang Penanganan</th>
					<th>Keterangan Dimensi</th>
					<th>Ket</th>
					</thead>
					<tbody>
					<tr style="height:300px;">
						<td>
							<?php
							$getImage=$this->db->get_where("gambar_perencanaan",array("id_lap_perencanaan"=>$this->uri->Segment("2")))->result();
							//
							?>
							<img style="width:200px;" src="<?php echo base_url('gambar/'.$getImage[0]->gambar) ?>" />
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					</tbody>
				</table>
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
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"center\" valign=\"bottom\"></td>\n" +
            "\n" +
            "\n" +
            "\t\t\t\t\t\t\t\t\t</tr>";

        $("#tabel_jadwal").append(newRow);

        var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" height=\"20\" align=\"left\" valign=\"bottom\">"+pekerjaan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"center\" valign=\"bottom\"></td>\n" +
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
            var newCol="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai('"+data+"')\" id='"+data+"' class='nonActive'></td>";
            var newCol1="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"warnai1('"+data1+"')\" id='"+data1+"' class='nonActive1'></td>";
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
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" height=\"20\" align=\"left\" valign=\"bottom\">"+alat_bahan_text+"</td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"left\" valign=\"bottom\"></td>\n" +
            "\t\t\t\t\t\t\t\t\t\t<td style=\"\" align=\"center\" valign=\"bottom\"></td>\n" +
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
            var newColX="<td style=\"border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000\" align=\"left\" valign=\"bottom\" onclick=\"tambahAngka('"+data+"')\" id='"+data+"' class='nonActive2'></td>";
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

                    var newRow="\t<tr id='"+data1[x].id+pekerjaan_id+"'>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td >"+pekerjaan_text+"</td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\n" +
                        "\n" +
                        "\t\t\t\t\t\t\t\t\t</tr>";

                    $("#tabel_jadwal").append(newRow);

                    var newRow="\t<tr id='pekerjaan_waktu"+pekerjaan_id+"'>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td >"+pekerjaan_text+"</td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
                        "\t\t\t\t\t\t\t\t\t\t<td ></td>\n" +
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
                    let newCol="<td  onclick=\"warnai('"+data_+"')\" id='"+data_+"' class='nonActive'></td>";
                    var newCol1="<td onclick=\"warnai1('"+data2+"')\" id='"+data2+"' class='nonActive1'></td>";
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
</script>


</body>

</html>
