<!-- Modal -->
<div class="modal fade" id="modalDetilPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b>Generate Data</b>
				<input type="text" id="nip">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addValue()">Save changes</button>
			</div>
		</div>
	</div>
</div>


<script>
	function addValue()
	{
	   let nip=$("#nip").val();
	   alert(nip);
	}
</script>
