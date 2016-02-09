<?php include ('header.php') ?>

<div class="widewrapper_main-tenant" id="homeimg">
    <img src="photos/GM.png" class="img-responsive" id = "homeImg" alt="Responsive image">
      </div>
<div class="container wholePage">
  <h1 class= "text-center">GM Dealership Locator</h1><br>
  <h4 class="text-center">Add your dealership!</h4><br><br>

  <div class="row">
    <div class="col-md-12">
      <form action="insert.php" id="filloutForm" class="form_add center-block" method="post">
        <h2 class="form-signin-heading">Add Dealer</h2>
    <p>
        <label for="name_of">Name:</label>
        <input type="text" name="name_of" id="name_of" class="form-control">
    </p>
    <p>
        <label for="address_of">Address</label>
        <input type="text" name="address_of" id="address_of" class="form-control">
    </p>
    <p>
        <label for="latitude">Lat</label>
        <input type="text" name="latitude" id="latitude" class="form-control">
    </p>
    <p>
        <label for="longtitude">Long</label>
        <input type="text" name="longtitude" id="longtitude" class="form-control">
    </p>
    <p>
        <label for="type_of">Type</label>
        <input type="text" name="type_of" id="type_of" class="form-control">
    </p>
    <input type="submit" class= "btn btn-default" value="Submit">
</form>
    
      <div id="map" style= "height: 500px"class="center-block aboveMap"></div>      
    </div>

  </div><br><br>
</div>


    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(47.6145, -122.3418),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>

<?php include('footer.php') ?>


    
