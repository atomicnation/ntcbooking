<?php include ('head.php') ?>
<link href="fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="css/fullcalendar-ext.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">

<script src="fullcalendar/moment.min.js"></script>
<script src="fullcalendar/jquery.min.js"></script>
<script src="fullcalendar/jquery-ui.custom.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<!-- POPOUP SCRIPT -->
<script src="js/form.js"></script>
<script>

$(document).ready(function() {
	$('#popupForm').hide();

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
		//Events settings
		defaultTimedEventDuration: '01:00:00',//Set Event default duration in 1h
		eventColor: '#ff0000',
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		
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
			if (view.name == 'agendaDay') {
				//alert('Clicked on: ' + date.format("DD/MM/YYYY"));
				$('#popupForm').show();
				//php communication
				//sendData(moment);
			}
			//document.location.href = 'daycal.php?q='+dateSend;
			//sendData(moment);
		},
		
		eventResizeStop: function( event, jsEvent, ui, view ) {
			//alert('Clicked on: ' + date.format("DD/MM/YYYY"));
			
			var id = event.id;
			//alert("Event ID: " + id);
			/*var newEnd = event.end.format();
			$("#start_time").val(date.format("DD/MM/YYYY HH:mm"));// hh will set 12h clock and HH 24h clock
			$("#end_time").val(dEnd.format("DD/MM/YYYY HH:mm"));
			*/
			$('#popupForm').show();
						
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

<?php include ('fixed-nav.php') ?>
<title>NTC Calendar</title>
</head>
<body>
	<div id="wrap">

		<div id="calendar"></div>
		<div style="clear:both"></div>

	</div>

	<!-- Form -->
	<div id="popupForm">
		<form action="savebooking.php" id="form" method="post" name="form">
			<img id="close" src="img/close.png" onclick ="div_hide()" />
			<h2>New Booking</h2>
			<hr />
			<input id="item_id" name="item_id" type="hidden" value=""/>
			<input id="start_time" name="start_time" type="hidden" value=""/>
			<input id="end_time" name="end_time" type="hidden" value=""/>
			<input id="name" name="name" placeholder="Name" type="text" />
			<input id="last_name" name="last_name" placeholder="Last Name" type="text" />
			<input id="email" name="email" placeholder="Email" type="text" />
			<input id="phone" name="phone" placeholder="Phone Number" type="text" />
			<textarea id="comments" name="comments" placeholder="Comments"></textarea>
			<a href="javascript:%20check_empty()" onclick="div_hide()" id="submit" type="submit">Send</a>
		</form>
	</div>
	<!-- FORM Ends Here -->

</body>
</html>