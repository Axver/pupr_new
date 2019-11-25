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
	    <tr><td>Jumlah Bahan</td><td><?php echo $jumlah_bahan; ?></td></tr>
	    <tr><td>Jumlah Pekerja</td><td><?php echo $jumlah_pekerja; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Jenis Pekerjaan</td><td><?php echo $jenis_pekerjaan; ?></td></tr>
	    <tr><td>Lokasi</td><td><?php echo $lokasi; ?></td></tr>
	    <tr><td>Panjang Penanganan</td><td><?php echo $panjang_penanganan; ?></td></tr>
	    <tr><td>Keterangan Dimensi</td><td><?php echo $keterangan_dimensi; ?></td></tr>
	    <tr><td>Jumlah Tukang</td><td><?php echo $jumlah_tukang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tukang_force') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>