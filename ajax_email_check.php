<?php
$email=$_GET['email'];
//echo $email;
include 'admin/class_file/application.php';
$object_apllication= new application();

$run_query=$object_apllication ->customer_email_check($email);

 $customer_info = mysqli_fetch_assoc($run_query);
  // var_dump($customer_info);
  ?>
 <html>
     <body>
         <?php   if($customer_info){  ?>
         <b class="text text-danger"><?php  echo"Email Already Exists";?></b>
         <?php  }else{  ?>
          <b class="text text-success"><?php echo"Email Available"; ?></b>
         <?php }?>
     </body>
 </html>