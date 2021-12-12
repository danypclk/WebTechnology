const form = document.getElementById('form_contact');
const name = document.getElementById('contact_name');
const email = document.getElementById('contact_email');
const message = document.getElementById('contact_message');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() 
{
	const nameValue = name.value.trim();
	const emailValue = email.value.trim();
	const messageValue = message.value.trim();
	
	if(nameValue === '')
	{
		document.getElementById("contact_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("contact_name_error").style.visibility = "hidden";
	}
	
	if(emailValue === '')
	{
		document.getElementById("contact_email_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("contact_email_error").style.visibility = "hidden";
	}
	
	if(messageValue === '')
	{
		document.getElementById("contact_message_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("contact_message_error").style.visibility = "hidden";
	}
	
	
	if(nameValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Namen Input benutzten!');
		return false;
	}
	else if(emailValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Passwort Input benutzten!');
		return false;
	}
	else if(messageValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Passwort Input benutzten!');
		return false;
	}
	else if(nameValue != '' && emailValue != '' && messageValue != '')
	{
		alert('Erfolgreich gesendet');
		document.getElementById("form_contact").submit();
	}
}