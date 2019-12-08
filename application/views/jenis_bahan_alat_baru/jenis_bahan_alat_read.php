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
        <h2 style="margin-top:0px">Jenis_bahan_alat Read</h2>
        <table class="table">
	    <tr><td>Jenis Bahan Alat</td><td><?php echo $jenis_bahan_alat; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_bahan_alat_baru') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>