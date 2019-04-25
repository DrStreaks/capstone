/*
 * Get locations of all parking lots/meters
 */
var locationsArray = document.getElementsByClassName("parking_btn");
for (var i = 0; i < locationsArray.length; i++){
  locationsArray[i].onclick = function () {
    var info = this.nextElementSibling;

    if (info.style.maxHeight > "0px") {                                                                             // If the height is greater than 0px than it is OPEN
      info.style.maxHeight = "0px";                                                                                 // Close the content window
    } else {
      info.style.maxHeight = info.scrollHeight + "px";                                                              // Open content window
    }
  };
}
