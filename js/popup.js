let popupBtn = document.querySelector(".agree__btn-yes");
let main = document.querySelector("main");
let windowAlert = document.querySelector(".agree__on");
let card = document.querySelectorAll(".book__item-btn");


popupBtn.addEventListener("click", function(){
  document.body.classList.remove("stop-scroll");
  main.classList.remove("blur-on-off");
  windowAlert.classList.add("agree__off");
  // document.button.classList.remove("block-off");

  // var st = document.querySelectorAll('[id="st"]');


  for (var i = 0; i < card.length; i++) {
    card[i].classList.remove('block-off');
  }
})
