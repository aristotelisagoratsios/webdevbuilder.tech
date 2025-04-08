<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

session_start();

 $error = ""; 
 
 if(array_key_exists("logout",$_GET)) {
	 
	 unset($_SESSION['id']);
	 setcookie("id","", time() - 60*60);
	 $_COOKIE["id"]  = "";
 
  } else if ((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE) AND $_COOKIE['id'])) {
	  
	  header("Location: loggedinpage.php");
		  
  }
  
  if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION['id']);
        setcookie("id", "", time() - 60*60*24*365);
        $_COOKIE["id"] = "";  
        
        session_destroy();
 header("Location: index.php");
        
    }
  
 if (array_key_exists("submit",$_POST)) {
 		
     include("connection.php");		
	 
	 if (!$_POST['email']) {
		 
		$error .= "An email address is required<br>"; 
		 
	 }
	 
	 if (!$_POST['password']) {
		 
		$error .= "A password is required<br>"; 
		 
	 }
	 
	 if ($error != "") {
		 
		$error = "<p>There were error(s) in your form:</p>".$error; 
		 
		 
	 } else {
		 
		 if (isset($_POST['signUp'])) {
		 
			$query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1"; 
		 
			$result = mysqli_query($link,$query);
		 
			if(mysqli_num_rows($result) > 0) {
			 
				$error = "That email address is taken."; 
			 
			} else {
				
			$_SESSION['id'] = mysqli_insert_id($link);
			 
			$query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";	 
			 
			if (!mysqli_query($link,$query)) {
			  
			$error = "<p>Could not sign you up - please try again later</p>";  
			  
			  
		    } else {
				
				$_SESSION['id'] = mysqli_insert_id($link);
				
			    $latestId  =  mysqli_insert_id($link);
  

				$query = "UPDATE `users` SET password 
					 = '".md5(md5($latestId).$_POST['password'])."' WHERE id = ".$latestId." LIMIT 1";           
				 mysqli_query($link,$query);
				  $_SESSION['id'] = $latestId;
											 

				if ($_POST["stayLoggedIn"] == "1"){
											
					setcookie("id", $latestId, time() + 60*60*24*365);
											
					}
				  header("Location: loggedinpage.php");  
				
			}
		 
		 }
		 
	   } else {
		   
		  $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."'";		   
		
        $result = mysqli_query($link,$query);
		
		$row = mysqli_fetch_array($result);
		
		if(isset($row)){
			
		$hashedPassword = md5(md5($row['id']).$_POST['password']);	
			
	    if ($hashedPassword == $row['password']) {
			
		$_SESSION['id'] = $row['id'];

		if ($_POST['stayLoggedIn'] == '1') {
					
	    	setcookie("id",$row['id'],time() + 60*60*24*365);
					
			    	}
					
				header("Location: loggedinpage.php");	
			
	        	} else {
					
                 $error = "That email/password combination could not be found.";				
				
				}	
			
	    	} else {
				
			 $error = "That email/password combination could not be found.";	
				
				
			}
		
 	     }
	  
	  
      }  
	  
 }
 
?> 

<?php include("header.php"); ?>
 
    <div class="container" id="homePageContainer">
	
	
    <h1>Secret Diary!</h1>
	
	<p><strong>Store your thoughts permanently and securely.</strong></p>

   <div id = "error"> <?php if ($error!="") {
	   
	   echo '<div class="alert alert-danger" role="alert"> '.$error.' </div>';
	     
   }?> </div>
   

<form method = "post" id="signUpForm">

  <p>Interested? Sign up now.</p>

   <div class="form-group">

	 <input class="form-control"  name = "email" type = "email"  placeholder = "Your Email">

	</div>
	
	
	<div class="form-group" >
	
	 <input class="form-control" name = "password" type = "password" placeholder = "Password">

    </div>

	
	<div class="form-group form-check">
	
	   <input type="hidden" name="stayLoggedIn" value=0>
	   	
	   <input class="form-check-input"  type = "checkbox"  name = "stayLoggedIn" value = 1>

       <label class="form-check-label"> Stay logged in </label>

	</div>
	

	<div class="form-group">
	
	  <input  type = "hidden" name = "signUp" value = "1">

	  <input class="btn btn-success" type = "submit" name = "submit" value = "Sign Up">

    </div>   

  <p><a class="toggleForms">Log in</a></p>

</form>



<form method = "post" id="logInForm">

   <p> Log in using your username and  password.</p>

  <div class="form-group">

	<input  class="form-control" name = "email" type = "email"  placeholder = "Your Email">

  </div>

  <div class="form-group">

    <input class="form-control" name = "password" type = "password" placeholder = "Password">

  </div>

   <div class="form-group form-check">
   
       <input type="hidden" name="stayLoggedIn" value=0>
	   	
	   <input class="form-check-input"  type = "checkbox"  name = "stayLoggedIn" value = 1>

       <label class="form-check-label"> Stay logged in </label>

	</div>
 
   <div class="form-group">
  
     <input type = "hidden" name = "signup" value = "0">

     <input class="btn btn-success" type = "submit" name = "submit" value = "Log in">
  
   </div>
   
   <p><a class="toggleForms">Sign up </a></p>

</form>
   
   </div>
   
<?php include("footer.php"); ?>
