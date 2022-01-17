<?php 
require_once('config/instantiated_files.php'); 

$zones = get_rows_from_one_table('zones','date_added');



include('layouts/header.php'); 
?>
<div class="app-content content">
      <div class="content-wrapper">
        
          <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">View Projects on Google Map</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home">Home</a>
                  </li>
                 
                  <li class="breadcrumb-item active">View Projects on Google Map
                  </li>
                </ol>
              </div>
            </div>
          </div>

         <!--  <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <a href="add_markers"  class="btn btn-success">Add Markers <i class="ft-thumbs-up position-right"></i></a>
            </div>
          </div>

 -->
        </div>



        <div class="content-body"><!-- Sales stats -->



<!-- Recent Orders -->
<div class="row">
    
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">GPS Markers</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
              
                <div class="table-responsive table-bordered table-striped">
                        
                        <div id="mapCanvas"></div>
                   
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