	<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
                                                              <?php 
                                                        $run_query_select_all_published_category= $object_apllication -> select_all_published_category();
                                                        while ($select_all_published_category = mysqli_fetch_assoc($run_query_select_all_published_category)){
                                                           // var_dump($select_all_published_category);
                                                            ?>
                                                            <li><a href="category.php?id=<?php echo $select_all_published_category['category_id']; ?>"><?php echo $select_all_published_category['category_name'];?></a></li>  
                                                            
                                                       <?php  }?>
                                                            
                                                            
								 
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
<!--							<h2>Policies</h2>-->
                                                                <h2>Manufacture</h2>
							<ul class="nav nav-pills nav-stacked">
                                                                    <?php 
                                                        $run_query_select_all_published_manufacture= $object_apllication -> select_all_published_manufacture();
                                                        while ($select_all_published_manufacture = mysqli_fetch_assoc($run_query_select_all_published_manufacture)){
                                                           // var_dump($select_all_published_manufacture);
                                                            ?>
                                                        <li><a href="manufacture.php?id=<?php echo $select_all_published_manufacture['manufacture_id']; ?>"><?php echo $select_all_published_manufacture['manufacture_name']?></a></li>  
                                                            
                                                       <?php  }?>
								 
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>