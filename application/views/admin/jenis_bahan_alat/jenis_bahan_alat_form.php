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
        <h2 style="margin-top:0px">Jenis_bahan_alat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis Bahan Alat <?php echo form_error('jenis_bahan_alat') ?></label>
            <input type="text" class="form-control" name="jenis_bahan_alat" id="jenis_bahan_alat" placeholder="Jenis Bahan Alat" value="<?php echo $jenis_bahan_alat; ?>" />
        </div>
	    <input type="hidden" name="id_jenis_bahan_alat" value="<?php echo $id_jenis_bahan_alat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_bahan_alat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>