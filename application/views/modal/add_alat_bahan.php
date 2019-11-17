<!-- Modal -->
<div class="modal fade" id="modalAlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_column_alat">
				<input type="text" class="form form-control" placeholder="jumlah" id="jumlah_alat">
				<select class="form form-control" id="alat_satuan_jesi">
					<?php
					$data_jenis=$this->db->get("satuan")->result();
					$length=count($data_jenis);

					$i=0;

					while($i<$length)
					{
						?>
						<option value="<?php echo $data_jenis[$i]->id_satuan; ?>"><?php echo $data_jenis[$i]->satuan; ?></option>
					<?php

						$i++;
					}
					?>
				</select>
				<input type="date" class="form form-control" id="tanggal_alat">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addValueAlat()">Save changes</button>
			</div>
		</div>
	</div>
</div>
