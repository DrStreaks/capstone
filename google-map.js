/*
 * initialize loads the map into the HTML page. First it creates a mapOptions
 */
function init() {
  var mapOptions = {                                                                      //Setup the map options object with three pieces of data
    center: new google.maps.LatLng(41.150933,-81.344227),
    mapTypeId: google.maps.MapTypeId.ROADMAP,                                             //Type of map to be displayed
    zoom: 15,                                                                             //Zoom level for the map: range 0 - 16
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL,
      position: google.maps.ControlPosition.RIGHT_BOTTOM
    }
  }

  var kentStateParkingMap;
  kentStateParkingMap = new google.maps.Map(document.getElementById('map'), mapOptions);

  $.getJSON('index.json', function(data_from_file) {

    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    $.each(data_from_file, function(key, value) {

      var image;

      if (value.Available == "Empty") {
        image = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
      } else {
        image = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
      }

      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(value.Latitude, value.Longitude),
        map: kentStateParkingMap,
        icon: image,
        title: value.Name,
        animation: google.maps.Animation.DROP
      });

      /*
       * Dynamically populate the Name of the buildings
       * on to the accordion menu buttons
       */
      var title = document.getElementsByClassName("parking_btn")[key];
      title.innerHTML = marker.title;
      let text = title.nextElementSibling.lastChild;
      text.nodeValue = value.Address;
      let availability = document.getElementsByClassName("parking_content")[key];
      let spots = availability.firstChild.nextSibling.nextSibling;
      spots.nodeValue = value.Available;

      /* Immediately Invoked Function Expression is a function that is fired
       * once the interpreter comes across it. This function listens to the click
       * on the marker and opens the corresponding button and information infowindow
       * for that marker.
       */

      google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
          var information = '<h2>'+ value.Name + '</h2>' + value.Address +
          '<br /> <br />' + 'Is currently: ' + value.Available;
          infowindow.setContent(information);
          infowindow.open(kentStateParkingMap, marker);
          let btn = document.getElementsByClassName("parking_content")[key];
          if (btn.style.maxHeight > "0px") {
            btn.style.maxHeight = "0px";                                                                              // Close the content button
            infowindow.close();                                                                                       // Close the infowindow
          } else {
            btn.style.maxHeight = "300px";                                                                            // Open the content button
            infowindow.open(kentStateParkingMap, marker);
          }
        }
      })(marker));

      title.addEventListener("click", function(){
        infowindow.open(kentStateParkingMap, marker);
        if (infowindow.close() == false){
          infowindow.close();
        } else {
        infowindow.open(kentStateParkingMap, marker);
        }
      });

    });
  });
}

/* The loadScript() creates a <script> element to load the Google Maps API. When it has loaded,
 * it calls init(), to initialize the map.
 */
function loadScript() {
  var script = document.createElement('script');                                                                      // Create a <script> element
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBC3vqO0w0WRnyrUG4Tj8omjo0ra7QZRH4&callback=init";   // Apply the URL to the src attribute
  document.body.appendChild(script);                                                                                  // Append the created <script> element to the document
}

// Step 1. When the page is loaded, the onload event will call the loadScript() Function
window.onload = loadScript;
