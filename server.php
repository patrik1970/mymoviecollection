<?php
	//Connection to the database.
	$db = mysqli_connect("Server(host)","Username","Password","Database");

	//Write to the database
	if(isset($_GET['action']) && $_GET['action'] == "nyttNamn")//The if-statment checks so the input field nyttNamn contains any value.
	{
		//Prevent SQL injection attacks.
		$namn = mysqli_real_escape_string($db, $_POST['namn']);
		$meddelande = mysqli_real_escape_string($db, $_POST['meddelande']);
	
		//The if-statment checks if it´s possible to execute the SQL question to put the value in namn and meddelane in the row namn and meddelande in the table gest.
		if(mysqli_query($db, "INSERT INTO gest (namn,meddelande) VALUES ('$namn','$meddelande')"))
		{
			echo "true";//If the SQL question is true then send a true to the Ajax call.
		}
		else
		{
			echo "false";//If the SQL question is false then send a false to the Ajax call.
		}
	}
?>
