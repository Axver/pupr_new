<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_jenis_pekerjaan Read</h2>
        <table class="table">
	    <tr><td>Tukang</td><td><?php echo $tukang; ?></td></tr>
	    <tr><td>Pekerja</td><td><?php echo $pekerja; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_jenis_pekerjaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>