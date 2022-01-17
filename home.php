<?php 
require_once('config/instantiated_files.php'); 
$projects = get_recent_records('projects','date_added',10);

$project_phases = get_rows_from_one_table('project_phases','date_added');

include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Sales stats -->
<div class="row">

    <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Dashboard Analytics</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Dashboard analytics
                  </li>
                </ol>
              </div>
            </div>
          </div>


    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                            <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($all_projects); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Projects</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <!-- <hr > -->
                            <!-- <div class="progress mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> -->
                        </div>

                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo 1.0; ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Over Due Projects</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                                <!-- -->
                            </div>
                        </div>

                       <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo 1.0; ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Pending Projects</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>

                          <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo 1.0; ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Completed Projects</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>


                         <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo 1.0; ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Projects Completed This Month </span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                   <!--  <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo 1.0; ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Projects Due Next Month </span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>

                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                    <!-- <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($zones); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Zones</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>


                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                    <!-- <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($contractors); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Contractors</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>


                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                    <!-- <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($users); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Users</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>



                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                    <!-- <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($departments); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">Departments</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>



                           <div class="col-lg-3 col-sm-12 border-right-blue-grey border-right-lighten-5">
                           <div class="pb-1" style="border-bottom: solid 2px #37bc9b;">
                                <div class="clearfix mb-1">
                                    <!-- <i class="icon-star font-large-1 blue-grey float-left mt-1"></i> -->
                                    <span class="font-large-2 text-bold-300 success float-right"><?php echo number_format($mdas); ?></span>
                                </div>
                                <div class="clearfix">
                                    <span class="text-muted">MDAs</span>
                                    <!-- <span class="info float-right"><i class="ft-arrow-up info"></i> 16</span> -->
                                </div>
                            </div>
                            <div class="progress mb-0" style="height: 7px;">
                               
                            </div>
                        </div>



                         
                  


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<!-- Justified With Bottom Border start -->
<section id="justified-bottom-border">
    <div class="row">
        <div class="col-12 mt-3 mb-1">
            <h4 class="text-uppercase">Project Phases</h4>
            <p>Here is a list of project phases and the associated projects</p>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
              <!--   <div class="card-header">
                    <h4 class="card-title">Tab with Underline</h4>
                </div> -->
                <div class="card-content">
                    <div class="card-body">
                       
                        <ul class="nav nav-tabs nav-underline no-hover-bg nav-justified">
                            
                            <?php $count = 1; foreach ($project_phases as $project_phase) {       
                                $phase_id = $project_phase['unique_id'];
                                if($count == 1){
                                   echo '<li class="nav-item">
                                    <a class="nav-link active" id="active-tab'.$phase_id.'" data-toggle="tab" href="#active'.$phase_id.'" aria-controls="active'.$phase_id.'" aria-expanded="true">'.$project_phase['phase_name'].'</a>
                                    </li>';
                                }else{
                                    echo '<li class="nav-item">
                                    <a class="nav-link" id="link-tab'.$phase_id.'" data-toggle="tab" href="#link'.$phase_id.'" aria-controls="link'.$phase_id.'" aria-expanded="false">'.$project_phase['phase_name'].'</a>
                                    </li>';
                                }
                             ?>
                             <!--   <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="dropdownOpt1-tab2" href="#dropdownOpt21" data-toggle="tab" aria-controls="dropdownOpt21" aria-expanded="true">dropdown 1</a>
                                    <a class="dropdown-item" id="dropdownOpt2-tab2" href="#dropdownOpt22" data-toggle="tab" aria-controls="dropdownOpt22" aria-expanded="true">dropdown 2</a>
                                </div>
                               </li> -->
                             <?php $count++; }?>

                        </ul>


                        <div class="tab-content px-1 pt-1">
                           <?php $count2 = 1; foreach ($project_phases as $project_phase) {       
                                $phase_id = $project_phase['unique_id'];
                                
                                $this_project_phase = get_rows_from_one_table_by_id('projects','project_phase',$phase_id,'date_added');

                                if($count2 == 1){ 
                                ?>
                            <div role="tabpanel" class="tab-pane active" id="active<?php echo $phase_id; ?>" aria-labelledby="active-tab<?php echo $phase_id; ?>" aria-expanded="true">
                                <div class="table-responsive table-bordered table-striped">
                    <!-- table-responsive -->
                    <table id="recent-orders" class="table  table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Amount</th>
                                <th>Project Description</th>
                                <th>Contractors</th>
                                <th>Follow-up Persons</th>
                                <th>Concerned Departments</th>
                                <th>Concerned Zones</th>
                                <th>Concerned MDAs</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php 
                          if($projects == null){
                                    echo '<tr ><td>No record found</td></tr>';
                            }else{
                          foreach ($this_project_phase as $project) { ?>      
                            <tr>
                                
                                <td class="text-truncate"><?php 
                                echo $project['project_name'];     
                                ?></td>
                                <td class="text-truncate"><?php 
                                echo '&#8358;'.number_format($project['project_amount'],2);     
                                ?></td>
                                 <td class="text-truncate"><?php 
                                   $project_phase = getData('phase_name', 'project_phases', 'unique_id', $project['project_phase']);
                                   echo $project_phase;                 
                                ?></td>
                                <td class="text-truncate"><?php 
                                  echo $project['project_description'];                  
                                ?></td>
                               


                                <td class="text-truncate"><?php 
                                 $pc = $project['contractors'];
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';
                                
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['follow_up_persons']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['departments'];  
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p = getData('department_name', 'departments', 'unique_id', $p);
                                    echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['zones']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                  $p = getData('zone_name', 'zones', 'unique_id', $p);
                                  echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';     
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['mdas'];   
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                   $p = getData('mda_name', 'mdas', 'unique_id', $p);
                                   echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';   
                                ?></td>


                                <td class="text-truncate">
                                <?php 
                                 $added_by = $project['added_by'];
                                 $fname = getData('fname', 'users', 'unique_id', $added_by);
                                 $lname = getData('lname', 'users', 'unique_id', $added_by);
                                 
                                 echo $fname.' '.$lname; 
                                
                                ?>
                                </td>
                                <td class="text-truncate"><?php echo $project['date_added']; ?></td>
                                <td>
                                   <!--  <div class="form-group">
                                    <select style="width: 100px;" required=""  class="form-control form-control-sm">
                                        <option value="" disabled="">select an option</option>
                                        <option value=""><a href="#" target="_blank">View More</a></option>
                                        <option value="">Manage Milestones</option>
                                        <option value="">Manage Documents</option>
                                    </select>
                                    </div> -->

                                    <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    select an option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="project_details?pid=<?php echo $project['unique_id']; ?>" target="_blank">View Details</a>
                                    <a class="dropdown-item" href="#" target="_blank">Manage Milestones</a>
                                    <a class="dropdown-item" href="add_project_docs2?pid=<?php echo $project['unique_id']; ?>" target="_blank">Add Docs</a>
                                    </div>
                                    </div>


                                </td>

                            </tr>
                          <?php } 
                            }
                          ?>
                        </tbody>
                    </table>
                </div>

                                
                            </div>

                            <?php }else{?>
                            <div class="tab-pane" id="link<?php echo $phase_id; ?>" role="tabpanel" aria-labelledby="link-tab<?php echo $phase_id; ?>" aria-expanded="false">
                            
                                
                                  <div class="table-responsive table-bordered table-striped">
                    <!-- table-responsive -->
                    <table id="recent-orders" class="table  table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Amount</th>
                                <th>Project Phase</th>
                                <th>Project Description</th>
                                <th>Contractors</th>
                                <th>Follow-up Persons</th>
                                <th>Concerned Departments</th>
                                <th>Concerned Zones</th>
                                <th>Concerned MDAs</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php 
                          if($projects == null){
                                    echo '<tr ><td>No record found</td></tr>';
                            }else{
                          foreach ($this_project_phase as $project) { ?>      
                            <tr>
                                
                                <td class="text-truncate"><?php 
                                echo $project['project_name'];     
                                ?></td>
                                <td class="text-truncate"><?php 
                                echo '&#8358;'.number_format($project['project_amount'],2);     
                                ?></td>
                                 <td class="text-truncate"><?php 
                                   $project_phase = getData('phase_name', 'project_phases', 'unique_id', $project['project_phase']);
                                   echo $project_phase;                 
                                ?></td>
                                <td class="text-truncate"><?php 
                                  echo $project['project_description'];                  
                                ?></td>
                               


                                <td class="text-truncate"><?php 
                                 $pc = $project['contractors'];
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';
                                
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['follow_up_persons']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['departments'];  
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p = getData('department_name', 'departments', 'unique_id', $p);
                                    echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['zones']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                  $p = getData('zone_name', 'zones', 'unique_id', $p);
                                  echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';     
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['mdas'];   
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                   $p = getData('mda_name', 'mdas', 'unique_id', $p);
                                   echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';   
                                ?></td>


                                <td class="text-truncate">
                                <?php 
                                 $added_by = $project['added_by'];
                                 $fname = getData('fname', 'users', 'unique_id', $added_by);
                                 $lname = getData('lname', 'users', 'unique_id', $added_by);
                                 
                                 echo $fname.' '.$lname; 
                                
                                ?>
                                </td>
                                <td class="text-truncate"><?php echo $project['date_added']; ?></td>
                                <td>
                                   <!--  <div class="form-group">
                                    <select style="width: 100px;" required=""  class="form-control form-control-sm">
                                        <option value="" disabled="">select an option</option>
                                        <option value=""><a href="#" target="_blank">View More</a></option>
                                        <option value="">Manage Milestones</option>
                                        <option value="">Manage Documents</option>
                                    </select>
                                    </div> -->

                                    <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    select an option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="project_details?pid=<?php echo $project['unique_id']; ?>" target="_blank">View Details</a>
                                    <a class="dropdown-item" href="#" target="_blank">Manage Milestones</a>
                                    <a class="dropdown-item" href="add_project_docs2?pid=<?php echo $project['unique_id']; ?>" target="_blank">Add Docs</a>
                                    </div>
                                    </div>


                                </td>

                            </tr>
                          <?php } 
                            }
                          ?>
                        </tbody>
                    </table>
                </div>

                                
                            </div>
                        <?php } $count2++; } ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <hr>

