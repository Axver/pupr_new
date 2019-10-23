<!-- Modal -->
<div class="modal fade" id="waktuPerencanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Waktu Perencanaan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form form-control" id="id_perencanaan_modal">
				<input type="text" class="form form-control" id="id_pekerjaan_modal">
				<input type="date" class="form form-control" id="waktu_pengerjaan_modal">
				<input type="text" class="form form-control" id="jumlah_pekerja_modal" placeholder="Jumlah Pekerja">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="saveWaktu()">Save</button>
			</div>

			<script>
				function saveWaktu()
				{
				    let save_perencanaan=$("#id_perencanaan_modal").val();
				    let save_pekerjaan=$("#id_pekerjaan_modal").val();
				    let save_waktu=$("#waktu_pengerjaan_modal").val();



				    let x=1;
				    while (x<=53)
					{
                        let data=getDateRangeOfWeek(x);
                        data=data.split(" to ");
                        let middle= new Date(save_waktu);
                        let start= new Date(data[0]);
                        let end= new Date(data[1]);

                        if(middle > start && middle < end)
						{
						    alert(x);
						}

                        console.log(start);
                        console.log(middle);
                        console.log(end);
					    x++;
					}

				    alert("Data Disimpan");
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
		</div>
	</div>
</div>
