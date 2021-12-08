const form = document.getElementById('form');
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
	if(usernameValue === 'admin' && pass_wordValue === 'loGGin')
	{
		alert('Erfolgreich eingeloggt');
		window.location.href="admin-site.html";
	}
}