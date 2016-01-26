<?php include ('header.php') ?>

<div class="widewrapper_main-tenant" id="homeimg">
    <img src="photos/GM.png" class="img-responsive" id = "homeImg" alt="Responsive image">
      </div>
<div class="container wholePage">
  <h1 class= "text-center">GM Dealership Locator</h1><br>
  <h4 class="text-center">Select from the dropdown menu below to see where your specific dealers are</h4><br><br>

  <div class="row">
    <div class="col-md-9">
      <select id="type" class="dropdownSelect" onchange="filterMarkers(this.value); printv(this.value);">
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
    <div class="col-md-3" id="list">
        <h4 class="muted">Dealers will appear here</h4>
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
['0', '<a target="_blank" href="http://www.mccarthyautoworld.com/">Mccarthy Coon Rapids</a>', 45.204795, -93.351251, 'fifth'],
['1', '<a target="_blank" href="http://www.rydellautocenter.com/">Rydell</a>', 47.895084, -97.046834, 'tenth'],
['2', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Cutshaw Chevrolet</a>', 31.498716, -95.478858, 'first'],
['3', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Ed Hammer Chevrolet</a>',   43.4710205, 11.1386628, 'first'],
['4', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Raysmith Chevrolet</a>',   36.058878, -88.113704, 'first'],
['5', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Banner Chevrolet</a>',   30.009038, -90.019565, 'first'],
['6', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Markquart Motors</a> ',   44.874562, -91.431849, 'tenth'],
['7', '<a target="_blank" href="http://www.automobileinternationalcadillac.com/">Automombile International</a>',    37.540927, -120.897727, 'second'],
['8', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Newman Chevrolet Chev</a>',   38.863591, -94.812266, 'first'],
['9', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Green Chevrolet Chev</a>',    40.127457, -74.942095, 'first'],
['10', '<a target="_blank" href="http://www.cutshawchevrolet.com/">CBonner, Chev/Cad</a>',   34.0345376, -118.224923, 'sixth'],
['11', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Steven Lust Automotive AllGM</a>',   30.4453141, -91.0079596, 'tenth'],
['12', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Edmark Chevrolet Chev</a>',    38.589047, -121.55598, 'first'],
['13', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Alpine Buick BuGMC</a> ',   39.5218291, -119.6990593, 'fifth'],
['14', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Taylor and Sons Chevrolet Chev</a>',   46.885915, -96.836963, 'first'],
['15', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Voegeli Chev/Bu </a>',   33.809674, -84.498019, 'seventh'],
['16', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Tegeler Chevrolet Chev</a>',   35.063396, -90.005821, 'first'],
['17', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Sawicki Chev/Cad/Bu</a>',    37.0542904, -94.4090331, 'ninth'],
['18', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Steinle Chev/Buick</a>',    36.6140361, -121.5685724, 'seventh'],
['19', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Sierra Blanca Chev/Cad/Bu</a> ',   32.6497655, -96.7742918, 'ninth'],
['20', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Alpine Motors BU/GMC</a>',    35.2042166, -101.831978, 'fifth'],
['21', '<a target="_blank" href="http://www.cutshawchevrolet.com/">CNewby BU/GMC</a>',    37.938261, -121.301346, 'fifth'],
['22', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Tims BUICK GMC</a>',    50.661362, -120.401704, 'fifth'],
['23', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Pierce Chevrolet of Ronan Chev</a>',    53.8625097, -122.7308506, 'first'],
['24', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Norman Gale BU/GMC</a>',    41.120627, -104.744035, 'fifth'],
['25', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Jerry Remus Chev</a>',   45.528459, -122.848221, 'first'],
['26', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Mitchell Chevrolet Buick GMC</a>',    44.88169, -93.026339, 'eighth'],
['27', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Ron Tonkin Chevrolet</a>',   41.942952, -72.60454, 'first'],
['28', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Schoner Chevrolet</a> ',    46.735712, -92.0933217, 'first'],
['29', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Masid Chevrolet</a>',   39.872094, -104.894723, 'first'],
['30', '<a target="_blank" href="http://www.cutshawchevrolet.com/">Central Chevrolet Cadillac</a>',    40.7227057, -112.0194812, 'sixth'],
['31', '<a target="_blank" href="http://tatebranchgmc.com/">Tate Branch</a>',   31.6969279, -106.2786516, 'third']
];

function printv(){
for (i = 0; i < markers1.length; i++) {
        var mar = markers1[i];
    for(var j=0;j<mar.length; j++ ){
        console.log(markers1[i][j]);

    }
        
    }
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

        ?>
<?php include ('footer.php') ?>