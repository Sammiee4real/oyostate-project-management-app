<?php  //session_start();
  require_once('config/functions.php');
  $getmarkers = getLocationMarkers();
  // $colleges = getColleges();
 
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Project Markers on Google Map<</title>
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

 <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

	<style type="text/css">	
		.container {
			height: 500px;
		}
		
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		
		#allData {
			display: none;
		}

	</style>
</head>
<body>
	<div class="container">
		<center><h1>Projects on Google Map <span><a style="font-size: 13px;" href="home">back to dashboard</a></span></h1> </center>
		<?php 
		
			// $colleges = json_encode($colleges,true);		
			$getmarkers = json_encode($getmarkers,true);		
			echo '<div id="allData">' . $getmarkers . '</div>';			
		 

		 ?>
		<div id="map"></div>
	</div>


	<!-- <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
	

	 <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

<script type="text/javascript" src="googlemap.js"></script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfqniaJWDKep4ywR6gjZPpEQffbSrSjx4&callback=loadMap">
</script>
</body>


</html>