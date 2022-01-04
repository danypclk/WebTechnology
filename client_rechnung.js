const form_rechnung_client = document.getElementById('form_rechnung');
const selector_rechnung_client = document.getElementById("rechnungen_liste");

form_rechnung_client.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkRechnung_client();
});

function checkRechnung_client() 
{

	if(selector_rechnung_client.value === '')
	{
		document.getElementById("rechnungen_liste_error").style.visibility = "visible";
		return false;
	}
	else
	{
		document.getElementById("rechnungen_liste_error").style.visibility = "hidden";
	}

	if(selector_rechnung_client.value != '')
	{
		document.getElementById("form_rechnung").submit();
	}
}