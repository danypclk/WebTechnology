const admin_register = document.getElementById('admin_register');

admin_register.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunction();
});

function displayFunction()
{
	document.getElementById("register").style.display = "block";
}

	