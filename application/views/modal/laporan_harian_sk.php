<!-- Modal -->
<div class="modal fade" id="mSketsaKerja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Jenis Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<input type="text" class="form form-control" id="sk" placeholder="Sket Kerja">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="addSK()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
    function addSK()
    {
        let jp=$("#sk").val();
        // alert(jp);
        $("#mKerja").text(jp);
    }
</script>
