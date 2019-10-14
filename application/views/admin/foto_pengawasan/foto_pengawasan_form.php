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
        <h2 style="margin-top:0px">Foto_pengawasan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Foto Pengawasan <?php echo form_error('foto_pengawasan') ?></label>
            <input type="text" class="form-control" name="foto_pengawasan" id="foto_pengawasan" placeholder="Foto Pengawasan" value="<?php echo $foto_pengawasan; ?>" />
        </div>
	    <input type="hidden" name="id_foto_pengawasan" value="<?php echo $id_foto_pengawasan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('foto_pengawasan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>