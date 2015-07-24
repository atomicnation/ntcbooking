/*************************************************************************************
 *																					 *
 *	Fullcalendar Script. Many thanks to www.fullcalendar.io project developers   	 *
 *																					 *
 *************************************************************************************/

//var usrType = '@Session["usrType"]';
var usrType = "reg";
var launchRev = false;
var copyEvent;
var currentEvent;
var oldEnd;
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
	
	//OPTIONS------------------------------------------------------------//
	var options =
	{		
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
		
		//CALLBACKS----------------------------------------------------//
		//Event when clicking over a day
		dayClick: function(date, jsEvent, month) {
			//Get the actual view of the calendar
			var view = $('#calendar').fullCalendar('getView');	
			//Convert date to ISO 8601 string date format
			var dateStr = date.toISOString();
			//var dateSend = date.toISOString();
			//
			if (view.name == 'month' || view.name == 'agendaWeek' ){
				
				$('#calendar').fullCalendar('changeView', 'agendaDay');
				$('#calendar').fullCalendar('gotoDate', date);
			}
			if (view.name == 'agendaDay') {
				//alert('Clicked on: ' + date.format("DD/MM/YYYY"));
				if((usrType == "adm") || (usrType == "reg")){
					$("#start_time").val(dateStr);
					dateEnd = date.add(1, 'hours');
					dateStr = dateEnd.toISOString();
					$("#end_time").val(dateStr);
					alert('Clicked on: ' + dateStr );
					$('#newEvForm').show();
					
					//php communication
					//sendData(moment);
				}
				
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
			
		]*/	
		
	}
	
	if(usrType == "adm") {
		$('#calendar').fullCalendar(options);
	}
	else if(usrType == "anon"){
		options.editable = false;
		$('#calendar').fullCalendar(options);
	}
	else{
		options.editable = false;
		$('#calendar').fullCalendar(options);
	}
	
	$("#submit").on('click', function(){
			//alert('button clicked');
			check_form('newEvForm', 'newEvF');
		}
    );

});