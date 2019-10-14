<!-- Modal -->
<div class="modal fade" id="add_perencanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Perencanaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Id Lap Perencanaan:
				<input type="text" id="id_perencanaan" class="form form-control" placeholder="Id Perencanaan">
				Id Paket:
				<input type="text" id="id_paket" class="form form-control" placeholder="Id Paket" value="<?php echo $informasi['id']; ?>" disabled>
				Tahun:
				<input type="text" id="tahun" class="form form-control" placeholder="Tahun">
				Tukang:
				<input type="text" id="tukang" class="form form-control" placeholder="Tukang">
				Pekerja:
				<input type="text" id="pekerja" class="form form-control" placeholder="Pekerja">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="simpan_perencanaan()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script>
    function simpan_mingguan()
    {
        let id_mingguan=document.getElementById("id_mingguan").value;
        let id_paket=document.getElementById("id_paket").value;
        let tahun=document.getElementById("tahun").value;



        $.ajax({url: "http://localhost/pupr/detil_paket/add_mingguan/"+id_mingguan+"/"+id_paket+"/"+tahun, success: function(result){
                alert(result);
            }});
        // alert("test");
    }

    function simpan_detail()
    {

    }

    function simpan_perencanaan()
	{
	    let id_perencanaan=document.getElementById('id_perencanaan').value;
		let id_paket=document.getElementById('id_paket').value;
        let tahun=document.getElementById('tahun').value;
        let tukang=document.getElementById('tukang').value;
        let pekerja=document.getElementById('pekerja').value;
        console.log(id_perencanaan+id_paket+tahun+tukang+pekerja);
        var data = [id_perencanaan, id_paket, tahun,tukang,pekerja];
        $.ajax({url: "http://localhost/pupr_new/perencanaan/tambah/"+id_perencanaan+"/"+id_paket+"/"+tahun+"/"+tukang+"/"+pekerja, success: function(result){
                alert(result);
            }});



    }

</script>
