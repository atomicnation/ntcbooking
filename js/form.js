
function check_form(divID, formID) {
	/*
	if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('comments').value == "") {
			alert("Fill All Fields ! Form ID : " + formID);
			div_show(divID);
		} 
	else {
		document.getElementById(formID).submit();
		alert("Form Submitted Successfully...");			
	}
	*/
	
	var valName = validateString($("#name").val());
	var valLast = validateString($("#last_name").val());
	var valEmail = validateEmail($("#email").val());	
	var valPhone = validatePhone($("#phone").val());
	//alert(valPhone);
	
	if(valName && valLast && valEmail && valPhone){
		document.getElementById(formID).submit();
		alert("Form Submitted Successfully...");
		div_hide(divID);
	}
	
	else{
		//alert("xxxxxxxxxxxxxxxxxxxxxx");
		
		if (!valName) {
			$("#name").addClass('has-danger');
			$("#name").next().css('display', 'inline');
		}
		else{
			$("#name").removeClass('has-danger');
			$("#name").next().css('display', 'none');
		}
		if (!valLast) {
			$("#last_name").addClass('has-danger');		
			$("#last_name").next().css('display', 'inline');
		}
		else{
			$("#last_name").removeClass('has-danger');
			$("#last_name").next().css('display', 'none');
		}
		if (!valEmail) {
			$("#email").addClass('has-danger');		
			$("#email").next().css('display', 'inline');
		}
		else{
			$("#email").removeClass('has-danger');
			$("#email").next().css('display', 'none');
		}
		if (!valPhone) {
			$("#phone").addClass('has-danger');
			$("#phone").next().css('display', 'inline');
		}
		else{
			$("#phone").removeClass('has-danger');
			$("#phone").next().css('display', 'none');
		}
	}
	
}	
// Form Validation Functions //////////////////////////////////////////////
function validateString(s){
	 return (s != "");
 }

function validateEmail(e){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(e);
	//return (e != "");
 } 

function validatePhone(p){
	//Accepts numbers with 8 to 10 character length
	var phonePattern = /^[0-9]{8,10}$/;
	return phonePattern.test(p);
}
//////////////////////////////////////////////////////////////////////////
//Function to Hide Popup
function div_hide(divID){
	if (currentEvent){
		currentEvent.color = "#FF0000";
		currentEvent.start = copyEvent.start ;
		currentEvent.end = copyEvent.end;	
		$('#calendar').fullCalendar('updateEvent', currentEvent);
	}
	else{alert("No event saved!!!");}
	document.getElementById(divID).style.display = "none";
	// Launch 'revertFunc()' if the pop up has been launched by 'eventResize()'	
}
/*
// Validating Empty Field
function check_form(divID, formID) {
	$(document).ready(function(){
		if ($("#name").value == "") {
			alert("Fill All Fields ! Form ID : " + formID);
			div_show(divID);
			} 
		else {
			//document.getElementById(formID).submit();
			alert("Form Submitted Successfully...");			
		}
	}	
}

//Function To Display Popup
function div_show(divID) {
	document.getElementById(divID).style.display = "block";
}


function dataDisplay(){
	alert("Event ID = " + currentEvent.id + " - Event Start: " + currentEvent.start.format() + " - Event End: " + currentEvent.end.format());
}
 */
  
