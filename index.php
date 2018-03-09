<?php 
ob_start();

session_start();
include './admin/class_file/application.php';
$object_apllication=new application();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="asset/css/prettyPhoto.css" rel="stylesheet">
    <link href="asset/css/price-range.css" rel="stylesheet">
    <link href="asset/css/animate.css" rel="stylesheet">
    <link href="asset/css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="asset/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="asset/asset/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="asset/asset/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="asset/asset/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="asset/asset/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	   <header id="header"><!--header--> 
               <?php include './include/header_top.php';?>
                <?php include './include/header_mid.php';?>
                <?php include './include/header_bootom.php';?>
	   </header><!--/header-->
    <?php
                   if(isset($pages)){
                      
                       if($pages =='productDetaila'){
                           include './pages/productDetails.php';
                       }
                        elseif($pages =='category'){
                           include './pages/categoryContent.php';
                       }
                        elseif($pages =='manufacture'){
                           include './pages/manufactureContent.php';
                       }
                        elseif($pages =='cart'){
                           include './pages/cart.php';
                       }
                         elseif($pages =='checkout'){
                           include './pages/checkoutContent.php';
                       }
                          elseif($pages =='login'){
                           include './pages/loginContent.php';
                       }
                         elseif($pages =='shipping'){
                           include './pages/shippingContent.php';
                       }
                         elseif($pages =='payment'){
                           include './pages/paymentContent.php';
                       }
                          elseif($pages =='cHome'){
                           include './pages/customerHome.php';
                       }
                   }
                           
                       else{
                       
                           include './pages/homeContent.php';
                       }
    
    
    ?>
           
    <footer id="footer"><!--Footer-->
        <?php include './include/footer_top.php';?>
                <?php include './include/footer-wedgets.php';?>
                <?php include './include/footer-bottom.php';?>
        
        </footer><!--/Footer-->
	
	
	

  
        <script src="asset/js/jquery.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/jquery.scrollUp.min.js"></script>
        <script src="asset/js/price-range.js"></script>
        <script src="asset/js/jquery.prettyPhoto.js"></script>
        <script src="asset/js/main.js"></script>
</body>
</html>