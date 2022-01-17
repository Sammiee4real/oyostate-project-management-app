<?php 
require_once('config/instantiated_files.php');
$projects = get_rows_from_one_table('projects','date_added');

include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Manage Milestones</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="projects">All Projects</a>
                  </li>
                  <li class="breadcrumb-item active">Manage Milestones Per Project
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
            <a href="projects"  class="btn btn-success">All Projects  <i class="ft-thumbs-up position-right"></i></a>

            </div>
          </div>
        </div>




<!-- Grid With Label start -->
<section class="grid-with-label" id="grid-with-label">
	<div class="row">
		<div class="col-12">
			<div class="card">
			       
                  <div class="row">
										<div class="col-md-12">
													<?php if(!empty($msg)){
															echo $msg;
													}?>

										</div>
								  </div>

				<div class="card-content collapse show">
					<div class="card-body">
						<form action="#" method="get" id="" enctype="multipart/form-data">
							<div class="form-body">
								
                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                            <label>Select Project</label>
                            <select required=""  class="form-control form-control-sm custom-input-style js-example-basic-single" id="project_timeline"  name="project_timeline">
                            <option value="" disabled="">Select A Project</option>
                            <?php  foreach ($projects as $project): ?>
                            <option value="<?= $project['unique_id']; ?>"><?= $project['project_name']; ?></option>
                            <?php   endforeach ?>   
                            </select> 
                            <input type="hidden" class="form-control" id="added_by" name="added_by" value="<?php echo $uid; ?>">

                            </div>
                            </div>
                            </div>

							  <!-- display_managed_timelines -->
                        <div class="row" id="display_managed_timelines">
                                
                        </div>
                              <!-- end display_managed_timelines -->

                        <!--/ projects table with monthly chart -->

								</div>

							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Grid With Label end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('layouts/footer.php'); ?>