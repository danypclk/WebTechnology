const admin_register = document.getElementById('admin_register');
const admin_services = document.getElementById('admin_services');

admin_register.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister();
});

function displayFunctionregister()
{
	document.getElementById("services").style.display = "none";
	document.getElementById("register").style.display = "block";
}

admin_services.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	document.getElementById("services").style.display = "block";
	document.getElementById("register").style.display = "none";
}
