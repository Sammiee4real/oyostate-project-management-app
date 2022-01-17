
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2021 <a class="text-bold-800 grey darken-2" href="#" target="_blank">OYO State Project Team </a>, All rights reserved. </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
   
 <script src="app-assets/vendors/js/charts/raphael-min.js"></script>
    <script src="app-assets/vendors/js/charts/morris.min.js"></script>
    <script src="app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
    <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="app-assets/vendors/js/extensions/underscore-min.js"></script>
    <script src="app-assets/vendors/js/extensions/clndr.min.js"></script>
    <!-- <script src="app-assets/vendors/js/charts/echarts/echarts.js"></script> -->
    <script src="app-assets/vendors/js/extensions/unslider-min.js"></script>




    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END PAGE LEVEL JS-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/jquery_functions.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBA05Gx9CNHEojXNSozSkBlM5weSE_78O8"></script>
  
  <script type="text/javascript">
    function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){ 
                echo '["'.$row['name'].'", '.$row['latitude'].', '.$row['longitude'].', "'.$row['icon'].'"],'; 
            } 
        } 
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if($result2->num_rows > 0){ 
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<h3><?php echo $row['name']; ?></h3>' +
                '<p><?php echo $row['info']; ?></p>' + '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: markers[i][3],
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
        var arr = [];
       // toastr.info('Page Loaded!');
         $('.js-example-basic-single').select2();
         $('.js-example-basic-single2').select2();
         // $('.js-example-basic-singleyy').select2();
         $('.js-example-basic-multiple').select2();
         $('.js-example-basic-multiple2').select2();
         
      
                $('#add_timelines').click(function(e) {
                        e.preventDefault();
                        var count = $('#count').val();
                        var count2 = parseInt(count) + 1;
                        var countdis = parseInt(count) + Math.floor(Math.random() * 9999999999);
                        // if(){
                          
                        // }
                        // arr.push(count2);
                        $('#display_timelines').append("<div class='row' id='r"+countdis+"'> <div class='col-md-5'><label>Milestone</label> <input type='text' placeholder='enter milestone' required='' class='form-control form-control-sm '   id='milestone_"+countdis+"' name='milestone_"+countdis+"'></div><div class='col-md-5'><label>Timeline</label> <input required='' type='date' class='form-control form-control-sm ' placeholder='enter timeline'   id='timeline_"+countdis+"' name='timeline_"+countdis+"'></div><div class='col-md-2'><a href='#'  id='"+countdis+"'  onclick='removeElement("+countdis+")' style='color:red; float:left;'>remove</a><br><br><br><br></div></div>");
                        $('#count').val(count2);
                });

                $('#add_gps').click(function(e) {
                        e.preventDefault();
                        var count = $('#count_gps').val();
                        var count2 = parseInt(count) + 1;
                        var countdis = parseInt(count) + Math.floor(Math.random() * 9999999999);
                        // if(){
                          
                        // }
                        // arr.push(count2);
                        $('#display_gps').append("<div class='row' id='r"+countdis+"'> <div class='col-md-3'><label>Latitude</label> <input type='text' placeholder='enter latitude' required='' class='form-control form-control-sm '   id='latitude_"+countdis+"' name='latitude_"+countdis+"'></div><div class='col-md-3'><label>Longitude</label> <input required='' type='text' class='form-control form-control-sm ' placeholder='enter longitude'   id='longitude_"+countdis+"' name='longitude_"+countdis+"'></div><div class='col-md-3'><label>Address</label> <input required='' type='text' class='form-control form-control-sm ' placeholder='enter address'   id='address_"+countdis+"' name='address_"+countdis+"'></div><div class='col-md-2'><a href='#'  id='"+countdis+"'  onclick='removeElement("+countdis+")' style='color:red; float:left;'>remove</a><br><br><br><br></div></div>");
                        $('#count_gps').val(count2);
                });

                $('#project_timeline').change(function(e) {
                        e.preventDefault();
                        var project_id = $('#project_timeline').val();
                        //alert(project_id);
                            $.ajax({
                            url:"ajax/manage_milestones.php",
                            method: "GET",
                            data:{project_id:project_id},
                            beforeSend: function(){
                                $('#add_timelines').attr('disabled', true);
                            },
                            success:function(data){
                               $('#display_managed_timelines').html(data);
                            }
                        }); 
                });

      });


      function removeElement(removeId){
         // alert( 'remove element with  r' + removeId);
         $("#r"+removeId).remove();
         var count = $('#count').val();
         var count2 = parseInt(count) - 1;
         $('#count').val(count2);

       }

       function removeGPS(removeId){
         // alert( 'remove element with  r' + removeId);
         $("#r"+removeId).remove();
         var count = $('#count_gps').val();
         var count2 = parseInt(count) - 1;
         $('#count_gps').val(count2);

       }

  </script>

