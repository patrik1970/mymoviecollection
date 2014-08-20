
<?php
//Get header
include ("header.php");

?>

	<h2>Login</h2>
	<div id ="inloggning">
		<!--Form for login-->
		<form  id = "form" action="login.php" method="POST" >
			<fieldset style="hight: 400px;">
			<div id="inneform">
				<div id="visafelloggin">
<?php			
				if (isset($_POST['anvandarnamn'])) 
				{
					$anvandarnamn = $_POST['anvandarnamn'];//The username entered is placed in a variable.
					$losenord = $_POST['losenord'];//The password entered is placed in a variable.
					$losenord = md5($losenord);//md5 hashing of the password.
					
					//Database management
					//The connection against the database through mysql_connect("Server(host)","Username","Password","Database").
					$databas1 = mysql_connect("Server(host)","Username","Password","Database");
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
					
					//Preventing Injection Attacks. Read more on http://www.tizag.com/mysqlTutorial/mysql-php-sql-injection.php 
					$anvandarnamn = stripslashes($anvandarnamn);
					$losenord = stripslashes($losenord);
					$anvandarnamn = mysql_real_escape_string($anvandarnamn);
					$losenord = mysql_real_escape_string($losenord);
					
					//Database question.
					$fraga = "SELECT * FROM users WHERE anvandarnamn='$anvandarnamn' and losenord='$losenord'";
					$resultat = mysql_query($fraga); 
    
					// Mysql_num_row counts the row in the table.
					$count=mysql_num_rows($resultat);


					// The if-statement checks if $anvandarnamn and anvandarnamn and that $losenord and loserord are the same then $count=1.
					if($count==1)
					{
						$_SESSION ['inloggad'] = $anvandarnamn;//Puts the username in the session variable.
						Header("location: admin.php");//If both the username and password matches as you switched on to a new page.
					}
					else 
					{
						echo "Wrong Username or Password";//If the username and password does not match displays this error message.
					}

					//Close the database
					mysql_close($databas1);
					
				}				
?>
				</div>
				<!--Input fields for username-->
				<p>Username:</p>
				<input type="text"  name="anvandarnamn" id="anvandarnamn" class="textruta">
				<p></p>
				<!--Input fields for password-->
				<p>Password:</p>
				<input type="text" name="losenord" id="losenord" class="textruta">
				<p></p>
				<input type="submit"  id="loggain" value="Login">
				</div>
			</fieldset>
		</form>
	</div>

		

<?php
//Get footer
include ("footer.php");

?>	
