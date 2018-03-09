<?php

 
class supperAdmin {
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
 
    
          public function select_payment_info_by_order_id($orderId) {
         $sql = "SELECT o.*,p.* FROM tbl_order as o, tbl_payment as p WHERE "
              . "o.order_id=p.order_id AND o.order_id='$orderId'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
      //     $all_shipping_info = mysqli_fetch_assoc($run_query);
    //      var_dump($all_shipping_info);
            return $run_query;
            //die();
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
    
    
        public function select_shipping_info_by_order_id($orderId) {
         $sql = "SELECT o.*,s.* FROM tbl_order as o, tbl_shipping as s WHERE "
              . "o.shipping_id=s.shipping_id AND o.order_id='$orderId'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
          // $all_shipping_info = mysqli_fetch_assoc($run_query);
           //var_dump($all_shipping_info);
           return $run_query;
            //die();
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
    
    
    
      public function select_product_info_by_order_id($orderId) {
         $sql = "SELECT o.*,p.* FROM tbl_order as o, tbl_order_details as p WHERE "
              . "o.order_id=p.order_id AND o.order_id='$orderId'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           
          return $run_query;
         //   die();
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
    
    
    
    public function select_coustomer_info_by_order_id($orderId) {
         $sql = "SELECT o.*,c.* FROM tbl_order as o, tbl_coustomer as c WHERE "
              . "o.coustomer_id=c.coustomer_id AND o.order_id='$orderId'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_customer_info = mysqli_fetch_assoc($run_query);
           // var_dump($all_customer_info);
           return $run_query;
          //   die();
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
    
    
    public function select_all_order_info() {
      
      $sql = "SELECT o.*,c.name,p.payment_type,p.payment_status FROM tbl_order as o, tbl_coustomer as c, tbl_payment as p WHERE "
              . "o.coustomer_id=c.coustomer_id AND o.order_id=p.order_id";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_order_info = mysqli_fetch_assoc($run_query);
           // var_dump($all_order_info);
           return $run_query;
           //  die();
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
        
        
        
        
    }//select_all_order_info
    
    
    
     public function add_product($data) {
     //   echo '<pre>';
   //    var_dump($data);
  //        print_r($_FILES);
//echo $_FILES['proImage']['name'];
//echo $_FILES['proImage']['size'];
//echo $_FILES['proImage']['tmp_name'];
       // die(); 
        
        $directory="asset/productImage";
        $target_file=$directory.$_FILES['proImage']['name'];
        // echo $target_file;
//********* find image 'type' and image size from $target_file//***************
          
        $fileType =  pathinfo($target_file,PATHINFO_EXTENSION);
      //  echo $fileType;
        
        $fileSize= $_FILES['proImage']['size'];
        //echo $fileSize;
        
        
        $image= getimagesize($_FILES['proImage']['tmp_name']);
      // echo "<pre>";
     //print_r($image);
        
     //die();
        
         if ($image) {

            if (file_exists($target_file)) {
                $message = "This image already uploaded";
                return $message;
            } else {
                if ($fileSize > 5242880) {
                    $message = "This image too large";
                    return $message;
                } else {
                    if ($fileType != 'jpg' && $fileType != 'png') {
                        $message = "Image type is not valid";
                        return $message;
                    } else {
                                           
  $sql = "INSERT INTO tbl_product(product_name,category_id,manufacture_id,product_price,stock_amount,"
       . "minimum_stock_amount,short_des,long_dsc,product_image,product_publication_status)"
       . "VALUES('$data[proName]','$data[categoryName]','$data[nanufactureName]','$data[proPrice]','$data[proStock]','$data[proMiniStock]','$data[proShortDsc]',"
       . "'$data[proLongDsc]','$target_file','$data[publicationStatus]')";
                        // echo $sql;
                      //  die();
                        
                          
                        if (mysqli_query($this->link, $sql)) {
                             move_uploaded_file($_FILES['proImage']['tmp_name'], $target_file);
                            $message = "Product Info save succesfull";
                            return $message;
                            header('location:add-product.php');
                        } else {
                            echo "please try again " . mysqli_error($this->link);
                            die();
                        }
                    }
                }
            }
        } //end of image if
        else {
            $message = "uploaded file not an image. Please insert image file ";
            return $message;
        }
        
        
        
        
        
    }
     public function view_all_published_category() {
         $sql = "SELECT * FROM tbl_category WHERE publication_status='1'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_manufacture_info = mysqli_fetch_assoc($run_query);
            //var_dump($all_manufacture_info);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    } 
     public function view_all_published_manufacture() {
         $sql = "SELECT * FROM tbl_manufacture WHERE publication_status='1'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_manufacture_info = mysqli_fetch_assoc($run_query);
            //var_dump($all_manufacture_info);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    } 
     public function view_all_product() {
       // $sql = "SELECT * FROM tbl_product";
      $sql = "SELECT product.*,manu.*,cate.* From tbl_product as product, tbl_manufacture as manu,tbl_category as cate WHERE "
             . "product.category_id=cate.category_id And  product.manufacture_id=manu.manufacture_id";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_manufacture_info = mysqli_fetch_assoc($run_query);
            //var_dump($all_manufacture_info);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    } 
     public function published_product($id) {
         
        $sql="UPDATE tbl_product SET product_publication_status='1' WHERE product_id='$id'"; 
      
        // echo $sql;
        // die();

              
        if(mysqli_query($this->link, $sql)  ){
            
              $message="Product Info Published Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-product.php');
              
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
     public function unpublished_product($id) {
      //   echo $id;
        $sql="UPDATE tbl_product SET product_publication_status='0' WHERE product_id='$id'"; 
    //  die();
        // echo $sql;
        // die();    
        if(mysqli_query($this->link, $sql)  ){
            
              $message="Product Info UnPublished Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-product.php');
              
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }
    
 
    
    /*********************************************************************/
    /*******************  start  Manufacture     ***************************/
    /*********************************************************************/
     public function add_product_manufacture($data) {
       // var_dump($data);
          $sql="INSERT into tbl_manufacture (manufacture_name,publication_Status) VALUES('$data[manuName]','$data[publicationStatus]')" ;
       //   echo $sql;
        //  die();
          
          if(mysqli_query($this->link, $sql)){
              session_start();
              $message="Category Info Save Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-manufacture.php');
              
          }else{
               echo 'Insert Query problem ->' . mysqli_error($this->link);
            die();
          }
          
        
    }
    
    public function view_product_manufacture() {
        $sql = "SELECT * FROM tbl_manufacture";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_manufacture_info = mysqli_fetch_assoc($run_query);
            //var_dump($all_manufacture_info);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

// end of view_product_manufacture

    public function view_product_manufacture_by_id($id) {
        $sql = "SELECT * FROM tbl_manufacture WHERE manufacture_id='$id'";
        // echo $sql;
        // die();

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            //$all_manufacture_info = mysqli_fetch_assoc($run_query);
            //var_dump($all_manufacture_info);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

// end of view_product_manufacture

    public function update_product_manufacture($data) {
        //  var_dump($data);

        $sql = "UPDATE tbl_manufacture SET manufacture_name='$data[manuName]',publication_Status='$data[publicationStatus]' WHERE manufacture_id='$data[manuId]'";

        if (mysqli_query($this->link, $sql)) {

            $message = "manufacture Info Update Succesfully";
            $_SESSION['message'] = $message;

            header('location:view-manufacture.php');
        } else {
            echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

///////

    public function published_manufacture($id) {
        //  var_dump($id);
        //    echo 'ceck';
        // die();
        $sql = "UPDATE tbl_manufacture SET publication_Status='1' WHERE manufacture_id='$id'";

        if (mysqli_query($this->link, $sql)) {

            $message = "manufacture Info Published Succesfully";
            $_SESSION['message'] = $message;

            header('location:view-manufacture.php');
        } else {
            echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

////end of published_category

    public function unpublished_manufacture($id) {
        //  var_dump($id);
        //    echo 'ceck';
        // die();
        $sql = "UPDATE tbl_manufacture SET publication_Status='0' WHERE manufacture_id='$id'";

        if (mysqli_query($this->link, $sql)) {

            $message = "manufacture Info UnPublished Succesfully";
            $_SESSION['message'] = $message;

            header('location:view-manufacture.php');
        } else {
            echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

////end of published_category  

    public function manufacture_info_delete($id) {
        $sql = "DELETE FROM tbl_manufacture WHERE manufacture_id='$id'";
        if (mysqli_query($this->link, $sql)) {

            $message = "manufacture Info Delete Succesfully";
            $_SESSION['message'] = $message;

            header('location:view-manufacture.php');
        } else {
            echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        }
    }

    /*********************************************************************/
    /******************* End of Manufacture*********************************/
    /*********************************************************************/
    
    
    
    /*********************************************************************/
    /*******************  start  Category     ***************************/
    /*********************************************************************/
    public function add_product_category($data) {
       // var_dump($data);
          $sql="INSERT into tbl_category (category_name,publication_Status) VALUES('$data[catName]','$data[publicationStatus]')" ;
       //   echo $sql;
        //  die();
          
          if(mysqli_query($this->link, $sql)){
              session_start();
              $message="Category Info Save Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-category.php');
              
          }else{
               echo 'Insert Query problem ->' . mysqli_error($this->link);
            die();
          }
          
        
    }
    public function view_product_category() {
        $sql="SELECT * FROM tbl_category";
        if(mysqli_query($this->link, $sql)  ){
           $run_query=mysqli_query($this->link, $sql);
           return $run_query;
        }else{
             echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }   
    }  
    public function view_product_category_by_id($id) {
        $sql="SELECT * FROM tbl_category WHERE category_id='$id'";
        if(mysqli_query($this->link, $sql)  ){
           $run_query=mysqli_query($this->link, $sql);
           return $run_query;
        }else{
             echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }   
    }
    public function update_product_category($data) {
      //  var_dump($data);
        
        $sql="UPDATE tbl_category SET category_name='$data[catName]',publication_Status='$data[publicationStatus]' WHERE category_id='$data[catId]'";
              
        if(mysqli_query($this->link, $sql)  ){
            
              $message="Category Info Update Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-category.php');
              
        }else{
             echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        } 
        }///////
    public function published_category($id) {
           //  var_dump($id);
         //    echo 'ceck';
       // die();
        $sql="UPDATE tbl_category SET publication_Status='1' WHERE category_id='$id'";
              
        if(mysqli_query($this->link, $sql)  ){
            
              $message="Category Info Published Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-category.php');
              
        }else{
             echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        } 
        }////end of published_category
    public function unpublished_category($id) {
           //  var_dump($id);
         //    echo 'ceck';
       // die();
        $sql="UPDATE tbl_category SET publication_Status='0' WHERE category_id='$id'";
              
        if(mysqli_query($this->link, $sql)  ){
            
              $message="Category Info UnPublished Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-category.php');
              
        }else{
             echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        } 
        }////end of published_category  
    public function category_info_delete($id) {
        $sql="DELETE FROM tbl_category WHERE category_id='$id'";
         if(mysqli_query($this->link, $sql)  ){
            
              $message="Category Info Delete Succesfully";
              $_SESSION['message']=$message;
              
              header('location:view-category.php');
              
        }else{
             echo 'Update Query problem ->' . mysqli_error($this->link);
            die();
        }
    }    
    /*********************************************************************/
    /******************* End of Category*********************************/
    /*********************************************************************/
    
    
     
        
        
        
    /*                *
     *                *
     * logout admin   *
     *                *
     *                */               
    
    
        public function admin_logout() {
         
         unset($_SESSION['adminId']);
         unset( $_SESSION['adminName']);
         
         header("location:index.php");
     }
    
    
}//end of supper Admin

