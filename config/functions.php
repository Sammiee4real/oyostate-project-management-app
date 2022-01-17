<?php
$table = "";
$app_name = 'OYO STATE PROJECT';
require_once("db_connect.php");
require_once("config.php");
// require_once("generic_functions.php");
global $dbc;
global $project_base_path;
require_once('php_funcs.php');

function getLocationMarkers(){
    global $dbc;
    $sql = "SELECT * FROM `projects_markers`";
    $qry = mysqli_query($dbc,$sql);
    while( $row = mysqli_fetch_array($qry)){
        $project_id = $row['project_id'];
        $project_name = getData('project_name','projects','unique_id',$project_id);
        $project_phaseid = getData('project_phase','projects','unique_id',$project_id);
        $project_phase = getData('phase_name','project_phases','unique_id',$project_phaseid);
        $id = $row['id'];
        $address = $row['address'];
        $lng = $row['lng'];
        $lat = $row['lat'];
        $array = array(
            'id'=>$id,
            'project_id'=>$project_id,
            'project_name'=>$project_name,
            'project_phase'=>$project_phase,
            'address'=>$address,
            'lng'=>floatval($lng),
            'lat'=>floatval($lat)
            );
        $data[] = $array; 
    }
    return $data;       
}

function getColleges(){
    global $dbc;
    $sql = "SELECT * FROM `colleges`";
    $qry = mysqli_query($dbc,$sql);
    while( $row = mysqli_fetch_array($qry)){
        $name = $row['name'];
        $id = $row['id'];
        $address = $row['address'];
        $lng = $row['lng'];
        $lat = $row['lat'];
        $array = array(
            'id'=>$id,
            'name'=>$name,
            'address'=>$address,
            'lng'=>floatval($lng),
            'lat'=>floatval($lat)
            );
        $data[] = $array; 
    }
    return $data;       
}


function format_date_two($style,$date){
            $date = secure_database($date);
            $new_date_format = date($style, strtotime($date));
            return $new_date_format;
        }

function format_date($date){
            $date = secure_database($date);
            $new_date_format = date('F-d-Y', strtotime($date));

            return $new_date_format;
        }

