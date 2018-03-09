<?php

 
class application {
     private $link;
     public function __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'ecom';
        
        $this->link = mysqli_connect($dbhost, $dbuser, $dbpass);

        if (!$this->link) {
            echo 'Database are not Connected ' . mysqli_error($this->link);
        } else {
            $select_db = mysqli_select_db($this->link, $db);
            if (!$select_db) {
                echo 'Database are not selected ' . mysqli_error($this->link);
            }
        }
    }// end of __construct class
   
    
          public function save_order_info($data) {
        $paymentType = $data['paymentType'];
        // echo $paymentType;

        if ($paymentType == 'CashOnDelivery') {
         //   echo 'CashOnDelivery';
           // session_start();
            $coustomer_id = $_SESSION['coustomer_id'];
            $shipping_id = $_SESSION['shipping_id'];
            $order_total = $_SESSION['order_total'];

            // echo $coustomer_id;
            //echo $shipping_id;
            //echo $order_total;

            $sql_order = "INSERT INTO tbl_order(coustomer_id,shipping_id,order_total)VALUES('$coustomer_id','$shipping_id','$order_total')";
            if (mysqli_query($this->link, $sql_order)) {
                $order_id = mysqli_insert_id($this->link);
                $sql_payment = "INSERT INTO tbl_payment(order_id,payment_type)"
                        . "VALUES('$order_id','$paymentType')";
                if (mysqli_query($this->link, $sql_payment)) {
                    $session_id = session_id();
                    $sql_temp = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";
                   $query_result_sql_temp =mysqli_query($this->link, $sql_temp);
                    
                   while ($product_info = mysqli_fetch_assoc($query_result_sql_temp)) {
                        $sql_product_details = "INSERT INTO tbl_order_details(order_id,product_id,product_name,product_price,product_quantity,product_image)"
                                . " VALUES ('$order_id','$product_info[product_id]','$product_info[product_name]','$product_info[product_price]','$product_info[product_quantity]','$product_info[product_image]')";
                        if (mysqli_query($this->link, $sql_product_details)) {
                            
                        } else {
                            echo 'sql_product_details Query problem ->' . mysqli_error($this->link);
                            die();
                        }
                    }//while_end

                    $sql_temp_de = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id'";
                      mysqli_query($this->link, $sql_temp_de);
                      unset($_SESSION['order_total']);
                   header('location:customer-home.php');
                }//$sql_payment
                else {
                    echo "sql_payment insert query please try again " . mysqli_error($this->link);
                    die();
                }
            }//$sql_order
            else {
                echo "sql_order insert query problem.Please try again " . mysqli_error($this->link);
                die();
            }
        }//if payment-type;
    }//end of save order info
          public function save_coustomer_info($data) {
        var_dump($data);
       
        $pass=md5($data[pass]);
$sql = "INSERT INTO tbl_coustomer(name, email, pass, phone, address, zip, city, country)"
   . "VALUES ('$data[name]','$data[email]','$pass','$data[phone]','$data[address]','$data[zip]','$data[city]','$data[country]')";
    // die();

        if (mysqli_query($this->link, $sql)) {
             $coustomer_id=  mysqli_insert_id($this->link);
             session_start();
             $_SESSION['coustomer_id']=$coustomer_id;
             $_SESSION['coustomer_name']=$data['name'];
            header('location:shipping.php');
        } else {
            echo "please try again " . mysqli_error($this->link);
            die();
        }
    }//end of save_coustomer_info   
          public function customer_email_check($email) {
        //var_dump($email);
        
        $sql="SELECT * FROM tbl_coustomer WHERE email='$email'";
                if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           
            return $run_query;
       
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }       
     
    }//end of coustomer_email_check  
          
    
    public function select_coustomer_info_by_id($id) {
      //  var_dump($id);
        // die();
         $sql = "SELECT * FROM tbl_coustomer WHERE coustomer_id='$id'";
         if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            return $run_query;
           
         } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
          }
    }//end of select_coustomer_info_by_id 
          public function save_shipping_info($data) {
      //  var_dump($data);
$sql = "INSERT INTO tbl_shipping(name, email, phone, address, zip, city, country)"
   . "VALUES ('$data[name]','$data[email]','$data[phone]','$data[address]','$data[zip]','$data[city]','$data[country]')";
    // die();

        if (mysqli_query($this->link, $sql)) {
             $shipping_id=  mysqli_insert_id($this->link);
             session_start();
             $_SESSION['shipping_id']=$shipping_id;
            
            header('location:payment.php');
        } else {
            echo "please try again " . mysqli_error($this->link);
            die();
        }
    }//end of save_coustomer_info
          public function update_cart_product_info ($data)  {
      $product_quantity = $data['product_quantity'];
     
       if($product_quantity >0 ){
           $sql_cart_update="Update tbl_temp_cart SET product_quantity='$product_quantity' WHERE temp_cart_id='$data[temp_cart_id]'";
      
         if (mysqli_query($this->link, $sql_cart_update)) {
            
              $message="Product add Succesfully in cart";
              return $message;
            
             header("Location:cart.php");
           
        } else {
            echo 'insert Query problem ->' . mysqli_error($this->link);
            die();
        }
       }
       else{
            $message="Invaild input.....";
              return $message;
       }
    }
          public function update_cart_product_info_delete($id)  {
     
        $sql="DELETE FROM tbl_temp_cart WHERE temp_cart_id='$id'";
      
         if (mysqli_query($this->link, $sql)) {
            
              $message="Product Delete Succesfully Form Cart";
              return $message;
            
             header("Location:cart.php");
           
        } else {
            echo 'insert Query problem ->' . mysqli_error($this->link);
            die();
        }
       
    }//update_cart_product_info_delete
          public function select_published_product_info_manufacture_id($manufacture_id) {
        
         //var_dump($id); 
         $sql = "SELECT * FROM tbl_product WHERE manufacture_id='$manufacture_id' AND product_publication_status=1 ORDER BY product_id DESC";
         // die();

         if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            return $run_query;
           
         } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
          }
    }//end select_product_info_manufacture_id 
          public function select_published_product_info_category_id($category_id) {
        
         //var_dump($id); 
         $sql = "SELECT * FROM tbl_product WHERE category_id='$category_id' AND product_publication_status=1 ORDER BY product_id DESC";
         // die();

         if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            return $run_query;
           
         } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
          }
    }//end select_product_info_category_id 
          public function select_cart_product_by_session_id($id) {
     //   var_dump($id);
      //  die();
           $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$id'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
             return $run_query;
            
           
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        
        }
    }//end of select_cart_product_by_session_id
          public function add_to_cart($data){
       // var_dump($data);
        $product_id=$data['product_id'];
          $product_quantity=$data['product_quantity'];
       $sql_product="SELECT product_id,product_name,product_image,product_price FROM tbl_product WHERE product_id=' $product_id'"; 
        $run_query = mysqli_query($this->link, $sql_product);
        $product_info=  mysqli_fetch_assoc($run_query);
     //  var_dump($product_info);
       // die();
    
     $session_id=session_id();
           
       $sql_cart="INSERT INTO tbl_temp_cart(product_id,product_name,product_price,product_quantity,product_image,session_id)"
               . " VALUES ('$product_id','$product_info[product_name]','$product_info[product_price]','$product_quantity','$product_info[product_image]','$session_id')";
        
       echo $sql_cart;
         if (mysqli_query($this->link, $sql_cart)) {
             header("Location:cart.php");
           
        } else {
            echo 'insert Query problem ->' . mysqli_error($this->link);
            die();
        }
    }// end of add_to_cart
          public function select_product_info_by_id($id) {
        //  $sql = "SELECT * FROM tbl_product WHERE product_id='$id'";
        $sql = "SELECT product.*,manu.*,cate.* From tbl_product as product, tbl_manufacture as manu,tbl_category as cate WHERE "
             . "product.category_id=cate.category_id And  product.manufacture_id=manu.manufacture_id  AND product_id='$id'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            return $run_query;
           
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }/// end select_product_info_by_id 
          public function select_all_published_category() {
          $sql = "SELECT * FROM tbl_category WHERE publication_status='1'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           // $select_all_published_category = mysqli_fetch_assoc($run_query);
          //  var_dump($select_all_published_category );
            return $run_query;
           
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }/// end select_all_recent_published_category
          public function select_all_published_manufacture() {
          $sql = "SELECT * FROM tbl_manufacture WHERE publication_status='1'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           // $select_all_published_manufacture = mysqli_fetch_assoc($run_query);
          //  var_dump($select_all_published_manufacture );
            return $run_query;
           
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }/// end select_all_recent_published_product
          public function select_all_recent_published_product() {
          $sql = "SELECT * FROM tbl_product WHERE product_publication_status='1'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           // $select_recent_published_product = mysqli_fetch_assoc($run_query);
          //  var_dump($select_recent_published_product);
            return $run_query;
           
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }/// end select_all_recent_published_product
    
    
    
    
        
    public function customer_login_check($data) {
    // var_dump($data);
         $emailAddress= $data['email'];
         $password= md5($data['password']);
     // echo $emailAddress;
       //echo $password;
      // die();  
         $sql="SELECT * FROM tbl_coustomer WHERE email='$emailAddress'"
                 . "AND pass='$password'";
         
         
         if (mysqli_query($this->link, $sql)) {
            $result = mysqli_query($this->link, $sql);
         ///   print_r($result);
            $customer_info = mysqli_fetch_assoc($result);

           // var_dump($admin_info);
            //die();
            if ($customer_info) {
               
               // print_r($admin_info);
             $_SESSION['coustomer_id']=  $customer_info['coustomer_id'];
             $_SESSION['coustomer_name']=$customer_info['name'];
           
                
               header("location:shipping.php");
            } else {
                $message = "invalid Customer email and password";
              //  return $message;
                 $_SESSION['message']=$message;
                
            }
        }
        else{
            $message = "query problem";
            echo  $message;
            die();
        }
        
    } // end of admin login check  
    
   
 
    
 
    
    
    public function customer_logout() {
        
        unset($_SESSION['coustomer_id']);
          unset($_SESSION['coustomer_name']);
           unset($_SESSION['shipping_id']);
          header('location:index.php');
    } 
}// end of application class
