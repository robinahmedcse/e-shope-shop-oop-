<?php
  $coustomer_id=$_SESSION['coustomer_id'];
    $run_query=$object_apllication ->select_coustomer_info_by_id($coustomer_id);  
    
    $select_coustomer_info_by_id=mysqli_fetch_assoc($run_query);
  //  var_dump($select_coustomer_info_by_id);
    
    
    if(isset($_POST['btn-submit'])){
    $object_apllication -> save_shipping_info($_POST);   
}
 
?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shipping</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
                            <h4>Welcome <?php echo  $_SESSION['coustomer_name'];?>, you have to give us shipping information to complete your 
                                valuable order.If your billing information and shipping Information are same then just press on 
                                Save Shipping Info Button </h4>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					 
					<div class="col-sm-7 col-sm-offset-4">
						<div class="bill-to ">
                                                    <p class="">Bill To</p>
							<div class="form-one">
                                                            <form action="" method="Post">
                                                                <input type="text"name="name" value="<?php echo $select_coustomer_info_by_id['name'];?>" placeholder="Name*" required> 
                                                                <input type="text" name="email" value="<?php echo $select_coustomer_info_by_id['email'];?>" placeholder="Email*"required>
                                                                <input type="text" name="phone" value="<?php echo $select_coustomer_info_by_id['phone'];?>" placeholder="Phone*"required>                                                                    
                                                                <input type="text" name="address" value="<?php echo $select_coustomer_info_by_id['address'];?>" placeholder="Address*"required>
                                                                <input type="text" name="zip" value="<?php echo $select_coustomer_info_by_id['zip'];?>" placeholder="Zip / Postal Code *"required>
                                                                <input type="text" name="city" value="<?php echo $select_coustomer_info_by_id['city'];?>" placeholder="City*"required>
                                                                <input type="text" name="country" value="<?php echo $select_coustomer_info_by_id['country'];?>" placeholder="Country*"required>
                                                                <input type="submit" name="btn-submit" value="Save Shipping Info" class="btn btn-primary" name="btn-submit">
                                                            </form>
							</div>
						 
						</div>
					</div>
					 				
				</div>
			</div>
			 
		  
				</div>
		 
	</section> <!--/#cart_items-->
