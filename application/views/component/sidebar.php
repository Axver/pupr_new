<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
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
				<a class="collapse-item" href="<?php echo base_url('paket') ?>">Paket</a>

			</div>
		</div>
	</li>



	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo12" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Tambah Laporan</span>
		</a>
		<div id="collapseTwo12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('laporan_perencanaan') ?>">Laporan Perencanaan</a>
				<a class="collapse-item" href="<?php echo base_url('laporan_harian') ?>">Laporan Harian</a>
				<a class="collapse-item" href="<?php echo base_url('laporan_pengawasan') ?>">Laporan Pengawasan</a>
				<a class="collapse-item" href="<?php echo base_url('laporan_pelaksanaan') ?>">Laporan Pelaksanaan</a>



			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo121" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Pengawasan</span>
		</a>
		<div id="collapseTwo121" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('pengawasan') ?>">Pengawasan</a>



			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo11" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Setting</span>
		</a>
		<div id="collapseTwo11" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('jenis_bahan_alat') ?>">Jenis Alat Bahan</a>
				<a class="collapse-item" href="<?php echo base_url('jenis_pekerjaan') ?>">Jenis Pekerjaan</a>
				<a class="collapse-item" href="<?php echo base_url('satuan') ?>">Satuan</a>
				<a class="collapse-item" href="<?php echo base_url('account') ?>">Users</a>


			</div>
		</div>
	</li>





	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">



</ul>
