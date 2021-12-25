const admin_registry = document.getElementById('admin_register');
const admin_service = document.getElementById('admin_services');
const admin_registerlist = document.getElementById('admin_register_list');
const admin_contactlist = document.getElementById('narichten');
const admin_order_list = document.getElementById('aufgabe');
const admin_rechnung_download = document.getElementById('rechnung');
const admin_feedback = document.getElementById('kunden_feedback');
const admin_delete_account = document.getElementById('delete_conto');
const admin_reset_this = document.getElementById('reset_all_files');

admin_registry.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister();
});

function displayFunctionregister()
{
	const file_list = ["register-folder/partner-file.txt", "register-folder/employee-file.txt", "register-folder/intern-file.txt", "register-folder/client-file.txt"]
	var tracker = 0;
	
	for(var i in file_list)
	{
		filename = file_list[i];
		var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			tracker = 1;
		}
	}

	if(tracker === 1)
	{
		document.getElementById("register_list").style.display = "none";
		document.getElementById("register").style.display = "block";
		document.getElementById("client_messages_list").style.display = "none";
		document.getElementById("client_feedback").style.display = "none";
		document.getElementById("services").style.display = "none";
		document.getElementById("delete_account").style.display = "none";
		document.getElementById("order_list").style.display = "none";
		document.getElementById("rechnungen_admin_download").style.display = "none";
		document.getElementById("admin_reset").style.display = "none";
	}
}

admin_order_list.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionorder();
});

function displayFunctionorder()
{
	const file_list = ["iframe-folder/worker_list.html"]
	var tracker = 0;
	
	for(var i in file_list)
	{
		filename = file_list[i];
		var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			tracker = 1;
		}
	}

	if(tracker === 1)
	{
		document.getElementById("register_list").style.display = "none";
		document.getElementById("register").style.display = "none";
		document.getElementById("client_messages_list").style.display = "none";
		document.getElementById("services").style.display = "none";
		document.getElementById("client_feedback").style.display = "none";
		document.getElementById("delete_account").style.display = "none";
		document.getElementById("order_list").style.display = "block";
		document.getElementById("rechnungen_admin_download").style.display = "none";
		document.getElementById("admin_reset").style.display = "none";
	}
}

admin_service.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
{
	const file_list = ["register-folder/partner-file.txt", "register-folder/employee-file.txt", "register-folder/intern-file.txt", "register-folder/client-file.txt"]
	var tracker = 0;
	
	for(var i in file_list)
	{
		filename = file_list[i];
		var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			tracker = 1;
		}
	}

	if(tracker === 1)
	{
		$( "#referrer" ).load( "Data/Selector/employee_selector.html" );
		document.getElementById("register_list").style.display = "none";
		document.getElementById("register").style.display = "none";
		document.getElementById("client_messages_list").style.display = "none";
		document.getElementById("services").style.display = "block";
		document.getElementById("client_feedback").style.display = "none";
		document.getElementById("delete_account").style.display = "none";
		document.getElementById("order_list").style.display = "none";
		document.getElementById("rechnungen_admin_download").style.display = "none";
		document.getElementById("admin_reset").style.display = "none";
	}
	
}

admin_registerlist.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister_list();
});

function displayFunctionregister_list()
{
	const filename = "iframe-folder/register_list.html";
	var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			document.getElementById("register").style.display = "none";
			document.getElementById("services").style.display = "none";
			document.getElementById("client_messages_list").style.display = "none";
			document.getElementById("register_list").style.display = "block";
			document.getElementById("client_feedback").style.display = "none";
			document.getElementById("delete_account").style.display = "none";
			document.getElementById("order_list").style.display = "none";
			document.getElementById("rechnungen_admin_download").style.display = "none";
			document.getElementById("admin_reset").style.display = "none";
		}
}

admin_contactlist.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctioncontact_list();
});

function displayFunctioncontact_list()
{
	const filename = "iframe-folder/contact_us_list.html";
	var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			document.getElementById("register").style.display = "none";
			document.getElementById("services").style.display = "none";
			document.getElementById("register_list").style.display = "none";
			document.getElementById("client_messages_list").style.display = "block";
			document.getElementById("client_feedback").style.display = "none";
			document.getElementById("delete_account").style.display = "none";
			document.getElementById("order_list").style.display = "none";
			document.getElementById("rechnungen_admin_download").style.display = "none";
			document.getElementById("admin_reset").style.display = "none";
		}
}

admin_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionfeedback();
});

