

<div class="right_col" role="main">
    <div>
        <?php 

       $run_query_category=$object_supper_admin ->view_all_published_category();
       $run_query_manufacture=$object_supper_admin ->view_all_published_manufacture();
        
        
        
        
 if(isset($_POST['btn'])){
      $object_supper_admin ->add_product($_POST);
 }
?>
    </div>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Product</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product<small></small></h2>
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
                    <br />
                    <form action="" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      
                        
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="student-name" name="proName" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="categoryName" class="form-control">
                                    <option value="">Select Publication Status</option>
                                    <?php
                                    while ($all_category_info = mysqli_fetch_assoc($run_query_category)) {
                                        ?>
                                        <option value="<?php echo $all_category_info['category_id']; ?>"><?php echo $all_category_info['category_name']; ?></option>
                                    <?php } ?>   
                                </select>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Manufacture Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="nanufactureName" class="form-control">
                                    <option value="">Select Publication Status</option>
                                    <?php
                                    while ($all_manufacture_info = mysqli_fetch_assoc($run_query_manufacture)) {
                                        ?>  
                                        <option value="<?php echo $all_manufacture_info['manufacture_id']; ?>"><?php echo $all_manufacture_info['manufacture_name']; ?></option>
                                    <?php } ?>   
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="student-name" name="proPrice" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Stock <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="student-name" name="proStock" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Minimum Stock <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="student-name" name="proMiniStock" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Short Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="proShortDsc" cols="10" rows="7" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Long Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="proLongDsc" cols="10" rows="7" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Product Image <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <input type="file" id="student-name" name="proImage" required="required" class="form-control col-md-4 col-xs-12">
                        </div>
                      </div>
                         
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Publication Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select name="publicationStatus" class="form-control">
                                    <option value="0">Select Publication Status</option>
                                        <option value="1">Published</option>
                                        <option value="0">UnPublished</option>
                                </select>
                            </div>
                        </div>  
                         

                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                            <input type="submit" name='btn' value="Submit" class="btn btn-success">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
