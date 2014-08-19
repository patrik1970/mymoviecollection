include ("header.php");

?>
	
	<!--Show movie list-->
	<div id ="article">
		<h2>Movies</h2>
		<div id="visaFilm">
		
<?php
			//The function EXPLODE is a breakdown by certain criteria.
			$filename = 'movies.txt';
			$handle = fopen ($filename, 'r');
			$datain = fread($handle, filesize($filename));

			$filmlista_array = explode("\n", $datain);//Deletes the linebreakes.
			
			$length=count($filmlista_array);//Count what's in the list.
                                
			if(isset($_GET['title']))//Gets the Title from the URL bar.
			
				//Show the movieinformation from GET.
				for($i=0;$i<$length;$i++)//Loops through the movie list.
                {
					$filmInfo = explode(";", $filmlista_array[$i]);
                    if(($_GET['title']) == $filmInfo[0])
                    {
                        echo "<h3>".$filmInfo[0]."</h3>";
						echo "<span><img src=".$filmInfo[3]." alt=".$filmInfo[0]."></span>";
						echo "<p>".$filmInfo[4]."</p>";
						echo "<p><b>Betyg: </b>".$filmInfo[1]."</p>";
						echo "<p><b>Länk till IMDB: </b><a href=".$filmInfo[2].">$filmInfo[2]</a>";
					}
                }
				else
				//Shows the movies and rating and make them into Links.
				for($i=0;$i<$length;$i++)//Loops through the movie list.
                {
                    $movie = explode(";", $filmlista_array[$i]);
                    if(isset($movie[1]))
                    {
						echo "<li><a href="."filmer.php?title=".rawurlencode($movie[0]).">".$movie[0]."<span>".$movie[1]."</span></a></li>";
                    }
                }
    ?>
		</div>
	</div>

<?php
//Get footer
include ("footer.php");

?>	
