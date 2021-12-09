const admin_register = document.getElementById('admin_register');
const admin_services = document.getElementById('admin_services');
const admin_register_list = document.getElementById('admin_register_list');

admin_register.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister();
});

function displayFunctionregister()
{
	document.getElementById("register_list").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("register").style.display = "block";
}

admin_services.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	document.getElementById("register_list").style.display = "none";
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "block";
}

admin_register_list.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister_list();
});

function displayFunctionregister_list()
{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("register_list").style.display = "block";
}
