const form = document.getElementById('form_login');
const username = document.getElementById('username');
const pass_word = document.getElementById('password');

form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() 
{
	const usernameValue = username.value.trim();
	const pass_wordValue = pass_word.value.trim();
	
	if(usernameValue === '')
	{
		document.getElementById("user_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("user_error").style.visibility = "hidden";
	}
	if(pass_wordValue === '')
	{
		document.getElementById("pass_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("pass_error").style.visibility = "hidden";
	}
	
	if(usernameValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Namen Input benutzten!');
		return false;
	}
	else if(pass_wordValue.includes(':'))
	{
		alert('Sie können keinen \":\" im Passwort Input benutzten!');
		return false;
	}
	else if(usernameValue != '' && usernameValue != '' && pass_wordValue != '' && pass_wordValue != '')
	{
	const name = document.getElementById('username').value;
	
	localStorage.setItem("USERNAME", name);

	document.getElementById("form_login").submit();
	}
}