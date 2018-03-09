<?php


class adminLogin {
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
  
    
    public function admin_login_check($data) {
      // var_dump($data);
         $emailAddress= $data['adminEmail'];
         $password= md5($data['adminPassword']);
     // echo $emailAddress;
       //echo $password;
      // die();  
         $sql="SELECT * FROM tbl_admin WHERE admin_email='$emailAddress'"
                 . "AND admin_password='$password'";
         
         
         if (mysqli_query($this->link, $sql)) {
            $result = mysqli_query($this->link, $sql);
         ///   print_r($result);
            $admin_info = mysqli_fetch_assoc($result);

           // var_dump($admin_info);
            //die();
            if ($admin_info) {
                session_start();
               // print_r($admin_info);
                $_SESSION['adminId']=$admin_info['admin_id'];
                $_SESSION['adminName']=$admin_info['admin_name'];
               // echo $_SESSION['adminId'];
               // echo $_SESSION['adminName'];
                
               header("location:adminmaster.php");
            } else {
                $message = "invalid admin email and password";
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
    
   
 
    
 
    
    
    
    
    
}//end of adminLogin
