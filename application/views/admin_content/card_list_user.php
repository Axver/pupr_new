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
							$nip=$this->session->userdata("nip");
							$data=$this->db->query("SELECT COUNT(id_paket) as jumlah FROM detail_paket WHERE nip='$nip' ")->result();

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
							$detail_paket=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
							$count=count($detail_paket);
							$hitung=0;
							$i=0;

							while($i<$count)
							{
//								Cari kemudian paket perencanaannya
								$per=$this->db->get_where("lap_harian_mingguan",array("id_paket"=>$detail_paket[$i]->id_paket))->result();
								$count1=count($per);
								$ii=0;
								while($ii<$count1)
								{
									$hitung++;

									$ii++;
								}

								$i++;
							}

							echo $hitung;

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
							$detail_paket=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
							$count=count($detail_paket);
							$hitung=0;
							$i=0;

							while($i<$count)
							{
//								Cari kemudian paket perencanaannya
								$per=$this->db->get_where("lap_pengawasan",array("id_paket"=>$detail_paket[$i]->id_paket))->result();
								$count1=count($per);
								$ii=0;
								while($ii<$count1)
								{
									$hitung++;

									$ii++;
								}

								$i++;
							}

							echo $hitung;

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
							$detail_paket=$this->db->get_where("detail_paket",array("nip"=>$this->session->userdata("nip")))->result();
							$count=count($detail_paket);
							$hitung=0;
							$i=0;

							while($i<$count)
							{
//								Cari kemudian paket perencanaannya
                            $per=$this->db->get_where("lap_perencanaan",array("id_paket"=>$detail_paket[$i]->id_paket))->result();
                            $count1=count($per);
                            $ii=0;
                            while($ii<$count1)
                            {
                            	$hitung++;

                            	$ii++;
                            }

								$i++;
							}

							echo $hitung;

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
