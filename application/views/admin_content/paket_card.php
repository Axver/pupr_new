<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card" style="border:1px solid white;">
			<div class="row">
				<div class="col sm-1">

				</div>
				<div class="col sm-1">

				</div>
			</div>


		</div>
	</div>



</div>



<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Mingguan</div>

					</div>
					<div class="col-auto">
						<a href="<?php echo base_url('detil_paket/minggu/'.$this->uri->segment('3')); ?>"><i style="color:green;" class="fas fa-calendar fa-2x "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Bulanan</div>

					</div>
					<div class="col-auto">
						<a href="<?php echo base_url('detil_paket/bulan/'.$this->uri->segment('3')); ?>"><i style="color:green;" class="fas fa-calendar fa-2x "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Pengawasan</div>

					</div>
					<div class="col-auto">
						<a href="<?php echo base_url('detil_paket/pengawasan/'.$this->uri->segment('3')); ?>"><i style="color:green;" class="fas fa-calendar fa-2x "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Caturwulan</div>

					</div>
					<div class="col-auto">
						<a href="<?php echo base_url('detil_paket/caturwulan/'.$this->uri->segment('3')); ?>"><i style="color:green;" class="fas fa-calendar fa-2x "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
