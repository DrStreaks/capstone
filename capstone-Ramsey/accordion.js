// Get locations of all parking lots/meters
var locationsArray = document.getElementsByClassName("parking_btn");

// Loop through all locations
for (var i = 0; i < locationsArray.length; i++){
  // Run the function on the button that was clicked
  locationsArray[i].onclick = function () {
    // Navigate the DOM to find the child and get the element
    var info = this.nextElementSibling;
    // If the height is greater than 0px than it is OPEN
    if (info.style.maxHeight > "0px") {
      // Close the content window
      info.style.maxHeight = "0px";
    } else {
      // Open content window
      info.style.maxHeight = info.scrollHeight + "px";
    }
    // end of if statement
  };
  // end of function
}
// end of loop
