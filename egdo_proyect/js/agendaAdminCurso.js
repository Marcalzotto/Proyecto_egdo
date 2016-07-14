var yy;
	var calendarArray =[];
	var monthOffset = [6,7,8,9,10,11,0,1,2,3,4,5];
	var monthArray = [["ENE","Enero"],["FEB","Febrero"],["MAR","Marzo"],["ABR","Abril"],["MAY","Mayo"],["JUN","Junio"],["JUL","Julio"],["AGO","Agosto"],["SEP","Septiembre"],["OCT","Octubre"],["NOV","Noviembre"],["DIC","Diciembre"]];
	var letrasArray = ["L","M","X","J","V","S","D"];
	var dayArray = ["7","1","2","3","4","5","6"];
	$(document).ready(function() 
	{
		$(document).on('click','.calendar-day.have-events',activateDay);
		$(document).on('click','.specific-day',activatecalendar);
		$(document).on('click','.calendar-month-view-arrow',offsetcalendar);
		$(window).resize(calendarScale);
		/*$(".calendar").calendar({
			"2013910": {
				"": {
					idevento: ""
				}
			}
		});*/
		calendarSet();
		calendarScale();
		
		
		$('body').on('click', '.colorbox', function(e) 
		{
			e.preventDefault();
			$.colorbox({href:$(this).attr('href'), open:true,iframe:true,innerWidth:"600px",innerHeight:"340px",overlayClose:false,onClosed:function() { location.reload(true); } });
			return false;
		});
		
		
		
	});