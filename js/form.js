// Validating Empty Field
function check_empty() {
	if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('phone').value == "") {
		alert("Fill All Fields !");
		div_show();
	} 
	else {
		document.getElementById('form').submit();
		alert("Form Submitted Successfully...");
	}
}
//Function To Display Popup
function div_show() {
document.getElementById('popupForm').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
	currentEvent.color = "#FF0000";
	currentEvent.start = copyEvent.start ;
	currentEvent.end = copyEvent.end;
	
	$('#calendar').fullCalendar('updateEvent', currentEvent);
	document.getElementById('popupForm').style.display = "none";
	// Launch 'revertFunc()' if the pop up has been launched by 'eventResize()'	
}