<?php include 'head.php'; ?>
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.css" rel="stylesheet">
<link href="http://fullcalendar.io/js/fullcalendar-2.3.1/fullcalendar.print.css" rel="stylesheet" media="print">
<link href="css/fullcalendar.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">

<!-- FULLCALENDAT SCRIPT -->
<script src="fullcalendar/moment.min.js"></script>
<script src="fullcalendar/jquery.min.js"></script>
<script src="fullcalendar/jquery-ui.custom.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<!-- POPOUP SCRIPT -->
<script src="js/form.js"></script>
<!------------------->

<script>

var dateX = "<?php echo $_GET['q'] ?>";


$(document).ready(function() {
	//alert(dateX);
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
	//$('#calendar').fullCalendar( 'gotoDate', currentdate);
	$('#calendar').fullCalendar({		
		//OPTIONS------------------------------------------
		defaultDate: dateX,
		defaultView: 'agendaDay',
		defaultEventMinutes: 30,
		defaultTimedEventDuration: '01:00:00',//Set Event default duration in 1h
		eventColor: '#ff0000',
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
			//alert('Dropped on: ' + date.format("DD/MM/YYYY HH:mm"));
			$('#popupForm').show();
			//php communication
			//sendData(moment);
		},
		
		
		drop: function(date, jsEvent, view) {
			
			if ($(this).attr('id') == 1){//should be if isInt
				var id = $(this).attr('id');
				$("#item_id").val(id);
				var dEnd = moment(date);
				dEnd.add(59, 'm');
				$("#start_time").val(date.format("DD/MM/YYYY HH:mm"));// hh will set 12h clock and HH 24h clock
				$("#end_time").val(dEnd.format("DD/MM/YYYY HH:mm"));
				/*
				alert(
					'item_id: ' + $(this).attr('id') + ' - ' +
					'start_time: ' + date.format("DD/MM/YYYY HH:mm") 
				);
				*/	
				
				$('#popupForm').show();
			}
			else{alert("well done, man...");}
		}
		
	});

});

</script>
<?php
$_SESSION['datepicked'] = $_GET['q'];
echo "DATE PICKED: ".$_SESSION['datepicked'];

////////////FUNCTIONS//////////////////
function checkAvailability($date){
	$connexion = new mySqlX();
	$query = "SELECT * FROM reservation WHERE item_id=".$_POST['item_id']." AND start_time=".$_POST['start_time']." BETWEEN start_time AND end_time";
	$result = $connexion->selectDB($query);
	return empty($result);
}

?>
</head>
<body>

<?php include('fixed-nav.php'); ?>


	<div id="wrap">

		<div id="external-events">
			<h4>Draggable Events</h4>
			<div id="1" class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
			<div id="2" class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
			<div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
		</div>

		<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
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
