<?php 
require_once('config/instantiated_files.php'); 
include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Add User</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="users">All Users</a>
                  </li>
                  <li class="breadcrumb-item active">Add User
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <a href="users"> <button type="submit" class="btn btn-success">All Users <i class="ft-thumbs-up position-right"></i></button></a>
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
						<form  method="post" id="user_form">
							<div class="form-body">
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name:</label>
											<input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Middle Name:</label>
											<input type="text" class="form-control" id="mname" name="mname" placeholder="middle name">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="email">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone:</label>
											<input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
										</div>
											<input type="hidden" class="form-control" id="role" name="role" value="admin">
											<input type="hidden" class="form-control" id="password" name="password" value="password">
											<input type="hidden" class="form-control" id="added_by" name="added_by" value="<?php echo $uid; ?>">
									</div>	
								</div>



							</div>

							
							 <button type="reset" id="cmd_add_user" class="btn btn-primary">Submit <i class="ft-refresh-cw position-right"></i></button>
						<!-- 	<div class="form-actions">
								<div class="text-left">
									<button type="submit" id="cmd_add_user2" class="btn btn-primary">Submit <i class="ft-refresh-cw position-right"></i></button>
								</div>
							</div> -->
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