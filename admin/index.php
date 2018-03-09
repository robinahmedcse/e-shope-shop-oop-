<?php 

session_start();

$adminId= isset($_SESSION['adminId']);
if($adminId){
    header('location:adminmaster.php');
}

 

if(isset($_POST['btn'])){
  //  var_dump($_POST);
  include './class_file/adminLogin.php';
   $obj_admin= new adminLogin();
  $obj_admin ->admin_login_check($_POST);
}


?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | E-shop</title>


        <!-- Bootstrap -->
        <link href="asset/backEnd/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="asset/backEnd/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="asset/backEnd/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="asset/backEnd/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="asset/backEnd/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="asset/backEnd/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="asset/backEnd/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="asset/backEnd/vendors/build/css/custom.min.css" rel="stylesheet">
        
          <script>
              function one_delete(){
                   var check = confirm("are you sure to delete this");
                  if(check){return true;}else{return false;}
              }   
            
            
        </script>	
    </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form action="" method="POST">
              <h1>Admin Login</h1>
              
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

              <div>
                  <input type="text" class="form-control"name="adminEmail" placeholder="Admin email" required="" />
              </div>
              <div>
                <input type="password" class="form-control"name="adminPassword" placeholder="Admin Password" required="" />
              </div>
              <div>
 

<input type="submit" name="btn" value="submit" class="btn btn-default submit">
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                 

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i>EMP</h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
 
      </div>
    </div>
     

  
        <!-- jQuery -->
        <script src="asset/backEnd/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="asset/backEnd/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="asset/backEnd/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="asset/backEnd/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="asset/backEnd/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="asset/backEnd/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="asset/backEnd/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="asset/backEnd/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="asset/backEnd/vendors/Flot/jquery.flot.js"></script>
        <script src="asset/backEnd/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="asset/backEnd/vendors/Flot/jquery.flot.time.js"></script>
        <script src="asset/backEnd/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="asset/backEnd/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="asset/backEnd/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="asset/backEnd/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="asset/backEnd/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="asset/backEnd/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="asset/backEnd/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="asset/backEnd/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="asset/backEnd/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="asset/backEnd/vendors/moment/min/moment.min.js"></script>
        <script src="asset/backEnd/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- jquery.inputmask -->
  <script src="asset/backEnd/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="asset/backEnd/vendors/build/js/custom.min.js"></script>

          <!-- jQuery Smart Wizard -->
    <script src="asset/backEnd/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- FastClick -->
    <script src="asset/backEnd/vendors/fastclick/lib/fastclick.js"></script>
    
  </body>
</html>
