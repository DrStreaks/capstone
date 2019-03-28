
// Step 3. initialize loads the map into the HTML page. First it creates a mapOptions
// object with three properties.
function init(){
  //Setup the map options object with three pieces of data
  var mapOptions = {
    //Center of the map in latitude and longitude
    center: new google.maps.LatLng(41.151773,-81.3453001),
    //Type of map to be displayed
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    //Zoom level for the map: range 0 - 16
    zoom: 16,
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

/*--------------- Test Code -------------------- */
// Use the LatLng object to store the position of the marker using the object constructor
// syntax. We will call this object pinLocation.
var parkingLots = [
  {
    pos: new google.maps.LatLng(41.1490272,-81.3488268),
    title: "R2 Business Administration"
  },
  {
    pos: new google.maps.LatLng(41.1529386,-81.3494021),
    title: "R1 Rockwell Hall"
  },
  {
    pos: new google.maps.LatLng(41.1526778,-81.3468987),
    title: "R3 Terrace Hall"
  },
  {
    pos: new google.maps.LatLng(41.1482647,-81.3423212),
    title: "R6 Fletcher Hall"
  },
  {
    pos: new google.maps.LatLng(41.1529188,-81.342836),
    title: "Center for the Performing Arts"
  }
];

for (var i = 0; i < parkingLots.length; i++) {
// The google.maps.Marker() constructor creates a marker object. It takes one parameter:
// an object that contains literal notation.
var marker = new google.maps.Marker({
  // Position is the object storing the markers location (pinLocation)
  position: parkingLots[i].pos,
  // Map is the map that the marker should be added to.
  map: kentStateParkingMap,
  // Icon is the path to the image of the icon that will be displayed
  icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png" },
  title: parkingLots[i].title,
  animation: google.maps.Animation.DROP
  });

  ////////////////////////////////////////////////////////////////////////////////
  var infowindow = new google.maps.InfoWindow({
    content: marker.title
  });

  google.maps.event.addListener(marker, 'click', function() {
    let btn = document.getElementsByClassName("parking_content")[4];
    if (btn.style.maxHeight > "0px") {
      //closed
      btn.style.maxHeight = "0px";
      infowindow.close();
    } else {
    // Open window
    infowindow.open(kentStateParkingMap, marker);
    // Open content button
    btn.style.maxHeight = "300px";
  }
  });
  ////////////////////////////////////////////////////////////////////////////////
};

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

////////////////////////////////////////////////////////////////////////////////
// This function opens and closes the location buttons
function open_close_nav() {
  // Navigate the DOM to find the child and get the element
  var info = this.nextElementSibling;
  // If the height is greater than 0px than it is OPEN
  if (info.style.maxHeight > "0px") {
    // Close the content window
    info.style.maxHeight = "0px";
    /////////////////////////////
    infowindow.close();
  } else {
    // Open content window
    info.style.maxHeight = info.scrollHeight + "px";
    /////////////////////////////
    infowindow.open(kentStateParkingMap, marker);
  }
};

////////////////////////////////////////////////////////////////////////////////
// Get locations of all parking lots/meters
var locationsArray = document.getElementsByClassName("parking_btn");

// Loop through all locations
for (var i = 0; i < locationsArray.length; i++){
  // Run the function on the button that was clicked
  locationsArray[i].onclick = open_close_nav();
}
// end of loop
