<!-- Modal -->
<div class="modal fade" id="paketUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Informasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                Nip:
				<input type="text" class="form form-control" placeholder="modal_nip" id="modal_nip" disabled>
				Pilih Paket:

				<br/>
				<select style="width:100%" class="form" id="select2" name="state">
					<?php
					$count=count($user['paket']);
					$i=0;

					while($i<$count)
					{
						?>
						<option value="<?php echo $user['paket'][$i]->id_paket."_".$user['paket'][$i]->tahun; ?>"><?php echo $user['paket'][$i]->nama; ?></option>
					<?php
						$i++;
					}
					?>
				</select>

				<script>
                    $(document).ready(function() {
                        $('#select2').select2();
                    });
				</script>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="savePaketUser()">Save changes</button>
			</div>
		</div>
	</div>
</div>

<script>
	function savePaketUser()
	{
	    let paket_value=$("#select2").val();
	    let nip=$("#modal_nip").val();


	    paket_value=paket_value.split("_");

	//    Chek apakah id sudah ada di database
        $.ajax({
            type: "POST",
            url: "http://localhost/pupr_new/paket_user/check_id",
            data: {"id":paket_value[0],"tahun":paket_value[1]},
			async:false,
            dataType: "text",
            cache:false,
            success:
                function(data){
                   if(data=="0")
				   {

				   //    Tambahkan ke database kalau paket bisa diambil
                       $.ajax({
                           type: "POST",
                           url: "http://localhost/pupr_new/paket_user/tambah_paket",
                           data: {"id":paket_value[0],"tahun":paket_value[1],"nip":nip},
                           async:false,
                           dataType: "text",
                           cache:false,
                           success:
                               function(data){
                                  alert(data);
                               }
                       });

				   }
                   else
				   {
				       alert("Paket Tidak Bisa Di Ambil");
				   }
                }
        });
	}
</script>
