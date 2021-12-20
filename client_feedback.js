const form_feedback_d = document.getElementById('form_feedback');
const client_name = document.getElementById('client_feedback_name');
const client_feedback_m = document.getElementById('client_feedback_message');
const client_employee = document.getElementById('business_list');

form_feedback_d.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() 
{
	const client_name_value = client_name.value.trim();
	const client_feedback_value = client_feedback_m.value.trim();
	const client_employee_position = client_employee.value;
	
	if(client_name_value === '')
	{
		document.getElementById("feedback_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("feedback_name_error").style.visibility = "hidden";
	}
	
	if(client_feedback_value === '')
	{
		document.getElementById("feedback_message_error_d").style.visibility = "visible";
	}
	else
	{
		document.getElementById("feedback_message_error_d").style.visibility = "hidden";
	}
	
	if(client_employee === '')
	{
		document.getElementById("partner_employee_feedback_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("partner_employee_feedback_error").style.visibility = "hidden";
	}
	
	if(client_name_value.includes(':'))
	{
		alert('Sie können keinen \":\" im Namen Input benutzten!');
		return false;
	}
	else if(client_feedback_value.includes(':'))
	{
		alert('Sie können keinen \":\" im Namen Input benutzten!');
		return false;
	}
	
	if(client_employee_position === 'disabled')
	{
		alert('Sie müssen ein Partner oder Arbeiter wählen!');
		return false;
	}

	if(client_name_value != '')
	{
		alert('Erfolgreich gesendet');
		document.getElementById("form_feedback").submit();
	}
}