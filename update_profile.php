<?php require_once ('config/instantiated_files_update.php');
include_once ('layouts/header.php');
?>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Update Profile</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">View Profile</a>
                  </li>
                  <li class="breadcrumb-item active">Update Profile
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <a href="#"> <button type="submit" class="btn btn-success">View Profile <i class="ft-thumbs-up position-right"></i></button></a>
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
						<form  method="post" id="update_profile_form">
							<div class="form-body">
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name:</label>
											<input type="text" class="form-control" id="fname" name="fname" value = "<?php echo $first_name; ?>" readonly>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name:</label>
											<input type="text" class="form-control" id="lname" name="lname" value = "<?php echo $last_name; ?>" readonly>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Middle Name:</label>
											<input type="text" class="form-control" id="mname" name="mname" value = "<?php echo $mname; ?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Date of Birth:</label>
											<input type="date" class="form-control" id="dob" name="dob" value = "<?php echo $dob; ?>" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Gender:</label>
											<input type="text" class="form-control" id="gender" name="gender" value = "<?php echo $gender; ?>" placeholder="M or F">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Address:</label>
											<input type="text" class="form-control" id="address" name="address" value = "<?php echo $address; ?>" placeholder="Enter Address">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>State:</label>
											<input type="text" class="form-control" id="state" name="state" value = "<?php echo $state; ?>" placeholder="Enter State">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Local Government:</label>
											<input type="text" class="form-control" id="lga" name="lga" value = "<?php echo $lga; ?>" placeholder="Enter Local Government">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Personal Account Number:</label>
											<input type="number" class="form-control" id="personal_account_no" name="personal_account_no" value = "<?php echo $personal_account_no; ?>" placeholder="Enter Account Number">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" class="form-control" id="email" name="email" value = "<?php echo $email; ?>" placeholder="Enter Email">
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone:</label>
											<input type="tel" class="form-control" id="phone" name="phone" value = "<?php echo $phone; ?>" placeholder="Enter Phone Number">
										</div>
											<input type="hidden" class="form-control" id="role" name="role" value="admin">
											<input type="hidden" class="form-control" id="password" name="password" value="password">
											<input type="hidden" class="form-control" id="added_by" name="added_by" value="<?php echo $uid; ?>">
											<input type="hidden" class="form-control" id="unique_id" name="unique_id" value="<?php echo $unique_id; ?>">
									</div>	
								</div>



							</div>

							
							 <button type="reset" id="cmd_update_profile" class="btn btn-primary" >Submit <i class="ft-refresh-cw position-right"></i></button>
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

<?php include_once 'layouts/footer.php'; ?>