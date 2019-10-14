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
        <h2 style="margin-top:0px">Detail_bahan_alat <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Jenis Bahan Alat <?php echo form_error('id_jenis_bahan_alat') ?></label>
            <input type="text" class="form-control" name="id_jenis_bahan_alat" id="id_jenis_bahan_alat" placeholder="Id Jenis Bahan Alat" value="<?php echo $id_jenis_bahan_alat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Satuan <?php echo form_error('id_satuan') ?></label>
            <input type="text" class="form-control" name="id_satuan" id="id_satuan" placeholder="Id Satuan" value="<?php echo $id_satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <input type="hidden" name="id_lap_perencanaan" value="<?php echo $id_lap_perencanaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_bahan_alat') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>