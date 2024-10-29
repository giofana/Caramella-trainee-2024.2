function openModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "block";
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  modal.style.display = "none";
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
