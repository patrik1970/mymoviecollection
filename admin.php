

<?php
//Get header
include ("header.php");

?>
	<h2>Admin</h2>
	<p>Welcom to the Admin page</p>
	<P>You can add movies to the page "Movies" in the form on the left</p>
	<p><a href = "login.php?logout=true">Loguot</a></p><!--Logout button that adds a logout = true to the URL-->
<div id ="formnav">
	<div id ="filmform">
		<!--Form for entering the movies, etc-->
		<form  id = "form" action="admin.php" method="POST" >
			<fieldset style="width: 200px;">
				<div id="visafilmsparad">

<?php
					//The if-statement checks if there is an entry in the title when POST the form.
					if (isset($_POST['titel'])) 
					{
						$titel = $_POST['titel'];
						$betyg = $_POST['betyg'];
						$lanktillimdb = $_POST['lanktillimdb'];
						$lanktillbild = $_POST['lanktillbild'];
						$handling = $_POST['handling'];
					
						if(!empty($titel)) 
						{
							//Writes to file with a ; character between each input and a \ n line break after the last input.
							$handle = fopen ('movies.txt', 'a');
							fwrite($handle, $titel .";");
							fwrite($handle, $betyg .";");
							fwrite($handle, $lanktillimdb .";");
							fwrite($handle, $lanktillbild .";");
							fwrite($handle, $handling .";"."\n");
							fclose ($handle);
							echo "The movie is saved";
						}
					}
?>
				</div>
				<legend><h3>Add a movie</h3></legend>
				<p>Title:</p>
				<input type="text" name="titel" id="titelphp">
						
				<p>Rating:</p>
				<select name="betyg" id="betygphp">
					<option value="">Choose Rating...</option>
					<option value="*">1</option>
					<option value="**">2</option>
					<option value="***">3</option>
					<option value="****">4</option>
					<option value="*****">5</option>
				</select>
						
				<p>Link to imdb:</p>
				<input type="text" name="lanktillimdb" id="imdbphp">
						
				<p>Link to image:</p>
				<input type="text" name="lanktillbild" id="bildphp">
						
				<p>Movie review: </p>
				<textarea name="handling" rows="4" cols="20" id="textareaphp"></textarea>
						
				<input type="submit"  id="skickaphp" value="Save">

			</fieldset>
			
		</form>
	</div>
</div>


<?php
//Get footer
include ("footer.php");

?>	
