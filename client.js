const client_feedback = document.getElementById('client_feedback');

client_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	$( "#employee_list" ).load( "Data/Work_orders/employee_selector.html" );
	document.getElementById("feedback").style.display = "block";
}