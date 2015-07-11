<?php include ('head.php') ?>
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.css" rel="stylesheet">
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.print.css" rel="stylesheet" media="print">
<link href="css/fullcalendar.css" rel="stylesheet">
<link href="css/fullcalendar-ext.css" rel="stylesheet">
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
		dayClick: function(date, jsEvent, view) {
			var dateStr = date.format("DD/MM/YYYY");
			alert('Clicked on: ' + dateStr );
			var dateSend = date.format("YYYY/MM/DD");
			document.location.href = 'daycal.php?q='+dateSend;
			//sendData(moment);
		}
		
		eventSources: [

        // your event source
        {
            url: '/myfeed.php', // use the `url` property
            color: 'yellow',    // an option!
            textColor: 'black',  // an option!
			cache: true
        }

        // any other sources...

		]
		
	});

});

</script>
<?php include ('fixed-nav.php') ?>
<title>NTC Calendar</title>
</head>
<body>
	<div id="wrap">

		<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
		<div style="clear:both"></div>

	</div>


</body>
</html>