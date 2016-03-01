<?php
//Get header.
include ("header.php");

?>
	
	<!--Headline-->
	<div id="gastb">
		<h2>Guestbook</h2>
	</div>
	
	<!--The form for input of new post-->
	<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
		<tr>
			<td><strong>Post new message </strong></td>
		</tr>
	</table>
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<form id="form1" name="form1" method="post" action="#">
				<td>
					<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
						<tr>
							<td width="117">Name</td>
							<td width="14">:</td>
							<td width="357"><input name="name" type="text" id="nyttNamn" size="40" /></td>
						</tr>
						<tr>
							<td valign="top">Message</td>
							<td valign="top">:</td>
							<td><textarea name="comment" cols="40" rows="3" id="nyttMeddelande"></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="button" id="laggTill" value="Post message" /> <input type="reset" name="Submit2" value="Reset" /></td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>
	
	<div id="innegastb">
		
		<!--Database management-->
		<ul id="gastut">
			<h3>Posted messages</h3>
<?php
			//Connection to the database.
			$db = mysqli_connect("Server(Host)","Username","Password","Database");
			
			//The SQL question to get all the data from the table gest.
			$sql = mysqli_query($db, "SELECT * FROM gest ORDER BY id DESC");
			
			//Lists the contents of the database by criteria from the SQL question.
			while($row = mysqli_fetch_assoc($sql))
			{
				echo "<li>".strip_tags($row['namn']).": ".strip_tags($row['meddelande']).": ".$row['tid']."</li><br>";
				echo "<hr>";
			}
?>		
		</ul>
	</div>

<?php
//Get footer.
include ("footer.php");

?>	
