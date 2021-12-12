const form_register = document.getElementById('form_registry');
const username = document.getElementById('username_register');
const pass_word = document.getElementById('password_register');
const email = document.getElementById('email_register');

form_register.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() 
{
	const nameValue = username.value.trim();
	const pass_wordValue = pass_word.value.trim();
	const emailValue = email.value.trim();
	
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