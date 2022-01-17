<?php 
  session_start();
  require_once('../config/functions.php');
        $table = 'users';
        $data = ['fname','mname','lname','phone','email','password','role','added_by'];
        $validate_value = $_POST['email'];
        $insert_project = insert_into_db($table,$data,'email',$validate_value);
        $insert_project_dec = json_decode($insert_project,true);     
        if($insert_project_dec['status'] != 111){
          echo $insert_project_dec['msg'];
        } else{
          echo 200;
        }





?>