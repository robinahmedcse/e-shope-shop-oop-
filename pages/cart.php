	
<?php

  $session_id=session_id();
 $run_query_product=$object_apllication->select_cart_product_by_session_id($session_id);
 
 if(isset($_POST['btn-update'])){
     $message=$object_apllication->update_cart_product_info($_POST);
 }
 
 if(isset($_GET['status'])){
     $temp_cart_id=$_GET['id'];
     if (($_GET['status'] == 'delete')) {
        // echo 'delete';
    $message=$object_apllication->update_cart_product_info_delete($temp_cart_id);
    }
 }
 
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
               <?php
                      if (isset($_SESSION['message'])) {
                          ?>
                          <div class="text text-center text-success"><h2><?php echo $_SESSION['message']; ?></h2></div>
                          <?php
                      }
                      unset($_SESSION['message']);
                      
                      
                      if (isset($message)) {
                          ?>
                          <div class="text text-center text-success"><h2><?php echo $message; ?></h2></div>
                          <?php
                      }
                      unset($message);
                      ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                           $sum=0;
                    while ($product_by_session_id = mysqli_fetch_assoc($run_query_product)) {
                   // var_dump($product_by_session_id);
                    ?>
                    
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="admin/<?php echo $product_by_session_id['product_image'];?>" width="50px"alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo $product_by_session_id['product_name'];?></a></h4>
                            <p>Product ID:<?php echo $product_by_session_id['product_id'];?> </p>
                        </td>
                        <td class="cart_price">
                            <p>BDT.<?php echo $product_by_session_id['product_price'];?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="" method="POST">
                                    <input type="hidden" name="temp_cart_id" value="<?php echo $product_by_session_id['temp_cart_id'];?>">
                                    <input class="cart_quantity_input" type="text" name="product_quantity" value="<?php echo $product_by_session_id['product_quantity'];?>" autocomplete="off" size="2">
                                <input type="submit" class="cart_quantity_down" name="btn-update" value="Update">
                                </form>
                                </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php
                                     $total_price=$product_by_session_id['product_price']*$product_by_session_id['product_quantity'];
                                     echo 'BDT. '.$total_price;
                                     ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="?status=delete&&id=<?php echo $product_by_session_id['temp_cart_id'];?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php $sum= $sum + $total_price;}  ?>

                </tbody>
            </table>      
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action" >
		<div class="container ">
			<div class="heading">
				 
				 
			</div>
			<div class="row">
				 
				<div class="col-sm-6 col-sm-offset-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php echo 'BDT. '.$sum; ?> </span></li>
                                                        <li>Eco Tax <span><?php
                                                                $vat = ($sum * 15) / 100;
                                                                echo 'BDT. ' . $vat
                                                                ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
                                                        <li>Total <span>    <?php
                                                                $grand_total = $vat + $sum;
                                                                $_SESSION['order_total']=$grand_total;
                                                                
                                                                echo 'BDT.' . $grand_total
                                                                ?></span></li>
						</ul>
							<a class="btn btn-default update" href="index.php">Continue Shipping</a>
                                                        
                                                         <?php 
                                                             $shipping_id=isset($_SESSION['shipping_id']);
                                                             $coustomer_id=isset($_SESSION['coustomer_id']);
                                                         
                                                         ?>
                                                        
                                                        <?php  if($coustomer_id == NULL && $shipping_id ==NULL){    ?>
							<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
                                                        <?php } elseif ($coustomer_id != NULL && $shipping_id ==NULL)
                                                            {?>
                                                        <a class="btn btn-default check_out" href="shipping.php">Check Out</a>
                                                        <?php } elseif ($coustomer_id != NULL && $shipping_id !=NULL){?>
                                                        <a class="btn btn-default check_out" href="payment.php">Check Out</a>
                                                        <?php } ?>
                                                        
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->





<!--

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                 <div class="panel-body">
                     <a href="checkout.php" class="btn btn-primary pull-right">Checkout</a>
                     <a href="index.php" class="btn btn-primary">Continue Shipping</a>
                 </div>
            </div>
        </div>
    </div>
</div>-->
