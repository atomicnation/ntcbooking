
// Validating Empty Field
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
		if(formID == 'newEvF'){
			var name = document.getElementById('name');
			if( name.value == ""){
				name.value = "FILL THIS FIELD";
				name.style.borderColor = "#FF0000";
				name.style.borderWidth = "2px"
				name.style.backgroundColor = "#F5D0E6";
				//$("#item_id").prepend("<p class='bg-danger'><strong>Name</strong>can't be empty!</p>");
			}
			/*
			if(document.getElementById('last_name').value == ""){
				document.getElementById(formID).innerHTML("<p class='bg-danger'><strong>Last Name</strong>can't be empty!</p>");
			}
			
			if(!validateEmail(document.getElementById('email').value){
				document.getElementById(formID).innerHTML("<p class='bg-danger'>Please introduce a valid<strong>email address</strong></p>");
			}
			if(isNan(document.getElementById('phone').value)){
				document.getElementById(formID).innerHTML("<p class='bg-danger'>Please introduce a valid<strong>phone number</strong>(only numbers allowed).</p>");
			} 
			*/
			else {
				//document.getElementById(formID).submit();
				alert("Form Submitted Successfully...");
				div_hide(divID);
			}
		}
		else{ 			
			alert("Ooooops!");
			//alert("Form id: " + formID)
		}
	
	//alert("XXXXXXXXXXXXXX");
}
//Function To Display Popup
function div_show(divID) {
	document.getElementById(divID).style.display = "block";
}


//Function to Hide Popup
function div_hide(divID){
	if (currentEvent){
		currentEvent.color = "#FF0000";
		currentEvent.start = copyEvent.start ;
		currentEvent.end = copyEvent.end;	
		$('#calendar').fullCalendar('updateEvent', currentEvent);
	}
	document.getElementById(divID).style.display = "none";
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