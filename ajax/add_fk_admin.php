<?php 
  require_once('../config/database_functions.php');
  
  $password =  $_POST['password'];
  $cpassword =  $_POST['cpassword'];
  $email =  $_POST['email'];
  $fname =  $_POST['fname'];
  $lname =  $_POST['lname'];
  $phone =  $_POST['phone'];
  $uid22 =  $_POST['uid'];
 

          $signup = add_fk_admin($uid22,$fname,$lname,$email,$phone,$password,$cpassword);
          // $signup = insert_into_db($table,$data,$param,$validate_value);
          $signup_dec = json_decode($signup,true); 
       
        if($signup_dec['status'] != 111){
          echo $signup_dec['msg'];
        } else{
          echo 200;
        }





?>