                 <div class="left-sidebar">
                            <h2>Category</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                              
                                      <?php
                                $run_query_select_all_published_category = $object_apllication->select_all_published_category();
                                while ($select_all_published_category = mysqli_fetch_assoc($run_query_select_all_published_category)) {
                                    // var_dump($select_all_published_category);
                                    ?>
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="category.php?id=<?php echo $select_all_published_category['category_id']; ?>"><?php echo $select_all_published_category['category_name']; ?></a>  
                                        </h4>
                                    </div>
                                </div>

                                <?php } ?>
 
                            </div><!--/category-products-->

                            <div class="brands_products"><!--brands_products-->
                                <h2>Brands</h2>
                                <div class="brands-name">
                                    <ul class="nav nav-pills nav-stacked">
                                        <?php
                                        $run_query_select_all_published_manufacture = $object_apllication->select_all_published_manufacture();
                                        while ($select_all_published_manufacture = mysqli_fetch_assoc($run_query_select_all_published_manufacture)) {
                                            // var_dump($select_all_published_manufacture);
                                            ?>

                                        <li><a href="manufacture.php?id=<?php echo $select_all_published_manufacture['manufacture_id']; ?> "> <span class="pull-right">(50)</span><?php echo $select_all_published_manufacture['manufacture_name']; ?></a></li>
                                        <?php } ?>	

                                    </ul>
                                </div>
                            </div><!--/brands_products-->

                            <div class="price-range"><!--price-range-->
                                <h2>Price Range</h2>
                                <div class="well text-center">
                                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                    <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                                </div>
                            </div><!--/price-range-->
 

                        </div>