<!-- Modal -->
<div class="modal fade" id="laporan_harian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Data Laporan Harian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				Jenis Alat dan Bahan
				<select name="alat_bahan" id="alat_bahan" class="form form-control"></select>
				Satuan
				<select name="satuan" id="satuan" class="form form-control"></select>
				Jumlah
				<input type="text" class="form form-control" id="jumlah">
				Minggu
				<input type="date" id="minggu" class="form form-control">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="tambah_row()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script>

	function tambah_row()
	{
	    let jenis=$("#alat_bahan").val();
	    let satuan=$("#satuan").val();
	    let jumlah=$("#jumlah").val();
	    let minggu=$("#minggu").val();
        minggu = new Date(minggu);


	//    Check Minggunya
		let i=1;
		while(i<=60)
		{
		    let data=getDateRangeOfWeek(i);
		    data=data.split(" to ");
		    let mulai=new Date(data[0]);
		    let selesai= new Date(data[1]);
		    console.log(mulai);
		    console.log(minggu);
			console.log(selesai);


			if(mulai<minggu && minggu<selesai)
			{
			    alert("Benar");
			}



		    i++;
		}

	}

    Date.prototype.getWeek = function () {
        var target  = new Date(this.valueOf());
        var dayNr   = (this.getDay() + 6) % 7;
        target.setDate(target.getDate() - dayNr + 3);
        var firstThursday = target.valueOf();
        target.setMonth(0, 1);
        if (target.getDay() != 4) {
            target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
        }
        return 1 + Math.ceil((firstThursday - target) / 604800000);
    }

    function getDateRangeOfWeek(weekNo){
        var d1 = new Date();
        numOfdaysPastSinceLastMonday = eval(d1.getDay()- 1);
        d1.setDate(d1.getDate() - numOfdaysPastSinceLastMonday);
        var weekNoToday = d1.getWeek();
        var weeksInTheFuture = eval( weekNo - weekNoToday );
        d1.setDate(d1.getDate() + eval( 7 * weeksInTheFuture ));
        var rangeIsFrom = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear();
        d1.setDate(d1.getDate() + 6);
        var rangeIsTo = eval(d1.getMonth()+1) +"/" + d1.getDate() + "/" + d1.getFullYear() ;
        return rangeIsFrom + " to "+rangeIsTo;
    };


</script>
