<?php 
//Start the session
session_start(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>My Moviecollection</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="jquery-1.2.6.min.js"></script><!--Plugin to slideshow from JQuery-->
		<script type="text/javascript" src="jqueryscript.js"></script>
		<script type="text/javascript" src="jqueryscripttwo.js"></script>
	<body>
<?php
			//Connect a variable to CSS
			$index = 'navmarker';
			$guestbook = 'navmarker';
			$movietips = 'navmarker';
			$movies = 'navmarker';
			$about = 'navmarker';
			$contact = 'navmarker';
			$login = 'navmarker';
			$admin = 'navmarker';
			
			//Check the file-name and remove the Prefix.
			$navActive = basename($_SERVER['PHP_SELF'],".php");
			//The if-statement check which patch is selected and connect the CSS to a variable.
			if ($navActive == "index")
			{
				$index = 'navmarkeractive';
			}
			else if ($navActive == "movies")
			{
				$movies = 'navmarkeractive';
			}
			else if ($navActive == "movietips")
			{
				$movietips = 'navmarkeractive';
			}
			else if ($navActive == "guestbook")
			{
				$guestbook = 'navmarkeractive';
			}
			else if ($navActive == "about")
			{
				$about = 'navmarkeractive';
			}
			else if ($navActive == "contact")
			{
				$contact = 'navmarkeractive';
			}
			else if ($navActive == "login")
			{
				$login = 'navmarkeractive';
			}
			else if ($navActive == "admin")
			{
				$admin = 'navmarkeractive';
			}
?>			
		<div id="header">
			<h1>My Moviecollection</h1>
			<p><a href="https://github.com/patrik1970/mymoviecollection.git" target="_blank" class = "external">Click here to see code in GitHub</a></p>
			<ul id="nav" >
				<!--The class show the value in the variable.-->
				<li><a class="<?php echo $index; ?>" href="index.php">Home</a></li>
				<li><a class="<?php echo $movies; ?>" href="movies.php">Movie</a></li>
				<li><a class="<?php echo $movietips; ?>" href="movietips.php">Movie Tips</a></li>
				<li><a class="<?php echo $guestbook; ?>" href="guestbook.php">Guestbook</a></li>
				<li><a class="<?php echo $about; ?>" href="about.php">About</a></li>
				<li><a class="<?php echo $contact; ?>" href="contact.php">Contact</a></li>
<?php
				//Check the logout function.
				//The if-statement check if something is in the logout.
				if(isset($_GET['logout']))
				{
					//Logout the user.
					session_unset();
					session_destroy();
				}
				
				//Check the login function.
				//The if-statement check if there is any value in inloggad.
				if(isset($_SESSION['inloggad']))
				{
					//If there is a value in inloggad then show this in the menu.
					echo "<li><a class="."echo $admin;"." href="."admin.php".">Admin</a></li>";
				}
				else
				{
					//If there is NOT a value in inloggad then show this in the menu.
					echo "<li><a class="."echo $login;"." href="."login.php".">Login</a></li>";
				}				
?>
				
			</ul>
		</div>

		<div id="content">
