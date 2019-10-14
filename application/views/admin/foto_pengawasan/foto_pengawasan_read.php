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
        <h2 style="margin-top:0px">Foto_pengawasan Read</h2>
        <table class="table">
	    <tr><td>Foto Pengawasan</td><td><?php echo $foto_pengawasan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('foto_pengawasan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>