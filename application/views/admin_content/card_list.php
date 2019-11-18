<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Paket</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
							$data=$this->db->query("SELECT COUNT(id_paket) as jumlah FROM paket")->result();

							echo $data[0]->jumlah;

							?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
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
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan Harian</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
							$data=$this->db->query("SELECT COUNT(id_lap_harian_mingguan) as jumlah FROM lap_harian_mingguan")->result();

							echo $data[0]->jumlah;

							?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
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
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
							$data=$this->db->query("SELECT COUNT(id_lap_pengawasan) as jumlah FROM lap_pengawasan")->result();

							echo $data[0]->jumlah;

							?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
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
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Laporan Perencanaan</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php
							$data=$this->db->query("SELECT COUNT(id_lap_perencanaan) as jumlah FROM lap_perencanaan")->result();

							echo $data[0]->jumlah;

							?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-calendar fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
