	
	//This function is for the slideshow.
	function slideSwitch() 
	{
		var $active = $('#slideshow IMG.active');

		if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

		//Adds the image sequence in a variable.
		var $next =  $active.next().length ? $active.next()
        	: $('#slideshow IMG:first');

		$active.addClass('last-active');

		$next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() 
		{
         $active.removeClass('active last-active');
        });
	}
	
	//This function sets how long the images will be displayed in the slideshow.
	$(function() 
	{
		setInterval( "slideSwitch()", 3000 );
	});

$(document).ready(function(){	
	//This is for movies.php
	$('#skickaphp').click(LaggTillFilmPhp);//Handles keypress for the function LaggTillFilmPhp.
	
	//The function adds a movie.
	function LaggTillFilmPhp()
	{
		//The If-statement checks to see if any of all input fields are filled.
		if ($('#titelphp').val() === "" && $('#betygphp').val() === "" && $('#imdbphp').val() === "" && $('#bildphp').val() === "" && $('#textareaphp').val() === "") 
		{    
			$('#titelphp').css('background-color', "red");
			$('#betygphp').css('background-color', "red");
			$('#imdbphp').css('background-color', "red");
			$('#bildphp').css('background-color', "red");
			$('#textareaphp').css('background-color', "red");
			alert("Please fill in the fields correctly !");
			$('#titelphp').css('background-color', "white");
			$('#betygphp').css('background-color', "white");
			$('#imdbphp').css('background-color', "white");
			$('#bildphp').css('background-color', "white");
			$('#textareaphp').css('background-color', "white");
			return false;  
		}
	
		 else if ($('#titelphp').val() == "")//The If-statement checks if the input field titelphp is filled.
		{
			$('#titelphp').css('background-color', "red");
			alert("Please fill in a movietitle !");
			$('#titelphp').css('background-color', "white");
			return false
		}
		
		
		 else if ($('#betygphp').val() === "")//The If-statement checks if the input field betygphp is filled.
		{
			$('#betygphp').css('background-color', "red");
			alert("Please choose a Rating !");
			$('#betygphp').css('background-color', "white");
			return false
		}
	
		else if ($('#imdbphp').val() === "")//The If-statement checks if the input field imdbphp is filled.
		{
			$('#imdbphp').css('background-color', "red");
			alert("Please fill in a Link !");
			$('#imdbphp').css('background-color', "white");
			return false
		}
		
		else if ($('#bildphp').val() === "")//The If-statement checks if the input field bildphp is filled.
		{
			$('#bildphp').css('background-color', "red");
			alert("Please fill in a imageLink !");
			$('#bildphp').css('background-color', "white");
			return false
		}
		
		else if ($('#textareaphp').val() === "")//The If-statement checks if the input field textareaphp is filled.
		{
			$('#textareaphp').css('background-color', "red");
			alert("Please fill in some text about the movie !");
			$('#textareaphp').css('background-color', "white");
			return false
		}
		
		$('#titelphp').css('background-color', "white");
		$('#betygphp').css('background-color', "white");
		$('#imdbphp').css('background-color', "white");
	}

});

