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
        <h2 style="margin-top:0px">Lap_perencanaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="decimal">Tukang <?php echo form_error('tukang') ?></label>
            <input type="text" class="form-control" name="tukang" id="tukang" placeholder="Tukang" value="<?php echo $tukang; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Pekerja <?php echo form_error('pekerja') ?></label>
            <input type="text" class="form-control" name="pekerja" id="pekerja" placeholder="Pekerja" value="<?php echo $pekerja; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Pekerjaan <?php echo form_error('jenis_pekerjaan') ?></label>
            <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Jenis Pekerjaan" value="<?php echo $jenis_pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Panjang Penanganan <?php echo form_error('panjang_penanganan') ?></label>
            <input type="text" class="form-control" name="panjang_penanganan" id="panjang_penanganan" placeholder="Panjang Penanganan" value="<?php echo $panjang_penanganan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan Dimensi <?php echo form_error('keterangan_dimensi') ?></label>
            <input type="text" class="form-control" name="keterangan_dimensi" id="keterangan_dimensi" placeholder="Keterangan Dimensi" value="<?php echo $keterangan_dimensi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <input type="hidden" name="id_lap_perencanaan" value="<?php echo $id_lap_perencanaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lap_perencanaan_force') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>