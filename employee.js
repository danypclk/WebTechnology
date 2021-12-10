const order_list = document.getElementById('employee_orders');
const employee_feedback = document.getElementById('employee_feedback');

order_list.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister();
});

function displayFunctionregister()
{
	document.getElementById("feedback_list").style.display = "none";
	document.getElementById("order_list").style.display = "block";
}

employee_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	document.getElementById("feedback_list").style.display = "block";
	document.getElementById("order_list").style.display = "none";
}
