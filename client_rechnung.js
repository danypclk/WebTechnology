const form_rechnung_d = document.getElementById('form_rechnung');

form_rechnung_d.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkRechnung();
});

function checkRechnung() 
{
	const client_name_value = client_name.value.trim();
	const client_feedback_value = client_feedback_m.value.trim();
	const client_employee_position = client_employee.value;

	if(client_name_value != '')
	{
		document.getElementById("form_rechnung").submit();
	}
}