window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbari");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
    navbar.classList.add("p-2");
    

  } else {
    navbar.classList.remove("sticky");
    navbar.classList.remove("p-2");
    
  }
}