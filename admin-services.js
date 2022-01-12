const form_services = document.getElementById('form_services');
const client_name_services = document.getElementById('client_name_services');
const client_address_service = document.getElementById('client_address_service');
const selector = document.getElementById("referrer");
const client_request_service = document.getElementById('request');

form_services.addEventListener('submit', (e) => {
	e.preventDefault();
	checkservices();
});

function checkservices() 
{
	const client_name_Value = client_name_services.value.trim();
	const client_address_Value = client_address_service.value.trim();
	const client_request_Value = client_request_service.value;
	const selector_value = selector.value;
	
	if(client_name_Value === '')
	{
		document.getElementById("client_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("client_name_error").style.visibility = "hidden";
	}
	
	if(client_address_Value === '')
	{
		document.getElementById("client_address_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("client_address_error").style.visibility = "hidden";
	}
	
	
	if(document.querySelectorAll('input[type="radio"][value="Reinigung"]:checked').length === 0 && document.querySelectorAll('input[type="radio"][value="Reparatur"]:checked').length === 0 && document.querySelectorAll('input[type="radio"][value="Ersetzung"]:checked').length === 0 && document.querySelectorAll('input[type="radio"][value="Sonstiges"]:checked').length === 0)
	{
		document.getElementById("radio_button_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("radio_button_error").style.visibility = "hidden";
	}
	
	if(selector.options.length === 0 || selector_value === 'disabled')
	{
		document.getElementById("selector_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("selector_error").style.visibility = "hidden";
	}
	
	
	if(client_name_Value.includes(':'))
	{
		alert('Sie können keinen : im Namen Input benutzten!');
		return false;
	}
	else if(client_address_Value.includes(':'))
	{
		alert('Sie können keinen : im Adresse Input benutzten!');
		return false;
	}
	else if(client_request_Value.includes(':'))
	{
		alert('Sie können keinen : im Request Input benutzten!');
		return false;
	}
	else if(client_name_Value != '' && client_address_Value != '' && selector.options.length > 0 && selector_value != 'disabled' && (document.querySelectorAll('input[type="radio"][value="Reinigung"]:checked').length === 1 || document.querySelectorAll('input[type="radio"][value="Reparatur"]:checked').length === 1 || document.querySelectorAll('input[type="radio"][value="Ersetzung"]:checked').length === 1 || document.querySelectorAll('input[type="radio"][value="Sonstiges"]:checked').length === 1))
	{
		document.getElementById("form_services").submit();
	}
}