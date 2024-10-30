function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = "block";
      console.log('achei o id')
    } else {
      console.log(`Modal with ID '${modalId}' not found.`);
    }
  }
  
  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
      modal.style.display = "none";
    } else {
      console.warn(`Modal with ID '${modalId}' not found.`);
    }
  }
  

// Adiciona um evento de teclado para fechar o modal com a tecla ESC
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    //comparando tecla
    const modals = document.querySelectorAll(".modal"); //seleciona tudo com .modal
    modals.forEach((modal) => {
      if (modal.style.display === "block") {
        modal.style.display = "none";
      }
    });
  }
});
