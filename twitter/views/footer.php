<footer class="footer mt-auto fixed-bottom py-3 ">
    <div class="container">
        <span  class="text-light">&copy; Twitter Clone Website 2022</span>
    </div>
</footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class ="alert alert-danger" id="loginAlert"></div>
        <form>
           <input type="hidden" id="loginActive" name="loginActive" value="1">
  <div class="mb-3">
    <label for="email1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email address" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <a href="#" id="toggleLogin"> Sign up </a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="loginSignUpButton" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>

 <script>
  
    $("#toggleLogin").click(function(){
        
        if ($("#loginActive").val() == "1") {
            
           $("#loginActive").val("0");
           $("#loginModalTitle").html("Sign Up");
           $("#loginSignUpButton").html("Sign Up");
           $("#toggleLogin").html("Login");
              
      } else {
            
           $("#loginActive").val("1");
           $("#loginModalTitle").html("Login");
           $("#loginSignUpButton").html("Login");
           $("#toggleLogin").html("Sign Up");
            
            
            
        }
 
    });
    
        $("#loginSignUpButton").click(function(){
            
        $.ajax({
              type:"POST",
              url:"actions.php?action=loginSignup",
              data:"email="+$("#email").val()+"&password="+$("#password").val()+"&loginActive="+$("#loginActive").val(),
              success:function(result){
                  
                if(result == "1"){
                    
                  window.location.assign("https://webdevbuilder.tech/twitter/"); 
                    
                    
                } else {
                    
                    $("#loginAlert").html(result).show();
                    
                    
                  }
                  
              }
              
            
          });  
              
            
     });
    
    
    $(".toggleFollow").click(function(){
        
            
      var id = $(this).attr("data-userId");

      $.ajax({
              type:"POST",
              url:"actions.php?action=toggleFollow",
              data:"userId="+$(this).attr("data-userId"),
              success:function(result){
                  
                if (result == "1") {
                    
                   $("a[data-userId= '" + id + "']").html("Follow"); 
                    
                } else if (result == "2") {
                    
                    
                  $("a[data-userId='" + id +"']").html("Unfollow"); 
                    
                }
                
                  
              }
              
            
          });       
        
        
    });
 
 
     $("#postTweetButton").click(function(){
         
        $.ajax({
              type:"POST",
              url:"actions.php?action=postTweet",
              data:"tweetContent=" + $("#tweetContent").val(),
              success:function(result){
                  
                if(result == "1") {
                    
                    $("#tweetSuccess").show();
                    $("#tweetFail").hide();
                    
                   } else if (result != "") {
                       
                    $("#tweetFail").html(result).show();   
                    $("#tweetSuccess").hide();
                    
                     }
                    
                 }
                
                  
              });
   
        });
 
 </script>

</body>
</html>