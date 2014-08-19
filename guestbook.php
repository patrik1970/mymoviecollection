<?php
//Get header.
include ("header.php");

?>
	<!--Headline-->
	<div id="gastb">
		<h2>Guestbook</h2>
	</div>
	
	<!--The form for input of new post-->
	<div id="innegastb">
		<p>Post new message</p>
		<form action="#">
			<label for="nyttNamn">Name:</label>
			<input type="text" id="nyttNamn">
			<label for="nyttMeddelande">Message:</label>
			<textarea name="meddelande" rows="3" cols="15" id="nyttMeddelande"></textarea>
			<input type ="button" value="Post message" id="laggTill">
		</form>
		
		<!--Database management-->
		<ul id="gastut">
<?php
			//Connection to the database.
			$db = mysqli_connect("localhost","m11p0652","qwerty","m11p0652");
			
			//The SQL question to get all the data from the table gest.
			$sql = mysqli_query($db, "SELECT * FROM gest ORDER BY id DESC");
			
			//Lists the contents of the database by criteria from the SQL question.
			while($row = mysqli_fetch_assoc($sql)){
				echo "<li>".$row['namn'].": ".$row['meddelande'].": ".$row['tid']."</li><br>";
			}
?>		
		</ul>
		
	</div>

<?php
//Get footer.
include ("footer.php");

?>	