function get_recent_records($table,$order_option,$limit){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` ORDER BY `$order_option` DESC LIMIT $limit";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
            while($row = mysqli_fetch_array($query)){
                $row_display[] = $row;
                }
            return $row_display;
          }
          else{
             return null;
          }
}


function add_projects_milestones($milestone,$timeline,$project_id){
          global $dbc;
          //insert milestones 
          $unique_id = unique_id_generator($project_id.rand(111111,999999));
          $check_exist = check_record_by_one_param('projects_milestones','title',$milestone);
           
           //if it does not exist is the only time it can be inserted
          if($check_exist){
            }else{
                 $sql_milestone = "INSERT INTO `projects_milestones` SET 
                    `unique_id`='$unique_id',
                    `project_id`='$project_id',
                    `title`='$milestone',
                    `date_for_completion`='$timeline'
                ";
                $insert_milestone = mysqli_query($dbc,$sql_milestone) or die(mysqli_error($dbc));
            }
            
            // return  json_encode(["status"=>200, "msg"=>"Milestones was successfully added"]);
}

function add_projects_markers($lng,$lat,$address,$project_id){
          global $dbc;
          //insert markers
          $lng = floatval($lng);
          $lat = floatval($lat);
          $check_exist = check_record_by_two_params('projects_markers','lng',$lng,'lat',$lat);
           
           //if it does not exist is the only time it can be inserted
          if($check_exist){
            }else{
                 $sql_markers = "INSERT INTO `projects_markers` SET 
                    `project_id`='$project_id',
                    `lng`='$lng',
                    `lat`='$lat',
                    `address`='$address',
                    `date_added`=now()
                ";
                $insert_markers = mysqli_query($dbc,$sql_markers) or die(mysqli_error($dbc));
            }
            
            // return  json_encode(["status"=>200, "msg"=>"Markers was successfully added"]);
}

function add_project_details($unique_id,$project_phase,$added_by,$project_name,$project_description,$project_amount,$contractors,$users,$depts,$mdas,$zones,$project_start_date,$expected_completion_date){
    global $dbc;
    $table = 'projects';
    $check_exist = check_record_by_one_param('projects','project_name',$project_name);
    if($check_exist){
       return  json_encode(["status"=>114, "msg"=>"This project exists already"]);
    }

    else if($added_by == "" || $project_phase == "" || $project_start_date == "" || $expected_completion_date == "" || $project_name == "" || $project_description == "" || $project_amount == "" || 
            empty($contractors) || empty($users) || empty($depts) || empty($mdas) || empty($zones) )
    {
       return  json_encode(["status"=>104, "msg"=>"One or more fields found empty"]);
    }

    // else if($milestone_count <= 0){
    //    return  json_encode(["status"=>104, "msg"=>"Milestones are not yet set"]);
    // }
    else{
                $contractors = json_encode($contractors);
                $users = json_encode($users);
                $depts = json_encode($depts);
                $mdas = json_encode($mdas);
                $zones = json_encode($zones);

                // $unique_id = unique_id_generator($project_name.time());
                $create_sql = "INSERT INTO `projects` SET
                `unique_id`='$unique_id',
                `project_name`='$project_name',
                `project_phase`='$project_phase',
                `project_amount`='$project_amount',
                `project_description`='$project_description',
                `contractors`='$contractors',
                `follow_up_persons`='$users',
                `project_start_date`='$project_start_date',
                `expected_completion_date`='$expected_completion_date',
                `departments`='$depts',
                `mdas`='$mdas',
                `zones`='$zones',
                `completion_status`=0,
                `added_by`='$added_by',
                `date_added`=now()
                ";
                $create_qry = mysqli_query($dbc,$create_sql) or die(mysqli_error($dbc)); 
                

                return  json_encode(["status"=>200, "msg"=>"Project was successfully added"]);
                

                // <br><a href='#'>Continue by adding Images</a>
            
    }
}

function delete_document($unique_id){
    global $dbc;
    $unique_id = secure_database($unique_id);
    $sql = "DELETE FROM `documents`where `unique_id`='$unique_id'";
    $qry = mysqli_query($dbc,$sql);    
    return  json_encode(["status"=>200, "msg"=>"success"]);

}


function add_project_docs($added_by,$project_id,$file_name, $size, $tmpName,$type){
    global $dbc;
    $table = 'projects_docs';
     $project_details = get_one_row_from_one_table_by_id('projects','unique_id',$project_id,'date_added');
    $project_name = $project_details['project_name'];
   
            $files_upload = files_upload($file_name, $size, $tmpName,$type);
            $files_upload_dec = json_decode($files_upload,true);
            if($files_upload_dec['status'] != '200' ){
                 return json_encode(["status"=>"104","msg"=>$files_upload_dec['msg']." for the project: ".$project_name ]);  
            }else{
                
                $unique_id = unique_id_generator($project_id.time());
                $file_path = $files_upload_dec['msg'];
                $create_sql = "INSERT INTO `projects_docs` SET
                `unique_id`='$unique_id',
                `project_id`='$project_id',
                `doc_path`='$file_path',
                `added_by`='$added_by',
                `date_added`=now()
                ";
                $create_qry = mysqli_query($dbc,$create_sql) or die(mysqli_error($dbc)); 
                return  json_encode(["status"=>200, "msg"=>"Project Documents was successfully added for the project: ".$project_name]);
            }
    

}


function files_upload($file_name, $size, $tmpName,$type){
    $upload_path33 = "project_docs/".$file_name;
    $file_extensions = ['pdf','PDF','DOCX','DOC','docx','doc','jpg','jpeg','JPG','JPEG','png','PNG'];
    $file_extension = substr($file_name,strpos($file_name, '.') + 1);
    
    if(!in_array($file_extension, $file_extensions)){
      return json_encode(["status"=>"0","msg"=>"incorrect_format"]);
    }else{
        // $upload_path33 = 'ebooks/'.$file_name;
        //2Mb
        if($size > 5000000){
          return json_encode(["status"=>"130","msg"=>"too_big"]);
        }else{
          $upload = move_uploaded_file($tmpName, $upload_path33);
          if($upload == true){
              return json_encode(["status"=>"200","msg"=>$upload_path33]);
          }else{
              return json_encode(["status"=>"104","msg"=>"failurerr   ".$upload_path33]);  
          }
        }

    }


}




function verify_password_link($passcode){
    global $dbc;
    global $project_base_path;
    $table = 'reset_password';
    $link_in_db = $project_base_path.'/change_password?passcode='.$passcode;
    $check_expiry = check_record_by_two_params($table,'link_code',$link_in_db,'expiration_status',1);
    $check_exist = check_record_by_one_param($table,'link_code',$link_in_db);


  if($passcode == ""){
        //means expiration has expired
       return  json_encode(["status"=>108, "msg"=>"Code not found"]);
    }

   else if($check_expiry){
        //means expiration has expired
       return  json_encode(["status"=>108, "msg"=>"This link has expired"]);
    }
    else if(!$check_exist){
       return  json_encode(["status"=>102, "msg"=>"This link does not exist"]);
    
    }
    else{
       return  json_encode(["status"=>111, "msg"=>"This link is good"]);

    }

}

function confirm_password_change($passcode,$password,$cpassword){
    global $dbc;
    global $project_base_path;
    $link_in_db = $project_base_path.'/change_password?passcode='.$passcode;
    $table = 'reset_password';
    $table2 = 'users';

    if($password != $cpassword){
       return  json_encode(["status"=>108, "msg"=>"Pasword mismatch found"]);
    }

    if($password  == "" || $cpassword == ""){
       return  json_encode(["status"=>108, "msg"=>"Empty record found"]);
    }


    $hashpassword = md5($password);
    $user_id = explode('_',$passcode)[0];

    $update_reset_pass_link  = "UPDATE `$table` SET `expiration_status`=1 WHERE `link_code`='$link_in_db'";
    $qry_update_reset_pass_link = mysqli_query($dbc,$update_reset_pass_link);

    $update_pass = "UPDATE `$table2` SET `password`='$hashpassword' WHERE `unique_id`='$user_id'";
    $qry_update_pass = mysqli_query($dbc,$update_pass);

    if($qry_update_pass == true && $qry_update_reset_pass_link == true){
        //means expiration has expired
       return  json_encode(["status"=>111, "msg"=>"success"]);
    }
    else{
       return  json_encode(["status"=>108, "msg"=>"Server error"]);
    }

}

function password_reset($email){
    global $dbc;
    global $project_base_path;
    $table = 'reset_password';
     $user_details = get_one_row_from_one_table_by_id('users','email',$email,'date_created');
     if($user_details == null){
       return  json_encode(["status"=>101, "msg"=>"This record does not Exists"]);
     }

    $uid = $user_details['unique_id'];
    $passgener = unique_id_generator(rand(99999999,11111111));
    //means there is a record sent to mail already
    $check = check_record_by_two_params($table,'email',$email,'expiration_status',0);
    if($check){
        $rand_val = rand(1111111,9999999);
        $actual_link = $project_base_path.'/change_password?passcode='.$uid.'_'.$passgener.'_'.$rand_val;
        //do no insertion/ but update
        $update = "UPDATE `reset_password` SET `link_code`='$actual_link' WHERE `email`='$email' AND `expiration_status`=0";
       $qryup = mysqli_query($dbc,$update);
    }else{
        //insertion
        $rand_val = rand(1111111,9999999);
        $actual_link = $project_base_path.'/change_password?passcode='.$uid.'_'.$passgener.'_'.$rand_val;
        $unique_id = unique_id_generator($email.$rand_val);
        $insert = "INSERT INTO `reset_password` SET `link_code`='$actual_link',`unique_id`='$unique_id',`email`='$email'";
        $qry_insert = mysqli_query($dbc,$insert);
    }

        $email_subject = 'Password Reset Link';
        $content = '<p>Please click the link below to reset your password</p>';
        // $content .= '<p>'.$actual_link.'</p>';
        // $content .= '<p>Alternatively, you can click the change password button <a class="btn btn-lg btn-success" href=".$actual_link.">Reset Password</a></p>';
        $content .= '<p><a class="btn btn-lg btn-success" href='.$actual_link.'>Reset Password</a></p>';
        $content .= 'Thank you';
        if(email_function($email, $email_subject, $content)){
          return json_encode(array("status"=>111,"msg"=>"Password reset link was sent to your inbox, check spam too."));
        }else{
          return json_encode(array("status"=>107, "msg"=>"Password reset link not sent"));
        }

}


function insert_into_db($table,$data,$param,$validate_value){
  global $dbc;
  $validate_value = secure_database($validate_value);
  $param = secure_database($param);
  $table = secure_database($table);
  $emptyfound = 0;
  $emptyfound_arr = [];
  $check = check_record_by_one_param($table,$param,$validate_value);
  
  if($check === true){
    return  json_encode(["status"=>"0", "msg"=>"This Record Exists"]);
  }
  else{
   if( is_array($data) && !empty($data) ){
      $unique_id = unique_id_generator($validate_value.md5(uniqid()));
     $sql = "INSERT INTO `$table` SET  `unique_id` = '$unique_id',";
     $sql .= "`date_added` = now(), ";
     //$sql .= "`privilege` = '1', ";
        for($i = 0; $i < count($data); $i++){
            $each_data = $data[$i];
            
            if($_POST[$each_data] == ""  ){
              $emptyfound++;
              $emptyfound_arr[] = $each_data;
            }


            if($i ==  (count($data) - 1)  ){
                 $sql .= " $data[$i] = '$_POST[$each_data]' ";
              }else{
                if($data[$i] === "password"){
                $enc_password = md5($_POST[$data[$i]]); 
                $sql .= " $data[$i] = '$enc_password' ,";
                }else{
                $sql .= " $data[$i] = '$_POST[$each_data]' ,";
                } 
            }

        }
    
      
      if($emptyfound > 0){
          return json_encode(["status"=>"100", "msg"=>"Empty Field(s)","details"=>$emptyfound_arr]);
      } 
       else{
        $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        if($query){
          return json_encode(["status"=>"111", "msg"=>"success"]);
        }else{
          return json_encode(["status"=>"102", "msg"=>"db_error"]);
        }

      }  

    }
    else{
      return json_encode(["status"=>"100", "msg"=>"error"]);
    }

  } 

}


function update_data_by_a_param($table,$data,$conditional_param,$conditional_value){
  global $dbc;
  $emptyfound = 0;
  $table = secure_database($table);
  // $data = secure_database($data);
  $conditional_param = secure_database($conditional_param);
  $conditional_value = secure_database($conditional_value);

  $emptyfound_arr = [];

  if( is_array($data) && !empty($data) ){
   $sql = "UPDATE `$table` SET ";
      for($i = 0; $i < count($data); $i++){
          $each_data = $data[$i];

           if($_POST[$each_data] == ""  ){
              $emptyfound++;
              $emptyfound_arr[] = $each_data;
           }

          $each_data = secure_database($_POST[$each_data]);
          if($i ==  (count($data) - 1)  ){
            $sql .= " $data[$i] = '$each_data' ";
          }else{
            $sql .= " $data[$i] = '$each_data' ,";
          }

      }

    $sql .= "WHERE `$conditional_param` = '$conditional_value'";

       

    if($emptyfound > 0){
            return json_encode(["status"=>"103", "msg"=>"Empty field(s) were found<br>".json_encode($emptyfound_arr) ]);
    }else{
            $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
            if($query){
            return json_encode(["status"=>"111", "msg"=>"success"]);
            }else{
            return json_encode(["status"=>"102", "msg"=>"db_error"]);
            }
    }

  
  
  }
  else{
    return json_encode(["status"=>"106", "msg"=>"error"]);
  }

}


function update_data($table, $data,$conditional_param,$conditional_value_array){
  global $dbc;
   $table = secure_database($table);
  //$data = secure_database($data);
  $conditional_param = secure_database($conditional_param);
  $conditional_value_array = secure_database($conditional_value_array);


  if( count($conditional_value_array) === 0  ){
      return json_encode(["status"=>"102", "msg"=>"no condition found"]);
  }


  if( is_array($data) && !empty($data) ){
   $sql = "UPDATE `$table` SET ";
      for($i = 0; $i < count($data); $i++){
          $each_data = $data[$i];
          $each_data2 = secure_database($_POST[$each_data]);

          if($i ==  (count($data) - 1)  ){
            $sql .= " $data[$i] = 'each_data2' ";
          }else{
            $sql .= " $data[$i] = 'each_data2' ,";
          }

      }

    $sql .= "WHERE `$conditional_param` = '$conditional_value'";
  
    $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
    if($query){
       return json_encode(["status"=>"111", "msg"=>"success"]);
    }else{
      return json_encode(["status"=>"102", "msg"=>"db_error"]);
    }
  }
  else{
    return json_encode(["status"=>"106", "msg"=>"error"]);
  }
}

function delete_old_image($table,$path_name,$unique_id){
     global $dbc;
    $table = secure_database($table);
    $path_name = secure_database($path_name);
    $unique_id = secure_database($unique_id);

     $sql = "SELECT * FROM `$table` WHERE `id`='$unique_id'";
     $query = mysqli_query($dbc, $sql);
     $row = mysqli_fetch_array($query);
     $img_url = $row[$path_name];
     return unlink($img_url);
}

function  delete_record($table,$param,$value){
    global $dbc;
    $table = secure_database($table);
    $param = secure_database($param);
    $value = secure_database($value);

    $sql = "DELETE FROM `$table` WHERE `$param`='$value'";
    $query = mysqli_query($dbc,$sql);
    if($query){
      return true;
    }else{
      return false;
    }
}


function add_fk_admin($uid,$fname,$lname,$email,$phone,$password,$cpassword){
  global $dbc;
  global $admin_unique_id;
  global $project_base_path;

  $role = $admin_unique_id;

    $uid = secure_database($uid);
    $fname = secure_database($fname);
    $lname = secure_database($lname);
    $email = secure_database($email);
    $phone = secure_database($phone);
    $password = secure_database($password);
    $cpassword = secure_database($cpassword);

   $check_exist = check_record_by_one_param('users','phone',$phone);
   $check_exist2 = check_record_by_one_param('users','email',$email);

   if($check_exist2){
                return json_encode(array( "status"=>109, "msg"=>"This User Email exists" ));
         }

    // else if($check_exist2){
    //             return json_encode(array( "status"=>109, "msg"=>"This User Email  exists" ));
    //      }

         else{

            if( $fname == "" || $lname == ""  || $email == ""  || $phone == "" 
            || $password == ""  || $cpassword == "" || $role == ""  ){
                  return json_encode(array( "status"=>101, "msg"=>"Empty field(s) found" ));
                }
              else{
                $unique_id = unique_id_generator($fname.$phone);
                $enc_password = md5($password);
                $sql = "INSERT INTO `users` SET
                `unique_id` = '$unique_id',
                `fname` = '$fname',
                `lname` = '$lname',
                `email` = '$email',
                `phone` = '$phone',
                `password` = '$enc_password',
                `added_by` = '$uid',
                `role` = '$role',
                `date_created` = now()
                ";
                $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        
              if($query){
          
                        $login_link = $project_base_path.'/index';          
                        $email_subject = 'Account Creation';
                        $content = '<p>Please check the details below to login:</p>';
                    
                        $content .= '<p>Username: '.$email.'</p>';
                        $content .= '<p>Password: '.$password.'</p>';

                        $content .= '<p>You can login using this link <a class="btn btn-lg btn-success" href='.$login_link.'>Click Login to Account</a></p>';
                        $content .= '<p>Thank you</p>';


                        if(email_function($email, $email_subject, $content)){
                        return json_encode(array("status"=>111,"msg"=>"Password reset link was sent to your inbox, check spam too."));
                        }else{
                        return json_encode(array("status"=>107, "msg"=>"Password reset link not sent"));
                        }

                }else{
                    return json_encode(array( "status"=>100, "msg"=>"Something went wrong"));
                  }
                }
         }
}





function edit_users($user_id,$first_name,$last_name,$email,$phone,$password,$role){
  global $dbc;

            $uid = secure_database($uid);
            $first_name = secure_database($first_name);
            $last_name = secure_database($last_name);
            $email = secure_database($email);
            $phone = secure_database($phone);
            $password = secure_database($password);
            $role = secure_database($role);

            if( $first_name == "" || $last_name == ""  || $email == ""  || $phone == "" 
             || $role == "" || $user_id == ""  ){
                  return json_encode(array( "status"=>101, "msg"=>"Empty field(s) found" ));
                }
              else{

                if($password == ""){
                    $sql = "UPDATE `admin_users` SET
                    `fname` = '$first_name',
                    `lname` = '$last_name',
                    `email` = '$email',
                    `phone` = '$phone',
                    `role` = '$role' WHERE `unique_id`='$user_id'
                    ";
                }else {
                    $enc_password = md5($password);
                    $sql = "UPDATE `admin_users` SET
                    `fname` = '$first_name',
                    `lname` = '$last_name',
                    `email` = '$email',
                    `phone` = '$phone',
                    `password` = '$enc_password',
                    `role` = '$role' WHERE `unique_id`='$user_id'
                    ";
                }
              

                $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        
              if($query){
          
                 return json_encode(array( "status"=>111, "msg"=>"success"));

                }else{

                 return json_encode(array( "status"=>100, "msg"=>"Something went wrong"));

                  }
                }
         

}

function in_array_all($needles, $haystack) {
   return empty(array_diff($needles, $haystack));
}


function add_role_privileges($uid,$role_name,$read_write_access,$pages_access){
  global $dbc;
  $check_exist = check_record_by_one_param('role_privileges','role_name',$role_name);

   if($check_exist){
                return json_encode(array( "status"=>109, "msg"=>"This Role exists" ));
         }

    else{
            if( $role_name == "" || $read_write_access == ""  ){
                  return json_encode(array( "status"=>101, "msg"=>"Empty field(s) found" ));
                }
            if(count($pages_access) <= 0){
                  return json_encode(array( "status"=>101, "msg"=>"Please select atleast a page to access" ));
              }
              else{
                $role_id = unique_id_generator($role_name.rand(1111,5555));
                $enc_pages_access = json_encode($pages_access);



                $sql = "INSERT INTO `role_privileges` SET
                `role_id` = '$role_id',
                `role_name` = '$role_name',
                `read_write_access` = '$read_write_access',
                `pages_access` = '$enc_pages_access',
                `added_by` = '$uid',
                `date_added` = now()
                ";
                $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        
              if($query){
          
                 return json_encode(array( "status"=>111, "msg"=>"success"));

                }else{

                 return json_encode(array( "status"=>100, "msg"=>"Something went wrong"));

                  }
                }
         }
}

function edit_role_privileges($uid,$role_id,$pages_access){
  global $dbc;

            if( $role_id == ""){
                  return json_encode(array( "status"=>101, "msg"=>"Empty field(s) found"));
                }
            if(count($pages_access) <= 0){
                  return json_encode(array( "status"=>101, "msg"=>"Please select atleast a page to access" ));
              }
              else{

                $enc_pages_access = json_encode($pages_access);
                $sql = "UPDATE `role_privileges` SET
                `pages_access` = '$enc_pages_access',
                `last_update_by` = '$uid',
                `date_added` = now() WHERE `role_id`='$role_id'
                ";
                $query = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
        
              if($query){
          
                 return json_encode(array( "status"=>111, "msg"=>"success"));

                }else{

                 return json_encode(array( "status"=>100, "msg"=>"Something went wrong"));

                  }
                }
         
}

function update_basic_profile($first_name2,$last_name2,$phone2,$gender2,$uid){
     global $dbc;

     if ($first_name2 == "" || $last_name2 == "" || $phone2 == "" || $gender2 == "" ) {

          return json_encode(array( "status"=>103, "msg"=>"Empty field(s) found" ));
     
     }else{

        $sql = "UPDATE `users` SET `fname`='$first_name2',`lname`='$last_name2',`phone`='$phone2',`gender`='$gender2',`update_option`=1 WHERE `unique_id`='$uid'";
        $qry = mysqli_query($dbc,$sql);
        if($qry){
        return json_encode(array( "status"=>111, "msg"=>"success" ));

        }else{

        return json_encode(array( "status"=>102, "msg"=>"failure" ));

        }

     }
}

function check_profile_update($uid,$bank_name,$account_name,$account_no,$update_option){
   global $dbc;
   $bank_name = secure_database($bank_name);
   $account_name = secure_database($account_name);
   $account_no = secure_database($account_no);
   $update_option = secure_database($update_option);
  
   $sql = "SELECT * FROM users WHERE `unique_id`='$uid'";
   $qry = mysqli_query($dbc,$sql);
   $count = mysqli_num_rows($qry);
   if($count >= 1){
         
         if( ($bank_name == NULL || $account_name == NULL || $account_no == NULL) && $update_option == 0 ){
                return json_encode(array( "status"=>101, "msg"=>"To continue, kindly update your profile..." ));
         }else{
                return json_encode(array( "status"=>111, "msg"=>"Good Standing" ));

         }
   }  
}


function admin_login($email,$password){
   global $dbc;
   $email = secure_database($email);
   $password = secure_database($password);
   $hashpassword = md5($password);

   $sql = "SELECT * FROM users WHERE `email`='$email' AND `password`='$hashpassword' AND `role`='admin'";
   $query = mysqli_query($dbc,$sql);
   $count = mysqli_num_rows($query);
   if($count === 1){
      $row = mysqli_fetch_array($query);
      $fname = $row['fname'];
      $lname = $row['lname'];
      $mname = $row['mname'];
      $phone = $row['phone'];
      $email = $row['email'];
      $unique_id = $row['unique_id'];
      $access_status = $row['access_status'];

      if($access_status != 1){
                return json_encode(array( "status"=>101, "msg"=>"Sorry, you currently do not have access. Contact Admin!" ));
      }else{
                return json_encode(array( 
                    "status"=>111, 
                    "user_id"=>$unique_id, 
                    "fname"=>$fname, 
                    "lname"=>$lname,
                    "mname"=>$mname, 
                    "phone"=>$phone, 
                    "email"=>$email 
                  )
                 );

      }
    
   }else{
                return json_encode(array( "status"=>102, "msg"=>"Wrong Username and/or Password" ));

   }
 

}




  function email_function($email, $subject, $content){
              $headers = "From: Farmkonnect\r\n";
              $headers .= "MIME-Version: 1.0" . "\r\n"; 
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
              @$mail = mail($email, $subject, $content, $headers);
              return $mail;
          }

 function getDateForSpecificDayBetweenDates($startDate,$endDate,$day_number){
                  $endDate = strtotime($endDate);
                  $days=array('1'=>'Monday','2' => 'Tuesday','3' => 'Wednesday','4'=>'Thursday','5' =>'Friday','6' => 'Saturday','7'=>'Sunday');
                  for($i = strtotime($days[$day_number], strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
                  // $date_array[]=date('F-d-Y',$i);
                  $date_array[]=date('Y-m-d',$i);

                  return $date_array;
         }



function get_rows_from_one_table_with_sql_param($sql_array,$table,$conditions,$order_option){
         global $dbc;
         $array_ppt = "";
         $conditions_param = "";
        if(count($sql_array) == 0){
            $array_ppt .= "*";
        }else{
            for($j=0; $j < count($sql_array);$j++){
            if($j == (count($sql_array) - 1) ){
                $array_ppt .= $sql_array[$j];
            }else{
                $array_ppt .= $sql_array[$j].',';
            }
           }
        }

        //conditions
        if(count($conditions) == 0){
            $conditions_param .= "";
        }else{
            $k =1;
            $conditions_param .= " WHERE ";
            foreach($conditions as $key=>$value){
            if($k == (count($conditions)) ){
                $conditions_param .= "`".$key."`='".$value."'";
            }else{
                $conditions_param .= "`".$key."`='".$value."' AND ";
            }
            $k++;
           }
        }
      
        $sql = "SELECT $array_ppt FROM `$table`  $conditions_param ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
           while($row = mysqli_fetch_array($query)){
             $row_display[] = $row;
           }
                          
            return $row_display;
          }
          else{
             return null;
          }
}



function check_record_by_one_param($table,$param,$value){
    global $dbc;
    $sql = "SELECT id FROM `$table` WHERE `$param`='$value'";
    $query = mysqli_query($dbc, $sql);
    $count = mysqli_num_rows($query);
    if($count > 0){
      return true; ///exists
    }else{
      return false; //does not exist
    }
    
} 

function check_record_by_two_params($table,$param,$value,$param2,$value2){
    global $dbc;
    $sql = "SELECT id FROM `$table` WHERE `$param`='$value' AND `$param2`='$value2'";
    $query = mysqli_query($dbc, $sql);
    $count = mysqli_num_rows($query);
    if($count > 0){
      return true; ///exists
    }else{
      return false; //does not exist
    }
    
}   



function secure_database($value){
    global $dbc;
    $new_value = mysqli_real_escape_string($dbc,$value);
    return $new_value;
}

function get_row_count_no_param($table){
    global $dbc;
    $sql = "SELECT id FROM `$table`";
    $qry = mysqli_query($dbc,$sql);
    $count = mysqli_num_rows($qry);
    if($count > 0){
        return $count;
    }else{
        return 0;
    }
}

function get_row_count_one_param($table,$param,$value){
    global $dbc;
    $sql = "SELECT id FROM `$table` WHERE `$param`='$value'";
    $qry = mysqli_query($dbc,$sql);
    $count = mysqli_num_rows($qry);
    if($count > 0){
        return $count;
    }else{
        return 0;
    }
}


function unique_id_generator($data){
    $data = secure_database($data);
    $newid = md5(uniqid().time().rand(11111,99999).rand(11111,99999).$data);
    return $newid;
}


function get_rows_from_one_table($table,$order_option){
        global $dbc;  
        $sql = "SELECT * FROM `$table` ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
           while($row = mysqli_fetch_array($query)){
             $row_display[] = $row;
           }
                          
            return $row_display;
          }
          else{
             return null;
          }
}

function get_rows_from_one_table_by_id($table,$param,$value,$order_option){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}

function get_rows_from_one_table_by_id_with_order($table,$param,$value,$order_option){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' ORDER BY $order_option";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
        if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}


function get_rows_from_one_table_by_id_null_param($table,$param,$order_option){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` WHERE `$param` IS NULL ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}


