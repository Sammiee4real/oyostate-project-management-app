<?php 
require_once('config/instantiated_files.php');
$projects = get_rows_from_one_table('projects','date_added');

if(isset($_POST['cmd_add_docs'])){
	   $project = $_POST['project'];
	   $added_by = $_POST['added_by'];
	   $msg = "";
	   for($i=0; $i < count($_FILES['image']['name']); $i++ ){
	   			$file_name = $_FILES['image']['name'][$i];
	   			$size = $_FILES['image']['size'][$i];
	   			$tmp_name = $_FILES['image']['tmp_name'][$i];
	   			$type = $_FILES['image']['type'][$i];

	   			$add_project_docs = add_project_docs($added_by,$project,$file_name, $size, $tmp_name,$type);
	   			$add_project_docs_dec = json_decode($add_project_docs,true);
	   			// if($add_project_docs_dec['status'] != 200){
			   	// 		$msg .= $add_project_docs_dec['msg'].'<br>';
	   			// }else{
			   			$msg .= $add_project_docs_dec['msg'].'<br>';
	   			// }
	   }
		 
}

include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Add Project Docs</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="projects">All Projects</a>
                  </li>
                  <li class="breadcrumb-item active">Add Project Docs
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
            <a href="projects"  class="btn btn-success">All Project <i class="ft-thumbs-up position-right"></i></a>

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
						<form action="#" method="post" id="" enctype="multipart/form-data">
							<div class="form-body">
								
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Select Project</label>
												<select required=""  class="form-control form-control-sm custom-input-style js-example-basic-single" id="project"  name="project">
                      <option value="" disabled="">Select A Project</option>
                        <?php  foreach ($projects as $project): ?>
                               <option value="<?= $project['unique_id']; ?>"><?= $project['project_name']; ?></option>
                        <?php   endforeach ?>   
                       </select> 
											<input type="hidden" class="form-control" id="added_by" name="added_by" value="<?php echo $uid; ?>">

										</div>
									</div>

									<div class="col-md-6 ">
										<div class="form-group">
											<label>Upload as many files as possible</label>
											<input type="file" class="form-control" multiple="multiple" id="image" name="image[]">
											<!-- <a href="#" id="add_docs">+ Add Docs</a><hr>
											<input type="hidden" name="count" id="count" value="0">
											<div  id="display_docs"></div>		 -->				
										</div>
									</div>

									</div>

									<div class="form-actions">
											<div class="text-left">
											<input type="submit" id="cmd_add_docs" name="cmd_add_docs" value="Submit" class="btn btn-primary">
											</div>
											</div>


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