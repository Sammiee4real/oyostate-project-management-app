<?php 
  require_once('../config/database_functions.php');
  
  $project = isset($_POST['project']) ? $_POST['project'] : "";
  $uid = $_POST['added_by'];

    if($project == ''){
      echo "No project was selected";
   }

  else if(!isset($_POST['farms'])){
        echo "Select a farm";
   }else{
          $farms =  $_POST['farms'];
          $assign_farms_to_project = assign_farms_to_project($uid,$farms,$project);
          // echo $cooperative_addition;
          $assign_farms_to_project_dec = json_decode($assign_farms_to_project,true); 

          if($assign_farms_to_project_dec['status'] != 111){
          echo $assign_farms_to_project_dec['msg'];
          } else{
          echo 200;
          }


   }





?>