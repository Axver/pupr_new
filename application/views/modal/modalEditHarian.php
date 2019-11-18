<!-- Modal -->
<div class="modal fade" id="mJenisPekerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Jenis Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column" class="form form-control" disabled>
				<select id="jenis_pekerja_value" class="form form-control">
					<?php
                     $sel=$this->db->get("jenis_pekerjaan")->result();
                     $count=count($sel);

                     $i=0;
                     while($i<$count)
					 {
					 	?>
						 <option value="<?php echo $sel[$i]->id; ?>"><?php echo $sel[$i]->nama_jenis; ?></option>
					<?php

					 	$i++;
					 }
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="edit_jenis_pekerjaan()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="mJumlahPekerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Jumlah Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column_jumlah_pekerja" class="form form-control" disabled>
				<input type="text" id="jumlah_pekerja_value" class="form form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="edit_jumlah_pekerjaan()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="mJenisBahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Jumlah Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column_jenis_bahan" class="form form-control" disabled>
<!--				<input type="text" id="jenis_bahan_value" class="form form-control">-->
				<select class="form form-control" id="jenis_bahan_value">
					<?php
					$get=$this->db->get("jenis_bahan_alat")->result();
					$count=count($get);
					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $get[$i]->id_jenis_bahan_alat; ?>"><?php echo $get[$i]->jenis_bahan_alat; ?></option>
					<?php
						$i++;
					}
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="edit_jenis_bahan()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="mSatuanBahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Satuan Bahan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column_satuan_bahan" class="form form-control" disabled>
				<!--				<input type="text" id="jenis_bahan_value" class="form form-control">-->
				<select class="form form-control" id="satuan">
					<?php
					$get=$this->db->get("satuan")->result();
					$count=count($get);
					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $get[$i]->id_satuan; ?>"><?php echo $get[$i]->satuan; ?></option>
						<?php
						$i++;
					}
					?>
				</select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="edit_satuan_bahan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mJumlahBahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Satuan Bahan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="id_column_jumlah_bahan" class="form form-control" disabled>
				<!--				<input type="text" id="jenis_bahan_value" class="form form-control">-->
			    <input type="text" id="jumlah_bahan_value" class="form form-control">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="edit_jumlah_bahan()">Save changes</button>
			</div>
		</div>
	</div>
</div>
