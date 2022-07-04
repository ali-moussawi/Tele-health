let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".navbar");

var audio = new Audio("click.wav"); //on click audio

// console.log( log);
menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};
window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};

// theme icon
$(document).ready(function () {
  $(".theme_icon").on("click", function () {
    //sound on click
    audio.play();
    // change icon
    $(".theme_icon").toggleClass("flip");
    $(".theme_icon").toggleClass("fa-sun");
    $(".theme_icon").toggleClass("fa-moon");

    let current_theme = $("html").attr("data-theme");
    //change the mode
    if (current_theme == "dark") {
      $("html").attr("data-theme", "light");
    } else if (current_theme == "light") {
      $("html").attr("data-theme", "dark");
    }
  });
});
