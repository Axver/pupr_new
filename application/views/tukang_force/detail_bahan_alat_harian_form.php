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
        <h2 style="margin-top:0px">Detail_bahan_alat_harian <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Satuan <?php echo form_error('id_satuan') ?></label>
            <input type="text" class="form-control" name="id_satuan" id="id_satuan" placeholder="Id Satuan" value="<?php echo $id_satuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah Bahan <?php echo form_error('jumlah_bahan') ?></label>
            <input type="text" class="form-control" name="jumlah_bahan" id="jumlah_bahan" placeholder="Jumlah Bahan" value="<?php echo $jumlah_bahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah Pekerja <?php echo form_error('jumlah_pekerja') ?></label>
            <input type="text" class="form-control" name="jumlah_pekerja" id="jumlah_pekerja" placeholder="Jumlah Pekerja" value="<?php echo $jumlah_pekerja; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gambar <?php echo form_error('gambar') ?></label>
            <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Gambar" value="<?php echo $gambar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Pekerjaan <?php echo form_error('jenis_pekerjaan') ?></label>
            <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Jenis Pekerjaan" value="<?php echo $jenis_pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
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
            <label for="varchar">Jumlah Tukang <?php echo form_error('jumlah_tukang') ?></label>
            <input type="text" class="form-control" name="jumlah_tukang" id="jumlah_tukang" placeholder="Jumlah Tukang" value="<?php echo $jumlah_tukang; ?>" />
        </div>
	    <input type="hidden" name="id_lap_harian_mingguan" value="<?php echo $id_lap_harian_mingguan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tukang_force') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>