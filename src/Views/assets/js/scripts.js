/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});



/* validador de selecionador */
let selectedCard = null;

function handleCheckboxClick(checkbox) {
  // Obtener la tarjeta padre del checkbox
  const card = checkbox.closest(".card");

  // Si el checkbox pertenece a una tarjeta diferente a la seleccionada anteriormente, deseleccionar los checkboxes de la tarjeta anterior
  if (selectedCard !== card) {
    if (selectedCard) {
      const checkboxesInCard = selectedCard.querySelectorAll(
        'input[type="checkbox"]'
      );
      checkboxesInCard.forEach((cb) => (cb.checked = false));
    }
    selectedCard = card;
  }
}
