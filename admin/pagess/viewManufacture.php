

<div class="right_col" role="main">
    <div>
          <?php
                
          

                 if (isset($_GET['Status'])) {
                     $manufactureId = $_GET['id'];
                    // var_dump($manufactureId);
                  //   die();
                     
                      if (($_GET['Status'] == 'Published')) {
                       
                         $message=$object_supper_admin->published_manufacture($manufactureId);
                      }
                      
                      elseif (($_GET['Status'] == 'UnPublished')) {

                         $message=$object_supper_admin->unpublished_manufacture($manufactureId);
                     }
                     
                     elseif (($_GET['Status'] == 'delete')) {

                         $message=$object_supper_admin->manufacture_info_delete($manufactureId);
                     }
                 } 
                 else {
                     //  echo 'problem in variable get';   
                 }
              $run_query = $object_supper_admin->view_product_manufacture();
             
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
                    <h2> View <small>all Manufacture List</small></h2>
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
                                <th class="column-title"># </th>
                                <th class="column-title">Manufacture Name </th>
                                <th class="column-title">Publication Status </th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                
                                <th class="bulk-actions" colspan="7">
                                    <a class="antoo" style="color:#fff; font-weight:30;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                               while ($all_manufacture_info = mysqli_fetch_assoc($run_query)) {
                                 // echo '<pre>';
                             //   var_dump($all_manufacture_info);
            
                            ?>
                          <tr class="even pointer">
                             
                              <td class="center "><?php echo $all_manufacture_info['manufacture_id'];?></td>
                              <td class="center "><?php echo $all_manufacture_info['manufacture_name'];?> </td>
                               <td class="center "
                                   ><?php 
                                      $stat=$all_manufacture_info['publication_status'];
                                              if($stat == 0 ){
                                                  //echo 'UnPublish';
                                               ?>
                        
                        <i class="halflings-icon white arrow-down">  <?php echo 'UnPublished' ?>  </i>  
                                      
                                              <?php    
                                              }
                                              
                                              else{
                                             ?>     
                        
                        <i class="halflings-icon white arrow-down"> <?php echo 'Published' ?> </i>  
                                       
                                   <?php
                                              } 
                               
                                ?> </td>
                           
                            <td class="  ">
                                
                               <?php 
                                if($stat == 0 ){
                                ?>
                                <a class="btn btn-warning" href="?Status=Published&&id=<?php echo $all_manufacture_info['manufacture_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Published</a>  
                                 <?php 
                                }else{
                                ?>
                                 <a class="btn btn-info" href="?Status=UnPublished&&id=<?php echo $all_manufacture_info['manufacture_id'];?>" >
                                    <i class="halflings-icon white arrow-down"></i>
                                     UnPublished </a> 
                              <?php 
                                }
                                ?>
                                
                                
                           <a class="btn btn-primary" href="edit-manufacture.php?&&id=<?php echo $all_manufacture_info['manufacture_id'];?>" >
                                            <i class="halflings-icon white arrow-down"></i>  
                                       Edit </a>  
                           <a class="btn btn-danger" href="?Status=delete&&id=<?php echo $all_manufacture_info['manufacture_id'];?>" onclick="return one_delete();" >
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