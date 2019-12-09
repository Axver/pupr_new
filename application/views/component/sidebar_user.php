<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('user'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SILAP<sup>pupr</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">



	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu Laporan
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Paket & Informasi</span>
		</a>
		<div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Daftar Laporan</h6>
				<a class="collapse-item" href="<?php echo base_url('user') ?>">Paket Anda</a>

			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
<!--	<li class="nav-item">-->
<!--		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo113" aria-expanded="true" aria-controls="collapseTwo">-->
<!--			<i class="fas fa-fw fa-cog"></i>-->
<!--			<span>Paket User</span>-->
<!--		</a>-->
<!--		<div id="collapseTwo113" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--			<div class="bg-white py-2 collapse-inner rounded">-->
<!--				<h6 class="collapse-header">Paket User</h6>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('user') ?><!--">Paket</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('user_perencanaan') ?><!--">Laporan Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('user_harian_data') ?><!--">Laporan Harian</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('user_pengawasan_data') ?><!--">Laporan Pengawasan</a>-->
<!---->
<!---->
<!---->
<!---->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1139" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Paket Laporan</span>
		</a>
		<div id="collapseTwo1139" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Paket User</h6>
				<a class="collapse-item" href="<?php echo base_url('user_perencanaan_') ?>">Semua Perencanaan</a>






			</div>
		</div>
	</li>


	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo114" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Generate</span>
		</a>
		<div id="collapseTwo114" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Generate</h6>
<!--				<a class="collapse-item" href="--><?php //echo base_url('generate_minggu') ?><!--">Laporan Mingguan</a>-->
				<a class="collapse-item" href="<?php echo base_url('generate_bulan_baru') ?>">Laporan Bulanan</a>
				<a class="collapse-item" href="<?php echo base_url('catur_wulan_baru') ?>">Laporan Pertahap</a>
				<a class="collapse-item" href="<?php echo base_url('catur_wulan_gambar') ?>">Gambar Laporan Pertahap</a>
				<a class="collapse-item" href="<?php echo base_url('lampiran_tahap') ?>">Lampiran Pertahap</a>
				<a class="collapse-item" href="<?php echo base_url('lampiran_tahap/cetak') ?>">Cetak Lampiran Pertahap</a>

<!--				<a class="collapse-item" href="--><?php //echo base_url('generate_catur') ?><!--">Laporan Caturwulan</a>-->




			</div>
		</div>
	</li>

	<button class="btn btn-info" onclick="logout()">Logout</button>

	<script>
		function logout()
		{
		    window.location="http://localhost/pupr_new/login/logout";
		}
	</script>















	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">



</ul>
