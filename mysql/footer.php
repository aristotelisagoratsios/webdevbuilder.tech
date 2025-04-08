 <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
   
   <script type="text/javascript">
   
     $(".toggleForms").click(function() {
		 
	    $("#signUpForm").toggle();
        $("#logInForm").toggle();		

	 });
	 
	 $('#diary').bind('input propertychange', function() {

			$.ajax({
			  method:"POST", 
			  url:"updatedatabase.php",
			  data: {content:$("#diary").val()}
			});
        });
   
   </script>
   
   
  </body>
</html>