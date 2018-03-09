<?php
// var_dump($_POST); 
if(isset($_POST['btn-reg'])){
    $object_apllication -> save_coustomer_info($_POST);   
}

if(isset($_POST['btn-login'])){
    $object_apllication -> customer_login_check($_POST);   
}
?>

<script>
  
    var xmlHttp=new XMLHttpRequest();
     function ajax_email_check(given_email,objectId){
       //  alert(given_email);
        // alert(objectId);
        
        var sarverPage='ajax_email_check.php?email='+given_email; 
           xmlHttp.open('$_GET',sarverPage);
           
           xmlHttp.onreadystatechange = function(){
               if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                  document.getElementById(objectId).innerHTML=xmlHttp.responseText;
                  
                  if(xmlHttp.responseText == 'Email Already Exists')
                  {
                      document.getElementById('singup').disabled=true;
                  }else{
                      document.getElementById('singup').disabled=false;
                  }  
             }
               
           }//onreadystatechange
        xmlHttp.send(null);
     }//end of function ajax_email_check

</script>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
                        
                              <?php
                                if (isset($_SESSION['message'])) {
                                    ?>
                                    <div class="text text-center text-success"><h2><?php echo $_SESSION['message']; ?></h2></div>
                                    <?php
                                }
                                unset($_SESSION['message']);
                                ?>
                           
                            
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
                                                <form action="" method="POST">
							<input type="text" name="email" placeholder="User Email">
                                                         <input type="password" name="password" placeholder="Password" >                      
                                                                
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit"name="btn-login"  class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="" method="Post">
                                                                <input type="text"name="name" placeholder="Name*" required> 
                                                                <input type="email" id="email" name="email" placeholder="Email*"required onblur="ajax_email_check(this.value,'res');"><span id="res"></span>
                                                                <input type="password" name="pass" placeholder="password*"required>
                                                                <input type="text" name="phone" placeholder="Phone*"required>                                                                    
                                                                <input type="text" name="address" placeholder="Address*"required>
                                                                <input type="text" name="zip" placeholder="Zip / Postal Code *"required>
                                                                <input type="text" name="city" placeholder="City*"required>
                                                                <input type="text" name="country" placeholder="Country*"required>
							        <button type="submit" id="singup" name="btn-reg" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->