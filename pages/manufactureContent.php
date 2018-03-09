<?php 
 if( isset($_GET['id'])){
     $productId=$_GET['id'];
  //   echo $productId;
      $run_query_select_product_info_manufacture_id= $object_apllication -> select_published_product_info_manufacture_id($productId);
 }



?>




<section>		
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
              <?php 
                 include 'include/side_menuber.php';
                ?>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php 
                    while ($product_info_by_manufacture=  mysqli_fetch_assoc($run_query_select_product_info_manufacture_id)) {
                       //  var_dump($product_info_by_category);
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="admin/<?php echo $product_info_by_manufacture['product_image']?>" alt="" />
                                    <h2>BDT.<?php echo $product_info_by_manufacture['product_price']?> </h2>
                                    <p><?php echo $product_info_by_manufacture['product_name']?></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                         <h2>BDT.<?php echo $product_info_by_manufacture['product_price']?> </h2>
                                        <p><?php echo $product_info_by_manufacture['product_name']?></p>
                                        <a href="product-details.php?id=<?php echo $product_info_by_manufacture['product_id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>