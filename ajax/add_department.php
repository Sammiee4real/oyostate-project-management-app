<?php 
  session_start();
  require_once('../config/functions.php');
        $table = 'departments';
        $data = ['department_name','added_by'];
        $validate_value = $_POST['department_name'];
        $insert = insert_into_db($table,$data,'department_name',$validate_value);
        $insert_dec = json_decode($insert,true);     
        if($insert_dec['status'] != 111){
          echo $insert_dec['msg'];
        } else{
          echo 200;
        }
?>