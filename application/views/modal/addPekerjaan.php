<!-- Modal -->
<div class="modal fade" id="addPekerjaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Pekerjaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="add_pekerjaan">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="save_new_pekerjaan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	function save_new_pekerjaan()
	{
	    let jenis_pekerjaan=$("#add_pekerjaan").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/pekerjaan",
            data: {"jenis_pekerjaan":jenis_pekerjaan},
            dataType: "text",
            cache:false,
            success:
                function(data){

                //  Redirect kan ke current url
					$("#addPekerjaan").modal("hide");
                    currLoc = $(location).attr('href');
                    // alert(currLoc);
                    location.reload(true);

                }
        });
	}
</script>
