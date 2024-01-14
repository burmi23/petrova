let burgerBtn = document.querySelector(".header__burger");
let menu = document.querySelector(".header__nav");
let menuLinks = document.querySelectorAll(".header__link");
let menuTelegram = document.querySelector(".header__telegram")

burgerBtn.addEventListener("click", function(){
  burgerBtn.classList.toggle("burger--active");
  menu.classList.toggle("header__nav--active");
  menu.style.transition = "transform .3s ease-in-out, visibility .3s ease-in-out";
  document.body.classList.toggle("stop-scroll");
});

menu.addEventListener('transitionend', function(){
  if (!menu.classList.contains("header__nav--active")){
    menu.removeAttribute('style');
  }
})

menuLinks.forEach(function(el){
  el.addEventListener("click", function(){
    burgerBtn.classList.remove("burger--active");
    menu.classList.remove("header__nav--active");
    menuTelegram.classList.remove("header__nav--active");
    document.body.classList.remove("stop-scroll");
  })
})

menuTelegram.addEventListener("click", function(){
  burgerBtn.classList.remove("burger--active");
  menu.classList.remove("header__nav--active");
});
