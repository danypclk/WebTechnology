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
	if(nameValue != '' && pass_wordValue != '' && emailValue != '')
	{
		alert('Successfully added a new user!');
		document.getElementById("form_registry").submit();
	}
}