<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.css" rel="stylesheet">
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.print.css" rel="stylesheet" media="print">
<script src="fullcalendar/moment.min.js"></script>
<script src="fullcalendar/jquery.min.js"></script>
<script src="fullcalendar/jquery-ui.custom.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<script>
var dateX = '2014-02-01';


$(document).ready(function() {
	alert(dateX);

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
	//$('#calendar').fullCalendar( 'gotoDate', currentdate);
	$('#calendar').fullCalendar({
		
		defaultDate: dateX,
		//OPTIONS------------------------------------------
		defaultView: 'agendaDay',
		defaultEventMinutes: 30,
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar
		//Define header settings
		header : {
		left : 'prevYear,prev,next,nextYear today',
		right : 'title',
		},
		//Define starting and ending hour visible in calendar
		minTime: "09:00:00",
		maxTime: "21:00:00",
		//Week starts on Monday
		firstDay: 1,
		
		//CALLBACKS------------------------------------------
		//Event when clicking over a day
		dayClick: function(date, jsEvent, view) {
			alert('Clicked on: ' + date.format("DD/MM/YYYY"));
			//php communication
			//sendData(moment);
		},
		
		
		drop: function(date, jsEvent, view) {
		// is the "remove after drop" checkbox checked?
		/*if ($('#drop-remove').is(':checked')) {
			// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}*/
			if ($(this).attr('id') == 1){
				alert('Dropped on: ' + date.format("DD/MM/YYYY hh:mm"));
			}
		}
		
	});

});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
		width: 900px;
	}

</style>
</head>
<body>
	<div id="wrap">

		<div id="external-events">
			<h4>Draggable Events</h4>
			<div id="1" class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
			<div id="2" class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
			<p>
				<input type="checkbox" id="drop-remove">
				<label for="drop-remove">remove after drop</label>
			</p>
		</div>

		<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
		<div style="clear:both"></div>

	</div>


</body></html>