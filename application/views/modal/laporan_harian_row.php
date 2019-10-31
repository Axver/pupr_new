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
				Minggu
				<input type="text"  class="form form-control" name="daterange" value="01/01/2018 - 01/15/2018" />

				Jenis Pekerja
				<input type="text" id="jenis_pekerja" class="form form-control">
				Jumlah Pekerja
				<input type="text" id="jumlah_pekerja" class="form form-control">
				Jenis Alat dan Bahan
				<select name="alat_bahan" id="alat_bahan" class="form form-control"></select>
				Satuan
				<select name="satuan" id="satuan" class="form form-control"></select>
				Jumlah Alat Bahan
				<input type="text" class="form form-control" id="jumlah">


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="tambah_row()">Simpan</button>
			</div>
		</div>
	</div>
</div>

<script>

//	Pilih Data dari Laporan Perencanaan Terlebih Dahulu
function changeDate()
{
    let lap1=$("#lap_perencanaan").val();
//Ajax It
    $.ajax({
        type : "POST",
        url : "http://localhost/pupr_new/laporan_harian/perencanaan_date",
        cache:false,
        async:false,
        dataType : "text",
        data : {"id" : lap1},
        success : function(data) {

            alert(data);

        }
    });
}


function tambahJenis()
{

    $("#mJenisPekerjaan").modal("show");
}




//	Date Range Picker
$(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});



	function tambah_row()
	{
	    let jenis_pekerja=$("#jenis_pekerja").val();
	    let jumlah_pekerja=$("#jumlah_pekerja").val();
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
			    alert(i);
			//    Append Table
				$("#tabel_harian").append("\t<tr>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+jenis_pekerja+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+jumlah_pekerja+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+jenis+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+satuan+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t\t<td class=\"tg-0lax\">"+jumlah+"</td>\n" +
                    "\t\t\t\t\t\t\t\t\t</tr>");
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
    }


    $.ajax({
        type : "POST",
        url : "http://localhost/pupr_new/laporan_harian/jenis_alat",
        cache:false,
        async:false,
        dataType : "text",
        data : {"id" : "1"},
        success : function(data) {

        data=JSON.parse(data);
        console.log(data);

        let data_length=data.length;
        let i=0;

        while(i<data_length)
		{
            $('#alat_bahan').append(`<option value="${data[i].id_jenis_bahan_alat}">
                                       ${data[i].jenis_bahan_alat}
                                  </option>`);
		    i++;
		}

        }
    });


//	Satuan
    $.ajax({
        type : "POST",
        url : "http://localhost/pupr_new/laporan_harian/jenis_satuan",
        cache:false,
        async:false,
        dataType : "text",
        data : {"id" : "1"},
        success : function(data) {

            data=JSON.parse(data);
            console.log(data);

            let data_length=data.length;
            let i=0;

            while(i<data_length)
            {
                $('#satuan').append(`<option value="${data[i].id_satuan}">
                                       ${data[i].satuan}
                                  </option>`);
                i++;
            }

        }
    });


</script>