function displayFunctionfeedback()
{
	const filename = "iframe-folder/feedback.html";
	var response = jQuery.ajax({
		url: filename,
		type: 'HEAD',
		async: false
		}).status;	
	
		if(response != "200") 
		{
			alert('Files do not exist, you have to log yourself in first.');
			return false;
		}
		else
		{
			document.getElementById("register").style.display = "none";
			document.getElementById("services").style.display = "none";
			document.getElementById("order_list").style.display = "none";
			document.getElementById("register_list").style.display = "none";
			document.getElementById("client_messages_list").style.display = "none";
			document.getElementById("client_feedback").style.display = "block";
			document.getElementById("delete_account").style.display = "none";
			document.getElementById("rechnungen_admin_download").style.display = "none";
			document.getElementById("admin_reset").style.display = "none";
		}
}

admin_rechnung_download.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctioninvoice_list();
});

function displayFunctioninvoice_list()
{
	$( "#rechnungen_liste_admin" ).load( "Data/Selector/client_invoice.html" );
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "block";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
}

admin_delete_account.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctiondelete_list();
});

function displayFunctiondelete_list()
{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "block";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
}

admin_reset_this.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionreset();
});

function displayFunctionreset()
{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "block";
}



/* toggle switch for mitteilungen */

var admin_mitteilungen = document.getElementById('admin_mitteilung');

function myfunctionToggle(x) 
{
	var isOpen = false;
	
	function openSection()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "block";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
	isOpen = true;
	}

	function openotherSection()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "block";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
	isOpen = false;
	}
    admin_mitteilungen.addEventListener('click', (e) => {
		e.preventDefault();
	
		displayFunctiontoggle();
		});
	
		function displayFunctiontoggle()
		{
			if(x.matches)
			{
				if(isOpen === true)
				{
					openotherSection();
				}
				else
				{
					openSection();
				}
			}
		}
}

var x = window.matchMedia("(max-width: 1181px)")
myfunctionToggle(x);
x.addListener(myfunctionToggle);


/* toggle switch for services orders and pdf list */

const admin_service_orders_and_pdfs = document.getElementById('admin_orders_and_pdfs');


function myfunctionToggle_services(y) 
{
	var isOpeny = false;
	
	function openSectiony()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("register_list").style.disftzfplay = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "block";
	document.getElementById("admin_reset").style.display = "none";
	isOpeny = true;
	}

	function openotherSectiony()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "block";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
	isOpeny = false;
	}
	
    admin_service_orders_and_pdfs.addEventListener('click', (e) => {
		e.preventDefault();
	
		displayFunctiontoggle_services();
		});
	
		function displayFunctiontoggle_services()
		{
			if (y.matches) 
			{
				if(isOpeny === true)
				{
					openotherSectiony();
				}
				else
				{
					openSectiony();
				}
			}
		}
}

var y = window.matchMedia("(max-width: 1181px)")
myfunctionToggle_services(y);
y.addListener(myfunctionToggle_services);

/* toggle switch for delete account and reset form */

const admin_delete_reset = document.getElementById('admin_delete');


function myfunctionToggle_delete_reset(z) 
{
	var isOpenz = false;
	
	function openSectionz()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("register_list").style.disftzfplay = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "block";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "none";
	isOpenz = true;
	}

	function openotherSectionz()
	{
	document.getElementById("register").style.display = "none";
	document.getElementById("services").style.display = "none";
	document.getElementById("order_list").style.display = "none";
	document.getElementById("register_list").style.display = "none";
	document.getElementById("client_messages_list").style.display = "none";
	document.getElementById("client_feedback").style.display = "none";
	document.getElementById("delete_account").style.display = "none";
	document.getElementById("rechnungen_admin_download").style.display = "none";
	document.getElementById("admin_reset").style.display = "block";
	isOpenz = false;
	}
	
    admin_delete_reset.addEventListener('click', (e) => {
		e.preventDefault();
	
		displayFunctiontoggle_delete_reset();
		});
	
		function displayFunctiontoggle_delete_reset()
		{
			if (z.matches) 
			{
				if(isOpenz === true)
				{
					openotherSectionz();
				}
				else
				{
					openSectionz();
				}
			}
		}
}

var z = window.matchMedia("(max-width: 1181px)")
myfunctionToggle_delete_reset(z);
z.addListener(myfunctionToggle_delete_reset);

$(document).scroll(function(){
          var scrollAmount = $(window).scrollTop();
          var navHeight = $("nav").height();
		  var documentWidth = $(document).width();
		  var calibrater = scrollAmount-navHeight;
		  if(documentWidth > 1181)
		  {
			if(calibrater < 20)
			{
				$(".sidebar_menu").css({
				top: -calibrater + 'px'
				});
			}
			else
			{
				$(".sidebar_menu").css({
				top: 0
				});
			}
		   }
		   else
		   {
			   $(".sidebar_menu").css({
				top: 120
				});
		   }
      });