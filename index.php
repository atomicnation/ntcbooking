<?php include ('head.php') ?>
<link href="fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="css/fullcalendar-ext.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">

<script src="fullcalendar/moment.min.js"></script>
<script src="fullcalendar/jquery.min.js"></script>
<script src="fullcalendar/jquery-ui.custom.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<!-- POPOUP SCRIPT -->
<script src="js/form.js" type="text/javascript"></script>
<script>
var launchRev = false;
var copyEvent;
var currentEvent;
var oldEnd;
$(document).ready(function() {
	$('#newEvForm').hide();
	$('#editEvForm').hide();
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
		//Define time format
		timeFormat: 'HH:mm',
		//Define header settings
		header : {
			left : 'prevYear,prev,next,nextYear today',
			center : 'title',
			right : 'month,agendaWeek,agendaDay'
		},
		//Define starting and ending hour visible in calendar
		minTime: "09:00:00",
		maxTime: "21:00:00",
		//Remove the All Day Event frame at the top of the day view
		allDaySlot: false,
		
		//Week starts on Monday
		firstDay: 1,
		//Events settings
		defaultTimedEventDuration: '01:00:00',//Set Event default duration in 1h
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		
		//CALLBACKS------------------------------------------
		//Event when clicking over a day
		dayClick: function(date, jsEvent, month) {
			var dateStr = date.toISOString();
			//alert('Clicked on: ' + dateStr );
			var view = $('#calendar').fullCalendar('getView');			
			//alert(view.name);
			var dateSend = date.toISOString();
			if (view.name == 'month' || view.name == 'agendaWeek' ){
				
				$('#calendar').fullCalendar('changeView', 'agendaDay');
				$('#calendar').fullCalendar('gotoDate', date);
			}
			if (view.name == 'agendaDay') {
				//alert('Clicked on: ' + date.format("DD/MM/YYYY"));
				$("#start_time").val(dateStr);
				dateEnd = date.add(1, 'hours');
				dateStr = dateEnd.toISOString();
				$("#end_time").val(dateStr);
				alert('Clicked on: ' + dateStr );
				$('#newEvForm').show();
				
				//php communication
				//sendData(moment);
			}
			//document.location.href = 'daycal.php?q='+dateSend;
			//sendData(moment);
		},
		
		eventResizeStart: function( event, jsEvent, ui, view ) {
			copyEvent = {id:event.id, title:event.title, start:event.start,end:event.end, color:event.color};
	
		},
		
		eventResizeStop: function( event, jsEvent, ui, view ) {
			//alert('Clicked on: ' + date.format("DD/MM/YYYY"));
			currentEvent = event;
			$('#editEvForm').show();
		},
		
		eventDragStart: function( event, jsEvent, ui, view ) {
			copyEvent = {id:event.id, title:event.title, start:event.start,end:event.end, color:event.color};
	
		},
		
		eventDrop: function( event, jsEvent, ui, view ) {
			currentEvent = event;
			var id = event.id;
			$('#editEvForm').show();
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
	
	$("#submit").on('click', function(){
			//alert('button clicked');
			check_form('newEvForm', 'newEvF');
		}
    );

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
	<div id="newEvForm" class="popupForm">
		<form action="savebooking.php" id="newEvF" method="post" name="form">
			<img id="close" src="img/close.png" onclick ="div_hide('newEvForm')" />
			<h2>New Booking</h2>
			<hr />
			<input id="item_id" name="item_id" type="hidden" value=""/>
			<input id="start_time" name="start_time" type="hidden" value=""/>
			<input id="end_time" name="end_time" type="hidden" value=""/>
			<input id="user_id" name="user_id" type="hidden" value=""/>
			<input id="name" name="name" placeholder="Name" type="text" />
			<p class='bg-danger'>Please introduce the name of the booker</p>
			<input id="last_name" name="last_name" placeholder="Last Name" type="text" />
			<p class='bg-danger'>Please introduce the last name of the booker</p>
			<input id="email" name="email" placeholder="Email" type="text" />
			<p class='bg-danger'>Please introduce a valid email address</p>
			<input id="phone" name="phone" placeholder="Phone Number" type="text" />
			<p class='bg-danger'>Please introduce a valid phone</p>
			<textarea id="comments" name="comments" placeholder="Comments"></textarea>
			<a href="#" id="submit" type="submit">Send</a>
		</form>
	</div>
	<!-- FORM Ends Here -->
	<!-- Form -->
	<div id="editEvForm" class="popupForm">
		<form action="savebooking.php" id="editEvF" method="post" name="form">
			<img id="close" src="img/close.png" onclick ="div_hide('editEvForm')" />
			<h2>Booking Edit</h2>
			<hr />
			<input id="item_id" name="item_id" type="hidden" value=""/>
			<input id="start_time" name="start_time" type="hidden" value=""/>
			<input id="end_time" name="end_time" type="hidden" value=""/>
			<p>Close this form if you don't want to apply this changes over the booking</p>
			<a href="javascript:%20check_form('editEvF')" onclick="div_hide('editEvForm')" id="submit2" type="submit">Send</a>
		</form>
	</div>
	<!-- FORM Ends Here -->

</body>
</html>