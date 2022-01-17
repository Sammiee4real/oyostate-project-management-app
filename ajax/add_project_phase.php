<?php 
  session_start();
  require_once('../config/functions.php');
        $table = 'project_phases';
        $data = ['phase_name','added_by'];
        $validate_value = $_POST['phase_name'];
        $insert = insert_into_db($table,$data,'phase_name',$validate_value);
        $insert_dec = json_decode($insert,true);     
        if($insert_dec['status'] != 111){
          echo $insert_dec['msg'];
        } else{
          echo 200;
        }

?>