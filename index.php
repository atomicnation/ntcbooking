<?php include ('head.php') ?>
<link href="fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="fullcalendar/fullcalendar-ext.css" rel="stylesheet">
<script src="fullcalendar/moment.min.js"></script>
<script src="fullcalendar/jquery.min.js"></script>
<script src="fullcalendar/jquery-ui.custom.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<script>

$(document).ready(function() {

	/* initialize the external events
	-----------------------------------------------------------------*/
	$('#external-events .fc-event').each(function() {
		// store data so the calendar knows to render an event upon drop
		$(this).data('event', {
			title: $.trim($(this).text()), // use the element's text as the event title
			stick: true // maintain when user navigates (see docs on the renderEvent method)
		});
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
	});


		/* initialize the calendar
		-----------------------------------------------------------------*/

	$('#calendar').fullCalendar({
			//OPTIONS------------------------------------------
		//Define header settings
		header : {
			left : 'prevYear,prev,next,nextYear today',
			center : 'title',
			right : 'month,agendaWeek,agendaDay'
		},
		//Define starting and ending hour visible in calendar
		minTime: "09:00:00",
		maxTime: "21:00:00",
		//Week starts on Monday
		firstDay: 1,
		
		//CALLBACKS------------------------------------------
		//Event when clicking over a day
		dayClick: function(date, jsEvent, month) {
			var dateStr = date.format("DD/MM/YYYY");
			//alert('Clicked on: ' + dateStr );
			var view = $('#calendar').fullCalendar('getView');			
			//alert(view.name);
			var dateSend = date.format("YYYY/MM/DD");
			if (view.name == 'month' || view.name == 'agendaWeek' ){
				$('#calendar').fullCalendar('changeView', 'agendaDay');
				$('#calendar').fullCalendar('gotoDate', date);
			}
			
			//document.location.href = 'daycal.php?q='+dateSend;
			//sendData(moment);
		},
		
		events: 'events.php'
		/*[
		
			{
				title  : 'event 1',
				start  : '2015-07-06'
			},
			{
				title  : 'event 2',
				start  : '2015-07-11T12:00:00',
				end  : '2015-07-11T13:00:00',
				allDay : false // will make the time show
			},
			{
				title  : 'event 3',
				start  : '2015-07-11T12:00:00',
				end  : '2015-07-11T13:00:00',
				allDay : false, // will make the time show
				color: '#f0ad4e',
				borderColor: '#eea236',
				className: 'PEDRITO',
				editable: true,
				startEditable: true,
				surationEditable:true
			}
			
		]		*/
		
		
	});

});

</script>
<style>

	body {
		margin: 70px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>

<?php include ('fixed-nav.php') ?>
<title>NTC Calendar</title>
</head>
<body>
	<div id="wrap">

		<div id="calendar"></div>
		<div style="clear:both"></div>

	</div>


</body>
</html>