<?php include ('header.php') ?>

<div class="widewrapper_main-tenant" id="homeimg">
    <img src="photos/GM.png" class="img-responsive" id = "homeImg" alt="Responsive image">
      </div>
<div class="container">
  <h1 class= "text-center">GM Dealership Locator</h1><br>
  <h4 class="text-center">Select from the dropdown menu below to see where your specific dealers are</h4><br><br>
  <div class="row">
    <div class="col-md-10">
      <select id="type" class="center-block dropdownSelect" onchange="filterMarkers(this.value); printv(this.value);">
        <option value="">Select a Brand</option>
        <option value="first">Chevrolet</option>
        <option value="second">Cadillac</option>
        <option value="third">Buick</option>       
        <option value="fourth">GMC</option>       
        <option value="fifth">Buick/GMC</option>
        <option value="sixth">Chevrolet/Cadillac</option>
        <option value="seventh">Chevrolet/Buick</option>
        <option value="eighth">Chevrolet/Buick/GMC</option>        
        <option value="ninth">Chevrolet/Cadillac/Buick</option>        
        <option value="tenth">All GM</option>
    </select>
      <div id="map-canvas" class="center-block aboveMap"></div>      
    </div>
    <div class="col-md-2">
    <textarea rows="10" cols="50" type="text" name="user" class="center-block specificDealerDropdown" id="mytext">
    </textarea>
    <input type="button" value="Clear" onclick="eraseText()">
    </div> 
  </div><br><br>
</div>

<script>
var gmarkers1 = [];
var markers1 = [];
var infowindow = new google.maps.InfoWindow({
    content: ''
});
markers1 = [
['0', 'McCarthy Coon Rapids', 45.204795, -93.351251, 'fifth'],
['1', 'Rydell', 47.895084, -97.046834, 'tenth'],
['2', 'Cutshaw', 31.498716, -95.478858, 'first'],
['3', 'Ed Hammer Chevrolet',   43.4710205, 11.1386628, 'first'],
['4', 'Raysmith Chevrolet',   36.058878, -88.113704, 'first'],
['5', 'Banner Chevrolet',   30.009038, -90.019565, 'first'],
['6', 'Markquart Motors ',   44.874562, -91.431849, 'tenth'],
['7', 'Automobile International Cad',    37.540927, -120.897727, 'second'],
['8', 'Newman Chevrolet Chev',   38.863591, -94.812266, 'first'],
['9', 'Green Chevrolet Chev',    40.127457, -74.942095, 'first'],
['10', 'Bonner, Chev/Cad',   34.0345376, -118.224923, 'sixth'],
['11', 'Steven Lust Automotive AllGM',   30.4453141, -91.0079596, 'tenth'],
['12', 'Edmark Chevrolet Chev ',    38.589047, -121.55598, 'first'],
['13', 'Alpine Buick BuGMC ',   39.5218291, -119.6990593, 'fifth'],
['14', 'Taylor and Sons Chevrolet Chev',   46.885915, -96.836963, 'first'],
['15', 'Voegeli Chev/Bu ',   33.809674, -84.498019, 'seventh'],
['16', 'Tegeler Chevrolet Chev',   35.063396, -90.005821, 'first'],
['17', 'Sawicki Chev/Cad/Bu',    37.0542904, -94.4090331, 'ninth'],
['18', 'Steinle Chev/Buick',    36.6140361, -121.5685724, 'seventh'],
['19', 'Sierra Blanca Chev/Cad/Bu ',   32.6497655, -96.7742918, 'ninth'],
['20', 'Alpine Motors BU/GMC',    35.2042166, -101.831978, 'fifth'],
['21', 'Newby BU/GMC',    37.938261, -121.301346, 'fifth'],
['22', 'Tims BUICK GMC',    50.661362, -120.401704, 'fifth'],
['23', 'Pierce Chevrolet of Ronan Chev',    53.8625097, -122.7308506, 'first'],
['24', 'Norman Gale BU/GMC',    41.120627, -104.744035, 'fifth'],
['25', 'Jerry Remus Chev',   45.528459, -122.848221, 'first'],
['26', 'Mitchell Chevrolet Buick GMC',    44.88169, -93.026339, 'eighth'],
['27', 'Ron Tonkin Chevrolet',   41.942952, -72.60454, 'first'],
['28', 'Schoner Chevrolet ',    46.735712, -92.0933217, 'first'],
['29', 'Masid Chevrolet',   39.872094, -104.894723, 'first'],
['30', 'Central Chevrolet Cadillac',    40.7227057, -112.0194812, 'sixth'],
['31', 'Tate Branch GMC',   31.6969279, -106.2786516, 'third']
];

