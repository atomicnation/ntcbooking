
// Validating Empty Field
function check_form(formID) {
	if(formID == 'newEvF'){
		if (document.getElementById('name').value == "" || document.getElementById('last_name').value == "" || !validateEmail(document.getElementById('email').value) || isNan(document.getElementById('phone').value)) {
			alert("Fill All Fields !");
		} 
		else {
			document.getElementById(formID).submit();
			alert("Form Submitted Successfully...");
		}
		
	}
	
}
//Function To Display Popup
function div_show(formID) {
	document.getElementById(formID).style.display = "block";
}


//Function to Hide Popup
function div_hide(formID){
	if (currentEvent){
		currentEvent.color = "#FF0000";
		currentEvent.start = copyEvent.start ;
		currentEvent.end = copyEvent.end;	
		$('#calendar').fullCalendar('updateEvent', currentEvent);
	}
	
	document.getElementById(formID).style.display = "none";
	// Launch 'revertFunc()' if the pop up has been launched by 'eventResize()'	
}

function dataDisplay(){
	alert("Event ID = " + currentEvent.id + " - Event Start: " + currentEvent.start.format() + " - Event End: " + currentEvent.end.format());
}

//Is email?
function validateEmail(elementValue){        
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
	return emailPattern.test(elementValue);   
 }  