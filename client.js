const client_feedback = document.getElementById('client_feedback');

client_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	document.getElementById("feedback").style.display = "block";
}