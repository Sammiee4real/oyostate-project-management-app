<?php require_once('../config/database_functions.php'); 
  $unique_id = $_POST['unique_id'];
  //echo $coop_id;
  $delete_doc = delete_document($unique_id);
  $delete_doc_dec = json_decode($delete_doc,true); 
       
        if($delete_doc_dec['status'] != 111){
          echo $delete_doc_dec['msg'];
        } else{
          echo 200;
        }



?>