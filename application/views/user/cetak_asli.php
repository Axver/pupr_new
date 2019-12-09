<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("component/header") ?>

    <style>
    
    body{
        color:black;
    }

    td,th,tr,table{
        color:black;
        border:2px solid black;
    }
    </style>
</head>
<body>

<div class="container">
<button class="btn btn-facebook" style="width:100%;" onclick="generatePDF()">Cetak PDF</button>


  <div id="cetak">
  <?php

$id_perencanaan=$this->uri->segment("5");
$akhir=$this->uri->segment("4");
$awal=$this->uri->segment("3");


$data=$this->db->query("SELECT * FROM lampiran_tahap 
INNER JOIN jenis_pekerjaan ON lampiran_tahap.jenis_pekerjaan=jenis_pekerjaan.id
WHERE id_lap_perencanaan='$id_perencanaan' AND bulan_awal<=$awal AND bulan_akhir>=$akhir GROUP BY jenis_pekerjaan")->result();
$count=count($data);


$i=0;


while($i<$count)
{
    ?>

    <b>Paket:</b> <br/>

   <b> Jenis Pekerjaan: <?php echo $data[$i]->nama_jenis; ?></b> <br/>
   <b> Rentang Bulan: <?php echo $awal; ?>-<?php echo $akhir; ?> </b>

    <table class="table">
    <tr>
    <th>Persentase</th>
    <th>Gambar</th>
    </tr>


    <tr>
    <td>0%</td>
    <td><img style="width:200px;height:100px;" src="<?php echo base_url('gambar/'.$data[$i]->gambar_0); ?>"></td>
    </tr>


    <tr>
    <td>50%</td>
    <td><img style="width:200px;height:100px;" src="<?php echo base_url('gambar/'.$data[$i]->gambar_50); ?>"></td>
    </tr>


    <tr>
    <td>100%</td>
    <td><img style="width:200px;height:100px;" src="<?php echo base_url('gambar/'.$data[$i]->gambar_100); ?>"></td>
    </tr>

    
    </table>


    <div class="break"></div>


    <?php

    
    $i++;
}
// echo json_encode($data);


?>
  </div>

</div>


<script>
 function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("cetak");
        // Choose the element and save the PDF for our user.
        var opt = {
            margin:       1,
            filename:     'myfile.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'A4', orientation: 'portrait' },
            pagebreak: { before: '.break'}
        };
        // Choose the element and save the PDF for our user.
        html2pdf().set(opt).from(element).save();

        swal("PDF Digenerate!!");
    }
</script>
    
</body>
</html>