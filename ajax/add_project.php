<?php 
  require_once('../config/functions.php');
  session_start();
  $emptyfound = 0;
  $emptyfound2 = 0;
  $project_name1 =  $_POST['project_name'];
  $unique_id = unique_id_generator($project_name1.time());



              if( isset($_POST['count']) && ($_POST['count'] > 0)  && 
                    isset($_POST['count_gps']) && ($_POST['count_gps'] > 0) 
                      ) {
                

                 foreach( $_POST as $key=>$value){
                              if( (explode('_', $key)[0] == 'milestone') || (explode('_', $key)[0] == 'timeline') ){
                                    if($value == ""){
                                       $emptyfound++;
                                    }else{
                                        //get details
                                        // insert into milestones
                                        // echo (explode('_', $key)[1]).'--'.$value.'<br>';
                                       if( (explode('_', $key)[0] == 'milestone') 
                                            &&  !empty($_POST['milestone_'.explode('_', $key)[1]])
                                            &&  !empty($_POST['timeline_'.explode('_', $key)[1]])
                                          ){

                                            $current_milestone = $_POST['milestone_'.explode('_', $key)[1]];
                                            $current_timeline = $_POST['timeline_'.explode('_', $key)[1]];

                                            add_projects_milestones($current_milestone,$current_timeline,$unique_id);

                                        }
                                        
                                    }
                                
                                }
                              
                    }



                

                 foreach( $_POST as $key=>$value){
                              if( (explode('_', $key)[0] == 'longitude') || (explode('_', $key)[0] == 'latitude') ){
                                    if($value == ""){
                                       $emptyfound2++;
                                    }else{
                                        //get details
                                        // insert into milestones
                                        // echo (explode('_', $key)[1]).'--'.$value.'<br>';
                                       if( (explode('_', $key)[0] == 'longitude') 
                                            &&  !empty($_POST['longitude_'.explode('_', $key)[1]])
                                            &&  !empty($_POST['latitude_'.explode('_', $key)[1]])
                                          ){

                                            $cur_longitude = $_POST['longitude_'.explode('_', $key)[1]];
                                            $cur_latitude = $_POST['latitude_'.explode('_', $key)[1]];
                                            $cur_address = $_POST['address_'.explode('_', $key)[1]];

                                            add_projects_markers($cur_longitude,$cur_latitude,$cur_address,$unique_id);

                                        }
                                        
                                    }
                                
                                }
                              
                    }



                   if(!empty($emptyfound)){
                       echo 'One or more timeline fields found empty';
                   }
                   elseif(!empty($emptyfound2)){
                       echo 'One or more gps fields found empty';
                   }else{

                    $table = 'projects';
                    $project_name =  $_POST['project_name'];
                    $project_phase =  $_POST['project_phase'];
                    $project_description =  $_POST['project_description'];
                    $count =  $_POST['count'];
                    $project_amount =  $_POST['project_amount'];
                    $project_start_date =  $_POST['project_start_date'];
                    $expected_completion_date =  $_POST['expected_completion_date'];
                    $contractors =  !empty($_POST['contractors']) ? $_POST['contractors'] : [] ;
                    $users =  !empty($_POST['users']) ? $_POST['users'] : [] ;
                    $depts =  !empty($_POST['depts'] ) ? $_POST['depts'] : [] ;
                    $mdas =  !empty($_POST['mdas']) ? $_POST['mdas'] : [] ;
                    $zones =  !empty($_POST['zones']) ? $_POST['zones'] : [] ;
                    $added_by =  $_POST['added_by'];

                    $insert_project = add_project_details($unique_id,$project_phase,$added_by,$project_name,$project_description,$project_amount,$contractors,$users,$depts,$mdas,$zones,$project_start_date,$expected_completion_date);
                    $insert_project_dec = json_decode($insert_project,true); 

                    echo $insert_project_dec['msg'];

                   }

                    
                   

              }


              else{
                  echo "milestones and gps must be set";
              }


      

    




?>