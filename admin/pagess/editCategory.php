

<div class="right_col" role="main">
    <div>
        <?php 
        
        if(isset($_GET['id'])){
            $categoryId=$_GET['id'];
           $run_query = $object_supper_admin-> view_product_category_by_id($categoryId);
           $all_category_info = mysqli_fetch_assoc($run_query); 
        }

 
 //var_dump($all_category_info);
 
  if(isset($_POST['btn'])){
   $object_supper_admin ->update_product_category($_POST);
 }
 
?>
    </div>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Product Category</h3>
              </div>
            </div>
              
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Product<small>Category</small></h2>
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
                    <br />
                    <form action="" name='editForm' method="POST"id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      
                        
                        <!-- Category name -->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="student-name" value="<?php echo $all_category_info['category_name'];?>" name="catName" required="required" class="form-control col-md-7 col-xs-12">
                            <input type="hidden" id="student-name" value="<?php echo $all_category_info['category_id'];?>" name="catId" required="required" class="form-control col-md-7 col-xs-12">
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
                            <input type="submit" name='btn' value="Update" class="btn btn-info">
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<script>

document.forms['editForm'].elements['publicationStatus'].value='<?php echo $all_category_info['publication_Status'];?>';

</script>