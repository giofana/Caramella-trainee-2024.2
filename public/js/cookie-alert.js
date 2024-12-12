document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("cookieModal");
  const acceptBtn = document.getElementById("acceptCookies");

  // Verifica se o modal deve ser exibido
  if (localStorage.getItem("showCookieAlert") === "true") {
    modal.style.display = "flex"; // Exibe o modal
    localStorage.removeItem("showCookieAlert"); // Remove o item
  }

  // Redirecionar ao clicar no botão "Entendi"
  acceptBtn.addEventListener("click", () => {
    window.location.href = "/secret"; // Caminho da página secreta
  });
});
