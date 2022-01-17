<?php 
  session_start();
  require_once('../config/database_functions.php');
  // echo $counter =  $_POST['counterr'];
  // $farm_name =  $_POST['farm_name'];
  // $farm_id =  $_POST['farm_id'];
  // $farm_address =  $_POST['farm_address'];
  // $coordinate_array = array();

  // for($i=0; $i < $counter; $i++){
  //     //echo $_POST['latitude'.$i].' ,';
  //     $array = array(
  //       'longitude'=>$_POST['longitude'.$i],
  //       'latitude'=>$_POST['latitude'.$i]
  //     );
  //     $coordinate_array[] = $array;
  // }


 
  // // $insert_farm = insert_into_db($table,$data,'farm_name',$validate_value);
  // $insert_farm = edit_farm_records($farm_id,$farm_name,$farm_address,$coordinate_array);
  // $insert_farm_dec = json_decode($insert_farm,true); 

  // if($insert_farm_dec['status'] != 111){
  // echo $insert_farm_dec['msg'];
  // } else{
  // echo 200;
  // }

  print_r($_POST);







?>