firstArray = ['Cutshaw','Ed Hammer', 'Raysmith', 'Banner', 'Newman', 'Green','Edmark','Taylor and Sons', 'Pierce', 'Jerry Remus', 'Ron Tonkin', 'Schoner', 'Masid'];
secondArray = ['Norman Gale'];
thirdArray= ['Edmark', 'CBG'];

function printv() {
  for (i = 0; i < markers1.length; i++) {
    var mar = markers1[i];
    for (var j = 0; j < mar.length; j++) {
      if (mar.indexOf("first") > -1) { //Selects certain string within Array
        console.log(firstArray.toString());
        document.getElementById("mytext").value = firstArray.join("\n"); 
        
      }
      else if (mar.indexOf("second") > -1) { //Selects certain string within Array
        console.log(secondArray.toString());
        document.getElementById("mytext").value = secondArray.join("\n"); 
        
      }
    }
  }
}

function eraseText(){
    document.getElementById("mytext").value = "";
}

function initialize() {
    var center = new google.maps.LatLng(37.3331615, -79.9769357);
    var mapOptions = {
        center: center,
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    };
   map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    for (i = 0; i < markers1.length; i++) {
        addMarker(markers1[i]);
    }
}
function addMarker(marker) {
    var category = marker[4];
    var title = marker[1];
    var pos = new google.maps.LatLng(marker[2], marker[3]);
    var content = marker[1];
    marker1 = new google.maps.Marker({
        title: title,
        position: pos,
        category: category,
        map: map
    });
    gmarkers1.push(marker1);
    // Marker click listener
    google.maps.event.addListener(marker1, 'click', (function (marker1, content) {
        return function () {
            console.log('Gmarker 1 gets pushed');
            infowindow.setContent(content);            
            infowindow.open(map, marker1);
            map.panTo(this.getPosition());
            map.setZoom(15);
        }
    })(marker1, content));
}
/**
 * Function to filter markers by category
 */
filterMarkers = function (category) {
      var markerList = [];
    for (i = 0; i < markers1.length; i++) {
        marker = gmarkers1[i];    
        
        // If is same category or category not picked
        if (marker.category == category || category.length === 0) {
            marker.setVisible(true);           
            
            //create list here
            markerList.push([i, marker.title, marker.pos, marker.content]);
        }
        // Categories don't match 
        else {
            marker.setVisible(false);
        }
    }
    //clear list div
    var listDiv = document.getElementById('list');
    listDiv.innerHTML = "";
    for (x = 0; x < markerList.length; x++)
    {
            //add content to list div
      
            listDiv.innerHTML = listDiv.innerHTML + markerList[x][1] + "<br/>";
    }
}
// Init map
initialize();
</script>

<?php
            mysql_connect("localhost", "root", "password") or die(mysql_error());
            mysql_select_db("auth_db") or die("Cannot connect to DB");
            $query = mysql_query("SELECT * FROM list WHERE public='yes'"); 
            while($row = mysql_fetch_array($query))
            {
                Print "<tr>";
                    Print '<td align="center">'. $row['id'] . "</td>";
                        Print '<td align="center">'. $row['details'] . "</td>";
                        Print '<td align="center">'. $row['date_posted']. " - " .$row['time_posted']. "</td>";
                        Print '<td align="center">'. $row['date_edited']. " - " .$row['time_edited']. "</td>";
                Print "</tr>";
            }
        ?>
<?php include ('footer.php') ?>