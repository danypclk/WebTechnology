const form_feedback = document.getElementById('form_feedback');
const client_name_services = document.getElementById('client_feedback_name');

form_feedback.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() 
{
	const nameValue = client_name_services.value.trim();
	const addressValue = client_address_services.value.trim();
	
	if(nameValue === '')
	{
		document.getElementById("register_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("register_name_error").style.visibility = "hidden";
	}
	
	if(pass_wordValue === '')
	{
		document.getElementById("register_password_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("register_password_error").style.visibility = "hidden";
	}
	
	if(emailValue === '')
	{
		document.getElementById("register_email_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("register_email_error").style.visibility = "hidden";
	}
	
	
	if(nameValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Namen Input benutzten!');
		return false;
	}
	else if(pass_wordValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Passwort Input benutzten!');
		return false;
	}
	else if(emailValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Email Input benutzten!');
		return false;
	}
	else if(nameValue != '' && pass_wordValue != '' && emailValue != '')
	{
		document.getElementById("form_registry").submit();
	}
}