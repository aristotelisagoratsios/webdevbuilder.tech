<?php

$weather = "";
$error = "";

if (array_key_exists('city', $_GET)) {
	
	$city = str_replace(' ', '', $_GET["city"]);
	
	$file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
    
	if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    
	$error = "That city could not be found!";
	
	} else {
	
	$forecastPage =  file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	
	$pageArray = explode('Weather Today</h2> (1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">', $forecastPage);

    if (sizeof ($pageArray) > 1) {
	
	$secondPageArray = explode('</span></p></td>', $pageArray[1]);
	
	if (sizeof ($secondPageArray) > 1) {
	
	$weather =  $secondPageArray[0];
	  
	     } else {
			
			$error = "That city could not be found!";
			
	     	}
		 
     	} else {
			
			$error = "That city could not be found!";
			
		}
	 
	  }
	  
	}  

?>


<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Weather Scraper!</title>
	
	<style type="text/css">
	
	html, body {
                height: 100%;
				width: 100%;
				padding: 0;
				margin: 0;
				background: black url(background2.jpg) center center no-repeat;;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				text-align:center;
				}
				
		body {
			   background:none;
		     }	

        .container {
			
			width:450px;
		    margin-top:150px;
	            	}	
					
         h1 {
			 color:white; 
		    }
			
     label {
		   color:white;
		   font-size:20px;
	       }	

    input {
		margin-top:10px;
	      }	

     button {
		 margin-top:1px;
	        }

     #weather {
		     margin-top:10px;
		      }			
	
	</style>
	
	
  </head>
    <body>
   
 <div class="container">
   <h1>What's The Weather?</h1> 
	<form>
  <div class="form-group">
    <label for="city">Enter the name of a City.</label>
    <input type="text" class="form-control" id="city" placeholder="e.g London, Tokyo" name="city" value="<?php echo $_GET["city"];?>">
	</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 
  <div id="weather"> <?php
  
               if ($weather) {
				   
                  echo '<div class="alert alert-success" role="alert"> '.$weather.' </div>';
			               
				} else if ($error) {
							   
				echo '<div class="alert alert-danger" role="alert"> '.$error.' </div>';
							  
						   }
						   
                     ?> </div>

 </div>
 
 
  </body>
  
  <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
   
  
</html>