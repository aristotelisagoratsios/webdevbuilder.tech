<?php

session_start();

$diaryContent  = "";

 if (array_key_exists("id",$_COOKIE)) {
	 
	$_SESSION['id'] = $_COOKIE['id']; 
 
 }
   
    if (array_key_exists("id",$_SESSION) && $_SESSION['id']) {
		
		
		include(connection.php);
		
		$query = "SELECT diary FROM `users` WHERE id = 
        ".mysqli_real_escape_string($link,$_SESSION['id'])." LIMIT 1";
		
		$row = mysqli_fetch_array(mysqli_query($link,$query));
		
		$diaryContent = $row['diary'];
		
	} else {
		
	 header("Location: index.php");	
		
	}
	

   include("header.php");
   
?>   

<nav class="navbar navbar-fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Secret Diary</a>

    <div class="inline my-2 my-lg-0">
      	<a href = 'index.php?logout=1'>	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>;
    </form>
  </div>
</nav>
   
   <div class="container-fluid" id ="containerLoggedInPage">
   
       <textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
   
   </div>
   
   
<?php
   
   include("footer.php");

?>