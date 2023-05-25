let popupBtn = document.querySelector(".agree__btn-yes");
let main = document.querySelector("main");
let windowAlert = document.querySelector(".agree__on");
let card = document.querySelector(".book__bottom");


popupBtn.addEventListener("click", function(){
  document.body.classList.remove("stop-scroll");
  main.classList.remove("blur-on-off");
  windowAlert.classList.add("agree__off");
  card.classList.remove("block-off");
})
