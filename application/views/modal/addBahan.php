<!-- Modal -->
<div class="modal fade" id="addBahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Alat Bahan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="add_bahan">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="save_new_bahan()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
    function save_new_bahan()
    {
        let jenis_bahan=$("#add_bahan").val();
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/user/bahan",
            data: {"jenis_bahan":jenis_bahan},
            dataType: "text",
            cache:false,
            success:
                function(data){

                    //  Redirect kan ke current url
                    $("#addBahan").modal("hide");
                    currLoc = $(location).attr('href');
                    // alert(currLoc);
                    location.reload(true);

                }
        });
    }
</script>
