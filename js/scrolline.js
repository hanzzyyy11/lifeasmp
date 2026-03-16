window.addEventListener("scroll", function(){

const winScroll = document.documentElement.scrollTop;

const height =
document.documentElement.scrollHeight -
document.documentElement.clientHeight;

const scrolled = (winScroll / height) * 100;

document.querySelector(".scroll-line").style.width = scrolled + "%";

});