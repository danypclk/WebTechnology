const this_form = document.getElementById('form_kunde_register');
const username = document.getElementById('username');
const pass_word = document.getElementById('password');
const pass_word_1 = document.getElementById('password_1');
const email_v = document.getElementById('email');

this_form.addEventListener('submit', (e) => {
	e.preventDefault();
	
	checkInputs_register_kunde();
});

function checkInputs_register_kunde() 
{
	const usernameValue = username.value.trim();
	const pass_wordValue = pass_word.value.trim();
	const pass_wordValue_1 = pass_word_1.value.trim();
	const email_value = email_v.value.trim();
	
	if(usernameValue.length < 5)
	{
		document.getElementById("short_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("short_name_error").style.visibility = "hidden";
	}
	if(pass_wordValue.length < 5)
	{
		document.getElementById("pass_short_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("pass_short_error").style.visibility = "hidden";
	}

	if(pass_wordValue_1.length < 5)
	{
		document.getElementById("pass_short_1_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("pass_short_1_error").style.visibility = "hidden";
	}	
	
	console.log(email_value);
	
	if(email_value == '')
	{
		document.getElementById("email_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("email_error").style.visibility = "hidden";
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
	else if(pass_wordValue_1.includes(':'))
	{
		alert('Sie können keinen \":\" im Passwort Input benutzten!');
		return false;
	}
	else if(pass_wordValue_1 != pass_wordValue)
	{
		alert('Passwörter sind nicht gleich!');
		return false;
	}
	
	if(pass_wordValue_1 == pass_wordValue)
	{
		if(pass_wordValue_1.length > 4)
		{
			if(usernameValue.length > 4)
			{
				if(email_value != '')
				{
					document.getElementById("form_kunde_register").submit();
				}
			}
		}
	}
}