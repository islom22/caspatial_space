document.querySelector(".header__burger").addEventListener("click", (function () { 
    this.classList.toggle("header__burger--active"),
    document.querySelector(".header__menu").classList.toggle("header__menu--active"), 
    document.querySelector("body").classList.toggle("lock") })); 
    const buttons = document.querySelectorAll(".form-trigger"); 
    buttons.forEach(e => { e.addEventListener("click", (function () { 
      document.querySelector(".modal").classList.add("modal--active"), 
      document.querySelector(".modal-bg").classList.add("modal-bg--visible") })) }), 
      document.querySelector(".modal").addEventListener("click", (function (e) {
         e.target.closest(".modal__inner") || (document.querySelector(".modal").classList.remove("modal--active"), 
         document.querySelector(".modal-bg").classList.remove("modal-bg--visible")) })); 
         const elements = document.querySelectorAll(".mask"); 
  elements.forEach(e => { IMask(e, { mask: " 00 000 00 00" }) });