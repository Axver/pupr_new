let domain='localhost/pupr/';

function pilih_paket()
{

	let paket=document.getElementById('paket').value;
	url=domain+"detil_paket/"+paket;
	// window.location=domain+"detil_paket/"+paket;
	alert(url);
	window.location=domain;
}



