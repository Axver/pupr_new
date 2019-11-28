<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SILAP <sup>pupr</sup></div>
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
				<a class="collapse-item" href="<?php echo base_url('paket_informasi') ?>">Paket Informasi</a>
<!--				<a class="collapse-item" href="--><?php //echo base_url('perencanaan_edit_jesi') ?><!--">Info Perencanaan Edit</a>-->


			</div>
		</div>
	</li>



	<!-- Nav Item - Pages Collapse Menu -->
<!--	<li class="nav-item">-->
<!--		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo12" aria-expanded="true" aria-controls="collapseTwo">-->
<!--			<i class="fas fa-fw fa-cog"></i>-->
<!--			<span>Tambah Laporan</span>-->
<!--		</a>-->
<!--		<div id="collapseTwo12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--			<div class="bg-white py-2 collapse-inner rounded">-->
<!--				<h6 class="collapse-header">Setting</h6>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_perencanaan') ?><!--">Laporan Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_harian') ?><!--">Laporan Harian</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_pengawasan') ?><!--">Laporan Pengawasan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('laporan_pelaksanaan') ?><!--">Laporan Pelaksanaan</a>-->
<!---->
<!---->
<!---->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo121" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Pengawasan</span>
		</a>
		<div id="collapseTwo121" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Setting</h6>
				<a class="collapse-item" href="<?php echo base_url('pengawasan') ?>">Pengawasan</a>
				<a class="collapse-item" href="<?php echo base_url('pengawasan/login_user') ?>">Login As User</a>



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
				<a class="collapse-item" href="<?php echo base_url('konfigurasi') ?>">Tanda Tangan</a>
				<a class="collapse-item" href="<?php echo base_url('Jenis_bahan_alat_harga') ?>">Harga Bahan/Alat</a>


			</div>
		</div>
	</li>


	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo112" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Paket User</span>
		</a>
		<div id="collapseTwo112" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Paket Untuk User</h6>
				<a class="collapse-item" href="<?php echo base_url('paket_user') ?>">Paket User</a>



			</div>
		</div>
	</li>

	<!-- Heading -->
	<div class="sidebar-heading">
		Force Edit
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
<!--	<li class="nav-item">-->
<!--		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1124" aria-expanded="true" aria-controls="collapseTwo">-->
<!--			<i class="fas fa-fw fa-cog"></i>-->
<!--			<span>Pengeditan Paksa</span>-->
<!--		</a>-->
<!--		<div id="collapseTwo1124" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
<!--			<div class="bg-white py-2 collapse-inner rounded">-->
<!--				<h6 class="collapse-header">Paket Untuk User</h6>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('force_detail_bahan') ?><!--">Bahan Alat Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Bahan Alat Harian</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Pekerjaan Perencanaan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Harian Detail</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Pengawasan Detail</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Pengawasan</a>-->
<!--				<a class="collapse-item" href="--><?php //echo base_url('') ?><!--">Laporan Perencanaan</a>-->
<!---->
<!---->
<!---->
<!--			</div>-->
<!--		</div>-->
<!--	</li>-->



		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo12" aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Force Edit/All Data</span>
			</a>
			<div id="collapseTwo12" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Setting</h6>
					<a class="collapse-item" href="<?php echo base_url('ttd_info') ?>">Informasi TTD</a>
					<a class="collapse-item" href="<?php echo base_url('lap_perencanaan_force') ?>">Laporan Perencanaan</a>
					<a class="collapse-item" href="<?php echo base_url('lap_pengawasan_force') ?>">Laporan Pengawasan</a>
					<a class="collapse-item" href="<?php echo base_url('lap_harian_force') ?>">Laporan Harian</a>
					<a class="collapse-item" href="<?php echo base_url('tukang_force') ?>">Tukang Harian Add</a>






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


