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
        <h2 style="margin-top:0px">Lap_harian_mingguan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Hari Tanggal <?php echo form_error('hari_tanggal') ?></label>
            <input type="text" class="form-control" name="hari_tanggal" id="hari_tanggal" placeholder="Hari Tanggal" value="<?php echo $hari_tanggal; ?>" />
        </div>
	    <input type="hidden" name="id_lap_harian_mingguan" value="<?php echo $id_lap_harian_mingguan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lap_harian_force') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>