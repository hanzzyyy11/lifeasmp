const menuBtn = document.querySelector(".menu-btn");
const mobileMenu = document.getElementById("mobileMenu");

menuBtn.addEventListener("click", function(){

mobileMenu.classList.toggle("active");
document.body.classList.toggle("menu-open");

if(menuBtn.textContent === "→"){
menuBtn.textContent = "←";
}else{
menuBtn.textContent = "→";
}

});