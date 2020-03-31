// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
var navLink = document.getElementsByClassName("nav-link");
// var logo = document.getElementById("logo");
var title = document.getElementById("title");

window.onscroll = function() {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    // logo.style.width = '5vh';
    title.style.fontSize = "1.5vw";
    // logo.style.transition = "width .5s, height .5s";
    for(var i=0; i < navLink.length; i++) {
      navLink[i].style.fontSize = "0.6vw";
    };
  } 
  else {
    // logo.style.width = '10vh';
    title.style.fontSize = "3vw";
    // logo.style.transition = "width .5s, height .5s";
    for(var i=0; i < navLink.length; i++) {
      navLink[i].style.fontSize = ".8vw";
    };
  }
} 