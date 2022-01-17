<?php 
require_once('config/instantiated_files.php'); 
include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          

          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Add A Zone</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="zones">All Zones</a>
                  </li>
                  <li class="breadcrumb-item active">Add Zone
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <button type="submit" class="btn btn-success">All Zones <i class="ft-thumbs-up position-right"></i></button>
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
						<form action="#" method="post" id="zone_form">
							<div class="form-body">
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name of Zone:</label>
											<input type="text" class="form-control" id="zone_name" name="zone_name" placeholder="zone name">
										</div>
									</div>	
								</div>

							</div>
							<div class="form-actions">
								<div class="text-left">
									<button type="reset" id="cmd_add_zone" class="btn btn-primary">Submit <i class="ft-refresh-cw position-right"></i></button>
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