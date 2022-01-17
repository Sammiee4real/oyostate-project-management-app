<?php 
require_once('config/instantiated_files.php'); 
$projects = get_rows_from_one_table('projects','date_added');

include('layouts/header.php'); 

?>
<div class="app-content content">
      <div class="content-wrapper">
        
          <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">View Projects</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="add_project">Add Project</a>
                  </li>
                  <li class="breadcrumb-item active">View Projects
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <a href="add_project"  class="btn btn-success">Add Project <i class="ft-thumbs-up position-right"></i></a>
            </div>
          </div>


        </div>



        <div class="content-body"><!-- Sales stats -->



<!-- Recent Orders -->
<div class="row">
    
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Projects</h4>
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
                    <?php 

                    ?>
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
                                    <a class="dropdown-item" href="manage_milestones" target="_blank">Manage Milestones</a>
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