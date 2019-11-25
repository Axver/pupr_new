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
        <h2 style="margin-top:0px">Lap_harian_mingguan Read</h2>
        <table class="table">
	    <tr><td>Hari Tanggal</td><td><?php echo $hari_tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('lap_harian_force') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>