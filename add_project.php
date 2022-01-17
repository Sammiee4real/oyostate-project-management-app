<?php require_once('config/instantiated_files.php'); 
$zones = get_rows_from_one_table('zones','date_added');
$project_phases = get_rows_from_one_table('project_phases','date_added');
$users = get_rows_from_one_table_by_id('users','role','admin','date_added');
$contractors = get_rows_from_one_table_by_id('users','role','contractor','date_added');
$mdas = get_rows_from_one_table('mdas','date_added');
$departments = get_rows_from_one_table('departments','date_added');

include('layouts/header.php'); 

?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Add Project</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="projects">All Projects</a>
                  </li>
                  <li class="breadcrumb-item active">Add Project
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
               <a href="projects"  class="btn btn-success">All Projects <i class="ft-thumbs-up position-right"></i></a>
            </div>
          </div>
        </div>




<!-- Grid With Label start -->
<section class="grid-with-label" id="grid-with-label">
	<div class="row">
		<div class="col-12">
			<div class="card">
			
				<div class="card-content collapse show">
					<div class="card-body">
						<form  method="post" id="project_form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Project Name:</label>
											<input type="text" class="form-control" required="" id="project_name" name="project_name" placeholder="Project name">
											<input type="hidden" class="form-control" id="added_by" name="added_by" value="<?php echo $uid; ?>">

										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Project Amount:</label>
											<input type="number" class="form-control"  required="" id="project_amount" name="project_amount" placeholder="project amount">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Project Description:</label>
											<input type="text" class="form-control" required="" id="project_description" name="project_description" placeholder="project description">
										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Project Start Date:</label>
											<input type="date" class="form-control" required="" id="project_start_date" name="project_start_date" placeholder="project start date">
										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Project Expected Completion Date:</label>
											<input type="date" class="form-control" required="" id="expected_completion_date" name="expected_completion_date" placeholder="project completion date">
										</div>
									</div>	
										

									<div class="col-md-6">
										<div class="form-group">
											<label>Contractors:</label>
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-multiple" id="contractors" multiple="multiple" name="contractors[]">
                      <option value="" disabled="">Select Contractor(s)</option>
                        <?php  foreach ($contractors as $contractor): ?>
                               <option value="<?= $contractor['unique_id']; ?>"><?= $contractor['fname'].' '.$contractor['lname']; ?></option>
                        <?php   endforeach ?>   
                       </select> 

										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Follow-up Persons:</label>
											<!-- <input type="text" class="form-control js-example-basic-multiple" multiple="multiple" required="" id="users" name="users[]" placeholder="follow up persons"> -->
											
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-multiple" id="users" multiple="multiple" name="users[]">
											<option value="" disabled="">Select Follow Up Person(s)</option>
                        <?php  foreach ($users as $user): ?>
                               <option value="<?= $user['unique_id']; ?>"><?= $user['fname'].' '.$user['lname']; ?></option>
                        <?php   endforeach ?>   
                       </select> 

										</div>
									</div>	


									<div class="col-md-6">
										<div class="form-group">
											<label>Concerned Deparments:</label>
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-multiple" id="depts" multiple="multiple" name="depts[]">
                      <option value="" disabled="">Select Department(s)</option>
                        <?php  foreach ($departments as $dept): ?>
                               <option value="<?= $dept['unique_id']; ?>"><?= $dept['department_name']; ?></option>
                        <?php   endforeach ?>   
                       </select> 

										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Concerned MDAs:</label>
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-multiple" id="mdas" multiple="multiple" name="mdas[]">
                      <option value="" disabled="">Select MDAs</option>
                        <?php  foreach ($mdas as $mda): ?>
                               <option value="<?= $mda['unique_id']; ?>"><?= $mda['mda_name']; ?></option>
                        <?php   endforeach ?>   
                        </select>  
										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Project Phase:</label>
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-single" id="project_phase"  name="project_phase">
                      <option value="" >Select Project Phase</option>
                        <?php  foreach ($project_phases as $project_phase): ?>
                               <option value="<?= $project_phase['unique_id']; ?>"><?= $project_phase['phase_name']; ?></option>
                        <?php   endforeach ?>   
                        </select>  
										</div>
									</div>	

									<div class="col-md-6">
										<div class="form-group">
											<label>Concerned Zones:</label>
											<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-multiple" id="zones" multiple="multiple" name="zones[]">
                      <option value="" disabled="">Select Zones</option>
                        <?php  foreach ($zones as $zone): ?>
                               <option value="<?= $zone['unique_id']; ?>"><?= $zone['zone_name']; ?></option>
                        <?php   endforeach ?>   
                        </select>  
										</div>
									</div>	


								</div>
							

								<hr>

								<a href="#" id="add_timelines">+ Add Milestones</a><br><br>
								<input type="hidden" name="count" id="count" value="0">
								<!-- <input type="text" name="count22" id="count22" value="0"> -->
								<div  id="display_timelines"></div>						
						

							  <br>

							  <a href="#" id="add_gps">+ Add GPS</a><br><br>
								<input type="hidden" name="count_gps" id="count_gps" value="0">
								<!-- <input type="text" name="count22" id="count22" value="0"> -->
								<div  id="display_gps"></div>						
							  </div>

							 <div class="form-actions">
									<div class="text-left">
										<button type="reset" id="cmd_add_project" class="btn btn-primary">Save <i class="ft-refresh-cw position-right"></i></button>
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