<!-- Recent Orders -->
<div class="row">
    
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Projects</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <!-- <div class="card-body">
                    <p>Recent Projects invoices 240, unpaid 150. <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="ft-arrow-right"></i></a></span></p>
                </div> -->
                 <div class="table-responsive table-bordered table-striped">
                    <!-- table-responsive -->
                    <table id="recent-orders" class="table  table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Amount</th>
                                <th>Project Phase</th>
                                <th>Project Description</th>
                                <th>Contractors</th>
                                <th>Follow-up Persons</th>
                                <th>Concerned Departments</th>
                                <th>Concerned Zones</th>
                                <th>Concerned MDAs</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php 
                          if($projects == null){
                                    echo '<tr ><td>No record found</td></tr>';
                            }else{
                          foreach ($projects as $project) { ?>      
                            <tr>
                                
                                <td class="text-truncate"><?php 
                                echo $project['project_name'];     
                                ?></td>
                                <td class="text-truncate"><?php 
                                echo '&#8358;'.number_format($project['project_amount'],2);     
                                ?></td>
                                 <td class="text-truncate"><?php 
                                  echo $project['project_description'];                  
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['contractors'];
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';
                                
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['follow_up_persons']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p1 = getData('fname', 'users', 'unique_id', $p);
                                    $p2 = getData('lname', 'users', 'unique_id', $p);
                                    echo '<li>'.$p1.' '.$p2.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['departments'];  
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                    $p = getData('department_name', 'departments', 'unique_id', $p);
                                    echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';    
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['zones']; 
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                  $p = getData('zone_name', 'zones', 'unique_id', $p);
                                  echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';     
                                ?></td>
                                
                                <td class="text-truncate"><?php 
                                 $pc = $project['mdas'];   
                                 $pcs = json_decode($pc,true);
                                 echo '<ul>';
                                 foreach($pcs as $p){
                                   $p = getData('mda_name', 'mdas', 'unique_id', $p);
                                   echo '<li>'.$p.'</li>';
                                 }
                                 echo '</ul>';   
                                ?></td>


                                <td class="text-truncate">
                                <?php 
                                 $added_by = $project['added_by'];
                                 $fname = getData('fname', 'users', 'unique_id', $added_by);
                                 $lname = getData('lname', 'users', 'unique_id', $added_by);
                                 
                                 echo $fname.' '.$lname; 
                                
                                ?>
                                </td>
                                <td class="text-truncate"><?php echo $project['date_added']; ?></td>
                                <td>
                                   <!--  <div class="form-group">
                                    <select style="width: 100px;" required=""  class="form-control form-control-sm">
                                        <option value="" disabled="">select an option</option>
                                        <option value=""><a href="#" target="_blank">View More</a></option>
                                        <option value="">Manage Milestones</option>
                                        <option value="">Manage Documents</option>
                                    </select>
                                    </div> -->

                                    <div class="dropdown">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    select an option
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="project_details?pid=<?php echo $project['unique_id']; ?>" target="_blank">View Details</a>
                                    <a class="dropdown-item" href="#" target="_blank">Manage Milestones</a>
                                    <a class="dropdown-item" href="add_project_docs2?pid=<?php echo $project['unique_id']; ?>" target="_blank">Add Docs</a>
                                    </div>
                                    </div>


                                </td>

                            </tr>
                          <?php } 
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('layouts/footer.php'); ?>