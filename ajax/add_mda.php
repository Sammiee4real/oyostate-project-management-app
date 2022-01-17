<?php 
  session_start();
  require_once('../config/functions.php');
        $table = 'mdas';
        $data = ['mda_name','added_by'];
        $validate_value = $_POST['mda_name'];
        $insert = insert_into_db($table,$data,'mda_name',$validate_value);
        $insert_dec = json_decode($insert,true);     
        if($insert_dec['status'] != 111){
          echo $insert_dec['msg'];
        } else{
          echo 200;
        }
?>