

<div class="right_col" role="main">
    <div>
          <?php
                 $run_query_product=$object_supper_admin->select_all_order_info();
          

                 if (isset($_GET['Status'])) {
                     $productId = $_GET['id'];
              //      var_dump($productId);
                   // die();
                     
                   
                 } 
                 else {
                     //  echo 'problem in variable get';   
                 }
           
             
            ?> 
        
        
    </div>
            
          <div class="">
          

            <div class="clearfix"></div>

            <div class="row">
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
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

                  <div class="x_title">
                    <h2> View <small>all Product List</small></h2>
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

<!--                    <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                    <div class="table-responsive">
                      <table class="table table-bordered jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                 <th class="column-title">Order Id</th>
                                <th class="column-title">Customer Name </th>
                                <th class="column-title">Order Total</th>
                                <th class="column-title">Order Status </th>
                                <th class="column-title">Payment Type</th>
                                <th class="column-title">Payment Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:30;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                               while ($all_product_info = mysqli_fetch_assoc($run_query_product)) {
                          //      echo '<pre>';
                           //   var_dump($all_product_info);
                            ?>
                          <tr class="even pointer">
                              <td class="center "><?php echo $all_product_info['order_id'];?></td>
                              <td class="center "><?php echo $all_product_info['name'];?></td>
                              <td class="center ">BDT <?php echo $all_product_info['order_total'];?></td>
                              <td class="center "><?php echo $all_product_info['order_status'];?> </td>
                                <td class="center "><?php echo $all_product_info['payment_type'];?></td>
                              <td class="center "><?php echo $all_product_info['payment_status'];?> </td>
                         
                               <td class="center "
                                  
                                  
                                  
                           
                            <td class="  ">
                                
                               
                             <a class="btn btn-primary" href="view-order.php?&&id=<?php echo $all_product_info['order_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                      View </a>    
                           <a class="btn btn-info" href="edit-order.php?&&id=<?php echo $all_product_info['order_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Edit </a>  
                             <a class="btn btn-success" href="view-invoice.php?&&id=<?php echo $all_product_info['order_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                     View invoice </a>
                                 <a class="btn btn-warning" href="download-invoice.php?&&id=<?php echo $all_product_info['order_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                      Download invoice</a> 
                           <a class="btn btn-danger" href="?Status=delete&&id=<?php echo $all_product_info['order_id'];?>" onclick="return one_delete();" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Delete </a>
                          </td>
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
        </div>