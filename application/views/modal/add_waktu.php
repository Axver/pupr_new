<!-- Modal -->
<div class="modal fade" id="modalWaktu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_column">
				<input type="date" class="form form-control" id="tanggal_kerja">
				<input type="text" class="form form-control" placeholder="jumlah" id="jumlah_kerja">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addValue()">Save changes</button>
			</div>
		</div>
	</div>
</div>
