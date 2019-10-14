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
        <h2 style="margin-top:0px">Detail_bahan_alat_harian Read</h2>
        <table class="table">
	    <tr><td>Id Satuan</td><td><?php echo $id_satuan; ?></td></tr>
	    <tr><td>Id Jenis Bahan Alat</td><td><?php echo $id_jenis_bahan_alat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_bahan_alat_harian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>