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
                      document.getElementById('reg').disabled=true;
                  }else{
                      document.getElementById('reg').disabled=false;
                  }  
             }
               
           }//onreadystatechange
        xmlHttp.send(null);
     }//end of function ajax_email_check

</script>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<h4>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</h4>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-5">
						<div class="shopper-info">
							<p>Login</p>
                                                               <?php
                      if (isset($_SESSION['message'])) {
                          ?>
                          <div class="text text-center text-success"><h2><?php echo $_SESSION['message']; ?></h2></div>
                          <?php
                      }
                      unset($_SESSION['message']);

                      ?>

                                                        
                          <form action="" method="POST" > 
								<input type="text" name="email" placeholder="User Email">
                                                                <input type="password" name="password" placeholder="Password" >                      
                                                                <input type="submit" name="btn-login" value="Login" class="btn btn-primary" name="btn-login">
							</form>
							 
						</div>
					</div>
					<div class="col-sm-7">
						<div class="bill-to ">
                                                    <p class="">Registration</p>
							<div class="form-one">
                                                            <form action="" method="Post">
                                                                <input type="text"name="name" placeholder="Name*" required> 
                                                               <input type="email" id="email" name="email" placeholder="Email*"required onblur="ajax_email_check(this.value,'res');"><span id="res"></span>
                                                                <input type="password" name="pass" placeholder="password*"required>
                                                                <input type="text" name="phone" placeholder="Phone*"required>                                                                    
                                                                <input type="text" name="address" placeholder="Address*"required>
                                                                <input type="text" name="zip" placeholder="Zip / Postal Code *"required>
                                                                <input type="text" name="city" placeholder="City*"required>
                                                                <input type="text" name="country" placeholder="Country*"required>
                                                                <input type="submit" id='reg' name="btn-reg" value="Register" class="btn btn-primary" name="btn-submit">
                                                            </form>
							</div>
						 
						</div>
					</div>
					 				
				</div>
			</div>
			 
		  
				</div>
		 
	</section> <!--/#cart_items-->
