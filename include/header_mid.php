	<?php 
    
         
         
                 if (isset($_GET['status'])) {
                      if (($_GET['status'] == 'logout')) {
                       
                            $object_apllication->customer_logout();
                      }
                      
                 } 
                 
        
        ?>
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                                                    <a href="index.html"><img src="asset/asset/images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							 
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                                                
                                                                   <?php 
                                                             $shipping_id=isset($_SESSION['shipping_id']);
                                                             $coustomer_id=isset($_SESSION['coustomer_id']);
                                                         
                                                                  ?>
                                                                 <?php  if($coustomer_id == NULL && $shipping_id ==NULL){    ?>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							         <?php } elseif ($coustomer_id != NULL && $shipping_id ==NULL)
                                                                 {?>
                                                                <li><a href="shipping.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                                                 <?php } elseif ($coustomer_id != NULL && $shipping_id !=NULL){?>
                                                                  <li><a href="payment.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                                                  <?php } ?>
                                                                
                                                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                                                
                                                                <?php 
                                                                    if(isset($_SESSION['coustomer_id'])){
                                                                ?>
								<li><a href="?status=logout"><i class="fa fa-unlock"></i> Logout</a></li>
                                                                <li><a href="customer-home.php"><i class="fa fa-user"></i> Account</a></li>
                                                                  <?php 
                                                                    }else{
                                                                ?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                                                  <?php 
                                                                    }
                                                                ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->