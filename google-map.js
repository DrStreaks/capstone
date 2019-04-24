// Step 3. initialize loads the map into the HTML page. First it creates a mapOptions
// object with three properties.
function init() {
  //Setup the map options object with three pieces of data
  var mapOptions = {
    //Center of the map in latitude and longitude
    center: new google.maps.LatLng(41.150933,-81.344227),
    //Type of map to be displayed
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    //Zoom level for the map: range 0 - 16
    zoom: 15,
    // Manipulates the appearance of the Zoom Controls.
    zoomControl: true,
    zoomControlOptions: {
      style: google.maps.ZoomControlStyle.SMALL,
      position: google.maps.ControlPosition.RIGHT_BOTTOM
    }
  }
  // Step 4. Use the Map() constructor to create a map and draw the map into the page.
  // The constructor takes two parameters: (1) The element the map will appear inside
  // (2) The mapOptions object
  var kentStateParkingMap;
  kentStateParkingMap = new google.maps.Map(document.getElementById('map'), mapOptions);

  // AJAX code in JQUERY to get data from the JSON file to populate the Google API
  $.getJSON('index.json', function(data_from_file) {
    // Implement New infowindow
    var infowindow = new google.maps.InfoWindow();
    var marker, i;

    $.each(data_from_file, function(key, value) {
      // The google.maps.Marker() constructor creates a marker object. It takes one parameter:
      // an object that contains literal notation.
      var image = "";

      if (value.Available == "Empty") {
        image = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
      } else {
        image = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
      }

      var marker = new google.maps.Marker({
        // Position is the array storing the markers location (parkingLots)
        position: new google.maps.LatLng(value.Latitude, value.Longitude),
        // Map is the map that the marker should be added to.
        map: kentStateParkingMap,
        // Icon is the path to the image of the icon that will be displayed
        icon: image,
        title: value.Name,
        animation: google.maps.Animation.DROP
      });

      // Dynamically populate the Name of the buildings
      let title = document.getElementsByClassName("parking_btn")[key];
      title.innerHTML = marker.title;
      let text = title.nextElementSibling.lastChild;
      text.nodeValue = value.Address;
      let availability = document.getElementsByClassName("parking_content")[key];
      let spots = availability.firstChild.nextSibling.nextSibling;
      spots.nodeValue = value.Available;
      let metersAvailabile = spots.nextSibling.nextSibling;
      metersAvailabile.nodeValue = value.Meters + " Availabile";

      // IIFE or Immediately Invoked Function Expression is a function that is fired
      // once the interpreter comes across it.
      google.maps.event.addListener(marker, 'click', (function(marker) {
        return function() {
          var information = value.Name + '<br />' + value.Address;
          infowindow.setContent(information);
          infowindow.open(kentStateParkingMap, marker);
          let btn = document.getElementsByClassName("parking_content")[key];
          if (btn.style.maxHeight > "0px") {
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
