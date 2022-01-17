var map;
var geocoder;

	
function loadMap() {
	// var pune = {lat: 18.5204, lng: 73.8567};
	// var ibadan = {lat: 8.1574, lng: 3.6147};
	var ibadan = {lat: 7.37756, lng: 3.90591};
	// var redicon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: ibadan
    });

    var marker = new google.maps.Marker({
      position: ibadan,
      map: map,
      // icon: redicon
    });


    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllProjects(allData);
    console.log(showAllProjects(allData));
}

function showAllProjects(allData) {
	// var redicon = 'https://maps.google.com/mapfiles/ms/icons/red-dot.png';
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		var a = document.createElement('a');
		var br = document.createElement('br');
		var br2 = document.createElement('br');
		var span = document.createElement('span');
		var span2 = document.createElement('span');

		// Create anchor element.
                var a = document.createElement('a'); 
                  
                // Create the text node for anchor element.
                
                  
                // Append the text node to anchor element.
               
                  
                // Set the title.
                
                  
                // Set the href property.
                
		
		var link = document.createTextNode(data.project_name);
		a.appendChild(link);
		a.title = data.project_name; 
		a.href = "http://project-management.staging.cloudware.ng/project_details?pid="+data.project_id; 
    a.target = '_blank';
		strong.appendChild(a);

		content.appendChild(strong);

		content.appendChild(br);

	  span.textContent = data.address;
		content.appendChild(span);

		content.appendChild(br2);

		span2.textContent = data.project_phase;
		content.appendChild(span2);

		// var img = document.createElement('img');
		// img.src = 'img/project.png';
		// img.style.width = '100px';
		// img.style.float = 'left';
		// content.appendChild(img);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map,
	      // icon: redicon
	    });

	    marker.addListener('click', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    });
	})
}



