const form_delete_account = document.getElementById('form_delete');
const name_konto_input = document.getElementById('name_konto');

form_delete.addEventListener('submit', (e) => {
	e.preventDefault();
	checkservices();
});

function checkservices() 
{
	const name_Value = name_konto_input.value.trim();
	
	if(name_Value === '')
	{
		document.getElementById("konto_name_error").style.visibility = "visible";
	}
	else
	{
		document.getElementById("konto_name_error").style.visibility = "hidden";
	}
	
	if(name_Value.includes(':'))
	{
		alert('Sie können keinen : im Namen Input benutzten!');
		return false;
	}
	else if(name_Value === 'admin')
	{
		alert('Sie können nicht admin löschen!');
		return false;
	}
	else if(name_Value != '')
	{
		document.getElementById("form_delete").submit();
	}
}