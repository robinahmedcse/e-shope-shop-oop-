<div class="right_col" role="main">
    <div>
          <?php

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];
    //      var_dump($productId);
    // die();


  $run_query_customer=$object_supper_admin->select_coustomer_info_by_order_id($orderId);
   
    $run_query_shipping=$object_supper_admin->select_shipping_info_by_order_id($orderId);
           
    $run_query_payment= $object_supper_admin->select_payment_info_by_order_id($orderId); 
    
     $run_query_product= $object_supper_admin->select_product_info_by_order_id($orderId);
} else {
    //  echo 'problem in variable get';   
}
?> 

    </div>
            
          <div class="">
          

      

            <div class="row">
              <div class="clearfix"></div>

            
               <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order <small>Information</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <h3 class="text-center text-success">Customer Information</h3>
                      <table class="table table-bordered table-striped">
                             <?php 
                               while ( $all_customer_info = mysqli_fetch_assoc($run_query_customer)) {
                            // var_dump($all_customer_info);
                            ?>
                          
                          <tr>
                              <th>Customer Name</th>
                              <td><?php echo $all_customer_info['name'];?> </td>
                          </tr>
                          <tr>
                              <th>Email</th>
                              <td> <?php echo $all_customer_info['email'];?></td>
                          </tr>
                          <tr>
                              <th>Phone Number</th>
                              <td><?php echo $all_customer_info['phone'];?> </td>
                          </tr>
                          
                          <tr>
                              <th>Address</th>
                              <td><?php echo $all_customer_info['address'];?> </td>
                          </tr>
                          <tr>
                              <th>City</th>
                              <td> <?php echo $all_customer_info['city'];?></td>
                          </tr>
                          <tr>
                              <th>Country</th>
                              <td><?php echo $all_customer_info['country'];?> </td>
                          </tr>
                      </table>

                               <?php } ?>
                       <h3 class="text-center text-success">Shipping Information</h3>
                       
                       
                        <?php 
                                $all_shipping_info = mysqli_fetch_assoc($run_query_shipping);
                            // var_dump($all_shipping_info);
                            ?>
                      <table class="table table-bordered table-striped dataTable ">
                          <tr>
                              <th>Customer Name</th>
                              <td><?php echo $all_shipping_info['name'];?>  </td>
                          </tr>
                          <tr>
                              <th>Email</th>
                               <td><?php echo $all_shipping_info['email'];?>  </td>
                          </tr>
                          <tr>
                              <th>Phone Number</th>
                              <td><?php echo $all_shipping_info['phone'];?>  </td>
                          </tr>
                          
                          <tr>
                              <th>Address</th>
                               <td><?php echo $all_shipping_info['address'];?>  </td>
                          </tr>
                          <tr>
                              <th>City</th>
                              <td><?php echo $all_shipping_info['city'];?>  </td>
                          </tr>
                          <tr>
                              <th>Country</th>
                              <td><?php echo $all_shipping_info['country'];?>  </td>
                          </tr>
                      </table>
                      
                      
                       
                       
                           <h3 class="text-center text-success">Payment Information</h3>
                            <?php 
                                $all_payment_info = mysqli_fetch_assoc($run_query_payment);
                            // var_dump($all_payment_info);
                            ?>
                      <table class="table table-bordered table-striped dataTable ">
                          <tr>
                              <th>Payment Type</th>
                                <td><?php echo $all_payment_info['payment_type'];?>  </td>
                          </tr>
                          <tr>
                              <th>Payment Status</th>
                               <td><?php echo $all_payment_info['payment_status'];?>  </td>
                          </tr>
                        
                      </table>
                       
                           
                           
                           
                           <h3 class="text-center text-success">Product Information</h3>
                           
                            <table class="table table-bordered jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                 <th class="column-title">Product Id</th>
                                <th class="column-title"> Product Name </th>
                                <th class="column-title">Product Image</th>
                                <th class="column-title">Product Price</th>
                                <th class="column-title">Product Quantity</th>
                                <th class="column-title">Total Price </th>
                                </th>
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:30;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               while ( $all_order_product_info = mysqli_fetch_assoc($run_query_product)) {
                                   //  var_dump($all_order_product_info);
                            ?>
                          <tr class="even pointer">
                              <td class="center "><?php echo $all_order_product_info['product_id'];?></td>
                              <td class="center "><?php echo $all_order_product_info['product_name'];?></td>
                              <td class="center ">
                                  <img src="<?php echo $all_order_product_info['product_image'];?>" width="150px" class="image img-responsive" >
                                  
                              </td>
                                <td class="center ">BDT <?php echo $all_order_product_info['product_price'];?></td>
                              <td class="center "><?php echo $all_order_product_info['product_quantity'];?> </td>
                              <td class="center ">BDT <?php echo $all_order_product_info['order_total'];?></td>
                              
                              
                          </tr>
                               <?php }?>
                
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>

              
              
              
            </div>
          </div>
        </div>

