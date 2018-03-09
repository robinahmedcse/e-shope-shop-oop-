
<?php 


if(isset($_POST['payment'] )){
    //var_dump($_POST);
  
    $object_apllication ->save_order_info($_POST);
        
}


?>


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                
                <li class="active">Payment Info</li>      
            </ol>
        </div><!--/breadcrums-->

 

        <div class="register-req text-center">
            <h3>You have to give us Payment information to complete your valuable order.
            
            </h3>
        </div><!--/register-req-->

         
        <div class="row">
            <div class="col-lg-12 clearfix">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center text-success">Select your payment method </h3>
                          <hr>
                          
                          <form class="" action="payment.php" method="POST">
                              <table class="table table-bordered ">
                                  <tr>
                                      <td> Cash On Delivery</td>
                                      <td><input type='radio' name='paymentType' value="CashOnDelivery" ></td>
                                  </tr>
                                  <tr>
                                      <td> Paypal</td>
                                      <td><input type='radio' name='paymentType'value="Paypal" ></td>
                                  </tr>
                                  <tr>
                                      <td> Bkash</td>
                                      <td><input type='radio' name='paymentType'value="Bkash" ></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td><input type='submit' name='payment' value="Confirm Order" class="btn btn-primary" ></td>
                                  </tr>
                              </table> 
                          </form>
                    </div>
                </div>			
            </div>
        </div>
        
</section>       