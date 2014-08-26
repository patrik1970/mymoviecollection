$(document).ready(function(){
	//Script for the Guestbook.
	//Keypress
	$("#laggTill").bind("click", function(){
		var namn = $("#nyttNamn").val();//Transfer the value from the input field to the variable namn.
		var meddelande = $("#nyttMeddelande").val();//Transfer the value from the input field to the variable meddelande.
		
		if (namn == "")//The If-statement checks if the variable namn contains any value. 
		{
			$('#nyttNamn').css('background-color', 'red');//If there is no value in the variable namn mark the field red.
			alert("Please write your name !");//Show this message.
			$('#nyttNamn').css('background-color', 'white');//Make the input field white.
			return false;
		}
		else if (meddelande == "")//The If-statement checks if the variable meddelande contains any value.
		{
			$('#nyttMeddelande').css('background-color', 'red');//If there is no value in the variable meddelande mark the field red.
			alert("Please write your message !");//Show this message.
			$('#nyttMeddelande').css('background-color', 'white');//Make the input field white.
			return false;
		}
		
		//Ajax call
		$.ajax({
			url: "server.php?action=nyttNamn",//Specifies the URL that the query should be sent to. In this case only made ​​inquiry about the text field nyttNam is filled.
			type: "POST",//POST used when the information you are sending exceeds a certain size.
			data: {namn: namn, meddelande: meddelande},//Gets the value of the variables.
			success: function(data){
				if(data == "true")//The If-statement checks if the values in data ​​were saved correctly in the database.
				{
					$("#gastut").prepend("<li><p>"+namn+": "+meddelande+"</p></li>");//Show the values from the input fields.
					$("#nyttNamn").val("");//Empty the input field nyttNamn.
					$("#nyttMeddelande").val("");//Empty the input field nyttMeddelande.
				}
				else
				{
					alert("Something went wrong with the saving");//If the value not were saved show this message.
				}
			},
			error: function(xhr, error){
				alert("Could not connect to the server file");//If there was no connection to the server file show this message.
			}
		});
	});

	

});
