<?php 
  require_once('../config/functions.php');
  session_start();
  // print_r($_POST);


  $emptyfound = 0;
  $successful_adds = 0;
  $project_id =  $_POST['project_id'];
  $count =  $_POST['count'];
 

              if( isset($_POST['count']) && ($_POST['count'] > 0) ) {
                

                 foreach( $_POST as $key=>$value){
                              
                        if( (explode('_', $key)[0] == 'milestone') || (explode('_', $key)[0] == 'timeline') ){
                                    if($value == ""){
                                       $emptyfound++;
                                       break;
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

                                            add_projects_milestones($current_milestone,$current_timeline,$project_id);

                                             $successful_adds++;
                                        }
                                        
                                    }
                                
                                }
                              
                    }


                   if(!empty($emptyfound)){
                       echo 'One or more timeline fields found empty';
                   }

                   else if(!empty($successful_adds)){
                       echo 'Milestones were successfully entered';
                   }
                   else{
                        //
                   }

              }


              else{
                  echo "please add milestones";
              }
// ?>