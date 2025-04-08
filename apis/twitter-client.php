<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
     <script src="https://use.fontawesome.com/d1a58101ad.js"></script>
    
	
	<title>A Twitter Client!</title> 
	
	<style type="text/css">

	
	     html { 
			background: url(twitter-client.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
			        
			
			  body {
		    	background:none;	
		           }
       
				form {
				display: inline-block;
	       			}
			 

	</style>
	
  </head>
  
  <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="0">
    
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-info" id="navbar">
    <div class="container-fluid">
       <a class="navbar-brand" href="#"> A Twitter Client</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#jumbotron">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#footer" tabindex="-1" aria-disabled="true">Download The App</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="email" placeholder="Email" aria-label="Email">
		<input class="form-control me-2" type="password" placeholder="Password" aria-label="Password">
        <button class="btn btn-success" type="submit">Login</button>
     </form> 
    </div>
  </div>
</nav>


<?php

require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey = "dZ52MCrsr9T7ZZ0e3xJrBaQVS";

$consumersecret = "nyZy9jEzSv0IA9M4QaGrlaUBHHHP0DuqA1uIkFPR4ATpDid5iE";

$accesstoken = "703174801402138626-G6mNl13RXKKKBl2KwXl8icXUD4JqAlA";

$accesstokensecret = "j5x1CwDReoTYRxummy2YivGMgP37q2pefPt9ry2tMMomO";

$connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$content = $connection->get("account/verify_credentials");


$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);


print_r($content);

foreach ($statuses as $tweet) {
    
    
    if ($tweet->favorite_count >= 2) {
        
        $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
        
        echo $status->html;
        
    }
        
    
    
    
}

?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"> </script>


 </body>

</html>