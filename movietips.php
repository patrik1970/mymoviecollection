<?php
//Get header
include ("header.php");

?>

	<!--Headline-->
	<div id="filmtipsR">
		<h2>Movie Tips</h2>
	</div>
	
	<!--Square for the table-->
	<div id="filmtips">
		
		<!--The table that show the movie tips-->
		<table> 
			<tr> 
				<th>Title</th> 
				<th>Rating</th> 
				<th>Year</th> 
			</tr>

<?php
			//Database management.
			//THe connection against the database through mysql_connect("Server(host)","Username","Password","Database").
			$databas1 = @mysql_connect("Server(host)","Username","Password","Database");
			mysql_select_db("Database");//Select the valid database.
	
			//The if-statement check the possibility to connect to the server.
			if (!$databas1) 
			{
				//echo "<p>Could not connect to the server </p>";
        			echo mysql_error();
    			}
			else
			{
				//echo "<p>Successfully connected to the server </p>";
			}
	  
			//Database question.
			$fraga = "SELECT title, grade, year FROM movies LIMIT 10";
			$resultat = mysql_query($fraga); 
    
			//The if-statement check if the question is executable.
			if (false === $resultat) 
			{ 
				echo mysql_error(); 
			}
	  
			//Show the answer of the question.
			while ($kolumn = mysql_fetch_array($resultat))
    			{ 
				echo 	" <tr>" . 
				" <td>$kolumn[0]</td>" . 
				" <td>$kolumn[1]</td>" . 
				" <td>$kolumn[2]</td>" .
				" </tr>" ; 
			}
	
			//Close the database
			mysql_close($databas1);
?>
		</table>
	</div>
	
<?php
//Get footer
include ("footer.php");

?>	
