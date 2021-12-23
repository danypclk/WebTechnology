const client_feedback = document.getElementById('client_feedback');
const client_invoice = document.getElementById('client_rechnung');

client_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionfeedback();
});

function displayFunctionfeedback()
{
	$( "#business_list" ).load( "Data/Selector/partner_employee_selector.html" );
	document.getElementById("feedback").style.display = "block";
	document.getElementById("rechnungen_download").style.display = "none";
}

client_invoice.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctioninvoice();
});

function displayFunctioninvoice()
{
	//$( "#rechnungen_download_liste" ).load( "Data/Selector/partner_employee_selector.html" );
	document.getElementById("feedback").style.display = "none";
	document.getElementById("rechnungen_download").style.display = "block";
}

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