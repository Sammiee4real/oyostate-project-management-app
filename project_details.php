<?php 
require_once('config/instantiated_files.php'); 
if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    
    $project_details = get_one_row_from_one_table_by_id('projects','unique_id',$pid,'date_added');
    $project_name = $project_details['project_name'];
    $project_description = $project_details['project_description'];
    $added_by = $project_details['added_by'];
    $creator_fname = getData('fname', 'users', 'unique_id', $added_by);
    $creator_lname = getData('lname', 'users', 'unique_id', $added_by);
    $creator_fullname = $creator_fname.' '.$creator_lname;

    $project_docs = get_rows_from_one_table_by_id('projects_docs','project_id',$pid,'date_added');




}else{
    header('Location:projects');
}

include('layouts/header.php'); 

?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Project Name: <strong><?php echo $project_name; ?></strong></h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="projects">All Projects</a>
                  </li>
                  <li class="breadcrumb-item active">Project Summary
                  </li>
                </ol>
              </div>
            </div>
          </div>
        
        </div>
        <div class="content-detached content-left">
          <div class="content-body"><section class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-head">
            <div class="card-header">
               <h2 class="card-title">Project Creator: <strong><span class="text-muted"><?php echo $creator_fullname; ?></span> </strong></h2>
               <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
               <div class="heading-elements">
                  <span class="badge badge-default badge-warning">Ongoing</span>
               </div>
            </div>
            <div class="px-1">
               <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                  <!-- <li>Project Creator: <span class="text-muted">Margaret Govan</span></li> -->
                  <li>Start Date: <span class="text-muted">01/Feb/2021</span></li>
                  <li>End Date: <span class="text-muted">01/Dec/2021</span></li>
                  
                  <li><a href="#" class="text-muted" data-toggle="tooltip" data-placement="bottom" title="Export as PDF"><i class="fa fa-file-pdf-o"></i></a></li>
               </ul>
            </div>
         </div>
         <!-- project-info -->
         <div id="project-info" class="card-body row">
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2><?php echo number_format($users); ?></h2>
                  <div class="project-info-sub-icon">
                     <span class="fa fa-user"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Follow Up Person(s)</h5>
               </div>
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2><?php echo number_format($contractors); ?></h2>
                  <div class="project-info-sub-icon">
                     <span class="fa fa-calendar"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Contractor(s)</h5>
               </div>
            </div>
            <div class="project-info-count col-lg-4 col-md-12">
               <div class="project-info-icon">
                  <h2><?php echo number_format(20); ?></h2>
                  <div class="project-info-sub-icon">
                     <span class="fa fa-bug"></span>
                  </div>
               </div>
               <div class="project-info-text pt-1">
                  <h5>Project Documents</h5>
               </div>
            </div>
         </div>
         <!-- project-info -->
         <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>View of Project Status</span>
            </div>
        <!--     <div class="row py-2">
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-info h3">82%</span> <span class="float-right">Tasks</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-success h3">78%</span> <span class="float-right">TaskLists</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="row py-2">
               <div class="col-lg-12 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-warning h3">68%</span> <span class="float-right">Milestones</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 68%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div>
             <!--   <div class="col-lg-6 col-md-12">
                  <div class="insights px-2">
                     <div><span class="text-danger h3">62%</span> <span class="float-right">Bugs</span></div>
                     <div class="progress progress-md mt-1 mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>

          <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>Project Documents</span>
            </div>
       
            <div class="row py-2">
               <div class="col-lg-12 col-md-12">
                  <div class="insights px-2">
                     <ul>
                       <?php foreach( $project_docs as $pdoc){ ?>
                        <li> <a href="<?php echo $pdoc['doc_path']; ?>"><?php echo $pdoc['doc_path']; ?></a> </li>
                        <?php } ?>
                     </ul>
                     <!-- <br> -->
                     <a href="add_project_docs2?pid=<?php echo $pid; ?>" class="btn btn-sm btn-success">Add New Document</a>

                  </div>
               </div>
             
             </div>
            </div>


            <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>Contractors</span>
            </div>
       
            <div class="row py-2">
               <div class="col-lg-12 col-md-12">
                  <div class="insights px-2">
                     <ul>
                        <?php 
                                 $pc = $project_details['contractors'];
                                 $pcs = json_decode($pc,true);                             
                                    foreach($pcs as $p){
                                       $p1 = getData('fname', 'users', 'unique_id', $p);
                                       $p2 = getData('lname', 'users', 'unique_id', $p);
                                       echo '<li>'.$p1.' '.$p2.'</li>';
                                    }                                
                                ?>
                        
                     </ul>

                  </div>
               </div>
             
             </div>
            </div>

            <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>Follow Up Persons</span>
            </div>
       
            <div class="row py-2">
               <div class="col-lg-12 col-md-12">
                  <div class="insights px-2">
                  <ul>
                        <?php 
                                 $pc = $project_details['follow_up_persons'];
                                 $pcs = json_decode($pc,true);                             
                                    foreach($pcs as $p){
                                       $p1 = getData('fname', 'users', 'unique_id', $p);
                                       $p2 = getData('lname', 'users', 'unique_id', $p);
                                       echo '<li>'.$p1.' '.$p2.'</li>';
                                    }                                
                        ?>
                        
                  </ul>

                   
                  </div>
               </div>
             
             </div>
            </div>

                        <div class="card-body">
            <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
               <span>MDAs</span>
            </div>
       
            <div class="row py-2">
               <div class="col-lg-12 col-md-12">
                  <div class="insights px-2">
                     <ul>
                        <?php 
                                 $pc = $project_details['mdas'];
                                 $pcs = json_decode($pc,true);                             
                                    foreach($pcs as $p){
                                       $p = getData('mda_name', 'mdas', 'unique_id', $p);
                                       echo '<li>'.$p.'</li>';
                                    }                                
                        ?>
                        
                  </ul>
                   
                  </div>
               </div>
             
             </div>
            </div>


      </div>
   </div>
</section>

</section>
          </div>
        </div>
        <div class="sidebar-detached sidebar-right">
          <div class="sidebar"><div class="project-sidebar-content">
    <div class="card">
        <!-- <div class="card-header">
            <h4 class="card-title">Project Details</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div> -->
        <div class="card-content">
           

            <!-- project progress -->
            <div class="card-body">
                <div class="insights">
                    <p>Project Overall Progress <span class="float-right text-warning h3">72%</span></p>
                    <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 72%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
            <!-- project progress -->
        </div>
    </div>
    <!-- Project Overview -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Project Description</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <p><?php echo  $project_description; ?></p>

               
            </div>
        </div>
    </div>
    <!--/ Project Overview -->
  
</div>

          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('layouts/footer.php'); ?>