//sms functions starts here
   function send_sms($destination_no, $message, $developer_id, $cloud_sms_password)
    {

        // The cloudsms api only accepts numbers in the format 234xxxxxxxxxx (without the + sign.)
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://developers.cloudsms.com.ng/api.php?userid=" . $developer_id . "&password=" . $cloud_sms_password . "&type=0&destination=". $destination_no."&sender=CLOUDSMS&message=$message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        return $response;
    }


    function get_rows_from_one_table_by_id_null_two_params($table,$param,$param2,$value2,$order_option){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` WHERE `$param` IS NULL and  `$param2`='$value2' IS NULL ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}

function get_rows_from_one_table_by_id_not_null_param($table,$param,$order_option){
         global $dbc;
        $table = secure_database($table);
       
        $sql = "SELECT * FROM `$table` WHERE `$param` IS NOT NULL ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}



function get_rows_from_one_table_by_two_params($table,$param,$value,$param2,$value2,$order_option){
        global $dbc;
        $table = secure_database($table);
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' AND `$param2`='$value2' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}


function get_rows_from_one_table_by_three_params($table,$param,$value,$param2,$value2,$param3,$value3,$order_option){
         global $dbc;
        $table = secure_database($table);
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' AND `$param2`='$value2' AND `$param3`='$value3' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             while($row = mysqli_fetch_array($query)){
                $display[] = $row;
             }              
             return $display;
          }
          else{
             return null;
          }
}


function get_one_row_from_one_table_by_id($table,$param,$value,$order_option){
         global $dbc;
        $table = secure_database($table);
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             $row = mysqli_fetch_array($query);              
             return $row;
          }
          else{
             return null;
        }
    }

function get_one_row_from_one_table_by_two_params($table,$param,$value,$param2,$value2,$order_option){
         global $dbc;
        $table = secure_database($table);
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' AND `$param2`='$value2' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             $row = mysqli_fetch_array($query);              
             return $row;
          }
          else{
             return null;
        }
    }


    function get_one_row_from_one_table_by_three_params($table,$param,$value,$param2,$value2,$param3,$value3,$order_option){
         global $dbc;
        $table = secure_database($table);
        $sql = "SELECT * FROM `$table` WHERE `$param`='$value' AND `$param2`='$value2' AND `$param3`='$value3' ORDER BY `$order_option` DESC";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
             $row = mysqli_fetch_array($query);              
             return $row;
          }
          else{
             return null;
        }
    }





function get_visible_rows_from_events_with_pagination($table,$offset,$no_per_page){
         global $dbc;
        $table = secure_database($table);
        $offset = secure_database($offset);
        $no_per_page = secure_database($no_per_page);
        $sql = "SELECT * FROM `events_tbl` WHERE visibility = 1 ORDER BY date_added DESC LIMIT $offset,$no_per_page ";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
            while($row = mysqli_fetch_array($query)){
                $row_display[] = $row;
                }
            return $row_display;
          }
          else{
             return null;
          }
}




function get_total_pages($table,$no_per_page){
    global $dbc;
    $no_per_page = secure_database($no_per_page);
    $total_pages_sql = "SELECT COUNT(id) FROM  `$table` ";
    $result = mysqli_query($dbc,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_per_page);
    return $total_pages;
}



function get_rows_from_one_table_with_pagination($table,$offset,$no_per_page){
         global $dbc;
        $table = secure_database($table);
        $offset = secure_database($offset);
        $no_per_page = secure_database($no_per_page);
        $sql = "SELECT * FROM `$table` ORDER BY date_added DESC LIMIT $offset,$no_per_page ";
        $query = mysqli_query($dbc, $sql);
        $num = mysqli_num_rows($query);
       if($num > 0){
            while($row = mysqli_fetch_array($query)){
                $row_display[] = $row;
                }
            return $row_display;
          }
          else{
             return null;
          }
}


function update_by_one_param($table,$param,$value,$condition,$condition_value){
  global $dbc;
  $sql = "UPDATE `$table` SET `$param`='$value' WHERE `$condition`='$condition_value'";
  $qry = mysqli_query($dbc,$sql);
  if($qry){
     return true;
  }else{
      return false;
  }
}


/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
///////////////////MY NEW GENERIC FUNCTIONS 07-JULY-2021 ENDS
////////////GENERIC FUNCTIONS BELOW
?>
