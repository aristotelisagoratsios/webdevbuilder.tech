<?php

 $error = ""; $successMessage = "";
 
 if($_POST){

   if(!$_POST["email"]){
	
     $error .= "An email address is required.<br>";	
	
    }
	
	if(!$_POST["subject"]){
	
     $error .= "The subject field is required.<br>";	
	
    }
	
	if(!$_POST["content"]){
	
     $error .= "The content field is required.<br>";	
	
    }
	
	if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {

     $error .= "The email address is invalid<br>";
	 
    }
	
	if ($error != ""){
	$error = '<div class="alert alert-danger" role="alert"><p> There were error(s) in your form:</p>' .$error. '</div>';
	
     	} else {
			
			$emailTo = "me@mydomain.com";
			
			$subject = $_POST["subject"];
			
			$content = $_POST["content"];
			
			$headers = "From: ".$_POST["email"];
			
			if(mail($emailTo,$subject,$content,$headers)){
				
				$successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';

				
				} else {
					
    			$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later!</div>';


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
	<style type="text/css">
	
	html { 
		background: url(contact-form-photo.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		}
		
		body {
			background:none;
            color:white;			
		     }
	
	</style>
	
  </head>
  
  <body>
  
   <div class="container">
  
    <h1>Get in touch!</h1>
	
	<div id="error"><? echo $error.$successMessage; ?> </div>
	
	
	<form method="post">
	<div class="form-group">
  <label for="email" class="form-label">Email address</label>
   <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address">
     </div>

 <div class="form-group">
  <label for="subject" class="form-label">Subject</label>
  <input type="text" class="form-control" name="subject" id="subject">
  </div>

 <div class="form-group">
  <label for="content" class="form-label">What would you like to ask us?</label>
  <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>

 <button type="submit" class="btn btn-primary" id="submit">Submit</button>
	
	</form>
	
	 </div>
	 

	<script type="text/javascript"> 
	
	$("form").submit(function(e){
		
        		
		var error = "";
		
		if ($("#email").val() == ""){
			
			error += "The email field is required.<br>";
			
		}
		
		if ($("#subject").val() == ""){
			
			error += "The subject field is required.<br>";
			
		}
		
		if ($("#content").val() == ""){
			
			error += "The content field is required.<br>";
			
		}
		
		if (error != ""){
			
		$("#error").html('<div class="alert alert-danger" role="alert"><p><strong> There were error(s) in your form:</strong></p>' + error + '</div>');
				
          return false;   

	   } else {
			
			return true;
			
		}

       });
	
	
	</script>
	
  </body>
  
  <!-- Option 2: Separate Popper and Bootstrap JS -->
   
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
  
</html>
