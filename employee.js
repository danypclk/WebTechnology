const order_list = document.getElementById('employee_orders');
const employee_feedback = document.getElementById('employee_feedback');

order_list.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionregister();
});

function displayFunctionregister()
{
	const filename = "iframe-folder/worker_list.html";
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
			document.getElementById("feedback_list").style.display = "none";
			document.getElementById("order_list").style.display = "block";
		}
}

employee_feedback.addEventListener('click', (e) => {
	e.preventDefault();
	
	displayFunctionservices();
});

function displayFunctionservices()
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
			document.getElementById("feedback_list").style.display = "block";
			document.getElementById("order_list").style.display = "none";
		}
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
      }); }
      });