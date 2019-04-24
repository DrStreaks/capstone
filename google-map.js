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

      var image = "";

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
      let title = document.getElementsByClassName("parking_btn")[key];
      title.innerHTML = marker.title;
      let text = title.nextElementSibling.lastChild;
      text.nodeValue = value.Address;
      let availability = document.getElementsByClassName("parking_content")[key];
      let spots = availability.firstChild.nextSibling.nextSibling;
      spots.nodeValue = value.Available;

      // IIFE or Immediately Invoked Function Expression is a function that is fired
      // once the interpreter comes across it.
      google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
          var information = '<h2>'+ value.Name + '</h2>' + value.Address + '<br /> <br />' + 'Is currently: ' + value.Available;
          infowindow.setContent(information);
          infowindow.open(kentStateParkingMap, marker);
          let btn = document.getElementsByClassName("parking_content")[key];
          if (btn.style.maxHeight > "0px" && key === marker) {
            //closed
            btn.style.maxHeight = "0px";
            infowindow.close();
          } else {
            // Open content button
            btn.style.maxHeight = "300px";
          }
        }
      })(marker));
    });
  });
}

// Step 2. The loadScript() creates a <script> element to load the Google Maps API. When it has loaded,
// it calls init(), to initialize the map.
function loadScript() {
  // Create a <script> element
  var script = document.createElement('script');
  // Apply the URL to the src attribute
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBC3vqO0w0WRnyrUG4Tj8omjo0ra7QZRH4&callback=init";
  // Append the created <script> element to the document
  document.body.appendChild(script);
}

// Step 1. When the page is loaded, the onload event will call the loadScript() Function
window.onload = loadScript;

// This function opens and closes the location buttons
function open_close_nav() {
  // Navigate the DOM to find the child and get the element
  var info = this.nextElementSibling;
  // If the height is greater than 0px than it is OPEN
  if (info.style.maxHeight > "0px") {
    // Close the content window
    info.style.maxHeight = "0px";
    infowindow.close();
  } else {
    // Open content window
    info.style.maxHeight = info.scrollHeight + "px";
    infowindow.open(kentStateParkingMap, marker);
  }
};

////////////////////////////////////////////////////////////////////////////////
// Get locations of all parking lots/meters
var locationsArray = document.getElementsByClassName("parking_btn");

// Loop through all locations
for (var i = 0; i < locationsArray.length; i++) {
  // Run the function on the button that was clicked
  locationsArray[i].onclick = open_close_nav();
}
