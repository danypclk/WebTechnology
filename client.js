const client_feedback = document.getElementById('client_feedback');

client_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	$( "#business_list" ).load( "Data/Selector/partner_selector.html" );
	$( "#business_list" ).load( "Data/Selector/employee_selector.html" );
	document.getElementById("feedback").style.display = "block";
}
